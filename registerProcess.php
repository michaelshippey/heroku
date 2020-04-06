<?php
    session_start();
    
    $errors = array();

    // check for register new user request

        $firstname = trim($_POST['fname']);
        $lastname = trim($_POST['lname']);
        $email= trim($_POST['email']);
        $email2 = trim($_POST['email2']);
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);
        $password2 = trim($_POST['password2']);



        if(!ctype_alpha($username)) {
            $errors[] = "Error, alpha characters only in the username.";
        }
      
        else if(!ctype_alpha($firstname)) {
            $errors[] = "Error, alpha characters only in the first name.";
        }
      
        else if(!ctype_alpha($lastname)) {
            $errors[] = "Error, alpha characters only in the last name.";
        }
      
      
          
        else if (!preg_match("/[-0-9a-zA-Z.+_]+@[-0-9a-zA-Z.+_]+.[a-zA-Z]{2,4}/",$email)) {
            $errors[] = "Error, Invalid email address!";
        }
      
        else if (!preg_match("/[-0-9a-zA-Z.+_]+@[-0-9a-zA-Z.+_]+.[a-zA-Z]{2,4}/",$email2)) {
            $errors[] = "Error, Invalid validation email address!";
        }

        if($email != $email2){
            $errors[] = "Error, emails do not match!";
        }
      
        else if($password != $password2){
            $errors[] = "Error, passwords do not match!";
        }
      
      
        else if (strlen($_POST['fname']) ==  0) {
            $errors[] = "Error, First Name cannot be blank.";
        }

        else if (strlen($_POST['lname']) ==  0) {
            $errors[] = "Error, Last Name cannot be blank.";
        }

        else if (strlen($_POST['email']) ==  0) {
            $errors[] = "Error, Email cannot be blank.";
        }

        else if (strlen($_POST['email2']) ==  0) {
            $errors[] = "Error, Email validation cannot be blank.";
        }
        else if (strlen($_POST['username']) ==  0) {
            $errors[] = "Error, Username cannot be blank.";
        }
        else if (strlen($_POST['password']) ==  0) {
            $errors[] = "Error, Password cannot be blank.";
        }
        else if (strlen($_POST['password2']) ==  0) {
            $errors[] = "Error, Password validation cannot be blank.";
        }
      
        else if (0 < count($errors)) {
            $_SESSION['errors'] = $errors;
            header("Location: https://michaelshippey.herokuapp.com/register.php");
            exit;
        }
        else {
            unset($_SESSION['form']);

            require_once 'Dao.php';
            $dao = new Dao();
            $user_id = $dao->saveUser($_POST['fname'], $_POST['lname'],
            $_POST['email'], $_POST['username'], $_POST['password']);
            // set session and redirect user to the profile page
            $_SESSION['user_id'] = $user_id;
            header("Location: https://michaelshippey.herokuapp.com/profile.php");
            exit;
        }
    
?>