<?php
require 'config/function.php';

$parResult = checkParamId('id');
if (is_numeric($parResult)) {
    $userId =  validate($parResult);

    $user = getById('users', $userId);
    if ($user['status'] == 200) {
        $userDelete = deleteQuery('users', $userId);

        if ($userDelete) {
            redirect('users.php', 'User deleted successfully');
        } else {
            redirect('users.php', 'Something went wrong!');
        }
    } else {
        redirect('users.php', $user('message'));
    }
} else {
    redirect('users.php', $parResult);
}
