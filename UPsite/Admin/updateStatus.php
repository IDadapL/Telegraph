<?php
session_start();

if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header("Location: http://UPsite/index.php");
    exit;
}

include "../db.php";

$order_id = $_POST['order_id'] ?? null;
$status = $_POST['status'] ?? null;

$allowed = ['в обработке', 'выполнено'];

if ($order_id && in_array($status, $allowed)) {
    $stmt = $pdo->prepare("UPDATE orders SET status = ? WHERE id = ?");
    $stmt->execute([$status, $order_id]);
}

header("Location: http://UPsite/Admin/admin.php");
exit;