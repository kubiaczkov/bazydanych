<?php
   /** 
    * Dodawanie nowego pracownika parametry:
         imie *
         nazwisko *
         pesel *
         email
         * -> parametr wymagany
   */
  $imie = $_GET['imie'];
  $nazwisko = $_GET['nazwisko'];
  $pesel = $_GET['pesel'];
  $email = $_GET['email'];
  
  // podstawowa walidacja danych -> sprawdzenie istnienia wymaganych danych!
   if($imie && $nazwisko && $pesel) {
      // utworzenie połączenia z db: $conn -> id połączenia
      include_once('polaczenie.php');
      // jeżeli email został podany to:
      if($email)
         // zastosuj tą kwerendę SQL
         $sql = "INSERT INTO `klienci`(`imie`, `nazwisko`, `pesel`, `email`) \n"
         . "VALUES ('$imie', '$nazwisko', '$pesel', '$email')";
      else 
         // w innym przypadku zastosuj tą -> wartość NULL
         $sql = "INSERT INTO `klienci`(`imie`, `nazwisko`, `pesel`) \n"
         . "VALUES ('$imie', '$nazwisko', '$pesel')";
      /**
       * funkcja mysqli_query() wykona się
       * oraz zwróci wartość true/false
       * w zależności od poprawności wykonanego zadania
       */
      if(mysqli_query($conn, $sql)) {
         echo "Dodano nowego pracownika!";
      } else {
         echo "Błąd podczas dodawania rekordu" . mysqli_error($conn);
      }

      mysqli_close($conn);
   } else {
      // jeżeli wymagane wartości nie zostały podane
      echo 'Nie podano wymaganych parametrów';
   }