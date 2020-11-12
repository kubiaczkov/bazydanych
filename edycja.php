<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Edit pracownik</title>
</head>
<body>
<?php 
   if(isset($_POST['imie']) && isset($_POST['nazwisko']) && isset($_POST['Id']) && isset($_POST['email']))
   {
   /**
    * Aktualizacja rekordu - dane osobowe
     imie
     nazwisko
     uId
     email
    */
    include_once('polaczenie.php');
    $imie = $_POST['imie'];
    $nazwisko = $_POST['nazwisko'];
    $email = $_POST['email'];
    $Id = $_POST['Id'];

   //  przygotowanie kwerendy
   $stmt = mysqli_prepare($conn, "UPDATE `klienci` SET imie=?, nazwisko=?, email=? WHERE id=?");
   mysqli_stmt_bind_param($stmt, 'sssi', $imie, $nazwisko, $email, $Id);

   // dane liczbowe całkowite -> i
   // dane liczbowe rzeczywiste -> d
   // dane tekstowe -> s
   // dane typu blob -> b
      
   if(mysqli_stmt_execute($stmt))
      echo 'Pomyślnie zaktualizowano';
   else
      echo 'Error';

   mysqli_stmt_close($stmt);
      
   }

?>
<?php if(isset($_POST['uId'])) { ?>
<form action="edycja.php" method="POST">
   <input type="hidden" name="Id" value=<?php echo $_POST['uId'] ?>>
   <label for="imie">Podaj imie:</label>
   <input type="text" name="imie" id="imie" maxlength="81" value=<?php echo $_POST['imie'] ?> required>
   <br>
   <label for="nazwisko">Podaj nazwisko:</label>
   <input type="text" name="nazwisko" id="nazwisko" maxlength="81" value=<?php echo $_POST['nazwisko'] ?> required>
   <br>
   <label for="pesel">Podaj PESEL:</label>
   <input type="text" name="pesel" id="pesel" style="color:gray" value=<?php echo $_POST['pesel'] ?> readonly>
   <br>
   <label for="email">Podaj email:</label>
   <input type="email" name="email" id="email" maxlength="181" value=<?php echo $_POST['email'] ?>>
   <br>
   <input type="reset" value="Wyczyść" style="margin-right: 1em;">
   <input type="submit" value="Zapisz zmiany">
</form>
<?php } ?>
</body>
</html>