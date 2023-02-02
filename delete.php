<?php



//voeg de verbindingsgegevens toe
require ('config.php');

//Maak een date sourceaname string voor de pdo const

$dsn = "mysql:host=$dbHost;dbname=$dbName;charset=UTF8";
try{

$pdo = new Pdo($dsn, $dbUser, $dbPass); 
if($pdo){
    echo"Verbinding is gelukt";
}else{
    echo"Interne server-error";
}
}catch(PDOException $e)
{
    $e->getMessage();
}
//Maak een delete query voo het verwijderen van een record
$sql = "DELETE FROM Persoon
        WHERE Id = :Id";
// Bereid de query voor om de placeholder te vervangen voor een id_waarde
 $statment = $pdo->prepare($sql);
 // Bereid de query voor om de placeholder voor een id _waarde
 $statment->bindValue(':Id', $_GET['id'], PDO::PARAM_INT);
//voer de query uit op de mysql-database
 $result = $statment->execute();

if($result){
    echo "Het record is verwijderd";
    header ('Refresh:3; url=read.php');
}else{
    echo "Het record is niet verwijderd";
    header ('Refresh:3; url=read.php');
}