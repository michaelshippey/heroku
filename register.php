<?php 
error_reporting(E_ALL);
session_start();
include("header.php"); 


    $firstname_preset = "";
    $lastname_preset = "";
    $comment_preset = "";
    $email_preset = "";
    $email2_preset = "";
    $username_preset = "";
    $password_preset = "";
    $password2_preset = "";


    
    if (isset($_SESSION['form'])) {
        $firstname_preset = $_SESSION['form']['fname'];
        $lastname_preset = $_SESSION['form']['lname'];
        $email_preset = $_SESSION['form']['email'];
        $email2_preset = $_SESSION['form']['email2'];
        $username_preset = $_SESSION['form']['username'];
        $password_preset = $_SESSION['form']['password'];
        $password2_preset = $_SESSION['form']['password2'];
    }


?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
$(document).ready(function() {
  $('.error').click(function() {
    $('.error').fadeOut("slow");
  });
  $('#success').click(function() {
    $('#success').fadeOut("slow");
  });

});
</script>
    <div  id = "content">
            <table id = "signuptbl"> 
                <tr> 
                    <td width = "60%" valign="top">
                        <h2>Welcome to Michael Shippey Media!</h2>
                    </td>
                    <td width = "40%" valign="top">
                        <h2> Sign up Today!</h2>

                        <form name="registerForm" action = "registerProcess.php" method = "POST">
                            <label for = "firstname1">Enter Your First Name: </label>
                            <input value = "<?php echo $firstname_preset; ?>"  type = "textbox" id ="fname" name ="fname" size = "25" placeholder="First Name" /> <br /><br />
                            <label for = "lastname1">Enter Your Last Name: </label>
                            <input value = "<?php echo $lastname_preset; ?>"  type = "textbox" id ="lname" name ="lname" size = "25" placeholder="Last Name" /> <br /><br />
                            <label for = "email1">Enter Your Email: </label>
                            <input value = "<?php echo $email_preset; ?>"  type = "textbox" id ="email" name ="email" size = "25" placeholder="Email Address" /> <br /><br />
                            <label for = "emailc">Enter Your Email Again: </label>
                            <input value = "<?php echo $email2_preset; ?>"  type = "textbox" id ="email2" name ="email2" size = "25" placeholder="Confirm Email" /> <br /><br />
                            <label for = "uname">Enter Your Username: </label>
                            <input value = "<?php echo $username_preset; ?>"  type = "textbox" id ="username" name ="username" size = "25" placeholder="Username" /> <br /><br />
                            <label for = "pword">Enter Your Password: </label>
                            <input value = "<?php echo $password_preset; ?>"  type = "password" id ="password" name ="password" size = "25" placeholder="Password" /> <br /><br />
                            <label for = "pword2">Enter Your Password Again: </label>
                            <input value = "<?php echo $password2_preset; ?>"  type = "password" id ="password2" name ="password2" size = "25" placeholder="Confirm Password" /> <br /><br />
                            <label for = "submit">Sign Up!: </label>
                            <input type = "submit" name = "register" value = "Sign up!">  <br /><br />
                            
                        </form>
                        <div><a href = "login.php"> Already have an Account? </a> </div>



                        <?php 

                            if (isset($_SESSION['errors'])) {
                                foreach ($_SESSION['errors'] as $errors) {
                                    echo "<div  id='error' class='error'>{$errors}</div>";
                                 }
                                 unset($_SESSION['errors']);
                            }
                            if (isset($_SESSION['success'])) {
                                echo "<div id='success'>{$_SESSION['success']}</div>";
                                unset($_SESSION['success']);
                              }
                            
                        ?>
                        
                    </td>
                </tr>
            </table>
        </div>
<?php include("footer.php"); ?>