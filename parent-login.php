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
    $child_phone = $conn->real_escape_string($_POST['child_phone']);
    $password = $conn->real_escape_string($_POST['password']);

    // Query to check if phone number exists and password matches
    $sql = "SELECT * FROM users WHERE child_phone='$phone' AND role='parent' AND password='$password'";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // User found, now check the password
        $row = $result->fetch_assoc();

        // Verify the password
        if (password_verify($password, $row['password'])) {
            // Start session and redirect to dashboard
            session_start();
            $_SESSION['user_id'] = $row['id']; // Store user ID in session
            $_SESSION['role'] = $row['role']; // Store role in session
            header("Location: dashboard.php"); // Redirect to the dashboard
            exit();
        } else {
            echo "Invalid password.";
        }
    } else {
        echo "No child found with that phone number.";
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
    <title>Parent Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Parent Login</h2>
        <div class="overlay">
            <div class="login-card">
                <h1 class="login-title">Parent Login</h1>
                <form action="dashboard.php" method="POST"> <!-- Form action updated to submit to this page -->
                    <label for="phone">Daughter's Phone Number</label>
                    <input type="text" id="phone" name="phone" placeholder="Enter phone number" required>
          
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" placeholder="Enter password" required>
          
                    <button type="submit" class="login-button">Login</button>
                </form>
                <p class="signup-link">Not registered? <a href="signup.php">Sign up here</a></p>
            </div>
        </div>
    </div>
</body>
</html>
