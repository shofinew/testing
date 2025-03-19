<?php
include "connect.php";

try {
    // ডাটাবেস থেকে ডাটা রিট্রিভ করার জন্য SQL কোয়েরি
    $sql = "SELECT * FROM user_data";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // প্রতিটি ডাটা প্রদর্শন করা
        while ($row = $result->fetch_assoc()) {
            echo "User ID: " . $row['user_id'] . "<br>";
            echo "Image: <img src='" . $row['image'] . "' alt='User Image' width='100'><br>";
            echo "Custom Date: " . $row['custom_date'] . "<br>";
            echo "Custom Time: " . $row['custom_time'] . "<br><hr>";
        }
    } else {
        echo "No data found.";
    }
} catch (Exception $e) {
    echo "Error retrieving data: " . $e->getMessage();
} finally {
    $conn->close();
}
?>
