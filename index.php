<?php
include "connect.php";
?>


<?php

// 2. ফর্ম থেকে ডাটা নেওয়া এবং ইনসার্ট করা
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
      $gender = $_POST['gender'];
        $date_of_birth = $_POST['date_of_birth'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
      $country = $_POST['country'];
      $password = ($_POST['password']);
    

    // SQL ইনসার্ট কুয়েরি
    $sql = "INSERT INTO user (user_name, gender, date_of_birth, phone_number, email, country, password) VALUES ('$name', '$gender', '$date_of_birth', '$phone', '$email', '$country', '$password')";


    if ($conn->query($sql) === TRUE) {
        echo "নতুন রেকর্ড সফলভাবে ইনসার্ট হয়েছে!";
        header("Location: view.php"); // Redirect to the main page
        exit;
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
    <link rel="stylesheet" href="styles.css">
    <title>index</title>
</head>
<body>

<h2>Sign Up</h2>
<form method="post" action="index.php">
    name: <input type="text" name="name" required><br><br>

    gender: <select  type="text" name="gender" required>
    <option value="male">Male</option> 
    <option value="female">Female</option>
    <option value="others">Others</option>
            </select><br><br>

    BoD: <input type="date" name="date_of_birth" required><br><br>

    
   
    Phone: <input type="tel" name="phone" required><br><br>

    email: <input type="email" name="email" required><br><br>

    country: <select type="text" name="country" required>
                    <option value="Bangladesh">Bangladesh</option> 
                    <option value="Australia">Australia</option> 
    
    
            </select><br><br>

    password: <input type="password" name="password" required><br><br>

    

    
    
    <input type="submit" value="submit">
    
</form>


</body>
</html>
