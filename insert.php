<?php
include "connect.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        // ফর্ম থেকে ডেটা সংগ্রহ
        $user_id = $_POST['user_id'];
        $custom_date = $_POST['custom_date'];
        $custom_time = $_POST['custom_time'];

        // ইমেজ আপলোড প্রসেসিং
        if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
            $image_name = $_FILES['image']['name'];
            $image_tmp = $_FILES['image']['tmp_name'];
            $image_path = "uploads/" . basename($image_name);

            // আপলোড ফোল্ডারে ইমেজ সংরক্ষণ
            if (!is_dir("uploads")) {
                mkdir("uploads", 0777, true);
            }
            move_uploaded_file($image_tmp, $image_path);
        } else {
            $image_path = NULL;
        }

        // SQL ইনসার্ট কোয়েরি
        $sql = "
            INSERT INTO user_data (user_id, image, custom_date, custom_time) 
            VALUES (?, ?, ?, ?)
        ";

        // প্রস্তুত বিবৃতি ব্যবহার করা
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("isss", $user_id, $image_path, $custom_date, $custom_time);
        $stmt->execute();

        echo "Data inserted successfully!";
    } catch (Exception $e) {
        echo "Error inserting data: " . $e->getMessage();
    } finally {
        $conn->close();
    }
}
?>
