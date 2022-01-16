<?php
    session_start();

    if (!isset($_SESSION['current_user'])) {
        // if the current session has no user, then this will re-direct to the login page
        header('location: ../login.php');
    } else {
        // else create variable 'current_user' for this web-page
        $current_user = $_SESSION['current_user'];
    }

    if (isset($_GET['home'])) {
        // if user click on "home" button re-direct to the customer page
        header('location: customer.php');
    }

    if (isset($_GET['faq'])) {
        header('location: faq.php');
    }

    if (isset($_GET['contactus'])) {
        header('location: contactus.php');
    }

    if (isset($_GET['help'])) {
        header('location: help.php');
    }

    if (isset($_GET['logout'])) {
        session_destroy();
        header('location: customer.php');
    }
?>