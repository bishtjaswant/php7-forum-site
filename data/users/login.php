<?php

require_once '../../db/db.php';
require_once '../utility/emailAvailability.php';


$data = [
    "email" => $_POST['email'],
    "password" => $_POST['password']
];

$sql = "SELECT `firstname`,`lastname`,`email` from  `users` where `users`.`email`=:email";
$stmt = $pdo->prepare($sql);
$stmt->execute($data['email']);

if ($stmt->rowCount()  > 0) {
    $row = $stmt->fetch();
    // password verifie
    if (password_verify($data['password'], $row['password']) === true) {
        echo json_encode(['status' => true, 'msg' => 'login']);
    } else {
        echo json_encode(['status' => false, 'msg' => 'Invalid password']);
    }
} else {
    echo json_encode(['status' => false, 'msg' => 'Invalid email']);
}
