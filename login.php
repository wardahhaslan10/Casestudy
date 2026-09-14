<?php
/*
Course Code & Name : DFP50193 - Web Programming
Full Name          : Wardah Haslan
Registration Number: 18ddt23f1099
Class              : DDT7B
*/

session_start();

include 'db.php';

$error = "";

if (isset($_POST['login'])) {

    $username = trim($_POST['username']);
    $password = $_POST['password'];

    $username = mysqli_real_escape_string($conn, $username);

    $sql = "SELECT * FROM users WHERE username = '$username' LIMIT 1";

    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {

        $user = mysqli_fetch_assoc($result);

        if (password_verify($password, $user['password'])) {

            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['full_name'] = $user['full_name'];

            header("Location: index.php");
            exit();

        } else {

            $error = "Invalid username or password.";

        }

    } else {

        $error = "Invalid username or password.";

    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login - E-Document Management System</title>

    <link rel="stylesheet" href="style.css">

</head>

<body>

<header>

    <h1>E-Document Management System</h1>

    <p>Login</p>

</header>

<main>

    <div class="login-container">

        <h2>Login</h2>

        <?php if ($error != "") { ?>

            <div class="error">
                <?php echo $error; ?>
            </div>

        <?php } ?>

        <form method="POST">

            <label>Username</label>

            <input
                type="text"
                name="username"
                placeholder="Enter username"
                required
            >

            <label>Password</label>

            <input
                type="password"
                name="password"
                placeholder="Enter password"
                required
            >

            <button
                type="submit"
                name="login"
            >
                Login
            </button>

        </form>

    </div>

</main>

<footer>

    <p>&copy; 2026 E-Document Management System</p>

</footer>

</body>

</html>