<?php
session_start();

$errors1 = array();

        $username1 = $_POST['myname'];
        $password = $_POST['mypword'];


        if (strlen($_POST['myname']) ==  0) {
            $errors1[] = "Error, Username cannot be blank.";
        }
        if (strlen($_POST['mypword']) ==  0) {
            $errors1[] = "Error, Password cannot be blank.";
        }
      
        if (0 < count($errors)) {
            $_SESSION['userForm'] = $_POST;
            $_SESSION['errors1'] = $errors1;
            header("Location: https://michaelshippey.herokuapp.com/login.php");
            exit;
        }
       
            require_once 'Dao.php';
            $dao = new Dao();
            unset($_SESSION['userForm']);
            $dao->login($_POST['username'], $_POST['password']);

?>