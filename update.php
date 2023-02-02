<?php



//echo $_GET['id'];

require ('config.php');

$dsn = "mysql:host=$dbHost;dbname=$dbName;charset=UTF8";

try{
    $pdo = new Pdo($dsn, $dbUser, $dbPass);

  if($pdo){
    echo "Er is een verbinding met de database";

  }else{
    echo "Interne server-error";
  }

}catch (PDOException $e){
    echo $e->getMessage();
}

if ($_SERVER['REQUEST_METHOD'] =="POST" ){
  // var_dump($_POST);
  try{
    $sql = "UPDATE Persoon
    SET   Voornaam = :firstname
          ,Tussenvoegsel = :infix
          ,Achternaam = :lastname
          ,Haarkleur = :haircolor
          ,Telefoonnummer = :Telefoonnummer
          ,Staartnaam = :Staartnaam
          ,Huisnummer = :Huisnummer
          ,Woonplaats = :Woonplaats
          ,Postcode = :Postcode
          ,Landnaam = :Landnaam
  WHERE Id = :id";
  
  $statement =$pdo->prepare($sql);
  
  $statement->bindValue(':firstname', $_POST['firstname'],PDO::PARAM_STR);
  $statement->bindValue(':infix', $_POST['infix'],PDO::PARAM_STR); 
  $statement->bindValue(':lastname', $_POST['lastname'],PDO::PARAM_STR); 
  $statement->bindValue(':haircolor', $_POST['haircolour'],PDO::PARAM_STR); 
  $statement->bindValue(':Telefoonnummer', $_POST['Telefoonnummer'],PDO::PARAM_STR);
  $statement->bindValue(':Staartnaam', $_POST['Staartnaam'],PDO::PARAM_STR);
  $statement->bindValue(':Huisnummer', $_POST['Huisnummer'],PDO::PARAM_STR);
  $statement->bindValue(':Woonplaats', $_POST['Woonplaats'],PDO::PARAM_STR);
  $statement->bindValue(':Postcode', $_POST['Postcode'],PDO::PARAM_STR);
  $statement->bindValue(':Landnaam', $_POST['Landnaam'],PDO::PARAM_STR);
  $statement->bindValue(':id', $_POST['id'],PDO::PARAM_INT); 
  
  $statement->execute();
  
  echo "Het updaten is gelukt";
  header('Refresh:3; url=read.php');
  }catch(PDOException $e){
    echo"Het updaten is niet gelukt";
    header('Refresh:3; url=read.php');
  }
  
   //Maak een sql-query voor de database
  
  exit();
}

$sql = "SELECT * FROM Persoon WHERE Id = :Id";

// Maak de sql-query klaar om de $_GET['Id'] waade te kopplen aan de placeholder :Id
$statement= $pdo->prepare($sql);
// Koppel de waarde $_GET['Id'] aan de placeholder :Id
$statement->bindValue(':Id', $_GET['id'], PDO::PARAM_INT);



//Voer de query uit

$statement->execute();
//Haal het resultaat op met fetch en stop het object in de variabal $result
$result = $statement->fetch(PDO::FETCH_OBJ);
//var_dump($result);  

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <title>PHP PDO CRUD</title>
</head>
<body>
    <H1>PHP PDO CRUD</H1>

    <form action="update.php" method="post">

    <label for="firstname">Voornaam</label><br>
    <input type="text" name="firstname" id="firstname" value="<?= $result->Voornaam; ?>"><br>
    <br>

    <label for="infix">Tussenvoegsel</label><br>
    <input type="text" name="infix" id="infix" value="<?= $result->Tussenvoegsel; ?>"><br>
    <br>

    <label for="lastname">Achternaam</  ><br>
    <input type="text" name="lastname" id="lastname" value="<?= $result->Achternaam; ?>"><br>
    <br>
    <label for="haircolour">Haarkleur    <br>
    <input type="text" name="haircolour" id="haircolour" value="<?= $result->Haarkleur; ?>"><br>
    <br>

    <br>
    <label for="Telefoonnummer">Telefoonnummer    <br>
    <input type="text" name="Telefoonnummer" id="Telefoonnummer" value="<?= $result->Haarkleur; ?>"><br>
    <br>

    <br>
    <label for="Staartnaam">Staartnaam    <br>
    <input type="text" name="Staartnaam" id="Staartnaam" value="<?= $result->Haarkleur; ?>"><br>
    <br>

    <br>
    <label for="Huisnummer">Huisnummer    <br>
    <input type="text" name="Huisnummer" id="Huisnummer" value="<?= $result->Haarkleur; ?>"><br>
    <br>

    <br>
    <label for="Woonplaats">Woonplaats    <br>
    <input type="text" name="Woonplaats" id="Woonplaats" value="<?= $result->Haarkleur; ?>"><br>
    <br>

    <br>
    <label for="Postcode">Postcode    <br>
    <input type="text" name="Postcode" id="Postcode" value="<?= $result->Haarkleur; ?>"><br>
    <br>

    <br>
    <label for="Landnaam">Landnaam    <br>
    <input type="text" name="Landnaam" id="Landnaam" value="<?= $result->Haarkleur; ?>"><br>
    <br>
    

    <input type="hidden" name="id" value="<?php echo $_GET["id"]; ?>">

    <input type="submit" value="verstuur!">
    </form>
</body>
</html>