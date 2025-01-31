<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/css/locomotive-scroll.css">
    <link rel="stylesheet" href="assets/css/agent-info.css">
    <link rel="stylesheet" href="assets/css/navbar.css">
</head>

<body id="main">
    <?php include('includes/navbar.php');

    if (isset($_GET['id'])) {
        if (isset($_GET['id']) == null) {
            redirect('agents.php', 'No url found');
        }
    } else {
        redirect('agents.php', '');
    }

    $id  = validate($_GET['id']);
    $agent = "SELECT * FROM agent WHERE status='0' AND id ='$id' LIMIT 1";
    $result = mysqli_query($conn, $agent);

    if (!$result) {
        redirect('properties.php', 'something went wrong');
    }
    $result = mysqli_fetch_assoc($result);
    ?>

    <div id="agents-info-section" data-scroll-container>
        <div class="agent-profile">
            <?php if ($result['profile'] != '') : ?>
                <img src="<?= $result['profile']; ?>" alt="agent-img">
            <?php else : ?>
                <img src="assets/uploads/services/no-img.jpg" alt="unavailable-img">
            <?php endif; ?>
        </div>
        <div class="agent-information">
            <h2 style="text-align: center;">Agent Information</h2>
            <div class="agent-info">
                <span>Name:</span>
                <p><?= $result['name']; ?></p>
            </div>
            <div class="agent-info">
                <span>Phone:</span>
                <p><?= $result['phone']; ?></p>
            </div>
            <div class="agent-info">
                <span>Email:</span>
                <p><?= $result['email']; ?></p>
            </div>
            <div class="agent-info">
                <span>Work experience:</span>
                <p><?= $result['experience']; ?></p>
            </div>
            <div class="agent-info">
                <span>About more:</span>
                <p class="long-paragraph"><?= $result['long_description']; ?></p>
            </div>
            <div class="agent-info">
                <span>Address:</span>
                <p class="long-paragraph"><?= $result['address']; ?></p>
            </div>
            <div class="explore">
                <a href="properties.php">Explore properties</a>
            </div>
        </div>
    </div>

    <footer>
        <div class="footerInfo">
            © 2035 by Faber & Co Real Estate. Powered and secured by House Treasure
        </div>
        <div class="socialMediaList">
            <div class="socialLinks">
                <a href="twiter.com">
                    <img src="images/socialMedia/twiter.png" alt="">
                </a>
            </div>
            <div class="socialLinks">
                <a href="facebook.com">
                    <img src="images/socialMedia/fb.png" alt="">
                </a>
            </div>
            <div class="socialLinks">
                <a href="instagram.com">
                    <img src="images/socialMedia/insta.png" alt="">
                </a>
            </div>
        </div>
    </footer>
</body>
<script src="assets/js/locomotive-scroll.js"></script>
<script src="assets/js/agent-info.js"></script>
<script src="assets/js/navbar.js"></script>
<script src="assets/js/cdn.js"></script>

</html>