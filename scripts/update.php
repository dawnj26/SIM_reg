<?php
if (!isset($_POST['submit']) && !isset($_POST['id'])) {
    header("Location: ../index.php");
    die();
}

require("../database/config.php");

function fileExtension($s)
{
    $n = strrpos($s, ".");

    if ($n === false)
        return "";
    else
        return substr($s, $n);
}

function sanitize($s)
{
    $s = htmlspecialchars($s);
    $s = stripslashes($s);
    return $s;
}

$id = sanitize($_POST['id']);
$new = sanitize($_POST['new']);
$firstName = sanitize($_POST['firstName']);
$lastName = sanitize($_POST['lastName']);
$address = sanitize($_POST['address']);
$email = sanitize($_POST['email']);
$gender = $_POST['gender'];
$bday = $_POST['bday'];

if (!empty($_FILES['image']['tmp_name'])) {

    $filePath = $_FILES['image']['tmp_name'];
    $fileSize = filesize($filePath);
    $origName = $_FILES['image']['name'];

    if ($fileSize === 0) {
        die();
    }

    $fileName = basename($filePath);
    $fileExtension = fileExtension($origName);
    $targetDirectory = "../database/images";

    $newFilePath = $targetDirectory . "/$new-image" . $fileExtension;

    if (!copy($filePath, $newFilePath)) {
        die();
    }

    unlink($filePath);
}

$stmt = $conn->prepare("UPDATE registered_sims SET mobile_number=?, first_name=?, last_name=?, birth_date=?, sex=?, address=?, email_address=? WHERE mobile_number=$id");
$stmt->bind_param('sssssss', $new, $firstName, $lastName, $bday, $gender, $address, $email);



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
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
        echo 0;
    } else {
        echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>";
        echo "<script>Swal.fire('Success', 'Updated successfully!', 'success')</script>";
    }
    $conn->close();
    header('Refresh: 2; url=../pages/registered_numbers.php');
    ?>
</body>

</html>