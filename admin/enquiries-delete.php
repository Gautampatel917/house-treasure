<?php

include('config/function.php');

$confirmation = checkParamId('id');

if (is_numeric($confirmation)) {
    $id = validate($confirmation);
    $deleteEnquiry = deleteQuery('service_enquires', $id);

    if ($deleteEnquiry) {
        redirect('enquiries.php', 'services deleted successfully');
    } else {
        redirect('enquiries.php', 'Failed to delete service');
    }
} else {
    redirect('enquiries.php', 'Something Went Wrong!');
}
