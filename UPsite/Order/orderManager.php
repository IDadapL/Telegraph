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

if ($type === 'service' && (!$message || !$address)) {
    $_SESSION['toast'] = '❌ Заполните сообщение и адрес';
    header("Location: http://UPsite/Order/order.php?type=service");
    exit;
}

if (!$service_id) {
    header("Location: /UPsite/index.php");
    exit;
}

if($type === 'service'){
    $stmt = $pdo->prepare("SELECT name, type FROM services WHERE id = ?");
    $stmt->execute([$service_id]);
    $service = $stmt->fetch();
    $typeText = ($service['type'] === 'tariff') ? 'тариф' : 'услуга';

    $stmt = $pdo->prepare("
        INSERT INTO orders (user_id, service_id, status, message, address, created_at)
        VALUES (?, ?, 'в обработке', ?, ?, NOW())
    ");

    $stmt->execute([
        $_SESSION['user_id'],
        $service_id,
        $message,
        $address
    ]);

    $_SESSION['toast'] = "✅ Ваш заказ {$typeText} \"{$service['name']}\" успешно создан";
}

else{
    $stmt = $pdo->prepare("SELECT name, type FROM services WHERE id = ?");
    $stmt->execute([$service_id]);
    $service = $stmt->fetch();
    $typeText = ($service['type'] === 'tariff') ? 'тариф' : 'услуга';

    $stmt = $pdo->prepare("
        INSERT INTO orders (user_id, service_id, status, created_at)
        VALUES (?, ?, 'в обработке', NOW())
    ");

    $stmt->execute([
        $_SESSION['user_id'],
        $service_id
    ]);

    $_SESSION['toast'] = "📦 Ваш заказ {$typeText} \"{$service['name']}\" успешно создан";
}

header("Location: http://UPsite/index.php");
exit;