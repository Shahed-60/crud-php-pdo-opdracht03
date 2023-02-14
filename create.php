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

$sql = "INSERT INTO achtbaan(Id
                        ,NaamAchtbaan
                        ,NaamPretpark
                        ,Land
                        ,Topsnelheid
                        ,Hoogte
                        ,Datum 
                        ,Cijfer)
                VALUES (NULL
                        ,:achtbaan
                        ,:pretpark
                        ,:land
                        ,:snelheid
                        ,:hoogte
                        ,:datum
                        ,:cijfer)";

$statement = $pdo->prepare($sql);
// $statement->bindValue(':Id', $_POST['Id'], PDO::PARAM_STR);
$statement->bindValue(':achtbaan', $_POST['achtbaan'], PDO::PARAM_STR);
$statement->bindValue(':pretpark', $_POST['pretpark'], PDO::PARAM_STR);
$statement->bindValue(':land', $_POST['land'], PDO::PARAM_STR);
$statement->bindValue(':snelheid', $_POST['snelheid'], PDO::PARAM_INT);
$statement->bindValue(':hoogte', $_POST['hoogte'], PDO::PARAM_INT);
$statement->bindValue(':datum', $_POST['datum'], PDO::PARAM_STR);
$statement->bindValue(':cijfer', $_POST['cijfer'], PDO::PARAM_STR);

$result = $statement->execute();
if ($result) {
    echo "Er is een nieuw record gemaakt in de database.";
    header('Refresh:2; url=read.php');
} else {
    echo "Er is geen nieuw record gemaakt.";
    header('Refresh:2; url=read.php');
}
