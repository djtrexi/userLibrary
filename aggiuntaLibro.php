<?php
  require('session.php');
  require('connessione.php');
?>
<?php
  $idLibro = $_GET['idLibro'];
  $email = $_SESSION['emailUtente'];
  $query = "SELECT id
            FROM utenti
            WHERE email = '$email'";
  $result = mysqli_query($connessione, $query);
  if(mysqli_num_rows($result) == 0){
    $error = true;
    $_SESSION['messaggio_errore'] = $error;
    mysqli_free_result($result);
    header('Location: http://localhost/LibraryPHP/infoBook.php/');
  }
  else{
    $row = mysqli_fetch_array($result);
    $idUtente = (int) $row[0];
    $_SESSION['idUtente'] = $idUtente;
    mysqli_free_result($result);

    $query = "SELECT *
              FROM aggiunta, utenti, libri
              WHERE codiceutente = '$idUtente' 
                    AND codicelibri = '$idLibro'";
    $result = mysqli_query($connessione, $query);
    if(mysqli_num_rows($result) == 0){
      $query = "INSERT INTO aggiunta(codiceutente, codicelibri, acquistato)
                VALUES('$idUtente', '$idLibro', false)";
      mysqli_free_result($result);
      $result = mysqli_query($connessione, $query);
      if($result){
        $query = "UPDATE libri
                  SET aggiunto = 1
                  WHERE id = '$idLibro'";
        $result = mysqli_query($connessione, $query);
        if($result){
          $error = false;
          $_SESSION['messaggio_errore'] = $error;
          header('Location: http://localhost/LibraryPHP/viewBooks.php/');
        }
        else{
          $error = true;
          $_SESSION['messaggio_errore'] = $error;
          header('Location: http://localhost/LibraryPHP/infoBook.php/');
        }
      }
      else{
        $error = true;
        $_SESSION['messaggio_errore'] = $error;
        header('Location: http://localhost/LibraryPHP/infoBook.php/');
      }
    }
    else{
      $error = true;
      $_SESSION['messaggio_errore'] = $error;
      mysqli_free_result($result);
      header('Location: http://localhost/LibraryPHP/infoBook.php/');
    }
  }
?>