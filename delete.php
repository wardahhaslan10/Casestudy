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

$sql = "SELECT file_name FROM documents WHERE id = $id";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {

    $row = mysqli_fetch_assoc($result);

    $file_path = "uploads/" . $row['file_name'];

    if (file_exists($file_path)) {
        unlink($file_path);
    }

    $delete_sql = "DELETE FROM documents WHERE id = $id";

    mysqli_query($conn, $delete_sql);
}

header("Location: index.php");
exit();
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

$sql = "SELECT file_name FROM documents WHERE id = $id";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {

    $row = mysqli_fetch_assoc($result);

    $file_path = "uploads/" . $row['file_name'];

    if (file_exists($file_path)) {
        unlink($file_path);
    }

    $delete_sql = "DELETE FROM documents WHERE id = $id";

    mysqli_query($conn, $delete_sql);
}

header("Location: index.php");
exit();
>>>>>>> afb2325af2d210329216b8a774f3d2d2b88983db
?>