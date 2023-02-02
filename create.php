<?php
/**
 * we gaan contact maken met de mysql server
 */
$dsn ="mysql:host=localhost;dbname=Php-pdo-crud-2209c;charset=UTF8";

try{

    $pdo= new PDO($dsn,'oa_2209c', 'K@4OB@H3YKJ3@d)d');

if ($pdo) {
    //echo"Er is een verbindling met de mysql-server";
}else{
    echo"Er is een interne server-error, naam contact op met de beheerder";
}
}catch(PDOException $e){
   echo $e->getMessage();
}

  /**
   * we gaan een insert-query maken voor het wegschrijven van de formulliergegevens 
   */
$sql="INSERT INTO Persoon(Id
                        ,Voornaam
                        ,Tussenvoegsel
                        ,Achternaam
                        ,Haarkleur
                        ,Telefoonnummer
                        ,Staartnaam
                        ,Huisnummer
                        ,Woonplaats
                        ,Postcode
                        ,Landnaam)
        VALUES                (Null
                                ,:voornaam
                                ,:tussenvoegsel
                                ,:achternaam
                                ,:haarkleur
                                ,:Telefoonnummer
                                ,:Woonplaats
                                ,:Huisnummer
                                ,:Staartnaam
                                ,:Postcode
                                ,:Landnaam);";

//we bereiden de sql-query voor met de methoud prepare

$statement = $pdo->prepare($sql);

$statement->bindValue(':voornaam', $_POST['firstname'], PDO::PARAM_STR);
$statement->bindValue(':tussenvoegsel', $_POST['infix'], PDO::PARAM_STR);
$statement->bindValue(':achternaam', $_POST['lastname'], PDO::PARAM_STR);
$statement->bindValue(':haarkleur', $_POST['haircolour'], PDO::PARAM_STR);
$statement->bindValue(':Telefoonnummer', $_POST['Telefoonnummer'], PDO::PARAM_STR);
$statement->bindValue(':Staartnaam', $_POST['Staartnaam'], PDO::PARAM_STR);
$statement->bindValue(':Huisnummer', $_POST['Huisnummer'], PDO::PARAM_STR);
$statement->bindValue(':Woonplaats', $_POST['Woonplaats'], PDO::PARAM_STR);
$statement->bindValue(':Postcode', $_POST['Postcode'], PDO::PARAM_STR);
$statement->bindValue(':Landnaam', $_POST['Landnaam'], PDO::PARAM_STR);
//we vuren de sql-query af op de database

$result = $statement->execute();

if($result){
    echo "Er is een nieuw record gemaakt in de datebase";
    header('Refresh:2; url=read.php');
}else{
    echo "Er is geen nieuw record gemaakt";
    header('Refresh:2; url=read.php');
}

