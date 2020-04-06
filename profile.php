<?php
session_start();

// check user login
if(!isset($_SESSION['user_id']) || !$_SESSION['user_id'])
{
    header("Location: register.php");
    exit;
}


?>
<html>
<head> 
<h1> Welcome   </h1>
</head>
</html>
