<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
</head>
<body>
   <h1>Lista pracowników</h1>

   <?php
      // pobranie wartości email z parametru GET
      $email = $_GET['email'];

      // utworzenie połączenia z db: $conn -> id połączenia
      include_once('polaczenie.php');

      // przygotowanie zapytania (można wygenerować w phpMyAdmin!)
      $sql = "SELECT imie, nazwisko, email AS e FROM `klienci`";
      // $sql = "SELECT imie, nazwisko, email AS e FROM `klienci` WHERE email = '$email'";
 
      // mysqli_query($id_polaczenia, $zapytanie); -> wysłanie zapytania oraz otrzymanie/błąd wyników
      $result = mysqli_query($conn, $sql) or die('Problem z odczytem danych!');
      
      if(mysqli_num_rows($result) != 0)
         /* 
         mysqli_fetch_assoc -> wyniki w postaci tablicy asocjacyjne $row['id']
         mysqli_fetch_row -> wyniki w postaci standardowej tablicy $row[0]
         */
         // wyświetlanie wyników za pomocą pętli
         while ($row = mysqli_fetch_assoc($result)) {
            // $row - pojedynczy wiersz z wyników
            echo 'Email '. $row['e'] . ' należy do: '. $row['imie']. ' ' .$row['nazwisko']. "<br>";
            // echo 'Email '. $row[2] . ' należy do: '. $row[0]. ' ' . $row[1]. "<br>";
         }
      else 
         echo 'Brak pasujących wyników';   
      
      // zwalnianie pamięci z wyniku
      mysqli_free_result($result);

      // zamknięcie połączenia z bazą danych !!!
      mysqli_close($conn);
   ?>
</body>
</html>