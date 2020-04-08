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
      $conn = $this->getConnection();
      $saveQuery = "SELECT*FROM users where username='$username' and password='$password'";
      $qResult = $conn->prepare($saveQuery);
      $qResult->execute();
      $count = $qResult->rowCount();
      return $count;
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
}
?>