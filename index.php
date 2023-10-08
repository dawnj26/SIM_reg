<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIM Registration</title>
    <link rel="stylesheet" href="./styles/sim_registration.css">
</head>

<body>
    <div class="main-container">
        <div class="header">
            <div class="description">
                <h1 class="title">
                    Register your SIM now!
                </h1>
                <p>
                    In Compliance with the Republic Act No. 11934, all active SIM cards will need to be registered to
                    keep
                    the scammers at bay. <span>Register your SIM with us now!</span>
                </p>
                <div class="logos">
                    <img src="./images/PSU-Intel.png" alt="">
                    <img src="./images/smart-globe.png" alt="">
                </div>
            </div>

            <img src="./images/phone-alert.png" alt="" class="phone-alert">
        </div>
        <div class="footer">
            <p>By completing this form, I understand and agree that any personal data I will provide for SIM
                Registration will be processed in accordance with SIM Registration Act, the Data Privacy Act of 2012,
                and the Privacy Policy of Smart Globe.</p>
            <form action="./pages/register.php" method="POST">
                <div class="register">
                    <div class="mobile-wrapper">
                        <p>Enter mobile number:</p>
                        <div class="input">
                            <div class="number">
                                <span>63</span>
                                <input type="text" name="mobile" id="mobile" maxlength="10">
                            </div>

                        </div>
                    </div>
                    <input type="submit" value="Register" id="submit" disabled>
                </div>
                <div id="number-error">

                </div>
                <a href="./pages/registered_numbers.php"><p>View all registered numbers</p></a>
            </form>
        </div>
    </div>


    <!-- Javascript -->
    <script src="https://code.jquery.com/jquery-3.7.1.js"
        integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="./scripts/sim_check.js"></script>
</body>

</html>