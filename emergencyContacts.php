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

// Set user_id directly as 1
$user_id = 1; // Hardcoded user ID

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Sanitize input
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $relationship = mysqli_real_escape_string($conn, $_POST['relationship']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);

    // Insert query
    $sql = "INSERT INTO emergency_contacts (user_id, name, phone, relationship, address) 
            VALUES ('$user_id', '$name', '$phone', '$relationship', '$address')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('New contact saved successfully.'); window.location.href = 'dashboard.php';</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
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
    <title>Emergency Contacts</title>
    <link rel="stylesheet" href="e_contact.css">
    <style>
        .contact-item { margin-bottom: 15px; padding: 10px; border: 1px solid #ddd; border-radius: 5px; }
        .contact-list { margin-top: 20px; }
    </style>
</head>
<body>
<div id="emergencyContacts" class="page-content">
    <h3>Add Emergency Contact</h3>
    <form id="contactForm" action="emergencyContacts.php" method="post">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required>
        
        <label for="contactNo">Contact Number:</label>
        <input type="tel" id="phone" name="phone" pattern="[0-9]{10}" required placeholder="10-digit phone number">
        
        <label for="relation">Relation:</label>
        <input type="text" id="relationship" name="relationship" required>
        
        <label for="address">Address:</label>
        <input type="text" id="address" name="address">
        
        <button type="submit">Save Contact</button>
    </form>
</div>
</body>
</html>
