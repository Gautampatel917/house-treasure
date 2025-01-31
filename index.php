<?php
$pageTitle = "Login";
include("config/function.php");

if (isset($_SESSION['auth'])) {
    // header("Location: index.php");
    redirect('home.php', '');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>House Treasure</title>
    <link rel="stylesheet" href="assets\css\style.css">
</head>

<body>
    <div class="container">
        <div class="alert">
            <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
            <?= alertMessage() ?>
        </div>
        <div class="signIn">
            <h2 style="margin: 10% auto;">Sign In</h2>
            <form class="form1" action="login-code.php" method="post">
                <span>Email</span>
                <input type="email" name="email" required>
                <span>Password</span>
                <input type="password" name="password" required>
                <input class="button" type="submit" name="loginBtn" value="Sign In">
            </form>
        </div>

        <div class="shadow">
            <img src="images/other/companyLogo.svg" alt="not found">
            <input class="move" class="button" type="button" value="SIGN UP">
        </div>

        <div class="signUp">
            <h2 style="margin: 10% auto;">Sign Up</h2>
            <form class="form2" action="code.php" method="post">
                <span>First name</span>
                <input type="text" name="name" required>
                <span>Email</span>
                <input type="email" name="email" required>
                <span>Phone No:</span>
                <input type="tel" id="phone" name="phone" pattern="[0-9]{10}" required>
                <span>Password</span>
                <input type="password" name="password" required>
                <input class="button" type="submit" name="singUp" value="Sign Up">
            </form>
        </div>
    </div>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js" integrity="sha512-7eHRwcbYkK4d9g/6tD/mhkf++eoTHwpNM9woBxtPUBWm67zeAfFC+HrdoE2GanKeocly/VxeLvIqwvCdk7qScg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="assets/js/script.js"></script>

</html>