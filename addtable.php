<?php
// include "connect.php";

try {
    // SQL কমান্ড সংজ্ঞায়িত করা
    $sql = "
        ALTER TABLE user ADD COLUMN lockout_time INT DEFAULT 0 AFTER attempt_count ";

    // query() ফাংশন ব্যবহার করা
    if ($conn->query($sql) === TRUE) {
        echo "Table 'user_data' created successfully!";
    } else {
        echo "Error creating table: " . $conn->error;
    }
} catch (Exception $e) {
    // ত্রুটি বার্তা প্রদর্শন
    echo "Error: " . $e->getMessage();
} finally {
    // কানেকশন বন্ধ করা
    $conn->close();
}
?>
