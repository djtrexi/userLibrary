<?php
  require('session.php');
  require('connessione.php');
?>
<!DOCTYPE html>
<html lang = "en">
  <head>
    <?php
      $idUtente = $_SESSION['idUtente'];
    ?>
    <title>All books</title>
  </head>
  <body>
    <div>
      <header>
        <div>
          <h1></h1>
        </div>
        <div>
        </div>
      </header>
    </div>
    <div>
      <main>
        <section>
          <article>
            <div>
              <?php
                $query = "SELECT l.id, l.titolo, l.casaeditrice, l.edizione, l.annodipubblicazione, l.prezzo, a.acquistato
                          FROM aggiunta a, libri l
                          WHERE a.codiceutente = '$idUtente' AND a.codicelibri = l.id";
                $result = mysqli_query($connessione, $query);
                if($result){
                  if(mysqli_num_rows($result) != 0){
                    echo "<table>";
                      echo "<tr>";
                        echo "<th>Titolo</th>";
                        echo "<th>Casa editrice</th>";
                        echo "<th>Edizione</th>";
                        echo "<th>Anno di pubblicazione</th>";
                        echo "<th>Acquistato</th>";
                      echo "</tr>";
                      while($row = mysqli_fetch_array($result)){
                        echo "<tr>";
                          echo "<td>$row[titolo]</td>";
                          echo "<td>$row[casaedotrice]</td>";
                          echo "<td>$row[edizione]</td>";
                          echo "<td>$row[annodipubblicazione]</td>";
                          $acquistato = (boolean) $row['acquistato'];
                          if($acquistato){
                            echo "<td>SI</td>";
                          }
                          else{
                            echo "<td><a href = 'aggiuntaLibro.php?idLibro=$row[id]'><input type = 'submit' value = 'comprato'>NO</td>";
                          }
                        echo "</tr>";
                      }
                    } 
                }
              ?>
            </div>
          </article>
        </section>
      </main>
    </div>
  </body>
</html>