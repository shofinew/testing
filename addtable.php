<?php
include "connect.php";

try {
    // SQL কমান্ড সংজ্ঞায়িত করা
    $sql = "
        CREATE TABLE IF NOT EXISTS user_data (
            data_id INT AUTO_INCREMENT PRIMARY KEY,
            user_id INT NOT NULL,
            image VARCHAR(255),
            custom_date DATE,
            custom_time TIME,
            updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
            FOREIGN KEY (user_id) REFERENCES user(user_id) ON DELETE CASCADE
        );
    ";

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
