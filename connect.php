<?php
$server = "localhost";
$username = "root";
$password = "";
$database = "witdb";

// Database Connection
$conn = mysqli_connect($server, $username, $password, $database);

// Check Connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";
?>
