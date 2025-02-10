<?php

require "../db.php";

if ($_SERVER["REQUEST_METHOD"] == 'POST') {
    try {
        $naam = htmlspecialchars($_POST['naam']);
        $geboortedatum = htmlspecialchars($_POST['geboortedatum']);

        $pdo->insertPersoon($naam, $geboortedatum);
        echo "Persoon toegevoegd!";
    } catch (PDOException $e) {
        echo "Er ging iets mis: " . $e->getMessage();
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="POST">
        
    </form>
</body>
</html>