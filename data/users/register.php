<?php

require_once '../../db/db.php';
require_once '../utility/emailAvailability.php';

$data = [
    "first" => $_POST['first'],
    "last" => $_POST['last'],
    "email" => $_POST['email'],
    "password" => password_hash($_POST['password'], PASSWORD_DEFAULT),
    "address" => $_POST['address'],
    "phone" => $_POST['phone'],
    "gender" => $_POST['gender']
];

// echo emailAvailability($pdo, $data['email']);die;
if (emailAvailability($pdo, $data['email']) === -1) {
    $sql = 'INSERT INTO `users`( `firstname`, `lastname`, `email`, `password`, `address`, `phone`, `gender`) VALUES (:first,:last,:email,:password,:address,:phone,:gender)';
    $stmt = $pdo->prepare($sql);
    $stmt->execute($data);

    if ($stmt->rowCount() > 0) {
        echo json_encode(['status' => true, 'msg' => 'account created']);
    } else {
        echo json_encode(['status' => false, 'msg' => 'account creation failed']);
    }
} else {
    echo json_encode(['status' => false, 'msg' => "email Already registered"]);
}
