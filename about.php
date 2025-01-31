<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    <link rel="stylesheet" href="assets/css/locomotive-scroll.css">
    <link rel="stylesheet" href="assets/css/about.css">
</head>

<body id="main" data-scroll-container>
    <header>
        <nav>
            <div class="logo">
                <img src="images/a-dynamic-logo-for-house-treasure-a-real-estate-co--TSQuoxnQTCPqN5qrdpRLA-Kvbe4yWtQluyzHghBbpyqg-removebg.png"
                    alt="House Treasure">
            </div>
            <ul class="nav-part2">
                <li><a href="home.php">Home</a></li>
                <li><a href="properties.php">Properties</a></li>
                <li><a href="service.php">Service</a></li>
                <li><a href="agents.php">Agent</a></li>
                <li><a href="about.php">About us</a></li>
                <li><a href="contact.php">Contact us</a></li>
            </ul>
            <div class="navImg">
                <div class="user">
                    <img src="images/user (1).png" alt="user">
                    <p>UserName</p>
                </div>
                <div class="response">
                    <img src="images/salesman.png" alt="user">
                    <p>UserName</p>
                </div>
            </div>
        </nav>

        <section class="userControl">
            <form action="#" method="post">
                <input type="submit" value="Logout">
            </form>
            <!-- <a href="">manage</a> -->
        </section>

    </header>

    <div id="heroSection" data-scroll-section>
        <!-- Video Section -->
        <div class="about-us-video">
            <div class="aboutContent">
                <video autoplay muted loop class="background-video">
                    <source src="images/other/working.mp4" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
                <div class="about-us-description" data-scroll-section>
                    <h1>Thank you for giving us chance.</h1>
                    <p>Your trusted partner for your new home</p>
                </div>
            </div>


        </div>

        <div class="about-us-content" data-scroll-section>
            <div class="about-us-container">
                <div class="about-us-story" data-scroll data-scroll-direction="horizontal" data-scroll-speed="-2">
                    <h1>It's story time</h1>
                    <p>
                        Our mission is to make your real estate journey seamless and enjoyable. We’ve combined our
                        expertise to create a
                        user-friendly website that not only lists properties but also offers trusted agents and
                        essential home services—all
                        tailored to your needs. <br><br>

                        At our core, we believe that finding a home should be more than just a transaction. It’s about
                        discovering a space where
                        you can build a life, create memories, and thrive. We’re here to guide you every step of the
                        way, ensuring that your
                        experience is smooth, transparent, and fulfilling. <br><br>

                        Welcome to our community, where your dreams find a home
                    </p>
                </div>
                <div class="about-us-image" data-scroll data-scroll-direction="horizontal" data-scroll-speed="8">
                    <img src="images/other/Success.jpg" alt="error">
                </div>
            </div>
        </div>
        <div class="services" data-scroll-section>
            <h1 style="text-align: center;">Why we best ?</h1>
            <div class="services-container">
                <!-- Home Services -->
                <div class="service">
                    <img src="images/other/home-service.png" alt="Home Services">
                    <h3>Home Services</h3>
                    <p>We provide comprehensive home services including home repairs, renovation, and maintenance to
                        keep your property in top condition.</p>
                </div>

                <!-- Agent Concert -->
                <div class="service">
                    <img src="images/other/agent-concern.jpg" alt="Agent Concert">
                    <h3>Agent Concern</h3>
                    <p>Our expert agents are here to guide you through the buying, selling, and renting processes,
                        ensuring a smooth experience.</p>
                </div>

                <!-- Property Management -->
                <div class="service">
                    <img src="images/other/property-management.png" alt="Property Management">
                    <h3>Property Management</h3>
                    <p>Our property management services cover everything from tenant management to property maintenance,
                        ensuring your investment is well cared for.</p>
                </div>
            </div>

        </div>
    </div>

    <footer data-scroll-section>
        <div class="footerInfo">
            © 2035 by Faber & Co Real Estate. Powered and secured by House Treasure
        </div>
        <div class="socialMediaList">
            <div class="socialLinks">
                <a href="twiter.com">
                    <img src="images/socialMedia/twiter.png" alt="Twitter">
                </a>
            </div>
            <div class="socialLinks">
                <a href="facebook.com">
                    <img src="images/socialMedia/fb.png" alt="Facebook">
                </a>
            </div>
            <div class="socialLinks">
                <a href="instagram.com">
                    <img src="images/socialMedia/insta.png" alt="Instagram">
                </a>
            </div>
        </div>
    </footer>

    <script src="assets/js/locomotive-scroll.js"></script>
    <script src="assets/js/about.js"></script>
</body>

</html>