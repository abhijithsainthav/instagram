<?php
$servername = "localhost";  // Your database server
$username = "root";         // Your database username
$password = "";             // Your database password
$dbname = "login_data";     // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT id, username, password, reg_date FROM logins";
$result = $conn->query($sql);

$logins = array();

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $logins[] = $row;
    }
}

$conn->close();

header('Content-Type: application/json');
echo json_encode($logins);
?>
