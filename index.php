<?php
session_start();

// Check if the user is logged in and dynamically change the button options
$isLoggedIn = isset($_SESSION['child_logged_in']) && $_SESSION['child_logged_in'] == true;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Women's Safety App - Landing Page</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <section class="vision-mission">
            <h1>Welcome to the Women’s Safety App</h1>
            <p>Our mission is to empower women with tools to ensure safety and peace of mind wherever they are.</p>
        </section>
        
        <div class="button-group">
            <button class="button" onclick="location.href='login.php'">Login</button>
            <button class="button" onclick="location.href='signup.php'">Sign Up</button>
        </div>
    </div>
</body>
</html>
