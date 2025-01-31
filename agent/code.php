<?php

include('config/function.php');
// include('config/dbconn.php');

if (isset($_POST['update-account'])) {
    $id = validate($_POST['id']);
    $name = validate($_POST['name']);
    $experience = validate($_POST['experience']);
    $short_description = validate($_POST['short_description']);
    $long_description = validate($_POST['long_description']);
    $phone = validate($_POST['phone']);
    $email = validate($_POST['email']);
    $password = validate($_POST['password']);
    $address = validate($_POST['address']);

    $agentData = getById('agent', $id);

    if ($_FILES['profile_picture']['size'] > 0) {
        $file_name = $_FILES['profile_picture']['name'];
        $temp_name = $_FILES['profile_picture']['tmp_name'];
        $finalImage = 'assets/uploads/agent/' . $file_name;
        $folder = '../assets/uploads/agent/' . $file_name;

        $path = '../assets/uploads/agent/';
        $deleteImg = $path . $agentData['data']['image'];

        if (file_exists($deleteImg)) {
            unlink($deleteImg);         //unlink are use for delete a image 
        }
    } else {
        $finalImage = $agentData['data']['profile'];
    }

    $query = "UPDATE `agent` SET
    name='$name',
    profile='$finalImage',
    experience='$experience',
    short_description='$short_description',
    long_description='$long_description',
    phone='$phone',
    email='$email',
    password='$password',
    address='$address'
    WHERE id= '$id'";

    $result = mysqli_query($conn, $query);

    if ($result) {
        if (move_uploaded_file($temp_name, $folder)) {
            redirect('account.php', 'Services Update Successfully');
        } else {
            error_log("\nQuery Error: " . 'fail to update file' . mysqli_error($conn), 3, "error_log.txt");
            redirect('index.php', 'Failed to update Services');
        }
    } else {
        error_log("\nQuery Error: " . mysqli_error($conn), 3, "error_log.txt");
        redirect('index.php', 'Something went wrong!!!');
    }
}

//-------------------------------------------------------response button

if (isset($_POST['response-btn'])) {
    $p_id = validate($_POST['property-id']);
    $p_enquiry_id = validate($_POST['property-enquiry-id']);
    $c_name = validate($_POST['c_name']);
    $c_email = validate($_POST['c_email']);
    $p_name = validate($_POST['p_name']);
    $agent_name = validate($_POST['agent_name']);
    $status = validate($_POST['status']);
    $response = validate($_POST['response']);

    $query = "INSERT INTO `response`(`p_enquiry_id`,`c_name`, `c_email`, `p_name`, `response`, `agent_name`, `status`) 
    VALUES ('$p_enquiry_id','$c_name','$c_email','$p_name','$response','$agent_name','$status')";

    $result = mysqli_query($conn, $query);

    if ($result) {
        $quiry1 = "INSERT INTO `deals`(`property_id`, `status`) 
        VALUES ('$p_id','$status')";

        $result1 = mysqli_query($conn, $quiry1);

        if ($result1) {
            redirect('inquiries.php', '');
        } else {
            error_log("\nQuery Error: " . mysqli_error($conn), 3, "error_log.txt");
        }
    } else {
        error_log("\nQuery Error: " . mysqli_error($conn), 3, "error_log.txt");
    }
}
