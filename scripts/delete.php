<?php
if (!isset($_GET['id'])) {
    header("Location: ../pages/registered_numbers.php");
    die();
}

require("../database/config.php");

$id = $_GET['id'];


$stmt = $conn->prepare("DELETE FROM registered_sims WHERE mobile_number=?");
$stmt->bind_param('s', $id);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Rubik&display=swap');
        html {
            font-family: 'Rubik', sans-serif;
        }
    </style>
</head>

<body>
    <?php
    if (!$stmt->execute()) {
        header("Location: ../pages/error.php");
    } else {
        echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>";
        echo "<script>Swal.fire('Success', 'Deleted successfully!', 'success')</script>";
    }
    $conn->close();
    header('Refresh: 2; url=../pages/registered_numbers.php');
    ?>
</body>

</html>