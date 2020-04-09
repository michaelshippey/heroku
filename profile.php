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
   
    
    <div class = "postForm"> Create a Post below!
        <form action = "postHandler.php" method = "POST">
            <?php 

                if (isset($_SESSION['errors2'])) {
                    foreach ($_SESSION['errors2'] as $errors2) {
                        echo "<div id='error'>{$errors2}</div>";
                    }
                    unset($_SESSION['errors2']);
                }
                if (isset($_SESSION['successPost'])) {
                    echo "<div id='success'>{$_SESSION['successPost']}</div>";
                    unset($_SESSION['successPost']);
                }

            ?>

            <input value = "<?php echo $post_preset; ?>" type ="text" id="post" name="posted" /> </br>
            <input type="submit" value="Post"/>
        </form>
       
   
    </div>
    <div class = "profilePosts"> View Your Posts Here! 
    
    
    <ul>
    <?php
         $lines = $dao->getPosts();
    ?>
         <?php foreach($lines as $line): ?>
         <li><?=$line['username']?> </li>
         <?php endforeach ?>
    </ul>
    
    </div>

    <img src="profile_Picture.png" height = "250" width = "200" alt="<?php echo $_SESSION['username']; ?>'s Profile:" title="<?php echo $_SESSION['username']; ?>'s Profile" />
    <br />
    <div class = "textHeader"><? echo $_SESSION['username']; ?>'s Profile</div>
    
    </div>
   
<?php 
include_once('footer.php');
?>
