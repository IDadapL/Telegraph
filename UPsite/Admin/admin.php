<?php
session_start();

if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
    header("Location: http://UPsite/index.php");
    exit;
}

include '../db.php';

$tab = $_GET['tab'] ?? 'active';
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

    <!-- ВКЛАДКИ -->
    <div class="admin-tabs">
    <button type="button"
            class="tab-btn <?= $tab === 'active' ? 'active' : '' ?>"
            onclick="location.href='?tab=active'">
        ⚡ Активные
    </button>

    <button type="button"
            class="tab-btn <?= $tab === 'history' ? 'active' : '' ?>"
            onclick="location.href='?tab=history'">
        📦 История
    </button>
    </div>

    <div class="admin-grid">

<?php if ($tab === 'active'): ?>

    <?php
    $stmt = $pdo->query("
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
        WHERE orders.status != 'выполнено'
        ORDER BY orders.created_at DESC
    ");

    $orders = $stmt->fetchAll();
    ?>

    <section class="admin-card">
        <h2>Активные заказы</h2>

        <?php foreach ($orders as $order): ?>
            <div class="admin-item">

                <span>👤 <?= $order['username'] ?></span>
                <span>📦 <?= $order['service_name'] ?></span>

                <small>
                    <?= $order['status'] ?> | <?= $order['created_at'] ?>
                </small>

                <?php if ($order['type'] === 'service' && $order['message']): ?>
                    <small>✉️ <?= $order['message'] ?></small>
                    <small>📍 <?= $order['address'] ?></small>
                <?php endif; ?>

                <div class="item-actions">

                    <form method="post" action="updateStatus.php">
                        <input type="hidden" name="order_id" value="<?= $order['id'] ?>">

                        <select name="status" onchange="this.form.submit()">
                            <option value="в обработке" <?= $order['status'] === 'в обработке' ? 'selected' : '' ?>>
                                в обработке
                            </option>
                            <option value="выполнено" <?= $order['status'] === 'выполнено' ? 'selected' : '' ?>>
                                выполнено
                            </option>
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

<?php elseif ($tab === 'history'): ?>

    <?php
    $stmt = $pdo->query("
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
        WHERE orders.status = 'выполнено'
        ORDER BY orders.created_at DESC
    ");

    $orders = $stmt->fetchAll();
    ?>

    <section class="admin-card">
        <h2>История заказов</h2>

        <?php foreach ($orders as $order): ?>
            <div class="admin-item">

                <span>👤 <?= $order['username'] ?></span>
                <span>📦 <?= $order['service_name'] ?></span>

                <small>
                    <?= $order['status'] ?> | <?= $order['created_at'] ?>
                </small>

                <?php if ($order['type'] === 'service' && $order['message']): ?>
                    <small>✉️ <?= $order['message'] ?></small>
                    <small>📍 <?= $order['address'] ?></small>
                <?php endif; ?>

                <div class="item-actions">

                    <form method="post" action="updateStatus.php">
                        <input type="hidden" name="order_id" value="<?= $order['id'] ?>">

                        <select name="status" onchange="this.form.submit()">
                            <option value="в обработке" <?= $order['status'] === 'в обработке' ? 'selected' : '' ?>>
                                в обработке
                            </option>
                            <option value="выполнено" <?= $order['status'] === 'выполнено' ? 'selected' : '' ?>>
                                выполнено
                            </option>
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

<?php endif; ?>

</div>

</main>

<?php include '../footer.php';?>

</body>
</html>