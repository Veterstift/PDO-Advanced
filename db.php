<?php

class DB {
    private $pdo;

    public function __construct($servername = "localhost", $username = "root", $password = "")
    {
        try {
            $this->pdo = new PDO("mysql:host=$servername;dbname=pdo-advanced", $username, $password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Connected successfully";
        } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }
}

//$database = new DB();

?>