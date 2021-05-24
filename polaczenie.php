<?php
// skrypt tworzący połączenie z bazą danych
// korzystanie z bliblioteki 'mysqli'

// 4 - serwer, uzytkownik, haslo, baza
$serwer = "localhost";
$user = "root";
$passwd = "zaq1@WSX";
$db = "cwiczenia";

$conn = mysqli_connect($serwer, $user, $passwd, $db);

// sprawdzenie połączenia
if ($conn->connect_error) {
   die("Połączenie nieudane: " . $conn->connect_error);
} else {
   // echo "Połączenie udane";
}

// obsługa polskich znaków
mysqli_set_charset($conn, "utf8");

