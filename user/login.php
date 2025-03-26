<?php

    require "../db.php";

    try {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $login = $pdo->login($_POST['email']);
            if ($login) {
                
            }
        }
    } catch (PDOException $e) {
        echo $e;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <form method="POST">
        <input type="text" name="email" placeholder="Email" required>
        <input type="password" name="password" placeholder="Password" required>
        <input type="submit" value="Login">
    </form>
</body>
</html>