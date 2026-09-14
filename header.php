
<?php
/*
Course Code & Name : DFP50193 - Web Programming
Full Name          : ___WARDAH BINTI HASLAN___________________________
Registration Number: _____18DDT23F1099_________________________
Class              : ______________________________
*/
?>

<header class="topbar">
    <div>
        <h1>E-Document Management System</h1>
        <p>Internal Office Document Management</p>
    </div>

    <div class="admin-info">
        Welcome, <?= htmlspecialchars($_SESSION['admin_username']) ?>
    </div>
</header>

<nav class="navbar">
    <a href="dashboard.php">Dashboard</a>
    <a href="category.php">Categories</a>
    <a href="document.php">Documents</a>
    <a href="document_upload.php">Upload Document</a>
    <a href="logout.php" class="logout">Logout</a>
</nav>