<?php

require_once 'kontakti.class.php';

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
            'message' => $kontakti->getMessage(),
            'timestamp' => date('Y-m-d H:i:s')
        ];

        file_put_contents($this->storage, json_encode($this->stored_data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $kontakti = new Kontakti(
        $_POST['email'],
        $_POST['phone'],
        $_POST['event'],
        $_POST['message']
    );

    $handler = new KontaktiHandler();
    $handler->saveContact($kontakti);

    header('Location: index.php');
    exit;
}

?>