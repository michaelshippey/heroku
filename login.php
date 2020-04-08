<?php 
error_reporting(E_ALL);
session_start();
include_once('header.php');
    $username1_preset = "";
    $password1_preset = "";

    if (isset($_SESSION['userForm'])) {
        $username1_preset = $_SESSION['form']['username'];
        $password1_preset = $_SESSION['form']['password'];
    }

?>
        <div  id = "content">
        <h2>Welcome!</h2> 
          <form id = "formbox" action = "loginHandler.php" method ="POST">
            <h2>Username</h2> <input type="text" name = "myname"> </br>
            <h2>Password</h2> <input type="text" name = "mypword"><br /><br />
            <input type = "submit" name = "submit" value = "Login"><br /><br />
            <a href = "register.php"> Don't have an Account? </a>
          </form>
        </div>

<?php 

  if (isset($_SESSION['errors1'])) {
      foreach ($_SESSION['errors1'] as $errors1) {
          echo "<div id='error'>{$errors1}</div>";
      }
      unset($_SESSION['errors1']);
  }

  include_once('footer.php');
?>