<?php

    include('../functions/functions.php');
    include('../config/setup.php');

    session_start();

    if (isset($_GET['users'])) {
        // if the query has "register" keyword re-direct to the register_user.php
        header('location: users.php');
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

    // This will update an existing contact - contacts.php
    if (isset($_GET['update_contact'])) {
        $query = "UPDATE person SET fName='$_GET[fName]', lName='$_GET[lName]', email='$_GET[email]', phoneNo='$_GET[phone_no]', title='$_GET[title]' WHERE personID=$_GET[update_contact]";
        if (!executeQuery($query, $connection)) {
            echo 'Update failed!';
        }
    }

    // This will remove an existing contact from contact list - contacts.php
    if (isset($_GET['delete_contact'])) {
        $query = "DELETE FROM person WHERE personID=$_GET[delete_contact]";
        if (!executeQuery($query, $connection)) {
            echo 'Delete failed!';
        }
    }

    // This will remove a message from home page - admin.php
    if (isset($_GET['delete_message'])) {
        $query = "DELETE FROM messages WHERE messageID=$_GET[delete_message]";
        if (!executeQuery($query, $connection)) {
            echo 'Delete failed!';
        }
    }

    // This will make new contact as lead - leads.php
    if (isset($_GET['create_lead'])) {
        $query = "SELECT * FROM leads WHERE personID=$_GET[lead_person]";
        if (checkMatchingData($query, $connection)) {
            $query = "UPDATE leads SET status=2 WHERE personID=$_GET[lead_person]";
            executeQuery($query, $connection);
        } else {
            $query = "INSERT INTO leads VALUES (NULL, $_GET[lead_person], '$_GET[leadSource]', 2)";
            executeQuery($query, $connection);
        }

        header('location: '.$page.'.php');
    }

    // This will make new person as customer form leads - customer.php
    if (isset($_GET['create_customer'])) {
        $query = "SELECT * FROM leads WHERE personID=$_GET[customer_person]";
        if (checkMatchingData($query, $connection)) {
            $query = "UPDATE leads SET status=1 WHERE personID=$_GET[customer_person]";
            executeQuery($query, $connection);
        } else {
            $query = "INSERT INTO leads VALUE (NULL, $_GET[customer_person], '$_GET[leadSource]', 2)";
            executeQuery($query, $connection);
        }

        header('location: '.$page.'.php');
    }

    // This will remove an existing lead from leads list - leads.php
    if (isset($_GET['delete_lead'])) {
        $query = "UPDATE leads SET status=3 WHERE personID=$_GET[delete_lead]";
        if (!executeQuery($query, $connection)) {
            echo 'Update failed!';
        }
    }

    // This will create new contact from admin side - contacts.php
    if (isset($_GET['create_contact'])) {
        $fName = $_GET['fName'];
        $lName = $_GET['lName'];
        $phone = $_GET['phone_no'];
        $title = $_GET['title'];

        if ($fName == '' || $lName == '' || $phone == '' || $title == '') {
            header('location: '.$page.'.php');
        }

        $query = "INSERT INTO persons VALUES 
        (NULL, '$_GET[fName]', '$_GET[lName]', '$_GET[email]', '$_GET[phone_no]', '$_GET[title]')";
        executeQuery($query, $connection);

        header('location: '.$page.'.php');
    }

    if (isset($_GET['convert_lead'])) {
        $query = "UPDATE leads SET status=1 WHERE personID=$_GET[convert_lead]";
        executeQuery($query, $connection);

        header('location: '.$page.'.php');
    }

    if (isset($_GET['remove_customer'])) {
        $query = "UPDATE leads SET status=2 WHERE personID=$_GET[remove_customer]";
        executeQuery($query, $connection);

        header('location: '.$page.'.php');
    }

?>
