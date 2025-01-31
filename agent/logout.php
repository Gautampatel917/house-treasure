<?php

require 'config/function.php';
if (isset($_SESSION['auth'])) {
    logoutSession();
    redirect('../index.php', 'Logged out in successfully');
} else {
    echo 'something went wrong';
}
