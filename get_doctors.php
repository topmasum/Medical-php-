<?php
$servername = "localhost"; // Change this to your server
$username = "root"; // Change this to your database username
$password = ""; // Change this to your database password
$dbname = "webprac"; // Change this to your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$doctorType = $_GET['doctorType'];
$sql = "SELECT name FROM doctors WHERE category = '$doctorType'";
$result = $conn->query($sql);

$doctors = [];
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $doctors[] = $row;
    }
}

echo json_encode($doctors);

$conn->close();
?>
