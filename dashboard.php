
<?php
/*
Course Code & Name : DFP50193 - Web Programming
Full Name          : wARDAH BINTI HASLAN ______________________________
Registration Number: ___18DDT23F1099___________________________
Class              : _________________DDT7B_____________
*/

require_once 'auth.php';
require_once 'db.php';

$category_result = $conn->query("SELECT COUNT(*) AS total FROM categories");
$category_data = $category_result->fetch_assoc();
$total_categories = $category_data['total'];

$document_result = $conn->query("SELECT COUNT(*) AS total FROM documents");
$document_data = $document_result->fetch_assoc();
$total_documents = $document_data['total'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - E-Document Management System</title>

    <link rel="stylesheet" href="style.css">
</head>

<body>

<?php include 'header.php'; ?>

<main class="container">

    <div class="page-title">
        <h2>Admin Dashboard</h2>
        <p>Manage users, categories and office documents.</p>
    </div>

    <div class="dashboard-grid">

        <div class="dashboard-card">
            <h3>Total Categories</h3>
            <div class="number">
                <?= $total_categories ?>
            </div>
            <a href="category.php" class="btn">
                Manage Categories
            </a>
        </div>

        <div class="dashboard-card">
            <h3>Total Documents</h3>
            <div class="number">
                <?= $total_documents ?>
            </div>
            <a href="document.php" class="btn">
                View Documents
            </a>
        </div>

        <div class="dashboard-card">
            <h3>Upload Document</h3>
            <p>
                Upload PDF or DOCX documents into the system.
            </p>

            <a href="document_upload.php" class="btn">
                Upload Now
            </a>
        </div>

    </div>

    <div class="info-box">

        <h3>System Information</h3>

        <ul>
            <li>Administrator login is protected using PHP Sessions.</li>
            <li>Passwords are protected using password hashing.</li>
            <li>SQL queries use prepared statements.</li>
            <li>Document titles are protected against XSS.</li>
            <li>Uploaded documents are stored inside the uploads folder.</li>
            <li>Upload and delete activities are recorded in log.txt.</li>
        </ul>

    </div>

</main>

</body>
</html>