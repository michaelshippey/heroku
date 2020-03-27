<?php
    session_start();

    $errors = array();

    $firstname = $_POST['fname'];
    $lastname = $_POST['lname'];
    $email= $_POST['email'];
    $email2 = $_POST['email2'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $password2 = $_POST['password2'];

    if(!ctype_alpha($username)) {
      $errors[] = "Error, alpha characters only in the username.";
    }

    if (strlen($_POST['fname']) ==  0) {
        $errors[] = "Error, First Name cannot be blank.";
    }
    if (strlen($_POST['lname']) ==  0) {
        $errors[] = "Error, Last Name cannot be blank.";
    }
    if (strlen($_POST['email']) ==  0) {
        $errors[] = "Error, Email cannot be blank.";
    }
    if (strlen($_POST['email2']) ==  0) {
        $errors[] = "Error, Email validation cannot be blank.";
    }
    if (strlen($_POST['username']) ==  0) {
        $errors[] = "Error, Username cannot be blank.";
    }
    if (strlen($_POST['password']) ==  0) {
        $errors[] = "Error, Password cannot be blank.";
    }
    if (strlen($_POST['password2']) ==  0) {
        $errors[] = "Error, Password validation cannot be blank.";
    }

?>