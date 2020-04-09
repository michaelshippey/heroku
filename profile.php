<?php
session_start();

if (!isset($_SESSION['auth']) || !$_SESSION['auth'])  {
	header("Location: https://michaelshippey.herokuapp.com/login.php");
    exit;
}

include_once("profileHeader.php");



$post_preset = "";


if (isset($_SESSION['postForm'])) {
    $post_preset = $_SESSION['postForm']['posted'];
}


?>
   
    
    <div class = "postForm"> Post form here ... 
        <form action = "postHandler.php" method = "POST">
            <input value = "<?php echo $post_preset; ?>" type ="text" id="post" name="posted" /> </br>
            <input type="submit" value="Post"/>
        </form>
   
    </div>
    <div class = "profilePosts"> Your Posts here ... 


    </div>
    <img src="profile_Picture.png" height = "250" width = "200" alt="<?php echo $_SESSION['username']; ?>'s Profile:" title="<?php echo $_SESSION['username']; ?>'s Profile" />
    <br />
    <div class = "textHeader"><? echo $_SESSION['username']; ?>'s Profile</div>


    </div>

    
<?php 
include_once('footer.php');
?>
