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

if (isset($_POST['update'])) {

    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $category = mysqli_real_escape_string($conn, $_POST['category']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);

    $sql = "UPDATE documents SET
            title = '$title',
            category = '$category',
            description = '$description'
            WHERE id = $id";

    if (mysqli_query($conn, $sql)) {

        header("Location: index.php");
        exit();

    } else {

        echo "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Edit Document</title>

    <link rel="stylesheet" href="style.css">

</head>

<body>

<header>

    <h1>E-Document Management System</h1>

    <p>Edit Document</p>

</header>

<nav>

    <a href="index.php">Home</a>

    <a href="add.php">Add Document</a>

</nav>

<main>

    <div class="form-container">

        <h2>Edit Document</h2>

        <form method="POST">

            <label>Document Title</label>

            <input
                type="text"
                name="title"
                value="<?php echo htmlspecialchars($row['title']); ?>"
                required
            >

            <label>Category</label>

            <select name="category" required>

                <option value="Academic"
                    <?php if ($row['category'] == 'Academic') echo 'selected'; ?>>
                    Academic
                </option>

                <option value="Finance"
                    <?php if ($row['category'] == 'Finance') echo 'selected'; ?>>
                    Finance
                </option>

                <option value="Administration"
                    <?php if ($row['category'] == 'Administration') echo 'selected'; ?>>
                    Administration
                </option>

                <option value="Report"
                    <?php if ($row['category'] == 'Report') echo 'selected'; ?>>
                    Report
                </option>

                <option value="Other"
                    <?php if ($row['category'] == 'Other') echo 'selected'; ?>>
                    Other
                </option>

            </select>

            <label>Description</label>

            <textarea
                name="description"
                rows="5"
                required
            ><?php echo htmlspecialchars($row['description']); ?></textarea>

            <button
                type="submit"
                name="update"
            >
                Update Document
            </button>

            <a
                href="index.php"
                class="cancel-btn"
            >
                Cancel
            </a>

        </form>

    </div>

</main>

<footer>

    <p>&copy; 2026 E-Document Management System</p>

</footer>

</body>

</html>