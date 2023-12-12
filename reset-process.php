<?php
require_once 'connection.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Handle login logic
} elseif ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['action']) && $_GET['action'] === 'forgot') {
    // Display forgot password form
    
    // Exit to prevent further execution
    exit();
} elseif ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'forgot') {
    // Handle the forgot password form submission
    $email = isset($_POST['email']) ? $_POST['email'] : null;

    // Validate email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['error_message'] = "Invalid email address format.";
        header('Location: reset-process.php?action=forgot');
        exit();
    }

    // Check if the email exists in the database
    $check_email_query = "SELECT * FROM `user_registration` WHERE `email` = '$email'";
    $result = $conn->query($check_email_query);

    if ($result->num_rows > 0) {
        // Generate a unique token (you may use a library or create your own method)
        $reset_token = md5(uniqid(rand(), true));

        // Store the token in the database along with the user's email
        $update_token_query = "UPDATE `user_registration` SET `reset_token` = '$reset_token' WHERE `email` = '$email'";
        $conn->query($update_token_query);

        // Send an email with a link containing the token
        $reset_link = "http://yourwebsite.com/reset_password.php?token=$reset_token";
        // (Send email logic here)

        $_SESSION['success_message'] = "Password reset link sent to your email. Please check your inbox.";
        header('Location: reset-process.php');
        exit();
    } else {
        $_SESSION['error_message'] = "Email not found. Please check your email address.";
        header('Location: reset-process.php?action=forgot');
        exit();
    }
}
?>
