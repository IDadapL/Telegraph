<?php
session_start();
require_once "login.php";

include 'db.php';

$email = $_POST["email"] ?? null;
$username = $_POST["username"] ?? null;
$password = $_POST["password"] ?? null;
$mode = $_POST["mode"] ?? null;

function SendData($pd, $eml, $uname, $pass){
    $stm = $pd->prepare("INSERT INTO users(email, username, password) VALUES(?, ?, ?)");
    $hash = password_hash($pass, PASSWORD_DEFAULT);
    $stm->execute([$eml, $uname, $hash]);
    $_SESSION['user_id'] = $pd->lastInsertId();
    $_SESSION['username'] = $uname;
    $_SESSION['role'] = 'user';
    header("Location: http://UPsite/index.php");
    exit;
}

if($mode == "login"){
    Login($pdo, $email, $username, $password);
    exit;
}

if($mode == "register"){
    if($email && $username && $password && strlen($username) > 5 && strlen($password) > 5){
        SendData($pdo, $email, $username, $password);
        exit;
    }

    header("Location: http://UPsite/Auth/auth.php");
    exit;
}

?>