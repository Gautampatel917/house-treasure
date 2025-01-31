<?php
require 'config/function.php';

//---------------------------------------------------login process
if (isset($_POST['singUp'])) {
    $username = validate($_POST['name']);
    $user_phone = validate($_POST['phone']);
    $user_email = validate($_POST['email']);
    $password = validate($_POST['password']);

    if ($username != '' || $user_phone != '' || $user_email != '' || $password != '') {
        $hashPassword = password_hash($password, PASSWORD_BCRYPT);

        $user_query = "INSERT INTO users(name,phone,email,password) 
        VALUES ('$username','$user_phone','$user_email','$hashPassword')";

        $final_result = mysqli_query($conn, $user_query);

        if ($final_result) {
            $_SESSION['auth'] = true;
            $_SESSION['loggedInUserRole'] = 'user';
            $_SESSION['loggedInUser'] = [
                'name' => $username,
                'email' => $user_email
            ];
            $_SESSION['role'] = 'user';
            if ($_SESSION['role'] == 'user') {
                redirect('home.php', '');
            }
        } else {
            redirect('index.php', 'Some went wrong!!!');
        }
    } else {
        redirect("index.php", "Please fill the all the input fields");
    }
}

//------------------------------------------------properties enquiry
if (isset($_POST['p_enquiryBtn'])) {
    $p_id = validate($_POST['property-id']);
    $p_name = validate($_POST['property-name']);
    $p_address = validate($_POST['p_address']);
    $p_price = validate($_POST['property-price']);
    $c_name = validate($_POST['c_name']);
    $email = validate($_POST['email']);
    $phone = validate($_POST['phone']);
    $agent = validate($_POST['agent']);
    $message = validate($_POST['message']);

    $query = "INSERT INTO property_enquires(p_id,name, email, phone, property_name,p_address, price, agent_name, message)
            VALUES ('$p_id', '$c_name', '$email', '$phone', '$p_name','$p_address','$p_price', '$agent','$message')";

    $result = mysqli_query($conn, $query);

    if ($result) {
        redirect('thankyou.php', 'Enquiry sent successfully. We will get back to you soon.');
    } else {
        redirect(
            'error.php',
            'Something went wrong'
        );
    }
}

//---------------------------------------------------services enquiry

if (isset($_POST['submit-enquiry'])) {
    $_SESSION['inquiry'] = [
        'service_name' => $_POST['service_name'],
        'email' => $_POST['email'],
        'service_price' => $_POST['service_price'],
    ];

    $name = validate($_POST['name']);
    $email = validate($_POST['email']);
    $phone = validate($_POST['phone']);
    $service_name = validate($_POST['service_name']);
    $message = validate($_POST['message']);
    $address = validate($_POST['address']);
    $rooms = validate($_POST['sizes']);

    $query = "INSERT INTO `service_enquires`(`name`, `email`, `phone`, `service_name`, `message`, `address`, `rooms`) 
    VALUES ('$name','$email','$phone','$service_name','$message','$address','$rooms')";

    $result = mysqli_query($conn, $query);

    if ($result) {
        redirect('payment.php', 'Enquiry sent successfully. We will get back to you soon.');
    } else {
        error_log("Query Error: " . mysqli_error($conn), 3, "error_log.txt");
        redirect(
            'error.php',
            'Something went wrong, try again later'
        );
    }
}

//---------------------------------------------------payment button

if (isset($_POST['paymentBtn'])) {
    $service_id = $_POST['service_id'];
    $advance_amount = $_POST['advance_amount'];
    $card_holder_name = $_POST['card_holder_name'];
    $card_number = $_POST['card_number'];

    $query = "INSERT INTO `payment` (`service_id`, `advance_amount`, `card_holder_name`, `card_number`)
            VALUES ('$service_id', '$advance_amount', '$card_holder_name', '$card_number')";

    $result = mysqli_query($conn, $query);

    if ($result) {
        unset($_SESSION['inquiry']);
        redirect('thankyou.php', 'Payment successful!');
    } else {
        error_log("Query Error: " . mysqli_error($conn), 3, "error_log.txt");
        redirect(
            'error.php',
            'Something went wrong, try again later'
        );
    }
}

//---------------------------------------------------real estate agent
if (isset($_POST['become_agent_btn'])) {
    $name = validate($_POST['name']);
    $experience = validate($_POST['experience']);
    $short_description = validate($_POST['short_description']);
    $long_description = validate($_POST['long_description']);
    $phone = validate($_POST['phone']);
    $email = validate($_POST['email']);
    $password = validate($_POST['password']);
    $address = validate($_POST['address']);

    if ($_FILES['image']['size'] > 0) {
        $file_name = $_FILES['image']['name'];
        $temp_name = $_FILES['image']['tmp_name'];
        $finalImage = 'assets/uploads/agent/' . $file_name;  //folder, we do because when we fetch image we don't need to redeclare the path
        $folder = 'assets/uploads/agent/' . $file_name;
    } else {
        $finalImage = NULL;
    }

    $query = "INSERT INTO `agent`(`name`, `profile`, `experience`, `short_description`, `long_description`, `phone`, `email`, `password`, `address`)
            VALUES ('$name','$finalImage','$experience','$short_description','$long_description','$phone','$email','$password','$address')";

    $result = mysqli_query($conn, $query);

    if ($result) {
        if (move_uploaded_file($temp_name, $folder)) {
            $_SESSION['is_agent'] = true;
            if ($_SESSION['loggedInUser']['name'] != $name) {
                unset($_SESSION['loggedInUser']);
                $_SESSION['loggedInUser'] = [
                    'name' => $name,
                    'email' => $email
                ];
            }
            if (isset($_SESSION['is_agent'])) {
                redirect('agents.php', '');
            } else {
                error_log("Query Error: " . mysqli_error($conn), 3, "error_log.txt");
                redirect('home.php', 'You are not an agent.');
            }
        } else {
            if (!is_dir($folder)) {
                error_log("Folder does not exist: $folder\n", 3, "error_log.txt");
                redirect('error.php', 'Failed to add agent');
            }
        }
    } else {
        error_log("Query Error: " . mysqli_error($conn), 3, "error_log.txt");
        redirect(
            'error.php',
            'Something went wrong, try again later'
        );
    }
}

if (isset($_POST['addFeedBack'])) {
    $name = validate($_POST['name']);
    $message = validate($_POST['message']);

    $sql = "INSERT INTO feedback (name, message) VALUES ('$name', '$message')";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        redirect("thankyou.php", "for feedback $name");
    } else {
        redirect("error.php", "Failed to add feedback, try again later.");
    }
}

// logout session-------------------
if (isset($_POST['logout'])) {
    if (isset($_SESSION['auth'])) {
        logoutSession();
        redirect('index.php', 'Logged out in successfully');
    } else {
        echo 'something went wrong';
    }
} else {
    redirect('index.php', 'You are not logged in');
}