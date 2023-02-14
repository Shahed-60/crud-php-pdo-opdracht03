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

$sql = "SELECT Id
              ,NaamAchtbaan
              ,NaamPretpark
              ,Land
              ,Topsnelheid
              ,Hoogte
              ,Datum
              ,Cijfer
        FROM achtbaan";

$statement = $pdo->prepare($sql);

$statement->execute();


$result = $statement->fetchAll(PDO::FETCH_OBJ);

$rows = "";
foreach ($result as $info) {
    $rows .= "<tr>
              <td>$info->Id</td>
              <td>$info->NaamAchtbaan</td>
              <td>$info->NaamPretpark</td>
              <td>$info->Land</td>
              <td>$info->Topsnelheid</td>
              <td>$info->Hoogte</td>
              <td>$info->Datum</td>
              <td>$info->Cijfer</td>
              <td>
              <a href='delete.php?Id=$info->Id'>
              <img src='img/b_drop.png' alt='kruis'>
          </a>
      </td>
      <td>
          <a href='update.php?Id=$info->Id'>
              <img src='img/b_edit.png' alt='potlood'>
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
    <title>Document</title>
</head>

<body>
    <h3>Table Achtbaan</h3>

    <a href="index.php">
        <input type="button" value="Nieuw record">
    </a>
    <br>
    <br>
    <table border='1'>
        <thead>
            <th>Id</th>
            <th>NaamAchtbaan</th>
            <th>NaamPretpark</th>
            <th>Land</th>
            <th>Topsnelheid</th>
            <th>Hoogte</th>
            <th>Datum</th>
            <th>Cijfer</th>
            <th></th>
            <th></th>
        </thead>
        <tbody>
            <?= $rows; ?>
        </tbody>
    </table>
</body>

</html>