<?php

$servername = "localhost";
$username = "bit_academy";
$password = "CX650Turbo";

try {
    $db_conn = new PDO("mysql:host=$servername;dbname=netland", $username, $password);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

session_start();

if (isset($_POST["confirm"])) {
    $_SESSION["optie"] = $_POST["media"];
    if ($_SESSION["optie"] == "film") {
        echo "test film";
        $title = $_POST["titel"];
        $length_in_minutes = $_POST["length_in_minutes"];
        $released_at = $_POST["released_at"];
        $country_of_origin = $_POST["land"];
        $summary = $_POST["summary"];
        $youtube_trailer_id = $_POST["youtube_trailer_id"];
    
        $sql = "INSERT INTO movies(title,
        length_in_minutes, 
        released_at,
        country_of_origin,
        summary,
        youtube_trailer_id)
        VALUES(:title,
        :length_in_minutes,
        :released_at,
        :country_of_origin,
        :summary,
        :youtube_trailer_id)";
        $stmt = $db_conn->prepare($sql);
        $stmt->execute(["title" => $title,
        "length_in_minutes" => $length_in_minutes,
        "released_at" => $released_at,
        "country_of_origin" => $country_of_origin,
        "summary" => $summary,
        "youtube_trailer_id" => $youtube_trailer_id]);
    } else {
        echo "test serie";
        $title = $_POST["titel"];
        $rating = $_POST["rating"];
        $summary = $_POST["summary"];
        $has_won_awards = $_POST["awards"];
        $seasons = $_POST["seizoenen"];
        $country = $_POST["land"];
        $spoken_in_language = $_POST["taal"];

        $sql = "INSERT INTO series(title, rating, summary, has_won_awards, seasons, country, spoken_in_language)
        VALUES(:title, :rating, :summary, :has_won_awards, :seasons, :country, :spoken_in_language)";
        $stmt = $db_conn->prepare($sql);
        $stmt->execute(["title" => $title, "rating" => $rating, "summary" => $summary,
        "has_won_awards" => $has_won_awards, "seasons" => $seasons, "country"  => $country, "spoken_in_language" => $spoken_in_language]);
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="insert_style.css">
    <title>Nieuw media</title>
</head>
<body>
<h1>Nieuw media</h1>
    <form action="insert.php" method="POST" id="insertform">
        <label for="titel">Titel:</label><br>
            <input type="text" name="titel" id="titel"><br>
        <label for="rating">Rating:</label><br>
            <input type="number" name="rating" id="rating"><br>
        <label for="awards">Hoeveelheid awards:</label><br>
            <input type="text" name="awards" id="awards"><br>
        <label for="length_in_minutes">Lengte in minuten:</label><br>
            <input type="number" name="length_in_minutes" id="length_in_minutes"><br>
        <label for="release_datum">Release datum:</label><br>
            <input type="date" name="released_at" id="release_datum"><br>
        <label for="seizoenen">Hoeveelheid seizoenen:</label><br>
            <input type="number" name="seizoenen" id="seizoenen"><br>
        <label for="land">Land:</label><br>
            <input type="text" name="land" id="landen"><br>
        <label for="youtube_trailer_id">Youtube trailer ID:</label><br>
            <input type="text" name="youtube_trailer_id" id="youtube_id"><br>
        <label for="taal">Taal:</label><br>
            <input type="text" name="taal" id="taal"><br>
        <label for="summary">Samenvatting:</label><br>
            <input type="text" name="summary" id="summary"><br>
        <label for="media">Type media:</label><br>
        <select name="media" id="media">
            <option value="film">film</option>
            <option value="serie">serie</option>
        </select><br>
        <input type="submit" name="confirm" id="confirm" value="Opslaan"><br>
        <input type="submit" name="homepage" value="startpagina">
    </form>
</body>
</html>