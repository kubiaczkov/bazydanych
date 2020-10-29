<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
</head>
<body>

<?php
   // include_once('polaczenie.php');
?>
<h1>Ćwiczenia bazy danych</h1>
<hr>
<h2>Wyszukiwanie pracowników za pomocą adresu email</h2>
<!-- action-> nazwa pliku; method-> GET/POST -->
<form action="select.php" method="GET">
 <label for="email">Email:</label>
 <input type="email" name="email" id="email" required>
 <br>
 <button type="submit">Szukaj</button>
 <button type="reset">Wyczyść</button>
</form>


</body>
</html>