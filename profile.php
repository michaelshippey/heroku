<?php
session_start();
if (!isset($_SESSION['auth']) || !$_SESSION['auth'])  {
	header("Location: https://michaelshippey.herokuapp.com/login.php");
    exit;
}
include_once('profileHeader.php');

?>
   
    
    <div class = "postForm"> Post form here ... </div>
        <form action = "postHandler.php" method = "post">
        <textarea id="post" name="post" rows="4" cols="58"></textarea>
        <input class = "postSubmit" type="submit" name="send" value="Post Here">
        </form>
    <div class = "profilePosts"> Your Posts here ... </div>
    <img src="profile_Picture.png" height = "250" width = "200" alt="<?php echo $_SESSION['username']; ?>'s Profile:" title="<?php echo $_SESSION['username']; ?>'s Profile" />
    <br />
    <div class = "textHeader"><? echo $_SESSION['username']; ?>'s Profile</div>
    <div class = "profileLeftContent"><? echo $_SESSION['username']; ?>'s Content ...</div>

</div>



<?php 
include_once('footer.php');
?>
