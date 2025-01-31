<?php
require 'config/function.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php if (isset($pageTitle)) {
                                            echo $pageTitle;
                                        } else {
                                            echo webSetting('meta_description') ?? 'Meta Desc';
                                        } ?>">
    <meta name="keyword" content="<?php if (isset($pageTitle)) {
                                        echo $pageTitle;
                                    } else {
                                        echo webSetting('meta_keyword') ?? 'Meta Keyword';
                                    } ?>">

    <title><?php if (isset($pageTitle)) {
                echo $pageTitle;
            } else {
                echo webSetting('title') ?? 'Device Services';
            } ?></title>

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="icon" type="image/png" href="images/favicon.png">
</head>

<body>
    <?php include("navbar.php"); ?>