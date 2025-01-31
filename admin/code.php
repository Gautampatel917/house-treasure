<?php

use LDAP\Result;

include('config/function.php');
// include('config/dbconn.php');

if (isset($_POST['saveUser'])) {
    $name = validate($_POST['name']);
    $phone = validate($_POST['phone']);
    $email = validate($_POST['email']);
    $password = validate($_POST['password']);
    $role = validate($_POST['role']);
    $is_ban = validate($_POST['is_ban']) == true ? 1 : 0;

    if ($name != '' || $phone != '' || $email != '' || $password != '') {
        $hashPassword = password_hash($password, PASSWORD_BCRYPT);

        $query = "INSERT INTO users(name,phone,email,password,is_ban,role) 
        VALUES ('$name','$phone','$email','$hashPassword','$is_ban','$role')";

        $result = mysqli_query($conn, $query);

        if ($result) {
            redirect('users.php', 'User/Admin Added Successfully');
        } else {
            redirect('users-create.php', 'Some went wrong!!!');
        }
    } else {
        redirect("users-create.php", "Please fill the all the input fields");
    }
}

//Edit user data

if (isset($_POST['updateUser'])) {
    $name = validate($_POST['name']);
    $phone = validate($_POST['phone']);
    $email = validate($_POST['email']);
    $password = validate($_POST['password']);
    $is_ban = validate($_POST['is_ban']) == true ? 1 : 0;
    $role = validate($_POST['role']);
    $userId = validate($_POST['userId']);

    if ($name != '' || $phone != '' || $email != '' || $password != '') {
        $hashPassword = password_hash($password, PASSWORD_BCRYPT);

        $query = "UPDATE users SET
        name='$name',
        phone='$phone',
        email='$email',
        password='$hashPassword',
        is_ban='$is_ban',
        role='$role' WHERE id='$userId'";

        $result = mysqli_query($conn, $query);

        if ($result) {
            redirect('users.php', 'User/Admin updated Successfully');
        } else {
            redirect('users.php', 'Some went wrong!!!');
        }
    } else {
        redirect("users-create.php", "Please fill the all the input fields");
    }
}

//---------------------------------CRUD for settings

if (isset($_POST['saveSetting'])) {
    $title = validate($_POST['title']);
    $slug = validate($_POST['slug']);
    $small_description = validate($_POST['small_description']);

    $meta_description = validate($_POST['meta_description']);
    $meta_keyword = validate($_POST['meta_keyword']);

    $email1 = validate($_POST['email1']);
    $email2 = validate($_POST['email2']);
    $phone1 = validate($_POST['phone1']);
    $phone2 = validate($_POST['phone2']);
    $address = validate($_POST['address']);

    $settingId = validate($_POST['settingId']);

    if ($settingId == 'insert') {
        $query = "INSERT INTO `settings`(`title`, `slug`, `small_description`, `meta_description`, `meta_keyword`, `email1`, `email2`, `phone1`, `phone2`, `address`)
                VALUES ('$title', '$slug', '$small_description', '$meta_description', '$meta_keyword', '$email1', 
                '$email2', '$phone1', '$phone2', '$address')";

        $result = mysqli_query($conn, $query);
        if ($result) {
            redirect('settings.php', 'Settings save successfully');
        } else {
            redirect('settings.php', 'Something went wrong');
        }
    }

    if (is_numeric($settingId)) {
        $query = "UPDATE `settings` SET `title`='$title',
        `slug`='$slug', `small_description`='$small_description', `meta_description`='$meta_description',
        `meta_keyword`='$meta_keyword', `email1` = '$email1', `email2` = '$email2',
        `phone1`='$phone1', `phone2`='$phone2', `address`='$address' WHERE `id`= '$settingId'";

        $result = mysqli_query($conn, $query);
        if ($result) {
            redirect('settings.php', 'Settings save successfully');
        } else {
            redirect('settings.php', 'Something went wrong');
        }
    }
}

// //-----------------add social media -------------------------------
// if (isset($_POST['saveSocialMedia'])) {
//     $name = validate($_POST['social_media_name']);
//     $url = validate($_POST['url']);
//     $status = validate($_POST['status']);

//     if ($name != '' || $url != '' || $status != '') {
//         $query = "INSERT INTO social_medias(name,url,status) 
//         VALUES ('$name', '$url', '$status')";

//         $result = mysqli_query($conn, $query);

//         if ($result) {
//             redirect('social-media.php', 'Social Media Added Successfully');
//         } else {
//             redirect('social-media.php', 'Something went wrong!!!');
//         }
//     } else {
//         redirect("social-media-create.php", "Please fill the all the input fields");
//     }
// }

// if (isset($_POST['updateSocialMedia'])) {
//     $name = validate($_POST['name']);
//     $url = validate($_POST['url']);
//     $status = validate($_POST['status']) == true ? 1 : 0;
//     $id = validate($_POST['socialId']);

//     if ($name != '' || $url != '') {
//         $query = "UPDATE social_medias SET
//         name='$name',
//         url='$url',
//         status='$status'
//         WHERE id='$id'";

//         $result = mysqli_query($conn, $query);

//         if ($result) {
//             redirect('social-media.php', 'updated Successfully');
//         } else {
//             redirect('social-media.php', 'Some went wrong!!!');
//         }
//     } else {
//         redirect("social-media-create.php", "Please fill the all the input fields");
//     }
// }

//----------------------------------------------crud operation for properties----------------

if (isset($_POST['saveProperty'])) {
    $title = validate($_POST['title']);
    $slug = str_replace(' ', '-', strtolower($title));
    $landmark = validate($_POST['landmark']);
    $short_info = validate($_POST['short_info']);
    $description = validate($_POST['description']);
    $price = validate($_POST['price']);
    $city = validate($_POST['city']);
    $postcode = validate($_POST['postcode']);
    $address = validate($_POST['address']);
    $property_type = validate($_POST['property_type']);
    $bedrooms = validate($_POST['bedrooms']);
    $rooms = validate($_POST['rooms']);
    $area = validate($_POST['area']);
    $buildingYear = validate($_POST['buildingYear']);
    $total_flor = validate($_POST['total_flor']);
    $city = ucfirst($city);


    if ($_FILES['image']['size'] > 0) {
        $file_name = $_FILES['image']['name'];
        $temp_name = $_FILES['image']['tmp_name'];
        $finalImage = 'assets/uploads/property/' . $file_name;  //folder, we do because when we fetch image we don't need to redeclare the path
        $folder = '../assets/uploads/property/' . $file_name;
    } else {
        $finalImage = NULL;
    }

    $status = validate($_POST['status']) == true ? 1 : 0;

    $query = "INSERT INTO `properties`(`title`, `slug`, `landmark`, `short_info`, `description`, `price`, `city`, `postcode`, `address`, `property_type`, `bedrooms`, `rooms`, `area`, `buildingYear`, `total_flor`, `image`, `status`) 
                            VALUES ('$title','$slug','$landmark','$short_info','$description','$price','$city','$postcode','$address','$property_type','$bedrooms','$rooms','$area','$buildingYear','$total_flor','$finalImage','$status')";

    $result = mysqli_query($conn, $query);

    if ($result) {
        if (move_uploaded_file($temp_name, $folder)) {
            redirect('properties.php', 'Property Added Successfully');
        } else {
            error_log("Image Upload Error: Failed to move uploaded file.\n", 3, "error_log.txt");
            redirect('properties.php', 'Failed to add property');
        }
    } else {
        error_log("\nQuery Error: " . mysqli_error($conn), 3, "error_log.txt");
        redirect('properties.php', 'Something went wrong!!!');
    }
}

//-----update property----------------

if (isset($_POST['updateProperty'])) {
    $title = validate($_POST['title']);
    $slug = str_replace(' ', '-', strtolower($title));
    $landmark = validate($_POST['landmark']);
    $short_info = validate($_POST['short_info']);
    $description = validate($_POST['description']);
    $price = validate($_POST['price']);
    $city = validate($_POST['city']);
    $postcode = validate($_POST['postcode']);
    $address = validate($_POST['address']);
    $property_type = validate($_POST['property_type']);
    $bedrooms = validate($_POST['bedrooms']);
    $rooms = validate($_POST['rooms']);
    $area = validate($_POST['area']);
    $buildingYear = validate($_POST['buildingYear']);
    $total_flor = validate($_POST['total_flor']);
    $city = ucfirst($city);

    $propertyId = validate($_POST['propertyId']);

    $property = getById('properties', $propertyId);


    if ($_FILES['image']['size'] > 0) {
        $file_name = $_FILES['image']['name'];
        $temp_name = $_FILES['image']['tmp_name'];
        $finalImage = 'assets/uploads/property/' . $file_name;  //folder, we do because when we fetch image we don't need to redeclare the path
        $folder = '../assets/uploads/property/' . $file_name;

        $path = '../assets/uploads/property/';
        $deleteImg = '../' . $property['data']['image'];

        if (file_exists($deleteImg)) {
            unlink($deleteImg);         //unlink are use for delete a image 
        }
    } else {
        $finalImage = NULL;
    }

    $status = validate($_POST['status']) == true ? 1 : 0;

    $query = "UPDATE properties SET 
    title='$title', 
    slug='$slug', 
    landmark='$landmark',
    short_info='$short_info',
    description='$description', 
    price='$price',
    city='$city',
    postcode='$postcode',
    address='$address', 
    property_type='$property_type', 
    bedrooms='$bedrooms',
    rooms='$rooms',
    area='$area', 
    buildingYear='$buildingYear', 
    total_flor = '$total_flor',
    image='$finalImage', 
    status='$status'
    WHERE id='$propertyId'"; //update query

    $result = mysqli_query($conn, $query);

    if ($result) {
        if (move_uploaded_file($temp_name, $folder)) {
            redirect('properties.php', 'Property Added Successfully');
        } else {
            error_log("Image Upload Error: Failed to move uploaded file.", 3, "error_log.txt");
            redirect('properties.php', 'Failed to update property');
        }
    } else {
        error_log("Query Error: " . mysqli_error($conn), 3, "error_log.txt");
        redirect('properties.php', 'Something went wrong!!!');
    }
}
// //-------------------------Create Services----------------------------------
// //------------------------upload image---------------------------------------------

if (isset($_POST['saveService'])) {
    $id = validate($_POST['id']);
    $name = validate($_POST['serviceName']);
    $slug = str_replace(' ', '-', strtolower($name)); // it's slug not slug note for next time
    $small_description = validate($_POST['small_description']);
    $long_description = validate($_POST['long_description']);

    if ($_FILES['image']['size'] > 0) {
        $file_name = $_FILES['image']['name'];
        $temp_name = $_FILES['image']['tmp_name'];
        $finalImage = 'assets/uploads/services/' . $file_name;  //folder, we do because when we fetch image we don't need to redeclare the path
        $folder = '../assets/uploads/services/' . $file_name;
    } else {
        $finalImage = NULL;
    }

    $one_bhk = validate($_POST['1bhk']);
    $two_bhk = validate($_POST['2bhk']);
    $three_bhk = validate($_POST['3bhk']);

    $status = validate($_POST['status']) == true ? 1 : 0;

    $query = "INSERT INTO services(name, slug, small_description, long_description, image, 1bhk, 2bhk, 3bhk, status) 
    VALUES ('$name','$slug','$small_description','$long_description','$finalImage','$one_bhk','$two_bhk','$three_bhk','$status')";

    $result = mysqli_query($conn, $query);

    if ($result) {
        if (move_uploaded_file($temp_name, $folder)) {
            redirect('services.php', 'Services Added Successfully');
        } else {
            redirect('services.php', 'Failed to Add Services');
        }
    } else {
        redirect('services.php', 'Something went wrong!!!');
    }
}

if (isset($_POST['updateService'])) {
    $serviceId = validate($_POST['serviceId']);
    $name = validate($_POST['serviceName']);
    $slug = str_replace(' ', '-', strtolower($name)); // it's slug not slug note for next time
    $small_description = validate($_POST['small_description']);
    $long_description = validate($_POST['long_description']);

    $service = getById('services', $serviceId);

    if ($_FILES['image']['size'] > 0) {
        $file_name = $_FILES['image']['name'];
        $temp_name = $_FILES['image']['tmp_name'];
        $finalImage = 'assets/uploads/services/' . $file_name;
        $folder = '../assets/uploads/services/' . $file_name;

        $path = '../assets/uploads/services/';
        $deleteImg = $path . $service['data']['image'];

        if (file_exists($deleteImg)) {
            unlink($deleteImg);         //unlink are use for delete a image 
        }
    } else {
        $finalImage = $service['data']['image'];
    }

    $one_bhk = validate($_POST['1bhk']);
    $two_bhk = validate($_POST['2bhk']);
    $three_bhk = validate($_POST['3bhk']);

    $status = validate($_POST['status']) == true ? 1 : 0;

    $query = "UPDATE services SET
    name = '$name',
    slug = '$slug',
    small_description = '$small_description', 
    long_description = '$long_description',
    image = '$finalImage',
    1bhk = '$one_bhk',
    2bhk = '$two_bhk',
    3bhk = '$three_bhk',
    status = '$status'
    WHERE id = '$serviceId'";

    $result = mysqli_query($conn, $query);

    if ($result) {
        if (move_uploaded_file($temp_name, $folder)) {
            redirect('services.php', 'Services Update Successfully');
        } else {
            redirect('services.php', 'Failed to update Services');
        }
    } else {
        redirect('services.php', 'Something went wrong!!!');
    }
}

//---------------------------------CRUD FOR Enquiries-------------------------------

if (isset($_POST['enquiriesUpdateStatus'])) {
    $c_name = validate($_POST['c_name']);
    $c_email = validate($_POST['c_email']);
    $s_name = validate($_POST['s_name']);
    $response = validate($_POST['response']);
    $status = validate($_POST['status']);
    $enquiryId = validate($_POST['enquiryId']);

    $query = "UPDATE service_enquires SET status = '$status' WHERE id = '$enquiryId'";
    $result = mysqli_query($conn, $query);
    if ($result) {
        $query1 = "INSERT INTO `response`(`c_name`, `c_email`, `s_name`, `response`,`status`)
        VALUES ('$c_name','$c_email','$s_name','$response','$status')";

        $result1 = mysqli_query($conn, $query1);
        if ($result1) {
            redirect('enquiries.php', 'Enquiry Status Update Successfully');
        } else {
            redirect('enquiries.php', 'Failed to update Enquiry Status');
        }
    } else {
        redirect('enquiries.php', 'Failed to update enquiry');
    }
} else {
    redirect('enquiries.php', 'Something Went wrong!!!');
}

// -------------------------Agent----------------------------------

if (isset($_POST['saveAgent'])) {
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
        $query1 = "INSERT INTO `response`(`c_name`, `c_email`, `s_name`, `response`,`status`)
        VALUES ('$c_name','$c_email','$s_name','$response','$status')";

        $result1 = mysqli_query($conn, $query1);
        if ($result1) {
            if (move_uploaded_file($temp_name, $folder)) {
                redirect('agent.php', 'Agent added successfully');
            } else {
                redirect("agent.php", "Failed to upload profile");
            }
        } else {
            redirect('agent.php', 'Failed to add agent');
        }
    } else {
        redirect('agent.php', 'Failed to add agent');
    }
} else {
    redirect('agents.php', 'Something Went wrong!!!');
}

//---------------------------------Update agent---------------------------------

if (isset($_POST['updateAgent'])) {
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

    if (
        $_FILES['profile_picture']['size'] > 0
    ) {
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
            error_log(
                "\nQuery Error: " . 'fail to update file' . mysqli_error($conn),
                3,
                "error_log.txt"
            );
            redirect('index.php', 'Failed to update Services');
        }
    } else {
        error_log(
            "\nQuery Error: " . mysqli_error($conn),
            3,
            "error_log.txt"
        );
        redirect('index.php', 'Something went wrong!!!');
    }
}
