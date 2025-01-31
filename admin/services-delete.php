<?php

include('config/function.php');

$confirmation = checkParamId('id');

if (is_numeric($confirmation)) {
    $id = validate($confirmation);
    $deleteServices = deleteQuery('services', $id);

    if ($deleteServices) {
        redirect('services.php', 'services deleted successfully');
    } else {
        redirect('services.php', 'Failed to delete service');
    }
} else {
    redirect('services.php', 'Something Went Wrong!');
}
