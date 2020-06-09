<?php

session_start();
$_SESSION['loggedUserDetail']=[];
session_destroy();

header("Location: http://localhost/php-online-forum-project/index.php");
