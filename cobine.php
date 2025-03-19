<?php
include "connect.php";

try {
    // SQL কোয়েরি
    $sql = "
        SELECT 
            user.user_id as user_id , 
            user.user_name,
            user.phone_number, 
            user.email, 
            user.country,
            user.gender,
            user.date_of_birth,
            user_data.user_id,
            user_data.image, 
            user_data.custom_date, 
            user_data.custom_time
        FROM 
            user
        JOIN 
            user_data
        ON 
            user.user_id = user_data.user_id
    ";

    // কোয়েরি এক্সিকিউট করা
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // ডাটা প্রদর্শন করা
        while ($row = $result->fetch_assoc()) {
            echo "User ID: " . $row['user_id'] . "<br>";
            echo "Name: " . $row['user_name'] . "<br>";
            echo "phone: " . $row['phone_number'] . "<br>";
            echo "country: " . $row['country'] . "<br>";
            echo "gender: " . $row['gender'] . "<br>";
            echo "dob: " . $row['date_of_birth'] . "<br>";
            echo "Email: " . $row['email'] . "<br>";
            echo "Image: <img src='" . $row['image'] . "' alt='User Image' width='100'><br>";
            echo "Date: " . $row['custom_date'] . "<br>";
            echo "Time: " . $row['custom_time'] . "<br><hr>";
        }
    } else {
        echo "No data found.";
    }
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
} finally {
    $conn->close();
}
?>
