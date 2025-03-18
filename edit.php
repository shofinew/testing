<?php
// Include database connection
include "connect.php";

// Check if the ID is passed
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch user data based on ID
    $sql = "SELECT * FROM user WHERE user_id = $id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "User not found!";
        exit;
    }
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['user_name'];
    $gender = $_POST['gender'];
    $phone = $_POST['phone_number'];
    $email = $_POST['email'];
    $country = $_POST['country'];

    // Update user data
    $sql = "UPDATE user SET 
            user_name = '$name', 
            gender = '$gender', 
            phone_number = '$phone', 
            email = '$email', 
            country = '$country' 
            WHERE user_id = $id";

    if ($conn->query($sql) === TRUE) {
        echo "User updated successfully!";
        header("Location: view.php"); // Redirect to the main page
        exit;
    } else {
        echo "Error updating record: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
</head>
<body>
    <h2>এডিট ইউজার ডাটা</h2>
    <form method="POST">
        <label for="user_name">Name:</label>
        <input type="text" id="user_name" name="user_name" value="<?php echo $row['user_name']; ?>" required><br><br>
        
        <label for="gender">Gender:</label>
        <input type="text" id="gender" name="gender" value="<?php echo $row['gender']; ?>" required><br><br>
        

        <label for="phone_number">Phone:</label>
        <input type="text" id="phone_number" name="phone_number" value="<?php echo $row['phone_number']; ?>" required><br><br>
        
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?php echo $row['email']; ?>" required><br><br>
        
        <label for="country">Country:</label>
        <input type="text" id="country" name="country" value="<?php echo $row['country']; ?>" required><br><br>
        
        <button type="submit">Update</button>
    </form>
</body>
</html>

<?php
$conn->close();
?>
