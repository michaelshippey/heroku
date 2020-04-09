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
            <input value = "<?php echo $post_preset; ?>" type ="text" id="post" name="posted" /> </br>
            <input type="submit" value="Post"/>
        </form>
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
   
    </div>
    <div class = "profilePosts"> View Your Posts Here!

    <?php
        $lines = $dao->getPosts($_SESSION['username']);
        if (is_null($lines)) {
            echo "There was an error.";
        } else {
            foreach ($lines as $line) {
            echo "<div class='userPost'> { $line['username']} {$line['content']}  {$line['date_entered']} </div>" ;
        }
      }
      sleep(2);
    ?>
    </div>

    <img src="profile_Picture.png" height = "250" width = "200" alt="<?php echo $_SESSION['username']; ?>'s Profile:" title="<?php echo $_SESSION['username']; ?>'s Profile" />
    <br />
    <div class = "textHeader"><? echo $_SESSION['username']; ?>'s Profile</div>


    </div>

    
<?php 
include_once('footer.php');
?>
