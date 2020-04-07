<?php 
session_start();

$username = $_POST['myname'];
$password = $_POST['mypword'];


?>
<?php 
include_once('header.php');
?>
         <div  id = "content">
        <h2>Welcome!</h2> 
          <form id = "formbox" action = "loginHandler.php" method ="POST">
            <h2>Username</h2> <input type="text" name = "myname"> </br>
            <h2>Password</h2> <input type="text" name = "mypword"><br /><br />
            <input type = "submit" name = "submit" value = "Login"><br /><br />
          </form>
        </div>

<?php 
include_once('footer.php');
?>