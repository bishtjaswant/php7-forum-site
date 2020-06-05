<?php


function emailAvailability($pdo,$email=null){
    $stmt = $pdo->prepare("SELECT `email` FROM users WHERE email=:email");
    $stmt->execute([$email]); 
    $user = $stmt->fetch();
    if ($user) {
        return 1;
    } else {
        return -1;
    } 
}