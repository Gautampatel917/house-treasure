<?php include('config/function.php');
?>

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
                <p>
                    <?php
                    if (isset($_SESSION['loggedInUser'])) {
                        echo ($_SESSION['loggedInUser']['name']);
                    } else {
                        redirect('index.php', 'Login and continue');
                        exit;
                    }
                    ?>
                </p>
            </div>
            <div class="response">
                <img src="images/salesman.png" alt="user">
                <p>Message</p>
            </div>
        </div>
    </nav>

    <section class="userControl">
        <form action="code.php" method="post">
            <input name="logout" type="submit" value="Logout">
        </form>
        <?php if (isset($_SESSION['is_agent'])) { ?>
            <a href="agent/index.php" class="agent-panel">Client Management</a>
        <?php } else { ?>
            <span></span>
        <?php } ?>
    </section>

    <section class="userResponse">
        <?php
        $email = $_SESSION['loggedInUser']['email'];
        $response = "SELECT * FROM response WHERE c_email= '$email' ORDER BY id DESC";
        $result = mysqli_query($conn, $response);
        if ($result) {
            if (mysqli_num_rows($result) > 0) {
                foreach ($result as $row) { ?>
                    <div class="userMsg">
                        <div class="respoTitle">
                            <img src="images/response.png" alt="">
                            <?php
                            if ($row['p_name'] != '') { ?>
                                <h3><?= $row['p_name']; ?></h3>
                            <?php
                            } else { ?>
                                <h3><?= $row['s_name']; ?></h3>
                            <?php
                            }
                            ?>
                        </div>
                        <p><?= $row['response'] ?></p>
                    </div>
                <?php
                }
            } else {
                ?>
                <p style="text-align: center; padding-top:50%;">No messages yet</p>
        <?php
            }
        } else {
            error_log("\nQuery Error: " . mysqli_error($conn), 3, "error_log.txt");
        }
        ?>
    </section>
</header>