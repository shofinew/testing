<?php
include "connect.php";
?>

<?php
$sql = "SELECT * FROM user";
$result = $conn->query($sql);
?>



<!DOCTYPE html>
<html lang="en">
<head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>view</title>
      <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
            padding: 10px;
            text-align: center;
        }
        th {
            background-color: lightgray;
        }
    </style>
</head>
<body>
<h2>ইউজার ডাটা টেবিল</h2>

<table>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>gender</th>
        <th>Phone</th>
        <th>Email</th>
        <th>Country</th>
        <th>Edit</th>
    </tr>

    <?php
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>{$row['user_id']}</td>
                    <td>{$row['user_name']}</td>
                    <td>{$row['gender']}</td>
                    <td>{$row['phone_number']}</td>
                    
                    <td>{$row['email']}</td>
                    <td>{$row['country']}</td>
                    <td><a href='edit.php?id={$row['user_id']}'>Edit</a></td>
                  </tr>";
        }
    } else {
        echo "<tr><td colspan='3'>কোনো ডাটা পাওয়া যায়নি</td></tr>";
    }
    ?>

</table>
</body>
</html>

<?php
$conn->close();
?>