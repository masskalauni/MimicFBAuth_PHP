<?php
require_once 'connection.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = isset($_POST['email']) ? $_POST['email'] : null;
    $password = isset($_POST['password']) ? $_POST['password'] : null;
    $confirm_password = isset($_POST['confirm_password']) ? $_POST['confirm_password'] : null;

    // Check if passwords match
    if ($password !== $confirm_password) {
        $_SESSION['error_message'] = "Error: Passwords do not match.";
        header('Location: signup.php');
        exit();
    }

    // Check if email already exists in the database
    $check_email_query = "SELECT * FROM `user_registration` WHERE `email` = '$email'";
    $result = $conn->query($check_email_query);

    if ($result->num_rows > 0) {
        $_SESSION['error_message'] = "Error: This email is already registered. Please log in.";
        header('Location: signup.php');
        exit();
    }

    // Hash the password (you should use a more secure method in a real-world application)
    //$hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Insert user data into the database
    $insert_user_query = "INSERT INTO `user_registration` (`email`, `password`, `confirm password`) VALUES ('$email', '$password', '$confirm_password')";

    if ($conn->query($insert_user_query)) {
        $_SESSION['success_message'] = "User registered successfully!";
        header('Location: signup.php');
        exit();
    } else {
        echo "Error: " . $insert_user_query . "<br>" . $conn->error;
    }
}
?>
