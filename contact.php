<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/css/locomotive-scroll.css">
    <link rel="stylesheet" href="assets/css/contact.css">
    <link rel="stylesheet" href="assets/css/navbar.css">
</head>

<body id="main" data-scroll-container>
    <?php
    include('includes/navbar.php');
    ?>

    <div id="heroSection">
        <section class="map-section">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3709.3530804169886!2d71.22309617410723!3d21.61116098018794!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x395880d05dcb3a59%3A0x1768ffa86cf05a5!2sKamani%20Science%20College%20And%20Prataprai%20Arts%20College!5e0!3m2!1sen!2sin!4v1723727552464!5m2!1sen!2sin"
                width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
        </section>

        <section class="contact-info">
            <img src="images/other/oldmanSearch.png" alt="searching" class="oldmanSearch">
            <h2 style="text-align: center;">LET'S TALK</h2>
            <div class="contact-details">
                <div class="email">
                    <div class="image">
                        <img src="images/socialMedia/mail.png" alt="404">
                        <p>Email:</p>
                    </div>
                    <div>
                        <p>wwwgautampatel3@gmail.com</p>
                    </div>
                </div>
                <div class="container">
                    <div class="grid-container">
                        <div class="contactNumber">
                            <div class="image">
                                <img src="images/socialMedia/client.png" alt="404">
                                <p>Phone:</p>
                            </div>
                            <div style="margin-top: 3%;">
                                <p>6353553021</p>
                                <p>8866809710</p>
                            </div>
                        </div>
                        <div class="social-media">
                            <a href="#"><img src="images/socialMedia/fb.png" alt="Facebook"></a>
                            <a href="#"><img src="images/socialMedia/twiter.png" alt="Twitter"></a>
                            <a href="#"><img src="images/socialMedia/insta.png" alt="Instagram"></a>
                        </div>
                        <div class="address" style="grid-column: 1 / -1;">
                            <p><strong>Office HQ:</strong></p>
                            <p>Kamani science college<br>Lathi Rd, Madhuvan Park, Amreli, Gujarat 365601<br>INDIA</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</body>
<script src="assets/js/locomotive-scroll.js"></script>
<script src="assets/js/contact.js"></script>
<script src="assets/js/navbar.js"></script>
<script src="assets/js/cdn.js"></script>

</html>