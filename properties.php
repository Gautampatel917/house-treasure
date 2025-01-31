<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Property Detail</title>
    <link rel="stylesheet" href="assets/css/locomotive-scroll.css">
    <link rel="stylesheet" href="assets/css/properties.css">
    <link rel="stylesheet" href="assets/css/navbar.css">
</head>

<body id="main">
    <?php
    include('includes/navbar.php');
    ?>

    <div id="propertySection">
        <h1>Our Properties</h1>
        <div class="filter">
            <form action="properties.php" method="post">
                <input type="text" placeholder="Enter city name" name="city">
                <select name="p_type" id="p_type">
                    <option value="house">House</option>
                    <option value="office">Office</option>
                    <option value="apartment">Apartment</option>
                </select>
                <button type="submit" name="search">Search</button>
            </form>
        </div>
        <!-- Property Listing Section -->
        <div class="property-grid">
            <?php
            $propertyQuery = "SELECT * FROM properties WHERE status = '0'"; // Default query

            if (isset($_POST['search'])) {
                // Get filter values
                $city = isset($_POST['city']) ? $_POST['city'] : '';
                $p_type = isset($_POST['p_type']) ? $_POST['p_type'] : '';

                // Capitalize the first letter of each word in the city name
                $city = ucwords($city);

                // Sanitize the inputs
                $city = mysqli_real_escape_string($conn, $city);
                $p_type = mysqli_real_escape_string($conn, $p_type);

                // Build the query based on the filters
                if (!empty($city)) {
                    $propertyQuery .= " AND city LIKE '%$city%'";
                }
                if (!empty($p_type)) {
                    $propertyQuery .= " AND property_type = '$p_type'";
                }
            }

            $result = mysqli_query($conn, $propertyQuery);

            if ($result) {
                if (mysqli_num_rows($result) > 0) {
                    foreach ($result as $row) { ?>
                        <div class="property-box">
                            <?php if ($row['image'] != '') : ?>
                                <img src="<?= $row['image']; ?>" alt="property-img">
                            <?php else : ?>
                                <img src="assets/uploads/services/no-img.png" alt="unavailable-img">
                            <?php endif; ?>
                            <div class="property-info">
                                <h3><?= $row['title']; ?></h3>
                                <p><?= $row['short_info']; ?></p>
                                <span class="price"><?= $row['price']; ?></span> <!-- Fixed price display -->
                                <p class="location"><?= $row['address']; ?>, <?= $row['postcode']; ?> <?= $row['city']; ?>, India</p>
                                <a href="properties-detail.php?slug=<?= $row['slug'] ?>" class="read-more">Read More</a>
                            </div>
                        </div>
                    <?php
                    }
                } else {
                    ?>
                    <div class="col-md-12" style="height: 50vh;">
                        <h4 class='text-center'>No property found</h4>
                    </div>
                <?php
                }
            } else {
                ?>
                <div class="col-md-12">
                    <h4 class='text-center'>Something Went Wrong!</h4>
                </div>
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
<script src="assets/js/properties.js"></script>
<script src="assets/js/navbar.js"></script>
<script src="assets/js/cdn.js"></script>

</html>