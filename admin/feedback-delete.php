<?php

include('config/function.php');

$confirmation = checkParamId('id');

if (is_numeric($confirmation)) {
    $id = validate($confirmation);
    $deleteEnquiry = deleteQuery('feedback', $id);

    if ($deleteEnquiry) {
        redirect('feedback.php', 'services deleted successfully');
    } else {
        redirect('feedback.php', 'Failed to delete service');
    }
} else {
    redirect('feedback.php', 'Something Went Wrong!');
}
