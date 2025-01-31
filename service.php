<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/css/locomotive-scroll.css">
    <link rel="stylesheet" href="assets/css/service.css">
    <link rel="stylesheet" href="assets/css/navbar.css">
</head>

<body id="main">
    <?php
    include('includes/navbar.php');
    ?>

    <div id="servicesSection">
        <h1>Our Service</h1>
        <div class="services-grid">
            <?php
            $serviceQuery = "SELECT * FROM services WHERE status = '0'";
            $result = mysqli_query($conn, $serviceQuery);

            if ($result) {
                if (mysqli_num_rows($result) > 0) {
                    foreach ($result as $row) { ?>
                        <div class="service-box">
                            <?php if ($row['image'] != '') : ?>
                                <img src="<?= $row['image']; ?>" alt="service-img" class="service-image">
                            <?php else : ?>
                                <img src="assets/uploads/services/no-img.jpg" alt="unavailable-img" class="service-image">
                            <?php endif; ?>
                            <div class="service-content">
                                <h2><?= $row['name'] ?></h2>
                                <p><?= $row['small_description'] ?></p>
                                <a href="service-detail.php?slug=<?= $row['slug'] ?>" class="read-more">Read More</a>
                            </div>
                        </div>
                    <?php
                    }
                } else {
                    ?>
                    <p>No services available</p>
                <?php
                }
            } else {
                ?>
                <h4>Something went wrong</h4>
            <?php
            }
            ?>
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
<script src="assets/js/service.js"></script>
<script src="assets/js/navbar.js"></script>
<script src="assets/js/cdn.js"></script>

</html>