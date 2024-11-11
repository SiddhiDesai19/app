<?php
// Include necessary libraries
use Infobip\Configuration;
use Infobip\Api\SmsApi;
use Infobip\Model\SmsDestination;
use Infobip\Model\SmsTextualMessage;
use Infobip\Model\SmsAdvancedTextualRequest;

require __DIR__."/vendor/autoload.php";

// Database connection
$servername = "localhost";
$username = "root"; // Your MySQL username
$password = ""; // Your MySQL password
$dbname = "safety_app"; // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// User ID (you can retrieve this from session or any user identifier method you use)
$user_id = 1; // Assuming this is the user triggering the SOS

// Fetch emergency contacts from the database
$contacts = [];
$sql = "SELECT phone FROM emergency_contacts WHERE user_id = $user_id";
$result = $conn->query($sql);

if ($result) {
    while ($row = $result->fetch_assoc()) {
        $contacts[] = $row['phone'];
    }
} else {
    echo "Error fetching contacts: " . $conn->error;
}

// InfoBip API configuration
$apiURL = "api.infobip.com";
$apiKey = "ccb9ddc34414bea418cdd2e5a6fadf2b-39c4a369-7fda-43bb-aa32-18cddb550571";

// Initialize Infobip API client
$configuration = new Configuration(host: $apiURL, apiKey: $apiKey);
$api = new SmsApi(config: $configuration);

// Message to send
$message = "This is an SOS alert! Please respond immediately."; // Your custom message

// Assuming all contacts are from India, prepend country code
$countryCode = "+91"; // Adjust country code as needed

// Loop through each contact and send SMS
foreach ($contacts as $mobileNumber) {
    // Format mobile number (remove leading zeros if any)
    $formattedNumber = $countryCode . ltrim($mobileNumber, '0'); 

    // Prepare SMS destination and message
    $destination = new SmsDestination(to: $formattedNumber);
    $theMessage = new SmsTextualMessage(
        destinations: [$destination],
        text: $message,
        from: "Syntax Flow" // Your sender ID
    );

    // Prepare request
    $request = new SmsAdvancedTextualRequest(messages: [$theMessage]);

    // Send SMS via Infobip API
    $response = $api->sendSmsMessage($request);

    // Check response and handle success or failure
    if ($response) {
        echo "SMS sent to " . $formattedNumber . "<br>";
    } else {
        echo "Failed to send SMS to " . $formattedNumber . "<br>";
    }
}

// Close the database connection
$conn->close();
?>
