<?php 
error_reporting(E_ALL);
session_start();
include_once('header.php');
    $username1_preset = "";
    $password1_preset = "";

    if (isset($_SESSION['userForm'])) {
        $username1_preset = $_SESSION['userForm']['myname'];
        $password1_preset = $_SESSION['userForm']['mypword'];
    }

?>
        <div  id = "content">
        <h2>Welcome!</h2> 
          <form id = "formbox" action = "loginHandler.php" method ="POST">
            <h2>Username</h2> <input value ="<?php echo $username1_preset; ?>" type="textbox" name = "myname"> </br>
            <h2>Password</h2> <input value ="<?php echo $password1_preset; ?>" type="password" name = "mypword"><br /><br />
            <input type = "submit" name = "submit" value = "Login"><br /><br />
            <a href = "register.php"> Don't have an Account? </a>
            <?php
              if (isset($_SESSION['loginError'])) {
                echo "<div id='error'>{$_SESSION['loginError']}</div>";
                unset($_SESSION['loginError']);
              }
              if (isset($_SESSION['errors1'])) {
                foreach ($_SESSION['errors1'] as $errors1) {
                    echo "<div id='error'>{$errors1}</div>";
                }
                unset($_SESSION['errors1']);
            }
        ?>

          </form>
          
        </div>
        

<?php 

  include_once('footer.php');
?>