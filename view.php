<<<<<<< HEAD
<?php
/*
Course Code & Name : DFP50193 - Web Programming
Full Name          : Wardah Haslan
Registration Number: [Your Registration Number]
Class              : DDT7B
*/

include 'db.php';

if (!isset($_GET['id'])) {
    header("Location: index.php");
    exit();
}

$id = intval($_GET['id']);

$sql = "SELECT * FROM documents WHERE id = $id";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) == 0) {
    echo "Document not found.";
    exit();
}

$row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>View Document</title>

    <link rel="stylesheet" href="style.css">

</head>

<body>

<header>

    <h1>E-Document Management System</h1>

    <p>Document Details</p>

</header>

<nav>

    <a href="index.php">Home</a>

    <a href="add.php">Add Document</a>

</nav>

<main>

    <div class="details">

        <h2>Document Details</h2>

        <p>
            <strong>Document Title:</strong>
            <?php echo htmlspecialchars($row['title']); ?>
        </p>

        <p>
            <strong>Category:</strong>
            <?php echo htmlspecialchars($row['category']); ?>
        </p>

        <p>
            <strong>Description:</strong>
            <?php echo htmlspecialchars($row['description']); ?>
        </p>

        <p>
            <strong>Date Added:</strong>
            <?php echo htmlspecialchars($row['date_added']); ?>
        </p>

        <p>
            <strong>File:</strong>

            <a
                href="uploads/<?php echo htmlspecialchars($row['file_name']); ?>"
                target="_blank"
            >
                Open Document
            </a>

        </p>

        <a href="index.php" class="back-btn">
            Back
        </a>

    </div>

</main>

<footer>

    <p>&copy; 2026 E-Document Management System</p>

</footer>

</body>

=======
<?php
/*
Course Code & Name : DFP50193 - Web Programming
Full Name          : Wardah Haslan
Registration Number: [Your Registration Number]
Class              : DDT7B
*/

include 'db.php';

if (!isset($_GET['id'])) {
    header("Location: index.php");
    exit();
}

$id = intval($_GET['id']);

$sql = "SELECT * FROM documents WHERE id = $id";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) == 0) {
    echo "Document not found.";
    exit();
}

$row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>View Document</title>

    <link rel="stylesheet" href="style.css">

</head>

<body>

<header>

    <h1>E-Document Management System</h1>

    <p>Document Details</p>

</header>

<nav>

    <a href="index.php">Home</a>

    <a href="add.php">Add Document</a>

</nav>

<main>

    <div class="details">

        <h2>Document Details</h2>

        <p>
            <strong>Document Title:</strong>
            <?php echo htmlspecialchars($row['title']); ?>
        </p>

        <p>
            <strong>Category:</strong>
            <?php echo htmlspecialchars($row['category']); ?>
        </p>

        <p>
            <strong>Description:</strong>
            <?php echo htmlspecialchars($row['description']); ?>
        </p>

        <p>
            <strong>Date Added:</strong>
            <?php echo htmlspecialchars($row['date_added']); ?>
        </p>

        <p>
            <strong>File:</strong>

            <a
                href="uploads/<?php echo htmlspecialchars($row['file_name']); ?>"
                target="_blank"
            >
                Open Document
            </a>

        </p>

        <a href="index.php" class="back-btn">
            Back
        </a>

    </div>

</main>

<footer>

    <p>&copy; 2026 E-Document Management System</p>

</footer>

</body>

>>>>>>> afb2325af2d210329216b8a774f3d2d2b88983db
</html>