<?php include("config/function.php"); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank You</title>
    <link rel="stylesheet" href="assets/css/thankyou.css">
    <script>
        setTimeout(function() {
            window.location.href = 'home.php';
        }, 5000);
    </script>
</head>

<body>
    <div class="thank-you-container">
        <h1>Thank You!</h1>
        <p>
            <?php
            $message = alertMessage();
            echo $message ? $message : "We will contact you soon.";
            ?>
        </p>
        <p>You will be redirected to the home page shortly.</p>
        <p>If you're not redirected, <a href="home.php">click here to go home</a>.</p>
    </div>
</body>

</html>