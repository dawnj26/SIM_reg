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

function sanitize($s) {
    $s = htmlspecialchars($s);
    $s = stripslashes($s);
    return $s;
}

$id = sanitize($_POST['id']);
$firstName = sanitize($_POST['firstName']);
$lastName = sanitize($_POST['lastName']);
$address = sanitize($_POST['address']);
$email = sanitize($_POST['email']);
$gender = $_POST['gender'];
$bday = $_POST['bday'];


$filePath = $_FILES['image']['tmp_name'];
$fileSize = filesize($filePath);
$origName = $_FILES['image']['name'];

if ($fileSize === 0) {
    die();
}

$fileName = basename($filePath);
$fileExtension = fileExtension($origName);
$targetDirectory = "../database/images";

$newFilePath = $targetDirectory . "/$id-image" . $fileExtension;
if (file_exists($newFilePath)) {
    die();
}

if (!copy($filePath, $newFilePath)) {
    die();
}

unlink($filePath);

$stmt = $conn->prepare("INSERT INTO registered_sims (mobile_number, first_name, last_name, birth_date, sex, address, email_address) VALUES (?,?,?,?,?,?,?)");
$stmt->bind_param('sssssss', $id, $firstName, $lastName, $bday, $gender, $address, $email);



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
    <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
</head>

<body>
    <?php
    if (!$stmt->execute()) {
        echo 0;
    } else {
        echo "<script>Swal.fire('Success', 'Registered successfully!', 'success')</script>";
    }
    $conn->close();
    header('Refresh: 2; url=../index.php');
    ?>
</body>

</html>