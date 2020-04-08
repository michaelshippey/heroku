<?php
  session_start();
  session_destroy();
  header("Location: https://michaelshippey.herokuapp.com/login.php");
  exit;