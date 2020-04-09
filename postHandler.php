<?php

  session_start();
  $errors2 = array();
  $comment = $_POST['post'];

    if (strlen($_POST['post']) ==  0) {
        $errors2[] = "Error, Posts cannot be blank.";
    }

    if (strlen($_POST['post']) > 256) {
        $errors2[] = "Error, Posts cannot be longer than 256 characters.";
    }

    if (0 < count($errors2)) {
        $_SESSION['postForm1'] = $_POST;
        $_SESSION['errors2'] = $errors2;
        header("Location: https://michaelshippey.herokuapp.com/profile.php");
        exit;
    }

    require_once 'Dao.php';
    $dao = new Dao();
    $dao->savePost($_SESSION['username'], $comment);
    unset($_SESSION['postForm']);
    $_SESSION['successPost'] = "Post saved successfully";
    header("Location: https://michaelshippey.herokuapp.com/profile.php");
    exit;

    ?>