<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Service Detail</title>
    <link rel="stylesheet" href="assets/css/locomotive-scroll.css">
    <link rel="stylesheet" href="assets/css/service-detail.css">
    <!-- <link rel="stylesheet" href="assets/css/navbar.css"> -->
</head>

<body id="main">
    <?php
    include('includes/navbar.php');

    if (isset($_GET['slug'])) {
        if (isset($_GET['slug']) == null) {
            redirect('error.php', 'No url found');
        }
    } else {
        redirect('error.php', 'Something want wrong, please try again later.');
    }

    $slug  = validate($_GET['slug']);
    $property = "SELECT * FROM services WHERE status='0' AND slug ='$slug' LIMIT 1";
    $result = mysqli_query($conn, $property);

    if (!$result) {
        redirect('properties.php', 'something went wrong');
    }
    $result = mysqli_fetch_assoc($result);

    $prices = array(
        '1BHK' => $result['1bhk'],
        '2BHK' => $result['2bhk'],
        '3BHK' => $result['3bhk'],
    );
    ?>

    <div class="service-detail" data-scroll-container>
        <div class="service-info">
            <div class="service-image">
                <?php if ($result['image'] != '') : ?>
                    <img src="<?= $result['image']; ?>" alt="service-img">
                <?php else : ?>
                    <img src="assets/uploads/services/no-img.jpg" alt="unavailable-img">
                <?php endif; ?>
            </div>
            <div class="service-description">
                <h2><?= $result['name']; ?></h2>
                <p><?= $result['long_description']; ?></p>
                <h2>Benefit</h2>
                <p><?= $result['small_description']; ?></p>
                <div class="service-categories">
                    <div class="category">
                        <h3>1BHK</h3>
                        <p>Price: ₹<?= $result['1bhk']; ?></p>
                    </div>
                    <div class="category">
                        <h3>2BHK</h3>
                        <p>Price: ₹<?= $result['2bhk']; ?></p>
                    </div>
                    <div class="category">
                        <h3>3BHK</h3>
                        <p>Price: ₹<?= $result['3bhk']; ?></p>
                    </div>
                </div>
                <div class="service-timing">
                    <p>Visiting Hours: 10:00 AM - 6:00 PM</p>
                </div>
            </div>
            <p class="note">
                <strong>Note:</strong> If the work exceeds the specified hours, additional charges may apply. You are
                also required
                to make an advance payment for the services.
                If you are not satisfied with service, some amount will refund.
            </p>
        </div>

        <div class="inquiry-form">
            <h3 style="text-align: center;">Enquiry Form</h3>
            <form action="code.php" method="post">
                <!-- Fixed Service Name -->
                <label for="service_name">Service Name:</label>
                <input type="text" id="service_name" name="service_name" value="<?= $result['name'] ?>" readonly>

                <!-- User Input Fields -->
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required>

                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>

                <label for="phone">Phone Number:</label>
                <input type="tel" id="phone" name="phone" pattern="[0-9]{10}" required>
                <?php
                echo '<label for="sizes">Select Size:</label>';
                echo '<select name="sizes" id="sizes">';
                echo '<option value="" disabled selected>Select a size</option>';
                foreach ($prices as $size => $price) {
                    echo "<option value='$size'>$size</option>";
                }
                echo '</select>';
                ?>

                <label for="service-charge">Charge:</label>
                <?php echo '<input type="text" id="service_price" name="service_price" value="" class="service_price" readonly>'; ?>

                <label for="address">Address:</label>
                <textarea id="address" name="address" required></textarea>

                <label for="message">Message:</label>
                <textarea id="message" name="message"></textarea>

                <input type="hidden" id="service-id" name="service-id" value="12345"> <!-- Service ID -->

                <button type="submit" name="submit-enquiry">Proceed to Payment</button>
            </form>

            <?php
            // Get the prices from the database based on the sizes
            // Create a JavaScript code to populate the service price input field
            echo '<script>';
            echo 'const sizesSelect = document.getElementById("sizes");';
            echo 'const servicePriceInput = document.getElementById("service_price");';
            echo 'sizesSelect.addEventListener("change", () => {';
            echo '  const sizeValue = sizesSelect.value;';
            echo '  const price = ' . json_encode($prices) . '[sizeValue];';
            echo '  servicePriceInput.value = price;';
            echo '});';
            echo '</script>';
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
<script src="assets/js/service-detail.js"></script>
<!-- <script src="assets/js/navbar.js"></script> -->
<script src="assets/js/cdn.js"></script>

</html>