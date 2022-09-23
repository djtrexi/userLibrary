<?php
  require('session.php');
  require('connessione.php');
?>
<?php
  $idLibro = $_GET['idLibro'];
  $idUtente = $_SESSION['idUtente'];
  $query = "UPDATE aggiunta
            SET acquistato = 1
            WHERE codicelibri = '$idLibro' AND codiceutente = '$idUtente";
  $result = mysqli_query($connessione, $query);
  if($result){
    mysqli_free_result($result);
    header('Location: http://localhost/LibraryPHP/viewBooksNotShop.php/');
  }
  else{
    $error = true;
    $_SESSION['messaggio_errore'] = $error;
    mysqli_free_result($result);
    header('Location: http://localhost/LibraryPHP/infoBook.php/');
  }
?>