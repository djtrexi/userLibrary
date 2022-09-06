<?php
  require('session.php');
  require('connessione.php');
?>
<!DOCTYPE html>
<html lang = "en">
  <head>
    <title>Info libro</title>
  </head>
  <body>
    <div>
      <header>
        <div>
          <?php
            $nameLibro = $_SESSION['nameBook'];
            $nameLibro = ucfirst($nameLibro);
            $nameLibro = trim($nameLibro);
          ?>
          <h1>Info libro <?php echo $nameLibro ?></h1>
        </div>
        <div>
          <p>
            <strong>
              Creato da Leonardo Cerchioni
            </strong>
          </p>
        </div>
      </header>
    </div>
    <div>
      <main>
        <div>
          <section>
            <article>
              <header>
                <div>
                  <?php
                    $error = $_SESSION['messaggio_errore'];
                    if($error){
                  ?>
                      <div>
                        <div>
                          <h2>ERROR 404</h2>
                        </div>
                        <div>
                          <p>
                            <strong>
                              Errore nel cercare informazioni da lei inserite
                              <div>
                                <?php
                                  echo "<a href = 'researchBook.php'>Ritorna alla ricerca</a>";
                                ?>
                              </div>
                            </strong>
                          </p>
                        </div>
                      </div>
                  <?php
                    }
                  ?>
                </div>
              </header>
            </article>
          </section>
        </div>
        <section>
          <article>
            <div>
              <?php
                $query = "SELECT *
                          FROM libri
                          WHERE titolo LIKE '%$nameLibro%'";
                $result = mysqli_query($conessione, $query);
                if(mysqli_num_rows($result) == 0){
                  $error = true;
                  $_SESSION['messaggio_errore'] = $error;
                  header('infoBook.php');
                }
                else{
              ?>
                  <div>
                    <?php
                      $error = false;
                      $_SESSION['messaggio_errore'] = $error;
                      
                      echo "<table>";
                        echo "<tr>";
                          echo "<th>Titolo</th>";
                          echo "<th>Casa editrice</th>";
                          echo "<th>Edizione</th>";
                          echo "<th>Anno di pubblicazione</th>";
                          echo "<th>Prezzo</th>";
                        echo "</tr>";
                        while($row = mysqli_fetch_array($result)){
                          echo "<tr>";
                            echo "<td>$row[titolo]</td>";
                            echo "<td>$row[casaeditrice]</td>";
                            echo "<td>$row[edizione]</td>";
                            echo "<td>$row[annodipubblicazione]</td>";
                            echo "<td>$row[prezzo]</td>";
                            echo "<td><a href = 'aggiuntaLibro.php?idLibro=$row[id]'><input type = 'submit' value = 'aggiungi'>Aggiungi</td>";
                          echo "</tr>";
                        }
                      echo "</table>";
                    ?>
                  </div>
              <?php
                }
              ?>
            </div>
            <div>
              <section>
                <article>
                  <div>
                    <nav>
                      <div>
                        <a href = 'researchBook.php'><input type = 'submit' value = 'torna alla home'>
                      </div>
                      <div>
                        <a href = 'viewBooks.php'><input type = 'submit' value = 'vedi i tuoi libri salvati'>
                      </div>
                    </nav>
                  </div>
                </article>
              </section>
            </div>
          </article>
        </section>
      </main>
    </div>
  </body>
</html>