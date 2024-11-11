// Show and hide sections based on clicked feature
function openPage(pageId) {
    document.querySelectorAll('.page-content').forEach(page => {
        page.style.display = 'none';
    });
    document.getElementById(pageId).style.display = 'block';
}

// Save contact to database (placeholder function)
function saveContact() {
    const name = document.getElementById("name").value;
    const contactNo = document.getElementById("contactNo").value;
    const relation = document.getElementById("relation").value;
    const address = document.getElementById("address").value;

    // Assuming you have a backend API to save contact
    // You would use fetch or AJAX to send this data to the server
    console.log("Contact saved:", { name, contactNo, relation, address });
    alert("Emergency contact saved!");
}

// Plan safe route (placeholder function)
function planRoute() {
    const destination = document.getElementById("desiredLocation").value;
    document.getElementById("routeResult").innerText = `Route to ${destination} planned!`;
    // Integrate with a real mapping API like Google Maps if needed
}

// SOS function to notify emergency contacts (placeholder function)
function sendSOS() {
    // Ideally, this would send an alert or SMS to emergency contacts
    alert("SOS sent to emergency contacts!");
}

// Share live location function (placeholder)
function shareLiveLocation() {
    alert("Sharing live location...");
    // Integrate with geolocation API if you want real-time location sharing
}
// Function to toggle between different sections of the dashboard
function openPage(pageName) {
    // Hide all pages
    var pages = document.querySelectorAll('.page-content');
    pages.forEach(page => page.style.display = 'none');

    // Show the selected page
    document.getElementById(pageName).style.display = 'block';
}

// Function to save a contact
function saveContact() {
    var name = document.getElementById('name').value;
    var contactNo = document.getElementById('contactNo').value;
    var relation = document.getElementById('relation').value;
    var address = document.getElementById('address').value;

    // Send the data to the backend (PHP) for saving in the database
    var formData = new FormData();
    formData.append('name', name);
    formData.append('contactNo', contactNo);
    formData.append('relation', relation);
    formData.append('address', address);

    fetch('saveContact.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.status === 'success') {
            alert('Contact saved successfully!');
        } else {
            alert('Failed to save contact!');
        }
    });
}

// Function to plan the route (Example of safe route planning)
function planRoute() {
    var location = document.getElementById('desiredLocation').value;
    // Simulate a safe route finding process
    var route = "Safe route to " + location + " is [Route Details].";
    document.getElementById('routeResult').innerText = route;
}

// Function to share live location
function shareLiveLocation() {
    // This is a placeholder; in a real app, you'd use the Geolocation API
    alert("Live location shared successfully!");
}
