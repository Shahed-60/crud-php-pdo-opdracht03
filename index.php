<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>De 5 snelste achtbanen van Europe</title>
</head>
<!-- :) -->

<body>
    <h2>De 5 snelste achtbanen van Europe</h2>
    <form action="create.php" method="post">
        <label for="achtbaan">Naam Achtbaan:</label><br>
        <input type="text" name="achtbaan" id="achtbaan"><br>
        <label for="pretpark">Naam Pretpark:</label><br>
        <input type="text" name="pretpark" id="pretpark"><br>
        <label for="land">Naam Land:</label><br>
        <input type="text" name="land" id="land"><br>
        <label for="snelheid">Topsnelheid (km/u):</label><br>
        <input type="number" name="snelheid" id="snelheid"><br>
        <label for="hoogte">Hoogte (m):</label><br>
        <input type="number" name="hoogte" id="hoogte"><br>
        <label for="datum">Datum eerste opening:</label><br>
        <input type="date" name="datum" id="datum"><br>
        <label for="cijfer">Cijfer:</label><br>
        <input type="range" id="myRange" step="0.1" max="10" oninput="updateContent()" name="cijfer">
        <span id="content">0</span><br>
        <input type="submit" value="Sla Op">
    </form>
    <script src="eheh.js"></script>
</body>

</html>