<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0"
    >

    <title>Login - Inventory Management System</title>

    <link
        rel="stylesheet"
        href="assets/css/style.css"
    >

</head>

<body>

<div class="login-page">

    <div class="login-container">

        <div class="login-card">

            <div class="login-logo">

                <div class="logo-icon">
                    📦
                </div>

                <h1>Inventory System</h1>

                <p>
                    Borrowing & Return Management
                </p>

            </div>


            <form method="POST" action="login.php">

                <div class="form-group">

                    <label for="username">
                        Username
                    </label>

                    <input
                        type="text"
                        id="username"
                        name="username"
                        class="form-control"
                        placeholder="Enter your username"
                        required
                    >

                </div>


                <div class="form-group">

                    <label for="password">
                        Password
                    </label>

                    <input
                        type="password"
                        id="password"
                        name="password"
                        class="form-control"
                        placeholder="Enter your password"
                        required
                    >

                </div>


                <button
                    type="submit"
                    class="btn btn-primary"
                >
                    Sign In
                </button>

            </form>


            <div class="login-footer">

                Inventory Management System

            </div>

        </div>

    </div>

</div>

</body>
</html>
