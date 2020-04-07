<?php
session_start();

// check user login
if(!isset($_SESSION['user_id']) || !$_SESSION['user_id'])
{
    header("Location: register.php");

}


?>
<html>
<head> 
<h1> Welcome <?php echo $_SESSION['username']; ?>   </h1>
</head>
</html>
