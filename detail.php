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

function generateTableFilm($arrM)
{
    $html = "<table>";
    $html .= "<tr> <th>  title </th> <th> length in minutes </th> <th> released at </th> <th> country of origin </th> <th> youtube trailer id </th> <th> summary </th> </tr>";
    foreach ($arrM as $array) {
        $html .= "<tr>";
        $html .= "<td>" . $array["title"] . " </td>";
        $html .= "<td>" . $array["length_in_minutes"] . "</td>";
        $html .= "<td>" . $array["released_at"] . "</td>";
        $html .= "<td>" . $array["country_of_origin"] . "</td>";
        $html .= "<td>" . $array["youtube_trailer_id"] . "</td>";
        $html .= "<td>" . $array["summary"] . "</td>";
        $html .= "<td>";
        $kiess = $array["id"];
        $kiesKS = "kiess=$kiess";
        $html .= "<a href=edit.php?$kiesKS>bekijk detail</a>";
        $html .= "</td>";
        $html .= "</tr>";
    }
    $html .= "</table>"; 
    return $html;
}

$sqlM = "SELECT * FROM movies";
$arrM = $db_conn->query($sqlM)->fetchall();

function generateTableSerie($arrS)
{
    $html = "<table>";
    $html .= "<tr> <th>  title </th> <th> rating </th> <th> has_won_awards </th> <th> seasons </th> <th> country </th> <th> spoken_in_language </th> <th> summary </th> </tr>";
    foreach ($arrS as $array) {
        $html .= "<tr>";
        $html .= "<td>" . $array["title"] . " </td>";
        $html .= "<td>" . $array["rating"] . "</td>";
        $html .= "<td>" . $array["has_won_awards"] . "</td>";
        $html .= "<td>" . $array["seasons"] . "</td>";
        $html .= "<td>" . $array["country"] . "</td>";
        $html .= "<td>" . $array["spoken_in_language"] . "</td>";
        $html .= "<td>" . $array["summary"] . "</td>";
        $html .= "<td>";
        $kiesm = $array["id"];
        $kiesKM = "kiesm=$kiesm";
        $html .= "<a href=edit.php?$kiesKM>bekijk detail</a>";
        $html .= "</td>";
        $html .= "</tr>";
    }
    $html .= "</table>"; 
    return $html;
}

$sqlS = "SELECT * FROM series";
$arrS = $db_conn->query($sqlS)->fetchall();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Film/serie details</title>
    <link rel="stylesheet" href="detailstyle.css">
</head>
<body>
    <h1>Films</h1>
<?php echo generateTableFilm($arrM); ?>
<br>
    <h1>Series</h1> 
<?php echo generateTableSerie($arrS); ?>
</body>
</html>