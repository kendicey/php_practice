<?php

require 'form1.php';

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($_POST['submit'] == 'submit') {
        $errors = validate_form();
        if ($errors) {
            display_form($errors);
        } else {
            confirm_form();
        }
    } elseif ($_POST['submit'] == 'Back') {
        display_form();
    } elseif ($_POST['submit'] == 'Confirm') {
        // foreach ($_SESSION as $key => $value) {
        //     unset($_SESSION[$key]);
        // }
        // echo "A brand new form";
        // display_form();
        process_form();
    }
} else {
    display_form();
}

?>