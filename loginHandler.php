<?php
session_start();

$errors1 = array();

        if (strlen($_POST['myname']) ==  0) {
            $errors1[] = "Error, Username cannot be blank.";
        }
        if (strlen($_POST['mypword']) ==  0) {
            $errors1[] = "Error, Password cannot be blank.";
        }
      
        if (0 < count($errors1)) {
            $_SESSION['userForm'] = $_POST;
            $_SESSION['errors1'] = $errors1;
            header("Location: https://michaelshippey.herokuapp.com/login.php");
            exit;
        }
       
            require_once 'Dao.php';
            $dao = new Dao();
            $dao->login($_POST['myname'], $_POST['mypword']);

?>