<?php include("config/function.php"); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error</title>
    <link rel="stylesheet" href="assets/css/error.css">
</head>

<body>
    <div class="error-container">
        <div class="error-icon">⚠️</div>
        <h1>Oops!</h1>
        <p>
            <?php
            $message = alertMessage();
            echo $message ? $message : "Something went wrong. Please try again.";
            ?>
        </p>
        <a href="home.php" class="back-button">Go Back to Home</a>
    </div>
</body>

</html>