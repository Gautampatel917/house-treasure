<?php

include('config/function.php');

$confirmation = checkParamId('id');

if (is_numeric($confirmation)) {
    $id = validate($confirmation);
    $deleteProperty = deleteQuery('properties', $id);

    if ($deleteProperty) {
        redirect('properties.php', 'property deleted successfully');
    } else {
        redirect('properties.php', 'Failed to delete property');
    }
} else {
    redirect('properties.php', 'Something Went Wrong!');
}
