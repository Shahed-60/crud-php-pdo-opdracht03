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
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    // var_dump($_POST['Id']);
    // var_dump($_POST);
    // Maak een sql update-query en vuur deze af op de database

    try {
        $sql = "UPDATE achtbaan
                    SET NaamAchtbaan = :achtbaan,
                        NaamPretpark = :pretpark,
                        Land = :land,
                        Topsnelheid = :snelheid,
                        Hoogte = :hoogte,
                        Datum = :datum,
                        Cijfer = :cijfer
                    WHERE  Id = :Id";

        $statement = $pdo->prepare($sql);

        $statement->bindValue(':Id', $_POST['Id'], PDO::PARAM_INT);
        $statement->bindValue(':achtbaan', $_POST['achtbaan'], PDO::PARAM_STR);
        $statement->bindValue(':pretpark', $_POST['pretpark'], PDO::PARAM_STR);
        $statement->bindValue(':land', $_POST['land'], PDO::PARAM_STR);
        $statement->bindValue(':snelheid', $_POST['snelheid'], PDO::PARAM_INT);
        $statement->bindValue(':hoogte', $_POST['hoogte'], PDO::PARAM_INT);
        $statement->bindValue(':datum', $_POST['datum'], PDO::PARAM_STR);
        $statement->bindValue(':cijfer', $_POST['cijfer'], PDO::PARAM_STR);

        $statement->execute();

        echo "Het updaten is gelukt";
        header('Refresh:3; url=read.php');
    } catch (PDOException $e) {
        echo "Het updaten is niet gelukt";
        header('Refresh:3; url=read.php');
    }
    // Stuur de gebruiker door naar de read.php pagina voor het overzicht met een header(Refresh) functie;
    exit();
}
$sql = "SELECT  Id
                    ,NaamAchtbaan 
                    ,NaamPretpark 
                    ,Land
                    ,Topsnelheid 
                    ,Hoogte
                    ,Datum 
                    ,Cijfer
                    FROM achtbaan
                    WHERE  Id = :Id";
// Maak de sql-query klaar om de $_GET['Id'] waarde te koppelen aan de placeholder :Id
$statement = $pdo->prepare($sql);

// Koppel de waarde $_GET['Id'] aan de placeholder :Id
$statement->bindValue(':Id', $_GET['Id'], PDO::PARAM_INT);


// Voer de query uit
$statement->execute();

// Haal het resultaat op met fetch en stop het object in de variabele $result
$result = $statement->fetch(PDO::FETCH_OBJ);
// print_r($result);

// var_dump($result);


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>De 5 snelste achtbanen van Europe</title>
</head>

<body>
    <h1>De 5 snelste achtbanen van Europe</h1>

    <form action="update.php" method="post">
        <input type="text" name="Id" value="<?php echo $result->Id; ?>" hidden>
        <label for="achtbaan">Naam Achtbaan:</label><br>
        <input type="text" name="achtbaan" id="achtbaan" value="<?php echo $result->NaamAchtbaan; ?>"><br>
        <br>
        <label for="pretpark">Naam Pretpark:</label><br>
        <input type="text" name="pretpark" id="pretpark" value="<?php echo $result->NaamPretpark; ?>"><br>
        <br>
        <label for="land">Naam Land:</label><br>
        <input type="text" name="land" id="land" value="<?php echo $result->Land; ?>"><br>
        <br>
        <label for="snelheid">Topsnelheid (km/u):</label><br>
        <input type="number" name="snelheid" id="snelheid" value="<?php echo $result->Topsnelheid; ?>"><br>
        <br>
        <label for="hoogte">Hoogte (m):</label><br>
        <input type="number" name="hoogte" id="hoogte" value="<?php echo $result->Hoogte; ?>"><br>
        <br>
        <label for="datum">Datum eerste opening:</label><br>
        <input type="date" name="datum" id="datum" value="<?php echo $result->Datum; ?>"><br>
        <br>
        <label for="cijfer">Cijfer:</label><br>
        <input type="range" id="myRange" step="0.1" max="10" oninput="updateContent()" name="cijfer" value="<?php echo $result->Cijfer; ?>">
        <span id="content"></span><br>
        <br>
        <input type="submit" name="submit" value="Sla Op">
    </form>

    <script src="eheh.js"></script>

</body>

</html>
</body>

</html>