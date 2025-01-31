<?php
include('config/function.php');

$name = $_SESSION['loggedInUser']['name'];
$agent = "SELECT * FROM agent WHERE status='0' AND name ='$name' LIMIT 1";
$result = mysqli_query($conn, $agent);

if (!$result) {
    error_log("Query Error: " . mysqli_error($conn), 3, "error_log.txt");
} elseif (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $enquiryCount = agentCount('property_enquires', $row['name']) ?: 0;
} else {
    $enquiryCount = 0;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/home.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <title>Agent Dashboard</title>
    <style>
        /* Add your custom styles here or in the external CSS file */
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>
</head>

<body>
    <div class="sidebar">
        <h2>Agent Panel</h2>
        <a href="index.php">Dashboard</a>
        <a href="inquiries.php">Inquiries</a>
        <a href="account.php">Account</a>
        <a href="logout.php">Logout</a>
    </div>

    <div class="content">
        <h2>Dashboard</h2>
        <div class="dashboard-boxes">
            <div class="box">
                <h3>Total Inquiries</h3>
                <p><?= $enquiryCount ?></p>
            </div>
            <div class="box">
                <h3>Future Use</h3>
                <p>Placeholder</p>
            </div>
        </div>
    </div>

    <div class="footer">
        <p>&copy; 2024 Your Real Estate Website. All Rights Reserved.</p>
    </div>
</body>

</html>