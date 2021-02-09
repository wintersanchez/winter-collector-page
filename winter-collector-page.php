<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Collected Cats</title>
    <link href="winter-collector-page.css" rel="stylesheet">
    <link href="normalize.css" rel="stylesheet">
</head>
<body>

<h1>Collected Cats</h1>

<h2>Welcome to your cat collection! Here you can see a list of all your cats!</h2>


<?php

$db = new PDO ('mysql:host=db;dbname=winter-collector-page', 'root', 'password');

$query = $db -> prepare("SELECT * FROM cats");

$query -> execute();

$allResults = $query->fetchAll(\PDO::FETCH_ASSOC);

echo "<section>";
foreach ($allResults as $row) {
    echo "<div>";
    echo "<ul>
        <li><h3>Name:</h3> " . $row["name"] . "</li>" .
        "<li><h3>Colour:</h3> " . $row["colour"] . "</li>" .
        "<li><h3>Weight:</h3> " . $row["weight"] . "kg</li>" .
        "<li><h3>Age:</h3> " . $row["age"] . "</li>" .
        "<li><h3>Breed:</h3> " . $row["breed"] . "</li>
        </ul>";
    echo "<br>";
    echo "<br>";
    echo "<form method='post' action='delete'>";
    echo "<button type='submit'>delete this cat?</button></form>";
    echo "</div>";
}
echo "</section>";



?>
</body>

</html>



<!--// TABLE?? -->
<!--//echo "<table><th>Name</th><th>Colour</th><th>Weight</th><th>Age</th><th>Breed</th>";-->
<!--//-->
<!--//foreach ($allResults as $row) {-->
<!--//    echo "<tr>";-->
<!--//    echo "<th>" . $row["name"] . " | " . $row["colour"] . " | " .-->
<!--//        $row["weight"] . "kg | " . $row["age"] . " | " . $row["breed"] . "</tr>";-->
<!--//}-->
<!--//echo '</table>';-->
<!---->
<!--// I DON'T KNOW WHAT I WAS TRYING TO DO HERE BUT OK?-->
<!--//echo "</table>";-->
<!--//-->
<!--//echo "<table>";-->
<!--//-->
<!--//// NAME-->
<!--//echo "<tr><th>Name</th>";-->
<!--//foreach ($allResults as $row) {-->
<!--//    echo "<td>" . $row["name"] . "</td>";-->
<!--//}-->
<!--//echo "</tr>";-->
<!--//-->
<!--////COLOUR-->
<!--//echo "<tr><th>Colour</th>";-->
<!--//-->
<!--//foreach ($allResults as $row) {-->
<!--//    echo "<td>" . $row["colour"] . "</td>";-->
<!--//}-->
<!--//echo "</tr>";-->
<!--//-->
<!--////BREED-->
<!--//echo "<tr><th>Breed</th>";-->
<!--//-->
<!--//foreach ($allResults as $row) {-->
<!--//    echo "<td>" . $row["breed"] . "</td>";-->
<!--//}-->
<!--//echo "</tr>";-->
<!--//-->
<!--//// AGE-->
<!--//echo "<tr><th>Age</th>";-->
<!--//-->
<!--//foreach ($allResults as $row) {-->
<!--//    echo "<td>" . $row["age"] . "years" . "</td>";-->
<!--//}-->
<!--//echo "</tr>";-->
<!--//-->
<!--////WEIGHT-->
<!--//echo "<tr><th>Weight</th>";-->
<!--//-->
<!--//foreach ($allResults as $row) {-->
<!--//    echo "<td>" . $row["weight"] . "kg" . "</td>";-->
<!--//}-->
<!--//echo "</tr>";-->
<!--//-->
<!--//echo '</table>';-->