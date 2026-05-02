<?php
    
function Login($pd, $uname, $pass){

    $stmt = $pd->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->execute([$uname]);

    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($user && password_verify($pass, $user['password'])) {

        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['role'] = $user['role'];

        header("Location: http://UPsite/index.php");
        exit;

    } else {
        $_SESSION['toast'] = "❌ Неверный логин или пароль";
        header("Location: http://UPsite/Auth/auth.php");
        exit;
    }
}

?>