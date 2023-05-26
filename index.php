<?php

$servername = "localhost";
$username = "bit_academy";
$password = "CX650Turbo";

try {
    $db_conn = new PDO("mysql:host=$servername;dbname=netland", $username, $password);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Netland database</title>
    <link rel="stylesheet" href="index_style.css">
</head>
<body>
<h1>Netland Database</h1>


<div class="film_serie_optie">
<form method="POST" action="detail.php">
    <input id="film_serie_optie" type="submit" name="detail" value="Film/serie details">
</form>
<form method="POST" action="insert.php">
    <input id="nieuw_film_serie_optie" type="submit" name="insert" value="Nieuwe film/serie">
</form>

</body>
</html>