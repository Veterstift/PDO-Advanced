<?php

require "../db.php";

if ($_SERVER["REQUEST_METHOD"] == 'POST') { // pas als het formulier ingevuld dan wordt de data opgeslagen in de database (ISSET)
    try {
        $productnaam = htmlspecialchars($_POST['productnaam']);
        $prijs = htmlspecialchars($_POST['prijs']);

        $pdo->insertProduct($productnaam, $prijs);
        echo "Product toegevoegd!";
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
    <title>Product insert</title>
</head>
<body>
    <form method="POST">
        <input type="text" name="productnaam" placeholder="Productnaam" required>
        <input type="text" name="prijs" placeholder="Prijs" required>
        <button type="submit">Toevoegen</button>
    </form>
</body>
</html>