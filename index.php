<?php
/*
Course Code & Name : DFP50193 - Web Programming
Full Name          : ______________________________
Registration Number: ______________________________
Class              : ______________________________
*/

session_start();

if (isset($_SESSION['admin_id'])) {
    header("Location: dashboard.php");
    exit;
}

$error = $_SESSION['login_error'] ?? "";
unset($_SESSION['login_error']);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>
        E-Document Management System - Login
    </title>

    <link rel="stylesheet" href="style.css">
</head>

<body class="login-page">

    <div class="login-card">

        <h1>
            E-Document Management System
        </h1>

        <p class="subtitle">
            Administrator Login
        </p>

        <?php if ($error): ?>

            <div class="alert error">
                <?= htmlspecialchars($error) ?>
            </div>

        <?php endif; ?>

        <form action="login.php" method="POST">

            <label for="username">
                Username
            </label>

            <input
                type="text"
                id="username"
                name="username"
                maxlength="50"
                required
            >

            <label for="password">
                Password
            </label>

            <input
                type="password"
                id="password"
                name="password"
                required
            >

            <button
                type="submit"
                class="btn full"
            >
                Login
            </button>

        </form>

        <p class="hint">
            Default Login: admin / admin123
        </p>

    </div>

</body>

</html>