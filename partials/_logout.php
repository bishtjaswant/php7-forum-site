<?php

session_start();
$_SESSION['loggedUserDetail'] = [];

unset( $_SESSION['loggedUserDetail'] );

$_SESSION['loggedoutsuccessfully'] = true;

header("Location: http://localhost/php-online-forum-project/index.php");
