<?php
include '../db.php';

$type = $_POST['type'];
$name = $_POST['name'];

$message = $_POST['message'] ?? null;
$address = $_POST['address'] ?? null;

$stmt = $pdo->prepare("
    INSERT INTO services (name, type, message, address)
    VALUES (?, ?, ?, ?)
");

$stmt->execute([$name, $type, $message, $address]);

header("Location: admin.php?tab=add&type=$type");
exit;