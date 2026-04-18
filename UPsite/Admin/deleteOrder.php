<?php
session_start();

if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header("Location: http://UPsite/index.php");
    exit;
}

include '../db.php';

$order_id = $_POST['order_id'] ?? null;

if ($order_id) {
    $stmt = $pdo->prepare("DELETE FROM orders WHERE id = ?");
    $stmt->execute([$order_id]);
}

header("Location: admin.php");
exit;