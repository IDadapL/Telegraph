<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: http://UPsite/Auth/auth.php");
    exit;
}

include '../db.php';

$service_id = $_POST['service_id'] ?? null;
$message = $_POST['message'] ?? '';
$address = $_POST['address'] ?? '';
$type = $_POST['type'] ?? 'service';

if (!$service_id) {
    header("Location: /UPsite/index.php");
    exit;
}

if($type === 'service'){
    $stmt = $pdo->prepare("
        INSERT INTO orders (user_id, service_id, status, message, address, created_at)
        VALUES (?, ?, 'оплачено', ?, ?, NOW())
    ");

    $stmt->execute([
        $_SESSION['user_id'],
        $service_id,
        $message,
        $address
    ]);
}
else{

    $stmt = $pdo->prepare("
        INSERT INTO orders (user_id, service_id, status, created_at)
        VALUES (?, ?, 'оплачено', NOW())
    ");

    $stmt->execute([
        $_SESSION['user_id'],
        $service_id
    ]);
}

header("Location: http://UPsite/index.php");
exit;