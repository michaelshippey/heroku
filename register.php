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

?>

    <div  id = "content">
            <table id = "signuptbl"> 
                <tr> 
                    <td width = "60%" valign="top">
                        <h2>Welcome to Michael Shippey Media!</h2>
                    </td>
                    <td width = "40%" valign="top">
                        <h2> Sign up Today!</h2>

                        <form action = "registerProcess.php" method = "POST">
                            <input value = "<?php echo $firstname_preset; ?>"  type = "textbox" id ="fname" name ="fname" size = "25" placeholder="First Name" /> <br /><br />
                            <input value = "<?php echo $lastname_preset; ?>"  type = "textbox" id ="lname" name ="lname" size = "25" placeholder="Last Name" /> <br /><br />
                            <input value = "<?php echo $email_preset; ?>"  type = "textbox" id ="email" name ="email" size = "25" placeholder="Email Address" /> <br /><br />
                            <input value = "<?php echo $email2_preset; ?>"  type = "textbox" id ="email2" name ="email2" size = "25" placeholder="Confirm Email" /> <br /><br />
                            <input value = "<?php echo $username_preset; ?>"  type = "textbox" id ="username" name ="username" size = "25" placeholder="Username" /> <br /><br />
                            <input value = "<?php echo $password_preset; ?>"  type = "password" id ="password" name ="password" size = "25" placeholder="Password" /> <br /><br />
                            <input value = "<?php echo $password2_preset; ?>"  type = "password" id ="password2" name ="password2" size = "25" placeholder="Confirm Password" /> <br /><br />
                            <input type = "submit" name = "register" value = "Sign up!">  <br /><br />

                        </form>
                        <div href ="login.php"> Already have an Account? </div>

                        <?php 

                            if (isset($_SESSION['errors'])) {
                                foreach ($_SESSION['errors'] as $errors) {
                                    echo "<div id='error'>{$errors}</div>";
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