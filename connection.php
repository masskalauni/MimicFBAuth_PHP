<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "fb_login_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


// echo "Connected successfully";

// Perform your database operations here...

// Close connection

?>
