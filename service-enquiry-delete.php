<?php

include('config/function.php');

$confirmation = checkParamId('id');

if (is_numeric($confirmation)) {
    $id = validate($confirmation);
    $deleteEnquiry = deleteQuery('service_enquires', $id);

    if ($deleteEnquiry) {
        redirect('service.php', '');
    } else {
        redirect('service.php', '');
    }
} else {
    redirect('enquiries.php', 'Something Went Wrong!');
}
