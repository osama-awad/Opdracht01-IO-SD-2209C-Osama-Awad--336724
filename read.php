<?php
// Maak een verbinding met de mysql-server en database
require('config.php');

// Maak een data sourcename striing
$dsn = "mysql:host=$dbHost;dbname=$dbName;charset=UTF8";

try {
$pdo = new PDO($dsn, $dbUser, $dbPass);
if ($pdo){
    //echo "De verbinding is gelukt"
}else{
    echo "Interne server-error";
}
}catch(PDOException $e) {
    echo $e->getMessage();
}
/**
 * Maaak een select query die alle records uit de tabel persoon haalt
 */
$sql = "SELECT * From Persoon";

//Maak de sql-query gereed om te worden uitgevoerd op de database
$statement = $pdo->prepare($sql);

//voer de sql-query uit opde datebase
$statement->execute();

// Zet het resultaat in een array met daarin de objecten (records uit de tabel Persoon)
$result=$statement->fetchAll(PDO::FETCH_OBJ);


//Even checken wat we terukrijgen
//var_dump($result);

$rows= "";
foreach ($result as $info){
    $rows .="<tr>
                <td>$info->Id</td>
                <td>$info->Voornaam</td>
                <td>$info->Tussenvoegsel</td>
                <td>$info->Achternaam</td>
                <td>$info->Haarkleur</td>
                <td>$info->Telefoonnummer</td>
                <td>$info->Staartnaam</td>
                <td>$info->Huisnummer</td>
                <td>$info->Woonplaats</td>
                <td>$info->Postcode</td>
                <td>$info->Landnaam</td>
                <td>
                    <a href='delete.php?id=$info->Id'>
                    <img src='img/b_drop.png' alt='kruis'>
                    </a>
                </td>
                <td>
                <a href='update.php?id=$info->Id'>
                    <img src='img/b_edit.png' alt='potlood'
                    </a>
                </td>
            </tr>";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <title>Document</title>
</head>
<body>
<h3>Persoonsgegevens</h3>

<a href="index.php">

<input type="button" value="Nieuw record">
</a>    
<table border='1'>
    <thead>
        <th>ID</th>
        <th>Voornaam</th>
        <th>Tussenvoegsel</th>
        <th>Achternaam</th>
        <th>Haarkleur</th>
        <th>Telefoonnummer</th>
        <th>Staartnaam</th>
        <th>Huisnummer</th>
        <th>Woonplaats</th>
        <th>Postcode</th>
        <th>Landnaam</th>
    </thead>
    <tbody>
       
        <?= $rows;?>
    </tbody>
</table>
</body>
</html>
