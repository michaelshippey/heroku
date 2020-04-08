<?php
session_start();
if(empty($_SESSION['username']))
{
    header("Location: https://michaelshippey.herokuapp.com/register.php");
}
include_once('header.php');

?>



<h1> Welcome <?php echo $_SESSION['username']; ?>   </h1>


<?php 
include_once('footer.php');
?>
