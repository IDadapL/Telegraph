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
    Login($pdo, $username, $password);
    exit;
}

if($mode == "register"){
    if(!$email)$_SESSION['toast'] = "❌ Поле Email не может быть пустым";
    elseif(!$username) $_SESSION['toast'] = "❌ Поле Username не может быть пустым";
    elseif(!$password) $_SESSION['toast'] = "❌ Поле Password не может быть пустым";
    elseif(strlen($username) < 6 || strlen($password) < 6) $_SESSION['toast'] = "❌ Логин и пароль должны быть больше 5 символов";
    else{
        SendData($pdo, $email, $username, $password);
        exit;
    }

    header("Location: http://UPsite/Auth/auth.php");
    exit;
}

?>