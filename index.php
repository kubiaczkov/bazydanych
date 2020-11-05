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
<!-- **************** WYSZUKIWANIE **************** -->
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
<!-- **************** DODAWANIE **************** -->
<hr>
<h2>Dodawanie nowego pracownika</h2>
<form action="dodaj.php" method="GET">
   <label for="imie">Podaj imie:</label>
   <input type="text" name="imie" id="imie" maxlength="81" required>
   <br>
   <label for="nazwisko">Podaj nazwisko:</label>
   <input type="text" name="nazwisko" id="nazwisko" maxlength="81" required>
   <br>
   <label for="pesel">Podaj PESEL:</label>
   <input type="text" name="pesel" id="pesel" minlength="11" maxlength="11" required>
   <br>
   <label for="email">Podaj email:</label>
   <input type="email" name="email" id="email" maxlength="181">
   <br>
   <input type="reset" value="Wyczyść" style="margin-right: 1em;">
   <input type="submit" value="Dodaj pracownika">
</form>

</body>
</html>