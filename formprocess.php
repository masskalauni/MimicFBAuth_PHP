<?php
 //require_once 'connection.php';

// $email = isset($_POST['email']) ? $_POST['email'] : null;
// $password = isset($_POST['password']) ? $_POST['password'] : null;

// // Check if the connection is successful
// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
// }

// $sql = "INSERT INTO `login_table` (`email`, `password`) VALUES ('$email', '$password')";

// // Check if the query was successful
// if ($conn->query($sql)) {
//     header('Location: index.php?success=Record inserted successfully');
// } else {
//     echo "Error: " . $sql . "<br>" . $conn->error;
// }

// // Close connection
// $conn->close();


session_start();
require_once 'connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $enteredPassword = $_POST['password'];

    // Fetch user data from the database
    $stmt = $conn->prepare("SELECT email, password FROM user_registration WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->bind_result($dbEmail, $dbPassword);
    $stmt->fetch();
    $stmt->close();

    // Check if the user exists and the password is correct
    if ($dbEmail && $enteredPassword === $dbPassword) {
        $_SESSION['user_email'] = $email;
        header('Location: NiceAdmin/index.html');
        exit();
    } else {
        header('Location: index.php?error=Invalid credentials');
        exit();
    }
}




?>
