<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/css/locomotive-scroll.css">
    <link rel="stylesheet" href="assets/css/agent.css">
    <link rel="stylesheet" href="assets/css/navbar.css">
</head>

<body id="main">
    <?php include('includes/navbar.php'); ?>
    <div id="agentsSection">
        <h1>Our Agents</h1>
        <div class="agents-grid">
            <?php
            $agentQuery = "SELECT * FROM agent WHERE status = '0'";
            $result = mysqli_query($conn, $agentQuery);

            if ($result) {
                if (mysqli_num_rows($result) > 0) {
                    foreach ($result as $row) { ?>
                        <div class="agent-box">
                            <?php if ($row['profile'] != '') : ?>
                                <img src="<?= $row['profile']; ?>" alt="profile-img" class="agent-image">
                            <?php else : ?>
                                <img src="assets/uploads/services/no-img.jpg" alt="unavailable-img" class="agent-image">
                            <?php endif; ?>
                            <div class="agent-content">
                                <h2><?= $row['name']; ?></h2>
                                <p><?= $row['short_description']; ?></p>
                                <p><span>Address :</span><?= $row['address']; ?></p>
                                <p><span>work experience :</span><?= $row['experience']; ?></p>
                                <a href="agent-info.php?id=<?= $row['id']; ?>" class="read-more">Read More</a>
                            </div>
                        </div>
                    <?php }
                } else { ?>
                    <h2 style="text-align: center;">No data found</h2>
                <?php
                }
            } else { ?>
                <h2 style="text-align: center;">Something went wrong</h2>
            <?php
            }
            ?>
        </div>
    </div>

    <?php if (isset($_SESSION['is_agent'])) { ?>
        <p class="agent-msg">Go to user panel for manage quiry.</p>
    <?php } else { ?>
        <div class="agent-options">
            <a href="become-agent.php" class="btn btn-secondary">Become an Agent</a>
        </div>
    <?php } ?>
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
<script src="assets/js/agent.js"></script>
<script src="assets/js/navbar.js"></script>
<script src="assets/js/cdn.js"></script>

</html>