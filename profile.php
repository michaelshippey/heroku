<?php
session_start();
if (!isset($_SESSION['auth']) || !$_SESSION['auth'])  {
	header("Location: https://michaelshippey.herokuapp.com/login.php");
    exit;
}

include_once('profileHeader.php');


$post_preset = "";


if (isset($_SESSION['postForm'])) {
    $post_preset = $_SESSION['postForm']['send'];
}

require_once 'Dao.php';
$dao = new Dao();
?>
   
    
    <div class = "postForm"> Post form here ... 
        <form action = "postHandler.php" method = "post">
        <textarea id="post" name="post" rows="4" cols="58"></textarea>
        <input class = "postSubmit" type="submit" name="send"  id = "sendPost" value="Post Here">
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
    <div class = "profilePosts"> Your Posts here ... 
    <?php
         $lines = $dao->getComments();
            if (is_null($lines)) {
                    echo "There was an error.";
            } else {
         foreach ($lines as $line) {
           echo "<div> $line['content'] </div>";
          }
      }
      sleep(2);
      ?>

    </div>
    <img src="profile_Picture.png" height = "250" width = "200" alt="<?php echo $_SESSION['username']; ?>'s Profile:" title="<?php echo $_SESSION['username']; ?>'s Profile" />
    <br />
    <div class = "textHeader"><? echo $_SESSION['username']; ?>'s Profile</div>


<?php 
include_once('footer.php');
?>
