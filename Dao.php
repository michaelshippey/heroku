<?php

class Dao {

    private $host = "us-cdbr-iron-east-04.cleardb.net";
    private $dbname = "heroku_e5491682d442867";
    private $username1 = "b517badf6a35ba";
    private $password1 = "66daf5f2";

    
    public function getConnection () {
        try {
            $connection = new PDO("mysql:host={$this->host};dbname={$this->dbname}", $this->username1, $this->password1);
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
         } catch (PDOException $e) {
          die( $e->getMessage());
        }
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
        $conn = $this->getConnection();
        $saveQuery ="INSERT INTO users(username,first_name,last_name,email,password
				values(:username:first_name,:last_name,:email,:password)
				";
        
        $q = $conn->prepare($saveQuery);
        $q->bindParam(":username", $username);
        $q->bindParam(":first_name", $firstname);
        $q->bindParam(":last_name", $lastname);
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