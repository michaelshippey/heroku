<?php
// Start Session
session_start();

// check user login
if(!isset($_SESSION['user_id']))
{
    header("Location: register.php");
}

require_once 'Dao.php';
$dao = new Dao();
$user = $dao->userInfo($_SESSION['user_id']); 
?>
<html>
<head> 
<h1> Welcome  <?php echo $user->name ?> </h1>
</head>
</html>
