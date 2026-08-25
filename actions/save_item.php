<?php

require_once __DIR__ . '/../includes/auth.php';
requireLogin();

require_once __DIR__ . '/../config/database.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: ../admin/inventory.php");
    exit;
}

$itemCode = trim($_POST['item_code'] ?? '');
$itemName = trim($_POST['item_name'] ?? '');
$categoryId = $_POST['category_id'] ?? '';
$serialNumber = trim($_POST['serial_number'] ?? '');
$location = trim($_POST['location'] ?? '');
$itemCondition = $_POST['item_condition'] ?? 'Good';


$allowedConditions = [
    'Excellent',
    'Good',
    'Fair',
    'Damaged'
];

if (
    $itemCode === '' ||
    $itemName === '' ||
    $categoryId === '' ||
    !in_array($itemCondition, $allowedConditions, true)
) {
    die("Invalid inventory information.");
}


try {

    $stmt = $pdo->prepare("
        INSERT INTO items
        (
            item_code,
            item_name,
            category_id,
            serial_number,
            location,
            item_condition,
            status,
            qr_code
        )
        VALUES
        (
            ?,
            ?,
            ?,
            ?,
            ?,
            ?,
            'Available',
            ?
        )
    ");

    $stmt->execute([
        $itemCode,
        $itemName,
        $categoryId,
        $serialNumber ?: null,
        $location ?: null,
        $itemCondition,
        $itemCode
    ]);

    header("Location: ../admin/inventory.php");
    exit;

} catch (PDOException $e) {

    if ($e->getCode() === '23000') {

        die(
            "The item code already exists. " .
            "Please use a unique item code."
        );

    }

    die("Unable to save inventory item.");
}
