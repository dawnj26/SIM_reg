<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link rel="stylesheet" href="../styles/registration.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>

<body>

    <div class="main-container">
        <div class="top"></div>
        <div class="pad">
            <h1>Registration</h1>
            <form action="../scripts/add.php" method="post" enctype="multipart/form-data">
                <div class="form-main">
                    <div class="full-name row">
                        <div class="first col">
                            <label for="firstName">First name:</label>
                            <input type="text" name="firstName" id="firstName" class="form-control">
                            <div id="firstError" class="errors"></div>
                        </div>
                        <div class="last col">
                            <label for="lastName">Last name:</label>
                            <input type="text" name="lastName" id="lastName" class="form-control">
                            <div id="lastError" class="errors"></div>
                        </div>
                    </div>
                    <div class="address">
                        <label for="address">Address:</label>
                        <input type="text" name="address" id="address" class="form-control">
                        <div id="addressError" class="errors"></div>
                    </div>
                    <div class="email">
                        <label for="email">Email:</label>
                        <input type="text" name="email" id="email" class="form-control">
                        <div id="emailError" class="errors"></div>
                    </div>
                    <div class="bday">
                        <label for="bday">Birthdate:</label>
                        <input type="date" name="bday" id="bday" class="form-control">
                        <div id="bdayError" class="errors"></div>
                    </div>
                    <div class="gender-container">
                        <label>Sex:</label><br>
                        <div class="radio">
                            <div class="male gender">
                                <label for="genderMale" class="form-check-label">Male</label>
                                <input type="radio" name="gender" id="genderMale" class="form-check-input" value="Male">
                            </div>
                            <div class="female gender">
                                <label for="genderFemale" class="form-check-label">Female</label>
                                <input type="radio" name="gender" id="genderFemale" class="form-check-input"
                                    value="Female">
                            </div>
                        </div>

                    </div>
                    <div class="image">
                        <label for="image">Image:</label>
                        <input type="file" name="image" id="image" class="form-control" accept=".png,.jpg,.jpeg">
                        <div id="imageError" class="errors"></div>
                    </div>
                    <input type="hidden" name="id" id="id" value="<?php
                    if (!empty(isset($_POST["mobile"])) && isset($_POST["mobile"])) {
                        echo $_POST["mobile"];
                    } else {
                        header("Location: ../index.php");
                    }

                    ?>">
                </div>
                <input type="submit" value="Submit" name="submit" class="btn btn-primary" id="submit" disabled>
                <a href="../index.php" class="btn btn-secondary cancel">Cancel</a>
            </form>
        </div>

    </div>


    <!-- Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.7.1.js"
        integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../scripts/registration.js"></script>
</body>

</html>