<?php

class Kontakti {
    private $email;
    private $phone;
    private $event;
    private $message;
    public $error;

    public function __construct($email, $phone, $event, $message) {
        $this->email = filter_var(trim($email), FILTER_VALIDATE_EMAIL) ? trim($email) : '';
        $this->phone = filter_var(trim($phone), FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $this->event = filter_var(trim($event), FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $this->message = filter_var(trim($message), FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        if (empty($this->email) || empty($this->phone) || empty($this->event) || empty($this->message)) {
            $this->error = "Lūdzu, aizpildiet visus laukus!";
        }
    }

    public function getEmail() { return $this->email; }
    public function getPhone() { return $this->phone; }
    public function getEvent() { return $this->event; }
    public function getMessage() { return $this->message; }
}

class KontaktiHandler {
    private $storage = "datafolderis/pasakums.json";
    private $stored_data = [];

    public function __construct() {
        $this->loadData();
    }

    private function loadData() {
        if (file_exists($this->storage)) {
            $json = file_get_contents($this->storage);
            $this->stored_data = json_decode($json, true) ?? [];
        }
    }

    public function saveContact(Kontakti $kontakti) {
        $this->stored_data[] = [
            'email' => $kontakti->getEmail(),
            'phone' => $kontakti->getPhone(),
            'event' => $kontakti->getEvent(),
            'message' => $kontakti->getMessage()
        ];

        file_put_contents($this->storage, json_encode($this->stored_data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $kontakti = new Kontakti(
        $_POST['email'] ?? '',
        $_POST['phone'] ?? '',
        $_POST['event'] ?? '',
        $_POST['message'] ?? ''
    );

    $handler = new KontaktiHandler();
    $handler->saveContact($kontakti);

    header('Location: index.php');
    exit;
}

?>
