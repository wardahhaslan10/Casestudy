<?php
/*
Course Code & Name : DFP50193 - Web Programming
Full Name          : Wardah Haslan
Registration Number: [Your Registration Number]
Class              : DDT7B
*/

include 'db.php';

if (isset($_POST['submit'])) {

    $title = mysqli_real_escape_string($conn, $_POST['title']);
    $category = mysqli_real_escape_string($conn, $_POST['category']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);

    $file_name = $_FILES['document']['name'];
    $file_tmp = $_FILES['document']['tmp_name'];

    if (!empty($file_name)) {

        $upload_folder = "uploads/";

        if (!is_dir($upload_folder)) {
            mkdir($upload_folder, 0777, true);
        }

        $new_file_name = time() . "_" . basename($file_name);

        move_uploaded_file(
            $file_tmp,
            $upload_folder . $new_file_name
        );

        $sql = "INSERT INTO documents
                (title, category, description, file_name)
                VALUES
                ('$title', '$category', '$description', '$new_file_name')";

        if (mysqli_query($conn, $sql)) {

            header("Location: index.php");
            exit();

        } else {

            echo "Error: " . mysqli_error($conn);
        }

    } else {

        $message = "Please select a document file.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Add Document</title>

    <link rel="stylesheet" href="style.css">

</head>

<body>

<header>

    <h1>E-Document Management System</h1>

    <p>Add New Document</p>

</header>

<nav>

    <a href="index.php">Home</a>

    <a href="add.php">Add Document</a>

</nav>

<main>

    <div class="form-container">

        <h2>Add New Document</h2>

        <?php
        if (isset($message)) {
            echo "<p class='error'>$message</p>";
        }
        ?>

        <form
            method="POST"
            enctype="multipart/form-data"
        >

            <label>Document Title</label>

            <input
                type="text"
                name="title"
                required
            >

            <label>Category</label>

            <select name="category" required>

                <option value="">-- Select Category --</option>

                <option value="Academic">
                    Academic
                </option>

                <option value="Finance">
                    Finance
                </option>

                <option value="Administration">
                    Administration
                </option>

                <option value="Report">
                    Report
                </option>

                <option value="Other">
                    Other
                </option>

            </select>

            <label>Description</label>

            <textarea
                name="description"
                rows="5"
                required
            ></textarea>

            <label>Upload Document</label>

            <input
                type="file"
                name="document"
                required
            >

            <button
                type="submit"
                name="submit"
            >
                Add Document
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