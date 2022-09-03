<?php
  require('session.php');
  require('connessione.php');
?>
<!DOCTYPE html>
<html lang = "en">
  <head>
    <title>Aggiunta libro</title>
  </head>
  <body>
    <?php
      $idLibro = $_GET['idLibro'];
      $email = $_SESSION['emailUtente'];
      $query = "SELECT id
                FROM utenti
                WHERE email = '$email'";
      $result = mysqli_query($connessione, $query);
      if(!$result){
        $error = true;
        $_SESSION['messaggio_errore'] = $error;
        header('infoBook.php');
      }
      else{
        $row = mysqli_fetch_array($result);
        $idUtente = $row[0];

        mysqli_free_result($result);

        $query = "";
        $result = mysqli_query($connessione, $query);
        if(!$result){
          
        }
        else{
          $query = "INSERT INTO aggiunta(codiceutente, codicelibri, acquistato)
                    VALUES('$idUtente', '$idLibro', false)";
          $result = mysqli_query($connessione, $query);
          if($result){
          
          }
          else{
          
          }
        }
      }
    ?>
  </body>
</html>