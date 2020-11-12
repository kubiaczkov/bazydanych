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
      $sql = "SELECT * FROM `klienci`";
      // $sql = "SELECT * FROM `klienci` WHERE email = '$email'";
 
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
            echo 'Email '. $row['email'] . ' należy do: '. $row['imie']. ' ' .$row['nazwisko'];
            // echo 'Email '. $row[2] . ' należy do: '. $row[0]. ' ' . $row[1]. "<br>";
            // tworzenie formularza, który pozwoli wyedytować dane pracownika
            echo '<form method="post" action="edycja.php">
                     <input type="hidden" name="uId" value="'.$row['id'].'">
                     <input type="hidden" name="imie" value="'.$row['imie'].'">
                     <input type="hidden" name="nazwisko" value="'.$row['nazwisko'].'">
                     <input type="hidden" name="pesel" value="'.$row['pesel'].'">
                     <input type="hidden" name="email" value="'.$row['email'].'">
                     <input type="submit" value="Edytuj">
                  </form>';
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