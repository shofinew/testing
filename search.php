<?php
include "connect.php";


// $conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch user data based on phone number
if (isset($_POST['search'])) {
    $phone_number = $_POST['phone_number'];

    $sql = "SELECT user_id, user_name, country FROM user WHERE phone_number = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $phone_number);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $id = $row['user_id'];
        $user_name = $row['user_name'];
        $country = $row['country'];
    } else {
        $error = "No user found with this phone number.";
    }
}
$conn->close();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Search User</title>
</head>
<body>
    <h1>Search User by Phone Number</h1>
    <form method="POST" action="">
        <label for="phone_number">Phone Number:</label>
        <input type="text" id="phone_number" name="phone_number" pattern="[0-9]{10,15}" required>
        <button type="submit" name="search">Search</button>
    </form>

    <?php
    // ডাটাবেস সংযোগ এবং লজিক
    if (isset($_POST['search'])) {
        // ইনপুট স্যানিটাইজ করা
        $phone_number = filter_input(INPUT_POST, 'phone_number', FILTER_SANITIZE_STRING);

        // ডাটাবেস সংযোগ
        $conn = new mysqli("localhost", "root", "", "witdb");

        if ($conn->connect_error) {
            $error = "Connection failed: " . $conn->connect_error;
        } else {
            // কুয়েরি তৈরি
            $stmt = $conn->prepare("SELECT user_id, user_name, country FROM user WHERE phone_number = ?");
            $stmt->bind_param("s", $phone_number);
            $stmt->execute();
            $stmt->bind_result($user_id, $user_name, $country);
            
            if ($stmt->fetch()) {
                // ডেটা পাওয়া গেছে
            } else {
                $error = "No user found with this phone number.";
            }
            $stmt->close();
            $conn->close();
        }
    }
    ?>

    <?php if (isset($user_id)): ?>
        <h2>User Details:</h2>
        <p><strong>ID:</strong> <?php echo htmlspecialchars($user_id); ?></p>
        <p><strong>Username:</strong> <?php echo htmlspecialchars($user_name); ?></p>
        <p><strong>Country:</strong> <?php echo htmlspecialchars($country); ?></p>
    <?php elseif (isset($error)): ?>
        <p style="color: red;"><?php echo htmlspecialchars($error); ?></p>
    <?php endif; ?>

</body>
</html>