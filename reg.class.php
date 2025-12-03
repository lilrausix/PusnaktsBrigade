<?php 
class RegisterUser{
    private $username;
    private $raw_password;
    private $encrypted_password;
    public $error;
    public $success;
    private $storage = "datafolderis/data.json";
    private $stored_users = [];
    private $new_user;


    public function __construct($username, $password){
        $this->username = trim($username);
        $this->username = filter_var($this->username, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        $this->raw_password = filter_var(trim($password), FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $this->encrypted_password = password_hash($this->raw_password, PASSWORD_DEFAULT);

         $this->stored_users = json_decode(file_get_contents($this->storage), true);
    
        $this->new_user = [
            "username" => $this->username,
            "password" => $this->encrypted_password
        ];

        if($this->checkFieldValues()){
            $this->insertUser();
        }
    
    }


    private function checkFieldValues(){
        if(empty($this->username) || empty($this->raw_password)){
            $this->error = "Lūdzu, aizpildiet visus laukus!";
            return false;
        } else {
            return true;
        }
    }

    private function usernameExists(){
        foreach($this->stored_users as $user){
            if($this->username == $user['username']){
                $this->error = "Lietotājvārds jau eksistē!";
                return true;
            }
        }
        return false;}
    


    private function insertUser(){
        if($this->usernameExists() == FALSE){
            array_push($this->stored_users, $this->new_user);
            if(file_put_contents($this->storage, json_encode($this->stored_users, JSON_PRETTY_PRINT))){
                return $this->success = "Reģistrācija veiksmīga!";
            }else{
                return $this->error = "Radās kļūda! Mēģiniet vēlreiz.";
            }
        }
    }

}
?>