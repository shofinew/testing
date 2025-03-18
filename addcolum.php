<?php
// Database connection


// Alter table query to add updated_at column with default and update behavior
$sql = "ALTER TABLE user
ADD date_of_birth DATE AFTER gender
";

if ($conn->query($sql) === TRUE) {
    echo "Column 'updated_at' added successfully!";
} else {
    echo "Error updating table: " . $conn->error;
}

// Closing the connection
$conn->close();
?>

