<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "witdb";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    // SQL query to check email and password
    $sql = "SELECT user_name, gender, phone_number, country FROM user WHERE email = ? AND password = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $email, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Fetch user data
        $row = $result->fetch_assoc();
        echo "User Name: " . $row["user_name"] . "<br>";
        echo "Gender: " . $row["gender"] . "<br>";
        echo "Phone Number: " . $row["phone_number"] . "<br>";
        echo "Country: " . $row["country"] . "<br>";
    } else {
        echo "Invalid Email or Password.";
    }
    $stmt->close();
}
$conn->close();
?>
