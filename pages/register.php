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
            <form action="" method="get">
                <div class="form-main">
                    <div class="full-name row">
                        <div class="first col">
                            <label for="firstName">First name:</label>
                            <input type="text" name="firstName" id="firstName" class="form-control">
                        </div>
                        <div class="last col">
                            <label for="lastName">Last name:</label>
                            <input type="text" name="lastName" id="lastName" class="form-control">
                        </div>
                    </div>
                    <div class="address">
                        <label for="address">Address:</label>
                        <input type="text" name="address" id="address" class="form-control">
                    </div>
                    <div class="email">
                        <label for="email">Email:</label>
                        <input type="text" name="email" id="email" class="form-control">
                    </div>
                    <div class="gender">
                        <label>Gender:</label><br>
                        <div class="radio">
                            <div class="male">
                                <label for="genderMale" class="form-check-label">Male</label>
                                <input type="radio" name="gender" id="genderMale" class="form-check-input" value="male">
                            </div>
                            <div class="female">
                                <label for="genderFemale" class="form-check-label">Female</label>
                                <input type="radio" name="gender" id="genderFemale" class="form-check-input" value="female">
                            </div>
                            <div class="other">
                                <label for="genderOther" class="form-check-label">Other</label>
                                <input type="radio" name="gender" id="genderOther" class="form-check-input" value="other">
                            </div>
                        </div>

                    </div>
                    <div class="image">
                        <label for="image">Image:</label>
                        <input type="file" name="image" id="image" class="form-control">
                    </div>
                </div>
                <input type="submit" value="Submit" class="btn btn-primary" id="submit">
            </form>
        </div>

    </div>


    <!-- Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.7.1.js"
        integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../scripts/registration.js"></script>
</body>

</html>