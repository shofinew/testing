<?php
include "connect.php";

// DESCRIBE query execute করা
$sql = "DESCRIBE user_data";
$result = $conn->query($sql);

// রেজাল্ট চেক এবং প্রিন্ট করা
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "Field: " . $row['Field'] . " | Type: " . $row['Type'] . " | Null: " . $row['Null'] . " | Key: " . $row['Key'] . " | Default: " . $row['Default'] . " | Extra: " . $row['Extra'] . "<br>";
    }
} else {
    echo "No table found or no fields exist.";
}

$conn->close();
?>
