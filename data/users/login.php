<?php
session_start();


require_once '../../db/db.php';
require_once '../utility/emailAvailability.php';



if (!empty($_POST['email'])   &&  !empty($_POST['password']) ) {
    
    $sql = "SELECT  `id`,  `firstname` ,  `email`,  `password` FROM `users` where `users`.`email`=:email";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':email'=>$_POST['email']]);
    
    if ($stmt->rowCount()  > 0) {
        $row = $stmt->fetch();
        // password verifie
        if (password_verify($_POST['password'], $row['password']) === true) {
            // echo json_encode(['status' => true, 'message' => 'login']);
        $_SESSION['loggedUserDetail']=[
            'firstname'=>$row['firstname'],
            'email'=>$row['email'],
            'user_id'=>$row['id'],
        ];
        echo "<script>
        window.location.assign('http://localhost/php-online-forum-project/index.php');
        </script>";

        } else {
            echo json_encode(['status' => false, 'message' => 'Invalid password']);
        }
    } else {
        echo json_encode(['status' => false, 'message' => 'Invalid email']);
    }

    
} else {
    echo json_encode(['status'=>false,'message'=>'enter your credentials']);
}

