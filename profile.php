<?php
session_start();
if (!isset($_SESSION['auth']) || !$_SESSION['auth'])  {
	header("Location: https://michaelshippey.herokuapp.com/login.php");
    exit;
}
include_once('header.php');

?>
    <div  id = "content">
    <h1> Welcome <?php echo $_SESSION['username']; ?>   </h1>

              
    </div>





<?php 
include_once('footer.php');
?>
