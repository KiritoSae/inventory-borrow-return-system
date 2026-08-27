<?php

require_once __DIR__ . '/../includes/auth.php';
requireLogin();

require_once __DIR__ . '/../config/database.php';

$stmt = $pdo->query("
    SELECT
        items.id,
        items.item_code,
        items.item_name,
        categories.category_name,
        items.serial_number,
        items.location,
        items.item_condition,
        items.status
    FROM items
    INNER JOIN categories
        ON items.category_id = categories.id
    ORDER BY items.created_at DESC
");

$items = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<?php require_once __DIR__ . '/../includes/header.php'; ?>

<div class="app-layout">

    <?php require_once __DIR__ . '/../includes/sidebar.php'; ?>

    <main class="main-content">

        <div class="page-header">

            <div>
                <h1>Inventory</h1>

                <p>
                    Manage company equipment and inventory items.
                </p>
            </div>

            <a
                href="add_item.php"
                class="btn btn-primary"
                style="width:auto; text-decoration:none;"
            >
                + Add Item
            </a>

        </div>


        <div class="table-container">

            <table class="data-table">

                <thead>

                    <tr>

                        <th>Item Code</th>

                        <th>Item</th>

                        <th>Category</th>

                        <th>Serial Number</th>

                        <th>Location</th>

                        <th>Condition</th>

                        <th>Status</th>

                        <th>QR</th>

                    </tr>

                </thead>


                <tbody>

                <?php if (count($items) > 0): ?>

                    <?php foreach ($items as $item): ?>

                        <tr>

                            <td>

                                <strong>
                                    <?= htmlspecialchars(
                                        $item['item_code']
                                    ) ?>
                                </strong>

                            </td>


                            <td>

                                <?= htmlspecialchars(
                                    $item['item_name']
                                ) ?>

                            </td>


                            <td>

                                <?= htmlspecialchars(
                                    $item['category_name']
                                ) ?>

                            </td>


                            <td>

                                <?= htmlspecialchars(
                                    $item['serial_number'] ?: '—'
                                ) ?>

                            </td>


                            <td>

                                <?= htmlspecialchars(
                                    $item['location'] ?: '—'
                                ) ?>

                            </td>


                            <td>

                                <?= htmlspecialchars(
                                    $item['item_condition']
                                ) ?>

                            </td>


                            <td>

                                <?php

                                $statusClass = 'status-available';

                                if (
                                    $item['status'] === 'Borrowed'
                                ) {
                                    $statusClass = 'status-borrowed';
                                }

                                if (
                                    $item['status'] === 'Maintenance'
                                ) {
                                    $statusClass = 'status-maintenance';
                                }

                                if (
                                    $item['status'] === 'Lost'
                                ) {
                                    $statusClass = 'status-overdue';
                                }

                                ?>

                                <span
                                    class="status <?= $statusClass ?>"
                                >
                                    <?= htmlspecialchars(
                                        $item['status']
                                    ) ?>
                                </span>

                            </td>


                            <td>

                                <a
                                    href="../qr/generate.php?id=<?= $item['id'] ?>"
                                    target="_blank"
                                    class="btn"
                                    style="
                                        width:auto;
                                        text-decoration:none;
                                        background:#e8f5e9;
                                        color:#198754;
                                        padding:8px 12px;
                                    "
                                >
                                    QR
                                </a>

                            </td>

                        </tr>

                    <?php endforeach; ?>


                <?php else: ?>

                    <tr>

                        <td
                            colspan="8"
                            style="text-align:center;"
                        >
                            No inventory items found.
                        </td>

                    </tr>

                <?php endif; ?>

                </tbody>

            </table>

        </div>

    </main>

</div>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>
