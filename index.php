<?php
/*
Course Code & Name : DFP50193 - Web Programming
Full Name          : Wardah Haslan
Registration Number: [Your Registration Number]
Class              : DDT7B
*/

session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

include 'db.php';

$search = "";

if (isset($_GET['search'])) {
    $search = trim($_GET['search']);
}

$search_safe = mysqli_real_escape_string($conn, $search);

$sql = "SELECT * FROM documents
        WHERE title LIKE '%$search_safe%'
        OR category LIKE '%$search_safe%'
        OR description LIKE '%$search_safe%'
        ORDER BY id DESC";

$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>E-Document Management System</title>

    <link rel="stylesheet" href="style.css">

</head>

<body>

<header>

    <h1>E-Document Management System</h1>

    <p>Digital Document Management System</p>

</header>


<nav>

    <a href="index.php">Home</a>

    <a href="add.php">Add Document</a>

    <span class="welcome-user">
        Welcome, <?php echo htmlspecialchars($_SESSION['full_name']); ?>
    </span>

    <a href="logout.php">Logout</a>

</nav>


<main>

    <section class="welcome">

        <h2>Document List</h2>

        <p>
            Manage, search and organize your documents easily.
        </p>

    </section>


    <section class="search-box">

        <form method="GET" action="index.php">

            <input
                type="text"
                name="search"
                placeholder="Search document by title, category or description..."
                value="<?php echo htmlspecialchars($search); ?>"
            >

            <button type="submit">
                Search
            </button>

            <a
                href="index.php"
                class="reset-btn"
            >
                Reset
            </a>

        </form>

    </section>


    <section class="document-section">

        <?php if (mysqli_num_rows($result) > 0) { ?>

            <table>

                <thead>

                    <tr>

                        <th>No.</th>

                        <th>Document Title</th>

                        <th>Category</th>

                        <th>Description</th>

                        <th>File</th>

                        <th>Date Added</th>

                        <th>Action</th>

                    </tr>

                </thead>


                <tbody>

                    <?php

                    $no = 1;

                    while ($row = mysqli_fetch_assoc($result)) {

                    ?>

                        <tr>

                            <td>
                                <?php echo $no++; ?>
                            </td>


                            <td>
                                <?php
                                echo htmlspecialchars($row['title']);
                                ?>
                            </td>


                            <td>
                                <?php
                                echo htmlspecialchars($row['category']);
                                ?>
                            </td>


                            <td>
                                <?php
                                echo htmlspecialchars($row['description']);
                                ?>
                            </td>


                            <td>

                                <a
                                    href="uploads/<?php echo htmlspecialchars($row['file_name']); ?>"
                                    target="_blank"
                                    class="file-btn"
                                >
                                    Open File
                                </a>

                            </td>


                            <td>
                                <?php
                                echo htmlspecialchars($row['date_added']);
                                ?>
                            </td>


                            <td>

                                <a
                                    href="view.php?id=<?php echo $row['id']; ?>"
                                    class="view-btn"
                                >
                                    View
                                </a>


                                <a
                                    href="edit.php?id=<?php echo $row['id']; ?>"
                                    class="edit-btn"
                                >
                                    Edit
                                </a>


                                <a
                                    href="delete.php?id=<?php echo $row['id']; ?>"
                                    class="delete-btn"
                                    onclick="return confirm('Are you sure you want to delete this document?');"
                                >
                                    Delete
                                </a>

                            </td>

                        </tr>

                    <?php } ?>

                </tbody>

            </table>


        <?php } else { ?>

            <div class="no-data">

                <h3>No Documents Found</h3>

                <?php if ($search != "") { ?>

                    <p>
                        No document matches your search:
                        <strong>
                            <?php echo htmlspecialchars($search); ?>
                        </strong>
                    </p>

                <?php } else { ?>

                    <p>
                        There are currently no documents in the system.
                    </p>

                <?php } ?>


                <a href="add.php">
                    Add New Document
                </a>

            </div>

        <?php } ?>

    </section>

</main>


<footer>

    <p>
        &copy; 2026 E-Document Management System
    </p>

</footer>

</body>

</html>