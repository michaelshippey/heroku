<?php
require_once 'KLogger.php';

class Dao {
    private $host = "us-cdbr-iron-east-04.cleardb.net";
    private $dbname = "heroku_e5491682d442867";
    private $username = "b517badf6a35ba";
    private $password = "66daf5f2";
    private $logger;

    
    public function getConnection () {
        try {
            $connection = new PDO("mysql:host={$this->host};dbname={$this->dbname}", $this->username, $this->password);
         } catch (Exception $e) {
          $this->logger->LogError("Couldn't connect to the database: " . $e->getMessage());
          return null;
         }
         return $connection;
    }

    public function userExists($username){
      $conn = $this->getConnection();
      $saveQuery = "select * from users where username='$username'";;
      if (mysql_num_rows($saveQuery) == 1) {
        $_SESSION['auth'] = true;
        echo "Username already exists";
        mysqli_close($conn);
        exit();
      }
      else{
        $_SESSION['auth'] = false;
        $_SESSION['message'] = "Invalid username or password";
        header("Location: https://michaelshippey.herokuapp.com/homepage.php");
      }
    }
    public function saveUser($firstname, $lastname, $email, $username, $password){
      $conn = $this->getConnection();
      $saveQuery = "insert into users (username, first_name, last_name, 
      email, password) values (:username, :first_name, :lastname, :email, 
      :password)";
      
      $q = $conn->prepare($saveQuery);
      $q->bindParam(":username", $username);
      $q->bindParam(":first_name", $firstname);
      $q->bindParam(":last_name", $lastname);
      $q->bindParam(":email", $email);
      $q->bindParam(":first_name", $password);
      $q->execute();
    }



     // mysql://b517badf6a35ba:66daf5f2@us-cdbr-iron-east-04.cleardb.net/heroku_e5491682d442867?reconnect=true
}
?>