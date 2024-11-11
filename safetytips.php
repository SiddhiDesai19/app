
<?php
// Safety Tips array (this can be extended or fetched from a database in real applications)
$safety_tips = [
    ["title" => "Stay Alert and Aware", "description" => "Always be aware of your surroundings. Trust your instincts and stay alert to any unusual activity."],
    ["title" => "Keep Your Phone Charged", "description" => "Always have your phone fully charged and accessible, in case you need to call for help or alert someone."],
    ["title" => "Share Your Plans", "description" => "Let a friend or family member know your plans. Share your location if you’re going somewhere unfamiliar or traveling alone."],
    ["title" => "Avoid Isolated Areas", "description" => "Avoid walking or staying in secluded areas, especially at night. Stick to well-lit, populated areas."],
    ["title" => "Carry a Personal Safety Device", "description" => "Consider carrying a whistle, pepper spray, or a personal safety alarm that can help alert others if you’re in danger."],
    ["title" => "Trust Your Gut", "description" => "If something doesn’t feel right, trust your instincts and remove yourself from the situation. Your intuition is often your best guide."]
];
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Safety Tips</title>
    <link rel="stylesheet" href="safteytips.css">
</head>
<body>
    <header>
        <nav>
            <div class="logo">
                <h1>Safety First</h1>
            </div>
            <ul class="nav-links">
                <li><a href="/">Home</a></li>
    
            </ul>
        </nav>
    </header>

    <section class="hero">
        <h2>Your Safety Matters</h2>
        <p>Empower yourself with essential safety tips to stay protected in any situation.</p>
    </section>

    <section class="tips">
        <h3>Essential Safety Tips</h3>
        <div class="tip-container">
            <div class="tip-card">
                <h4>1. Stay Alert and Aware</h4>
                <p>Always be aware of your surroundings. Trust your instincts and stay alert to any unusual activity.</p>
            </div>
            <div class="tip-card">
                <h4>2. Keep Your Phone Charged</h4>
                <p>Always have your phone fully charged and accessible, in case you need to call for help or alert someone.</p>
            </div>
            <div class="tip-card">
                <h4>3. Share Your Plans</h4>
                <p>Let a friend or family member know your plans. Share your location if you’re going somewhere unfamiliar or traveling alone.</p>
            </div>
            <div class="tip-card">
                <h4>4. Avoid Isolated Areas</h4>
                <p>Avoid walking or staying in secluded areas, especially at night. Stick to well-lit, populated areas.</p>
            </div>
            <div class="tip-card">
                <h4>5. Carry a Personal Safety Device</h4>
                <p>Consider carrying a whistle, pepper spray, or a personal safety alarm that can help alert others if you’re in danger.</p>
            </div>
            <div class="tip-card">
                <h4>6. Trust Your Gut</h4>
                <p>If something doesn’t feel right, trust your instincts and remove yourself from the situation. Your intuition is often your best guide.</p>
            </div>
        </div>
    </section>

    <footer>
        <p>&copy; 2024 Safety First | All Rights Reserved</p>
    </footer>

</body>
</html>
