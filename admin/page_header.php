<?php

    include('../functions/functions.php');
    include('../config/setup.php');

    session_start();

    $page = 'admin';

    if (isset($_GET['register'])) {
        // if the query has "register" keyword re-direct to the register_user.php
        header('location: register_user.php');
    }

    if (!isset($_SESSION['current_user'])) {
        // if the current session has no user, then this will re-direct to the login page
        header('location: ../login.php');
    } else {
        // else create variable 'current_user' for this web-page
        $current_user = $_SESSION['current_user'];
    }

    if (isset($_GET['home'])) {
        // if user click on "home" button re-direct to the admin page
        header('location: admin.php');
    }

    if (isset($_GET['logout'])) {
        session_destroy();
        header('location: admin.php');
    }

    if (isset($_GET['leads'])) {
        header('location: leads.php');
    }

    if (isset($_GET['customers'])) {
        header('location: customers.php');
    }

    if (isset($_GET['contacts'])) {
        header('location: contacts.php');
    }

    if (isset($_GET['deals'])) {
        header('location: deals.php');
    }

    if (isset($_GET['message'])) {
        $success = true;
        $txt = $_GET['msg'];
        $query = "INSERT INTO messages(messageId, userName, message, reply) VALUE (NULL, ".$_SESSION['current_user'].", '$txt', '')";
        if (executeQuery($query, $connection)) {
            echo 'added';
        } else {
            echo 'not added';
        }
    }

?>
