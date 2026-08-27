<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Inventory Borrow & Return System</title>

    <link rel="stylesheet" href="style.css">
</head>

<body>

<div class="app">

    <!-- SIDEBAR -->
    <aside class="sidebar">

        <div class="logo">
            <div class="logo-icon">I</div>

            <div>
                <h2>Inventory</h2>
                <span>Management System</span>
            </div>
        </div>


        <nav>

            <p class="menu-title">MAIN</p>

            <a href="#" class="menu active">
                <span>▦</span>
                Dashboard
            </a>

            <a href="#" class="menu">
                <span>▣</span>
                Inventory
            </a>

            <a href="#" class="menu">
                <span>♙</span>
                Borrowers
            </a>


            <p class="menu-title">TRANSACTIONS</p>

            <a href="#" class="menu">
                <span>↗</span>
                Borrow Items
            </a>

            <a href="#" class="menu">
                <span>↙</span>
                Return Items
            </a>

            <a href="#" class="menu">
                <span>◷</span>
                Transaction History
            </a>


            <p class="menu-title">TOOLS</p>

            <a href="#" class="menu">
                <span>▦</span>
                QR Scanner
            </a>

        </nav>


        <div class="sidebar-bottom">

            <div class="user">

                <div class="avatar">
                    A
                </div>

                <div>
                    <strong>Administrator</strong>
                    <small>System Admin</small>
                </div>

            </div>

            <a href="#" class="logout">
                ⇥ Logout
            </a>

        </div>

    </aside>


    <!-- MAIN CONTENT -->
    <main class="main">

        <!-- TOP BAR -->
        <header class="topbar">

            <div class="mobile-title">
                Inventory System
            </div>

            <div class="top-right">

                <div class="notification">
                    ♢
                    <span>3</span>
                </div>

                <div class="date">
                    August 27, 2026
                </div>

            </div>

        </header>


        <!-- CONTENT -->
        <section class="content">


            <div class="welcome">

                <div>

                    <p class="small-text">
                        COMPANY INVENTORY
                    </p>

                    <h1>
                        Good morning, Administrator
                    </h1>

                    <p>
                        Here's what's happening with your inventory today.
                    </p>

                </div>

                <button class="green-button">
                    + Add Item
                </button>

            </div>


            <!-- STATISTICS -->

            <div class="stats">


                <div class="stat-card">

                    <div class="stat-icon inventory-icon">
                        ▣
                    </div>

                    <div>

                        <p>Total Items</p>

                        <h2>128</h2>

                        <small>All inventory items</small>

                    </div>

                </div>


                <div class="stat-card">

                    <div class="stat-icon available-icon">
                        ✓
                    </div>

                    <div>

                        <p>Available</p>

                        <h2>86</h2>

                        <small>Ready to borrow</small>

                    </div>

                </div>


                <div class="stat-card">

                    <div class="stat-icon borrowed-icon">
                        ↗
                    </div>

                    <div>

                        <p>Borrowed</p>

                        <h2>34</h2>

                        <small>Currently borrowed</small>

                    </div>

                </div>


                <div class="stat-card">

                    <div class="stat-icon overdue-icon">
                        !
                    </div>

                    <div>

                        <p>Overdue</p>

                        <h2>8</h2>

                        <small>Needs attention</small>

                    </div>

                </div>


            </div>


            <!-- LOWER SECTION -->

            <div class="dashboard-grid">


                <!-- RECENT TRANSACTIONS -->

                <div class="panel">

                    <div class="panel-header">

                        <div>

                            <h2>
                                Recent Transactions
                            </h2>

                            <p>
                                Latest borrowing and returning activity
                            </p>

                        </div>

                        <a href="#">
                            View all
                        </a>

                    </div>


                    <div class="table-wrapper">

                        <table>

                            <thead>

                                <tr>

                                    <th>Item</th>
                                    <th>Borrower</th>
                                    <th>Department</th>
                                    <th>Date</th>
                                    <th>Status</th>

                                </tr>

                            </thead>


                            <tbody>

                                <tr>

                                    <td>

                                        <strong>
                                            Dell Latitude 5440
                                        </strong>

                                        <small>
                                            IT-001
                                        </small>

                                    </td>

                                    <td>
                                        Juan Dela Cruz
                                    </td>

                                    <td>
                                        IT Department
                                    </td>

                                    <td>
                                        Aug 27, 2026
                                    </td>

                                    <td>
                                        <span class="status borrowed">
                                            Borrowed
                                        </span>
                                    </td>

                                </tr>


                                <tr>

                                    <td>

                                        <strong>
                                            Epson Projector
                                        </strong>

                                        <small>
                                            PRJ-003
                                        </small>

                                    </td>

                                    <td>
                                        Maria Santos
                                    </td>

                                    <td>
                                        HR Department
                                    </td>

                                    <td>
                                        Aug 27, 2026
                                    </td>

                                    <td>
                                        <span class="status returned">
                                            Returned
                                        </span>
                                    </td>

                                </tr>


                                <tr>

                                    <td>

                                        <strong>
                                            Canon Camera
                                        </strong>

                                        <small>
                                            CAM-008
                                        </small>

                                    </td>

                                    <td>
                                        Mark Reyes
                                    </td>

                                    <td>
                                        Marketing
                                    </td>

                                    <td>
                                        Aug 26, 2026
                                    </td>

                                    <td>
                                        <span class="status overdue">
                                            Overdue
                                        </span>
                                    </td>

                                </tr>


                                <tr>

                                    <td>

                                        <strong>
                                            HP Laser Printer
                                        </strong>

                                        <small>
                                            PRN-014
                                        </small>

                                    </td>

                                    <td>
                                        Ana Garcia
                                    </td>

                                    <td>
                                        Finance
                                    </td>

                                    <td>
                                        Aug 26, 2026
                                    </td>

                                    <td>
                                        <span class="status returned">
                                            Returned
                                        </span>

                                    </td>

                                </tr>

                            </tbody>

                        </table>

                    </div>

                </div>


                <!-- QUICK ACTIONS -->

                <div class="panel quick-panel">

                    <div class="panel-header">

                        <div>

                            <h2>
                                Quick Actions
                            </h2>

                            <p>
                                Frequently used functions
                            </p>

                        </div>

                    </div>


                    <a href="#" class="quick-action">

                        <div class="quick-icon">
                            ▣
                        </div>

                        <div>

                            <strong>
                                Add Inventory Item
                            </strong>

                            <small>
                                Register new equipment
                            </small>

                        </div>

                        <span>›</span>

                    </a>


                    <a href="#" class="quick-action">

                        <div class="quick-icon">
                            ↗
                        </div>

                        <div>

                            <strong>
                                Borrow an Item
                            </strong>

                            <small>
                                Record a new borrowing
                            </small>

                        </div>

                        <span>›</span>

                    </a>


                    <a href="#" class="quick-action">

                        <div class="quick-icon">
                            ↙
                        </div>

                        <div>

                            <strong>
                                Return an Item
                            </strong>

                            <small>
                                Process an item return
                            </small>

                        </div>

                        <span>›</span>

                    </a>


                    <a href="#" class="quick-action">

                        <div class="quick-icon">
                            ▦
                        </div>

                        <div>

                            <strong>
                                Scan QR Code
                            </strong>

                            <small>
                                Find an inventory item
                            </small>

                        </div>

                        <span>›</span>

                    </a>

                </div>

            </div>


        </section>

    </main>

</div>

</body>
</html>
