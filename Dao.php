<?php
class Dao {
    private $host = "us-cdbr-iron-east-04.cleardb.net"
    private $dbname = "heroku_e5491682d442867"
    private $username = "b517badf6a35ba"
    private $password = "66daf5f2"

    
    public function getConnection () {
        try {
            $connection = new PDO("mysql:host={$this->host};dbname={$this->dbname}", $this->username, $this->password);
         } catch (Exception $e) {
           echo print_r($e,1);
         }
         return $connection;
    }
     // mysql://b517badf6a35ba:66daf5f2@us-cdbr-iron-east-04.cleardb.net/heroku_e5491682d442867?reconnect=true
}