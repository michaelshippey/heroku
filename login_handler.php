<?php
    session_start();

    $firstname = $_POST['fname'];
    $lastname = $_POST['lname'];
    $email= $_POST['email'];
    $email2 = $_POST['email2'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $password2 = $_POST['password2'];

    
    $errors = array();

        if(!ctype_alpha($username)) {
            $errors[] = "Error, alpha characters only in the username.";
          }
      
          if(!ctype_alpha($firstname)) {
              $errors[] = "Error, alpha characters only in the first name.";
          }
      
          if(!ctype_alpha($lastname)) {
              $errors[] = "Error, alpha characters only in the last name.";
          }
      
      
          
          if (!preg_match("/^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,}$/",$email)) {
              $errors[] = "Error, Invalid email address!";
          }
      
          if (!preg_match("/^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,}$/",$email2)) {
              $errors[] = "Error, Invalid validation email address!";
          }
      
          if($email != $email2){
              $errors[] = "Error, emails do not match!";
          }
      
          if($password != $password2){
              $errors[] = "Error, passwords do not match!";
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
      
          if (0 < count($errors)) {
              $_SESSION['form'] = $_POST;
              $_SESSION['errors'] = $errors;
              header("Location: https://michaelshippey.herokuapp.com/homepage.php");
              exit;
            }
    
    unset($_SESSION['form']);

    require_once 'Dao.php';
    $dao = new Dao();
    $dao->saveUser($_POST['fname'], $_POST['lname'],
    $_POST['email'], $_POST['username'], $_POST['password']);
    header("Location: https://michaelshippey.herokuapp.com/homepage.php");
    exit;
?>