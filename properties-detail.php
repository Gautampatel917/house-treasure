<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>property detail</title>
    <link rel="stylesheet" href="assets/css/locomotive-scroll.css">
    <link rel="stylesheet" href="assets/css/properties-detail.css">
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
    $property = "SELECT * FROM properties WHERE status='0' AND slug ='$slug' LIMIT 1";
    $result = mysqli_query($conn, $property);

    if (!$result) {
        redirect('properties.php', 'something went wrong');
    }
    $result = mysqli_fetch_assoc($result);
    ?>

    <div class="property-detail" data-scroll-container>
        <div class="property-info">
            <div class="property-image">
                <?php if ($result['image'] != '') : ?>
                    <img src="<?= $result['image']; ?>" alt="property-image">
                <?php else : ?>
                    <img src="assets/uploads/services/no-img.png" alt="img">
                <?php endif; ?>
            </div>
            <div class="p_price">
                <h1>
                    <?= $result['title']; ?>
                </h1>
                <p><span>₹</span>
                    <?= $result['price']; ?>
                </p>
            </div>
            <div class="p_feature">
                <h1>Feature</h1>
                <div class="feature-item">
                    <img src="images/other/property-feature.jpg" alt="feature" class="image">
                    <ul>
                        <li>
                            <span>
                                <?php
                                if ($result['rooms'] != 0) {
                                ?>
                                    <?= $result['rooms']; ?> Rooms
                                <?php
                                } else {
                                ?>
                                    <?= $result['bedrooms'] ?> Bedrooms
                                <?php
                                }
                                ?>
                            </span>
                        </li>
                        <li><span>
                                <?= $result['area']; ?>
                            </span>Area</li>
                        <li><span>
                                <?= $result['buildingYear']; ?>
                            </span>Building year</li>
                        <li><span>
                                <?= $result['total_flor']; ?>
                            </span>Total Balding Flor</li>
                    </ul>
                </div>
            </div>
            <div class="p_description">
                <h1>Description</h1>
                <div class="description">
                    <img src="images/other/p_desc.png" alt="feature" class="image">
                    <p>
                        <?= $result['description']; ?>
                    </p>
                </div>
            </div>
            <div class="p_landmarks">
                <h1>Landmark</h1>
                <div class="landmarks">
                    <img src="images/other/Landmark.jpg" alt="feature" class="image">
                    <p>
                        <?= $result['landmark']; ?>
                    </p>
                </div>
            </div>
            <div class="p_location">
                <h1>Location</h1>
                <div class="location">
                    <img src="images/other/Location.png" alt="feature" class="image">
                    <p class="location">
                        <?= $result['address']; ?>,
                        <?= $result['postcode']; ?>
                        <?= $result['city']; ?>, India
                    </p>
                </div>
            </div>
        </div>

        <div class="your-information">
            <div class="inquiry-form">
                <h3 style="text-align: center;">Property Inquiry Form</h3>
                <form action="code.php" method="post">
                    <!-- Hidden Property ID -->
                    <input type="hidden" id="property-id" name="property-id" value="<?= $result['id']; ?>">
                    <input type="hidden" id="property-address" name="p_address"
                        value="<?= $result['address']; ?>, <?= $result['postcode']; ?> <?= $result['city']; ?>, India">

                    <!-- Fixed Property Name -->
                    <label for="property-name">Property Name:</label>
                    <input type="text" id="property-name" name="property-name" value="<?= $result['title']; ?>"
                        readonly>

                    <label for="property-price">Property Price:</label>
                    <input type="text" id="property-price" name="property-price" value="₹<?= $result['price']; ?>"
                        readonly>

                    <!-- Customer Name -->
                    <label for="c_name">Name:</label>
                    <input type="text" id="c_name" name="c_name" required>

                    <!-- Email -->
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" required>

                    <!-- Phone Number -->
                    <label for="phone">Phone Number:</label>
                    <input type="tel" id="phone" name="phone" pattern="[0-9]{10}" required>
                    <?php
                    $agentQuery = "SELECT * FROM agent WHERE status = '0'";
                    $result1 = mysqli_query($conn, $agentQuery);
                    ?>
                    <!-- Agent Selection -->
                    <label for="agent">Select Agent:</label>
                    <select id="agent" name="agent" required>
                        <option value="" disabled selected>Select an agent</option>
                        <?php
                        if ($result1) {
                            if (mysqli_num_rows($result1) > 0) {
                                foreach ($result1 as $row) { ?>
                                    <option value="<?= $row['name']; ?>">
                                        <?= $row['name']; ?>
                                    </option>
                                <?php
                                }
                            } else { ?>
                                <option value="" disabled selected>currently not able</option>
                        <?php
                            }
                        }
                        ?>
                    </select>
                    <p class="agent-message">Please select an agent after reading about them.</p>

                    <!-- Message -->
                    <label for="message">Message:</label>
                    <textarea id="message" name="message" placeholder="Your message..."></textarea>

                    <!-- Submit Button -->
                    <button type="submit" name="p_enquiryBtn">Submit Inquiry</button>
                </form>
            </div>

            <div class="info-image">
                <img src="images/other/p_enquiry.png" alt="images">
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
<script src="assets/js/properties-detail.js"></script>
<script src="assets/js/cdn.js"></script>


</html>