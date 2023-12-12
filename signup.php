<?php
session_start();

$error_message = isset($_SESSION['error_message']) ? $_SESSION['error_message'] : '';
$success_message = isset($_SESSION['success_message']) ? $_SESSION['success_message'] : '';

// Clear session variables
unset($_SESSION['error_message']);
unset($_SESSION['success_message']);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>User Registration</title>
    
    <style>
        body {
    margin: 0;
    padding: 0;
    font-family: 'Arial', sans-serif;
    background-color: #f0f0f0;
}

.container {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

.registration-form {
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    padding: 20px;
    width: 300px;
}

.text {
    text-align: center;
    margin-bottom: 20px;
}

h1 {
    color: #333;
    font-size: 24px;
}

p {
    color: #666;
}

form {
    display: flex;
    flex-direction: column;
}

label {
    margin-bottom: 8px;
    color: #333;
}

input {
    padding: 10px;
    margin-bottom: 16px;
    border: 1px solid #ddd;
    border-radius: 4px;
}

.link {
    text-align: center;
}

button {
    padding: 10px 20px;
    background-color: #4caf50;
    color: #fff;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    font-size: 16px;
}

button:hover {
    background-color: #45a049;
}
.login-link {
    margin-top: 5px; /* Adjust the margin as needed */
    display: block; /* Make the link a block-level element */
    text-align: center; /* Center the text */
    color: #333; /* Set the color of the link text */
    text-decoration: none;
    font-size:13px;
    transition: color 0.3s;  /* Remove underlines from the link */
}

.login-link:hover {
    text-decoration: underline;
    /* Add underline on hover */
}
  
    </style>
</head>

<body>
    <div class="container flex">
        <div class="registration-form flex">
            <div class="text">
                <h1>Signup</h1>
                <p>Create a new account</p>
                <?php
            // Display error message if any
            if (!empty($error_message)) {
                echo '<p style="color: red;  font-size:13px;">' . $error_message . '</p>';
            }

            // Display success message if any
            if (!empty($success_message)) {
                echo '<p style="color: green;  font-size:13px;">' . $success_message . '</p>';
            }
            ?>
            </div>
            <form action="register.php" method="POST">
                <label for="email">Email:</label>
                <input type="email" name="email" required />

                <label for="password">Password:</label>
                <input type="password" name="password"  id="password"  />

                <label for="confirm_password">Confirm Password:</label>
                <input type="password" name="confirm_password" id="confirm_password"  />
                <div class="password-toggle">
        <input type="checkbox" onclick="togglePasswordVisibility()" id="show_pass"> Show Password
    </div>
                <div class="link">
                    <button type="submit" class="signup">Signup</button>
                    <a href="index.php" class="login-link">Already have an account</a>
                </div>
            </form>
        </div>
    </div>
    <script>
    function togglePasswordVisibility() {
        const passwordInput = document.getElementById('password');
        const confirmPasswordInput = document.getElementById('confirm_password');

        // Toggle password visibility
        passwordInput.type = passwordInput.type === 'password' ? 'text' : 'password';
        confirmPasswordInput.type = confirmPasswordInput.type === 'password' ? 'text' : 'password';
    }
</script>
</body>

</html>
