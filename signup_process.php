<?php
$servername = "localhost"; // আপনার সার্ভারের নাম
$username = "root"; // আপনার MySQL ইউজারনেম
$password = ""; // আপনার MySQL পাসওয়ার্ড
$dbname = "witdb"; // ডেটাবেসের নাম

// কানেকশন তৈরি করুন
$conn = new mysqli($servername, $username, $password, $dbname);

// কানেকশন চেক করুন
if ($conn->connect_error) {
    die("কানেকশন ফেইল্ড: " . $conn->connect_error);
}

// ফর্ম থেকে ডেটা নিন
$username = $_POST['username'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$country = $_POST['country'];
$gender = $_POST['gender'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT); // পাসওয়ার্ড হ্যাশ করুন

// ডেটা ইনসার্ট করার জন্য SQL ক্যোয়ারী
$sql = "INSERT INTO user (username, phone, email, country, gender, password)
VALUES ('$username', '$phone', '$email', '$country', '$gender', '$password')";

if ($conn->query($sql) === TRUE) {
    echo "নতুন রেকর্ড সফলভাবে তৈরি হয়েছে";
} else {
    echo "এরর: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>