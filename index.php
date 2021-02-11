<?php

$db = new PDO ('mysql:host=db;dbname=winter-collector-page', 'root', 'password');

if (isset($_POST["delete"])) {
    $deleteCatInfo = $db -> prepare("DELETE from cats WHERE id=:id");
    $deleteCatInfo -> bindParam(":id", $_POST["delete"]);
    $deleteCatInfo -> execute();
}

$getCatInfo = $db -> prepare("SELECT * FROM cats");

$getCatInfo -> execute();

$allCatInfo = $getCatInfo->fetchAll(\PDO::FETCH_ASSOC);

$catItemNumber = 1;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title alt='page-title-collected-cats'>Collected Cats</title>
    <link alt='cat-icon' rel="icon" type="image/png?" href="icon/cat.png"/>

    <link href="winter-collector-page.css" rel="stylesheet">
    <link href="normalize.css" rel="stylesheet">
</head>
<body>

<h1>Collected Cats</h1>

<h2>Welcome to your cat collection! <br/>Here you can see a list of all your cats...</h2>

<?php

echo "<section class='allItemsSection'>";
foreach ($allCatInfo as $row) {
    echo "<div class='itemInfoDiv'>";
    echo "<img src='collector-website-images/img-" . $row["id"] . ".jpg' alt='cat-picture'" . "/>";
    echo '<h2 alt="cat-item-number">Cat ' . $catItemNumber . '</h2>';
    $catItemNumber++;
    echo "<ul class='databaseItemInfo'>";
    echo "<li><h3>Name:</h3> " . $row["name"] . "</li>";
    echo "<li><h3>Colour:</h3> " . $row["colour"] . "</li>";
    echo "<li><h3>Weight:</h3> " . $row["weight"] . "kg</li>";
    echo "<li><h3>Age:</h3> " . $row["age"] . "</li>";
    echo "<li><h3>Breed:</h3> " . $row["breed"] . "</li>";
    echo "</ul>";
    echo "<br>";
    echo "<br>";
    echo "<form method='POST'>";
    echo "<input type='hidden' name='delete' value='" . $row["id"] . "' />";
    echo "<button type='submit' class='deleteButton' alt='delete-item-button'>Delete</button>";
    echo "</form>";
    echo "</div>";
}
echo "</section>";

?>

<footer class="pageFooter">Site Created by Winter Sanchez 2021&copy; || email: winterwsanchez@gmail.com</footer>
</body>

</html>