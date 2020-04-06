<?php 
session_start();


$firstname = $_POST['fname'];
$lastname = $_POST['lname'];
$email= $_POST['email'];
$email2 = $_POST['email2'];
$username = $_POST['username'];
$password = $_POST['password'];
$password2 = $_POST['password2'];





require_once 'Dao.php';

try {
    $dao = new Dao();
    $dao->getConnection();
    $dao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $dao->login($_POST['username'], $_POST['password']);
    header("Location: https://michaelshippey.herokuapp.com/login.php");
    exit;
} catch(PDOException $Exception){
    throw new MyDatabaseException( $Exception->getMessage( ) ,
    (int)$Exception->getCode( ) );
}
    

?>
<?php 
include_once('header.php');
?>
        <div  id = "content">
          <form id = "formbox">
            <h2>Username</h2> <input type="text" name = "myname"> </br>
            <h2>Password</h2> <input type="text" name = "mypword"><br /><br />
            <input type = "submit" name = "submit" value = "Login"><br /><br />
          </form>
        </div>

<?php 
include_once('footer.php');
?>