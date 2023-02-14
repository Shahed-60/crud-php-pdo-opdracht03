<?php
$servername = "localhost";
$username = "root";
$password = "";

try {
    $pdo = new PDO("mysql:host=$servername;dbname=atractiepark", $username, $password);
    // set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Connected successfully";
    $sql = 'SELECT * from achtbaan';
    $q = $pdo->query($sql);
    $q->setFetchMode(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Connection failed:" . $e->getMessage();
}
// :)
// Maak een delete query voor het verwijderen van een record
$sql = "DELETE FROM achtbaan
        WHERE Id = :Id";
// :)
// Bereid de query voor om de placeholder te vervangen voor een id-waarde
$statement = $pdo->prepare($sql);

// Vervang de placeholder voor een id-waarde
$statement->bindValue(':Id', $_GET['Id'], PDO::PARAM_INT);

// Voer de query uit op de mysql-database
$result = $statement->execute();

if ($result) {
    echo "Het record is verwijderd";
    header('Refresh:3; url=read.php');
} else {
    echo "Het record is niet verwijderd";
    header('Refresh:3; url=read.php');
}
