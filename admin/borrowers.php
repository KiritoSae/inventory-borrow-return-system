<?php

require_once __DIR__ . '/../includes/auth.php';
requireLogin();

require_once __DIR__ . '/../config/database.php';

$stmt = $pdo->query("
    SELECT
        borrowers.id,
        borrowers.borrower_code,
        borrowers.full_name,
        borrowers.position,
        borrowers.contact_number,
        borrowers.email,
        borrowers.status,
        departments.department_name
    FROM borrowers

    INNER JOIN departments
        ON borrowers.department_id = departments.id

    ORDER BY borrowers.full_name ASC
");

$borrowers = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<?php require_once __DIR__ . '/../includes/header.php'; ?>

<div class="app-layout">

    <?php require_once __DIR__ . '/../includes/sidebar.php'; ?>

    <main class="main-content">

        <div class="page-header">

            <div>

                <h1>Borrowers</h1>

                <p>
                    Manage employees who can borrow company items.
                </p>

            </div>

        </div>


        <div
            class="login-card"
            style="max-width:800px; margin-bottom:25px;"
        >

            <h2 style="margin-bottom:20px;">
                Add Borrower
            </h2>

            <form
                method="POST"
                action="../actions/save_borrower.php"
            >

                <div class="form-group">

                    <label>
                        Borrower ID *
                    </label>

                    <input
                        type="text"
                        name="borrower_code"
                        class="form-control"
                        placeholder="Example: EMP-001"
                        required
                    >

                </div>


                <div class="form-group">

                    <label>
                        Full Name *
                    </label>

                    <input
                        type="text"
                        name="full_name"
                        class="form-control"
                        placeholder="Example: Juan Dela Cruz"
                        required
                    >

                </div>


                <div class="form-group">

                    <label>
                        Department *
                    </label>

                    <select
                        name="department_id"
                        class="form-control"
                        required
                    >

                        <option value="">
                            Select department
                        </option>

                        <?php

                        $departmentStmt = $pdo->query("
                            SELECT id, department_name
                            FROM departments
                            WHERE status = 'Active'
                            ORDER BY department_name
                        ");

                        $departmentList =
                            $departmentStmt->fetchAll(
                                PDO::FETCH_ASSOC
                            );

                        ?>

                        <?php foreach (
                            $departmentList
                            as $department
                        ): ?>

                            <option
                                value="<?= $department['id'] ?>"
                            >
                                <?= htmlspecialchars(
                                    $department['department_name']
                                ) ?>
                            </option>

                        <?php endforeach; ?>

                    </select>

                </div>


                <div class="form-group">

                    <label>
                        Position
                    </label>

                    <input
                        type="text"
                        name="position"
                        class="form-control"
                        placeholder="Example: Staff"
                    >

                </div>


                <div class="form-group">

                    <label>
                        Contact Number
                    </label>

                    <input
                        type="text"
                        name="contact_number"
                        class="form-control"
                        placeholder="Optional"
                    >

                </div>


                <div class="form-group">

                    <label>
                        Email
                    </label>

                    <input
                        type="email"
                        name="email"
                        class="form-control"
                        placeholder="Optional"
                    >

                </div>


                <button
                    type="submit"
                    class="btn btn-primary"
                    style="width:auto;"
                >
                    Add Borrower
                </button>

            </form>

        </div>


        <div class="table-container">

            <table class="data-table">

                <thead>

                    <tr>

                        <th>
                            Borrower ID
                        </th>

                        <th>
                            Name
                        </th>

                        <th>
                            Department
                        </th>

                        <th>
                            Position
                        </th>

                        <th>
                            Contact
                        </th>

                        <th>
                            Status
                        </th>

                    </tr>

                </thead>

                <tbody>

                <?php if (count($borrowers) > 0): ?>

                    <?php foreach ($borrowers as $borrower): ?>

                        <tr>

                            <td>
                                <strong>
                                    <?= htmlspecialchars(
                                        $borrower['borrower_code']
                                    ) ?>
                                </strong>
                            </td>

                            <td>
                                <?= htmlspecialchars(
                                    $borrower['full_name']
                                ) ?>
                            </td>

                            <td>
                                <?= htmlspecialchars(
                                    $borrower['department_name']
                                ) ?>
                            </td>

                            <td>
                                <?= htmlspecialchars(
                                    $borrower['position']
                                    ?: '—'
                                ) ?>
                            </td>

                            <td>
                                <?= htmlspecialchars(
                                    $borrower['contact_number']
                                    ?: '—'
                                ) ?>
                            </td>

                            <td>

                                <?php if (
                                    $borrower['status'] === 'Active'
                                ): ?>

                                    <span class="status status-available">
                                        Active
                                    </span>

                                <?php else: ?>

                                    <span class="status status-maintenance">
                                        Inactive
                                    </span>

                                <?php endif; ?>

                            </td>

                        </tr>

                    <?php endforeach; ?>

                <?php else: ?>

                    <tr>

                        <td
                            colspan="6"
                            style="text-align:center;"
                        >
                            No borrowers found.
                        </td>

                    </tr>

                <?php endif; ?>

                </tbody>

            </table>

        </div>

    </main>

</div>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>
