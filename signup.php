<?php

// Database credentials (replace with your actual values)
$host = 'localhost'; // e.g., 'localhost' or an IP address
$username = 'root';
$password = '';
$database = 'witdb';


// Create a database connection
$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

echo "Connected to witdb successfully!";

// Perform database operations here (e.g., queries, inserts, updates)


// Close the connection when done
$conn->close();

?>