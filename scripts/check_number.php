<?php
require("../database/config.php");

if (!empty(isset($_POST['mobileNum'])) && isset($_POST['mobileNum'])) {
    $mobileInput = $_POST['mobileNum'];
    checkNumber($conn, $mobileInput);
    $conn->close();
}

function checkNumber($conn, $mobileInput)
{
    $query = "SELECT mobile_number FROM registered_sims WHERE mobile_number='$mobileInput'";
    $result = $conn->query($query);
    if ($result->num_rows > 0) {
        echo 1;
        // echo "<span style='color:red'>This number already exists</span>";
    } else {
        echo 0;
    // echo "<span style='color:red'>This number does not exists</span>";
    }
}


?>