<?php
// Database connection
$servername = "localhost";
$username = "root"; // Update with your MySQL username
$password = ""; // Update with your MySQL password
$dbname = "safety_app"; // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $role = mysqli_real_escape_string($conn, $_POST['role']);
    $parent_phone = mysqli_real_escape_string($conn, $_POST['parent_phone']);
    $child_phone = mysqli_real_escape_string($conn, $_POST['child_phone']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);

    // Encrypt password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Insert user data into the database
    $sql = "INSERT INTO users (role, name, parent_phone, child_phone, password, address) 
            VALUES ('$role', '$name', '$parent_phone', '$child_phone', '$hashed_password', '$address')";

    if ($conn->query($sql) === TRUE) {
        // Redirect based on role after successful signup
        if ($role == "parent") {
            header("Location: parent-login.php");
        } else {
            header("Location: child-login.php");
        }
        exit();
    } else {
        echo json_encode(['status' => 'error', 'message' => $conn->error]);
    }
}

// Close connection
$conn->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
    <link rel="stylesheet" href="signup.css">
</head>
<body>
    <div class="container">
        <h2>Sign Up</h2>
        <form class="signup-form" action="signup.php" method="post">
            <label for="name">Name</label>
            <input type="text" id="name" name="name" required>
            
            <label for="role">Role</label>
            <select id="role" name="role" required>
                <option value="parent">Parent</option>
                <option value="child">Child</option>
            </select>

            <label for="parent-phone">Parent's Phone Number</label>
            <input type="tel" id="parent-phone" name="parent_phone" required>

            <label for="child-phone">Child's Phone Number</label>
            <input type="tel" id="child-phone" name="child_phone" required>

            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>

            <label for="address">Address</label>
            <textarea id="address" name="address" rows="3" required></textarea>

            <button type="submit" class="button">Sign Up</button>
        </form>
    </div>
</body>
</html>