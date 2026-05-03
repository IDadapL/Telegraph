<?php
    session_start();

    if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
        header("Location: http://UPsite/index.php");
        exit;
    }

    include '../db.php';
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../index.css">
    <link rel="stylesheet" href="admin.css">

    <title>Админ-панель</title>
</head>

<body>

<?php include '../header.php';?>

<main class="admin-wrapper">

    <h1 class="admin-title">Панель управления</h1>

    <div class="admin-grid">

        <?php
            $stmt = $pdo->query("SELECT DISTINCT users.username FROM orders JOIN users ON users.id = orders.user_id");
            $users = $stmt->fetchAll();
            $total = $pdo->query("SELECT COUNT(*) FROM orders")->fetchColumn();
        ?>

        <?php

            $page = $_GET['page'] ?? 1;
            $limit = 10;
            $offset = ($page - 1) * $limit;

            $stmt = $pdo->prepare("
            SELECT
            orders.id,
            users.username,
            orders.status,
            orders.created_at,
            orders.message,
            orders.address,
            services.name AS service_name,
            services.type
            FROM orders
            JOIN users ON users.id = orders.user_id
            JOIN services ON services.id = orders.service_id
            ORDER BY orders.created_at DESC
            LIMIT :limit OFFSET :offset
        ");
            $stmt->bindValue(':limit', (int)$limit, PDO::PARAM_INT);
            $stmt->bindValue(':offset', (int)$offset, PDO::PARAM_INT);
            $stmt->execute();
            $orders = $stmt->fetchAll();

            $totalPages = ceil($total / $limit);
        ?>

    <section class="admin-card">
        <h2>Заказы</h2>

        <h3>Всего заказов: <?= $total ?></h3>
        
        <?php foreach ($orders as $order): ?>
            <div class="admin-item">
                <span>👤 <?= $order['username'] ?></span>
                <span>📦 <?= $order['service_name'] ?></span>
                <small>
                <?= $order['status'] ?> | <?= $order['created_at'] ?>
                </small>

                <?php if($order['type'] === 'service' && $order['message']): ?>
                    <small>✉️ Сообщение: <?= $order['message'] ?></small>
                    <small>📍 Адрес: <?= $order['address'] ?></small>
                <?php endif; ?>
                
        <div class="item-actions">

            <form method="post" action="updateStatus.php">
                <input type="hidden" name="order_id" value="<?= $order['id'] ?>">

                <select name="status" onchange="this.form.submit()">
                    <option value="в обработке" <?= $order['status'] == 'в обработке' ? 'selected' : '' ?>>в обработке</option>
                    <option value="выполнено" <?= $order['status'] == 'выполнено' ? 'selected' : '' ?>>выполнено</option>
                </select>
            </form>

            <form method="post" action="deleteOrder.php">
                <input type="hidden" name="order_id" value="<?= $order['id'] ?>">
                <button type="submit" class="item-deleter">✖</button>
            </form>

        </div>
            </div>
        <?php endforeach; ?>
    </section>
    </div>

    <div class="pagination">
        <?php for ($i = 1; $i <= $totalPages; $i++): ?>
            <a href="?page=<?= $i ?>" class="<?= $i == $page ? 'active' : '' ?>">
                <?= $i ?>
            </a>
        <?php endfor; ?>
    </div>

</main>

<?php include '../footer.php';?>

</body>
</html>