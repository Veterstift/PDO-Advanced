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

    public function insertPersoon($naam, $geboortedatum)
    {
        $stmt = $this->pdo->prepare("INSERT INTO persoon (naam, geboortedatum) VALUES (:naam, :geboortedatum)");
        $stmt->execute([
            "naam" => $naam,
            "geboortedatum" => $geboortedatum
        ]);
    }

    public function registerUser($naam, $email, $password)
    {
        $password = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $this->pdo->prepare("INSERT INTO user (naam, email, password) VALUES (:naam, :email, :password)");
        $stmt->execute([
            "naam" => $naam,
            "email" => $email,
            "password" => $password
        ]);
    }
    
    public function login($email)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM user (naam, email, password) VALUES (:naam, :email, :password)");
        $stmt->execute([
            "email" => $email
        ]);
        return $stmt->fetch();
    }

    public function insertProduct($naam, $password)
    {
        $stmt = $this->pdo->prepare("INSERT INTO product (naam, password) VALUES (:naam, :password)");
        $stmt->execute([
            "naam" => $naam,
            "password" => $password
        ]);
    }

    public function selectData()
    {
        $sql = "SELECT * FROM producten";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
    }

    public function getDataById($id)
    {
        $sql = "SELECT * FROM producten WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['$id']);
        return $stmt->fetch();
    }

    public function updateData($id, $naam, $prijs)
    {
        $sqlQuery = "UPDATE producten SET productnaam = :naam, prijs = :prijs WHERE id = :id";
        $stmt = $this->pdo->prepare($sqlQuery);

        // Bind parameters om SQL-injecties te voorkomen
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':naam', $naam);
        $stmt->bindParam(':prijs', $prijs);

        // Voer de query uit en geef bericht weer
        if ($stmt->execute()) {
            echo "Product bijgewerkt!";
        } else {
            echo "Product niet bijgewerkt!";
        }
    }

    // DELETE functie
    public function deleteData($id)
    {
        $sqlQuery = "DELETE FROM producten WHERE id = :id";
        $stmt = $this->pdo->prepare($sqlQuery);

        // Bind parameters
        $stmt->bindParam(':id', $id);

        // Voer de query uit en geef bericht weer
        if ($stmt->execute()) {
            echo "Product verwijderd!";
        } else {
            echo "Product niet verwijderd!";
        }
    }
}

$pdo = new DB();

?>