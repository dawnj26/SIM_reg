<?php
if(!isset($_GET['id']) && !isset($_GET['new'])) {
    header("Location: registered_numbers.php");
}

require "../database/config.php";

$id = $_GET['id'];
$new = $_GET['new'];

$query = "SELECT * FROM registered_sims WHERE mobile_number=$id";
$result = $conn->query($query);
$row = mysqli_fetch_array($result);
$male = false;
$female = false;
$other = false;

if ($row['sex'] == "Male") {
    $male = true;
} else if ($row['sex'] == "Female") {
    $female = true;
} else {
    $other = true;
}

function searchIMG($search)
{
    $directory = '../database/images/';

    // Use scandir to get a list of filenames in the directory
    $files = scandir($directory);
    foreach ($files as $file) {
        // Exclude "." and ".." entries
        if ($file != "." && $file != "..") {
            if (str_contains($file, $search)) {
                return "$directory$file" . PHP_EOL;
            }
        }
    }
    return "";
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
    <link rel="stylesheet" href="../styles/registration.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>

<body>

    <div class="main-container">
        <div class="top"></div>
        <div class="pad">
            <h1>Edit</h1>
            <form action="../scripts/update.php" method="post" enctype="multipart/form-data">
                <div class="form-main">
                    <div class="full-name row">
                        <div class="first col">
                            <label for="firstName">First name:</label>
                            <input type="text" name="firstName" id="firstName" class="form-control" value="<?php echo $row['first_name'] ?>">
                            <div id="firstError" class="errors"></div>
                        </div>
                        <div class="last col">
                            <label for="lastName">Last name:</label>
                            <input type="text" name="lastName" id="lastName" class="form-control" value="<?php echo $row['last_name'] ?>">
                            <div id="lastError" class="errors"></div>
                        </div>
                    </div>
                    <div class="address">
                        <label for="address">Address:</label>
                        <input type="text" name="address" id="address" class="form-control" value="<?php echo $row['address'] ?>">
                        <div id="addressError" class="errors"></div>
                    </div>
                    <div class="email">
                        <label for="email">Email:</label>
                        <input type="text" name="email" id="email" class="form-control" value="<?php echo $row['email_address'] ?>">
                        <div id="emailError" class="errors"></div>
                    </div>
                    <div class="bday">
                        <label for="bday">Birthdate:</label>
                        <input type="date" name="bday" id="bday" class="form-control" value="<?php echo $row['birth_date'] ?>">
                        <div id="bdayError" class="errors"></div>
                    </div>
                    <div class="gender-container">
                        <label>Sex:</label><br>
                        <div class="radio">
                            <div class="male gender">
                                <label for="genderMale" class="form-check-label">Male</label>
                                <input type="radio" name="gender" id="genderMale" class="form-check-input" value="Male" <?php if ($male) echo "checked"; ?>>
                            </div>
                            <div class="female gender">
                                <label for="genderFemale" class="form-check-label">Female</label>
                                <input type="radio" name="gender" id="genderFemale" class="form-check-input"
                                    value="Female" <?php if ($female) echo "checked"; ?>>
                            </div>
                        </div>

                    </div>
                    <div class="image">
                        <label for="image">Image:</label>
                        <img src="<?php echo searchIMG($id) ?>" alt="" class="user-image">
                        <input type="file" name="image" id="image" class="form-control" accept=".png,.jpg,.jpeg">
                        <div id="imageError" class="errors"></div>
                    </div>
                    <input type="hidden" name="new" id="new" value="<?php
                    if (!empty(isset($_GET["id"])) && isset($_GET["new"])) {
                        echo $_GET["new"];
                    } else {
                        header("Location: ../pages/registered_numbers.php");
                    }

                    ?>">
                    <input type="hidden" name="id" id="id" value="<?php
                    if (!empty(isset($_GET["id"])) && isset($_GET["new"])) {
                        echo $_GET["id"];
                    } else {
                        header("Location: ../pages/registered_numbers.php");
                    }

                    ?>">
                </div>
                <input type="submit" value="Submit" name="submit" class="btn btn-primary" id="submit" disabled>
                <a href="registered_numbers.php" class="btn btn-secondary cancel">Cancel</a>
            </form>
        </div>

    </div>


    <!-- Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.7.1.js"
        integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../scripts/edit.js"></script>
</body>

</html>