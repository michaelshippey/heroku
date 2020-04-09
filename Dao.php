<?php

require_once 'KLogger.php';

class Dao {

    private $host = "us-cdbr-iron-east-04.cleardb.net";
    private $dbname = "heroku_e5491682d442867";
    private $username1 = "b517badf6a35ba";
    private $password1 = "66daf5f2";
    private $logger;

    public function __construct() {
      $this->logger = new KLogger("log.txt", KLogger::WARN);
    }

    public function getConnection() {
      try {
         $connection = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->username1, $this->password1);
      } catch (Exception $e) {
        $this->logger->LogError("Couldn't connect to the database: " . $e->getMessage());
        return null;
      }
      return $connection;
    }

    public function login($username , $password){
      $this->logger->LogDebug("Logging in user [{$username}]");
      $conn = $this->getConnection();
      $saveQuery = "SELECT*FROM users where username=:username and password=:password";
      $qResult = $conn->prepare($saveQuery);
      $qResult->bindParam(":username", $username);
      $qResult->bindParam(":password", $password);
      $qResult->execute();
      if($qResult->rowCount() > 0){
        unset($_SESSION['userForm']);
        $_SESSION['username'] = $_POST['myname'];
        $_SESSION['auth'] = true;
        header("Location: https://michaelshippey.herokuapp.com/profile.php");
        exit;
      }else{
        $_SESSION['auth'] = false;
        $_SESSION['loginError'] = "Invalid Username or Password.";
        header("Location: https://michaelshippey.herokuapp.com/login.php");
      }
      
    }
    
    public function saveUser($firstname, $lastname, $email, $username, $password){
        $id ='';
        $this->logger->LogDebug("Saving a user [{$username}]");
        $conn = $this->getConnection();
        $saveQuery ="INSERT INTO users
				VALUES (:id,:username,:firstname,:lastname,:email,:password)";
        $q = $conn->prepare($saveQuery);
        $q->bindParam(":id", $id);
        $q->bindParam(":username", $username);
        $q->bindParam(":firstname", $firstname);
        $q->bindParam(":lastname", $lastname);
        $q->bindParam(":email", $email);
        $q->bindParam(":password", $password);
        $q->execute();
    }

  public function savePost($username, $comment){
    $now ="NOW()"
    $this->logger->LogDebug("Saving a post [{$comment}]");
    $conn = $this->getConnection();
    $saveQuery = "INSERT INTO posts VALUES (:username, :comment, :now)"
    $qResult = $conn->prepare($saveQuery);
    $qResult->bindParam(":username", $username);
    $qResult->bindParam(":comment", $comment);
    $qResult->bindParam(":now", $now);
    $qResult->execute();
  }

  public function getPosts($username) {
    $conn = $this->getConnection();
    if(is_null($conn)) {
      return;
    }
    try {
     return $conn->query("SELECT*FROM posts where username=:username order by date_entered desc");
    } catch(Exception $e) {
      echo print_r($e,1);
      exit;
    }
  }
}
?>