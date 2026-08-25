<?php

require_once __DIR__ . '/../includes/auth.php';
requireLogin();

require_once __DIR__ . '/../config/database.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {

    header("Location: ../admin/borrowers.php");
    exit;

}

$borrowerCode = trim(
    $_POST['borrower_code'] ?? ''
);

$fullName = trim(
    $_POST['full_name'] ?? ''
);

$departmentId = $_POST['department_id'] ?? '';

$position = trim(
    $_POST['position'] ?? ''
);

$contactNumber = trim(
    $_POST['contact_number'] ?? ''
);

$email = trim(
    $_POST['email'] ?? ''
);


if (
    $borrowerCode === '' ||
    $fullName === '' ||
    $departmentId === ''
) {

    die(
        "Borrower ID, name, and department are required."
    );

}


try {

    $stmt = $pdo->prepare("
        INSERT INTO borrowers
        (
            borrower_code,
            full_name,
            department_id,
            position,
            contact_number,
            email
        )
        VALUES
        (
            ?,
            ?,
            ?,
            ?,
            ?,
            ?
        )
    ");

    $stmt->execute([
        $borrowerCode,
        $fullName,
        $departmentId,
        $position ?: null,
        $contactNumber ?: null,
        $email ?: null
    ]);

    header("Location: ../admin/borrowers.php");
    exit;

} catch (PDOException $e) {

    if ($e->getCode() === '23000') {

        die(
            "This Borrower ID already exists."
        );

    }

    die(
        "Unable to save borrower."
    );

}
