<?php

class DB {
    private $pdo; // public om deze waarde buiten de klasse te kunnen gebruiken

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

    /*
    public function insertPersoon($naam, $geboortedatum)
    {
        $stmt = $this->pdo->prepare("INSERT INTO persoon (naam, geboortedatum) VALUES (:naam, :geboortedatum)");
        $stmt->execute([
            "naam" => $naam,
            "geboortedatum" => $geboortedatum
        ]);
    }*/

    public function insertProduct($productnaam, $prijs)
    {
        $stmt = $this->pdo->prepare("INSERT INTO producten (productnaam, prijs) VALUES (:productnaam, :prijs)");
        $stmt->execute([
            "productnaam" => $productnaam,
            "prijs" => $prijs
        ]);
    }
}

$pdo = new DB();

?>