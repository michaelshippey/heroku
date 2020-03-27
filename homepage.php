<?php 
session_start();
include("header.php"); 
?>

    <div  id = "content">
            <table id = "signuptbl"> 
                <tr> 
                    <td width = "60%" valign="top">
                        <h2>Welcome to Michael Shippey Media!</h2>
                    </td>
                    <td width = "40%" valign="top">
                        <h2> Sign up Today!</h2>

                        <?php 

                            if (isset($_SESSION['message'])) {
                                echo "<div id='error'>{$_SESSION['message']}</div>";
                                unset($_SESSION['messsage']);
                            }

                        ?>
                        <form action = "login_handler.php" method = "POST">
                            <input type = "textbox" id ="fname" name ="fname" size = "25" placeholder="First Name" /> <br /><br />
                            <input type = "textbox" id ="lname" name ="lname" size = "25" placeholder="Last Name" /> <br /><br />
                            <input type = "textbox" id ="email" name ="email" size = "25" placeholder="Email Address" /> <br /><br />
                            <input type = "textbox" id ="email2" name ="email2" size = "25" placeholder="Email Address (confirm)" /> <br /><br />
                            <input type = "textbox" id ="username" name ="username" size = "25" placeholder="Username" /> <br /><br />
                            <input type = "password" id ="password" name ="password" size = "25" placeholder="Password" /> <br /><br />
                            <input type = "password" id ="password2" name ="password2" size = "25" placeholder="Password (confirm)" /> <br /><br />
                            <input type = "submit" name = "submit" value = "Sign up!">  <br /><br />
                        </form>
                    </td>
                </tr>
            </table>
        </div>
<?php include("footer.php"); ?>