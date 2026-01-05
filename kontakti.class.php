<?php

require_once 'kontakti.class.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $kontakti = new Kontakti(
        $_POST['email'],
        $_POST['phone'],
        $_POST['event'],
        $_POST['message']
    );

    $filePath = 'datafolderis/pasakums.json';
    $data = [];

    
    if (file_exists($filePath)) {
        $json = file_get_contents($filePath);
        $data = json_decode($json, true) ?? [];
    }

    
    $data[] = [
        'email' => $kontakti->getEmail(),
        'phone' => $kontakti->getPhone(),
        'event' => $kontakti->getEvent(),
        'message' => $kontakti->getMessage(),
        'timestamp' => date('Y-m-d H:i:s')
    ];

    
    file_put_contents($filePath, json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));

    header('Location: index.php');
    exit;
}

?>