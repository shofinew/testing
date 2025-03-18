<?php
include "connect.php";
?>






<?php


// 2. ফর্ম থেকে ডাটা নেওয়া এবং ইনসার্ট করা
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
      $gender = $_POST['gender'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
      $country = $_POST['country'];
      $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    

    // SQL ইনসার্ট কুয়েরি
    $sql = "INSERT INTO user (user_name, gender, phone_number, email, country, password) VALUES ('$name', '$gender', '$phone', '$email', '$country', '$password')";


    if ($conn->query($sql) === TRUE) {
        echo "নতুন রেকর্ড সফলভাবে ইনসার্ট হয়েছে!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// কানেকশন বন্ধ করা
$conn->close();
?>

<!DOCTYPE html>
<html lang="bn">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>index</title>
</head>
<body>

<h2>ইউজার ইনসার্ট ফর্ম</h2>
<form method="post" action="index.php">
    নাম: <input type="text" name="name" required><br><br>

    gender: <input type="text" name="gender" required><br><br>

    
   
    Phone: <input type="tel" name="phone" required><br><br>

    ইমেইল: <input type="email" name="email" required><br><br>

    country: <input type="text" name="country" required><br><br>

    password: <input type="password" name="password" required><br><br>

    

    
    
    <input type="submit" value="সাবমিট">
</form>

</body>
</html>
