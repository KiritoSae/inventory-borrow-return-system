<?php

require_once __DIR__ . '/../includes/auth.php';
requireLogin();

require_once __DIR__ . '/../config/database.php';

$itemId = filter_input(
    INPUT_GET,
    'id',
    FILTER_VALIDATE_INT
);

if (!$itemId) {
    die("Invalid item ID.");
}

$stmt = $pdo->prepare("
    SELECT
        item_code,
        item_name,
        qr_code
    FROM items
    WHERE id = ?
    LIMIT 1
");

$stmt->execute([$itemId]);

$item = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$item) {
    die("Item not found.");
}

$qrData = $item['qr_code'];

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>QR Code - <?= htmlspecialchars($item['item_code']) ?></title>

    <style>

        body {
            font-family: Arial, sans-serif;
            background: #f4f7f5;
            margin: 0;
            padding: 30px;
            text-align: center;
        }

        .qr-card {
            background: white;
            max-width: 400px;
            margin: 40px auto;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.08);
        }

        h1 {
            margin-bottom: 5px;
        }

        .item-code {
            color: #198754;
            font-size: 20px;
            font-weight: bold;
        }

        .qr-image {
            width: 250px;
            height: 250px;
            margin: 25px auto;
        }

        .print-button {
            background: #198754;
            color: white;
            border: none;
            padding: 12px 25px;
            border-radius: 8px;
            cursor: pointer;
            font-size: 16px;
        }

        @media print {

            .print-button {
                display: none;
            }

            body {
                background: white;
            }

            .qr-card {
                box-shadow: none;
            }

        }

    </style>

</head>

<body>

    <div class="qr-card">

        <h1>
            <?= htmlspecialchars($item['item_name']) ?>
        </h1>

        <div class="item-code">

            <?= htmlspecialchars($item['item_code']) ?>

        </div>


        <img
            class="qr-image"
            src="https://api.qrserver.com/v1/create-qr-code/?size=250x250&data=<?= urlencode($qrData) ?>"
            alt="QR Code"
        >


        <p>
            Scan this QR code to identify this inventory item.
        </p>


        <button
            class="print-button"
            onclick="window.print()"
        >
            Print QR Code
        </button>

    </div>

</body>

</html>
