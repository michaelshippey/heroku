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
         $connection = new PDO("mysql:host={$this->host};dbname={$this->dbname}", $this->username, $this->password);
      } catch (Exception $e) {
        $this->logger->LogError("Couldn't connect to the database: " . $e->getMessage());
        return null;
      }
      return $connection;
    }

    public function login($username){
      $conn = $this->getConnection();
      $saveQuery = "SELECT * FROM users where username like '$username'";
      if (mysql_num_rows($saveQuery) == 1) {
        $q = $conn->prepare($saveQuery);
        $q->bindParam(":username", $username);
        $_SESSION['auth'] = true;
        echo "Username already exists";
    
        exit;
      }
      else{
        $_SESSION['auth'] = false;
        $_SESSION['message'] = "Invalid username or password";
      }

    }
    
    public function saveUser($firstname, $lastname, $email, $username, $password){
      try {
        $this->logger->LogDebug("Saving a user [{$firstname}]");
        $conn = $this->getConnection();
        $saveQuery ="INSERT INTO users(username,first_name,last_name,email,password
				values(:username:firstname,:lastname,:email,:password)";
				
        
        $q = $conn->prepare($saveQuery);
        $q->bindParam(":username", $username);
        $q->bindParam(":firstname", $firstname);
        $q->bindParam(":lastname", $lastname);
        $q->bindParam(":email", $email);
        $q->bindParam(":password", $password);
        $q->execute();
      }  catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
      }
   
    }



     // mysql://b517badf6a35ba:66daf5f2@us-cdbr-iron-east-04.cleardb.net/heroku_e5491682d442867?reconnect=true
}
?>