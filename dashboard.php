<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <link rel="stylesheet" href="dashboard.css">
</head>
<body>
    <div class="dashboard-container">
        <h2>Welcome to Your Safety Dashboard</h2>
        <div class="dashboard-boxes">
            <div class="box" onclick="window.location.href='emergencyContacts.php'">
                <h3>Emergency Contacts</h3>
            </div>
            <div class="box" onclick="window.location.href='saferoute.php'">
                <h3>Safe Route Planning</h3>
            </div>
            <div class="box" onclick="window.location.href='safetytips.php'">
                <h3>Safety Tips</h3>
            </div>
            <div class="box" onclick="openPage('liveLocation')">
                <h3>Live Location Sharing</h3>
            </div>
        </div>
        <button class="sos-button" onclick="window.location.href='sos.php'">SOS</button>
    </div>

    <div id="liveLocation" class="page-content" style="display: none;">
        <h3>Live Location Sharing</h3>
        <button onclick="shareLiveLocation()">Share Live Location</button>
    </div>

    <script src="script.js"></script>
</body>
</html>

