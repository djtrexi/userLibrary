<?php
  require('session.php');
  require('connessione.php');
?>
<!DOCTYPE html>
<html lang = "en">
  <head>
    <title>Info libro</title>
    <meta charset = "UTF-8">
    <style>
      body{
        height: 100%;
        width: 100%;
      }

      #navLinkButton{
        text-align: center;
      }

      button{
        margin: 15px;
      }

      #header{
        text-align: center;
        border: 2px solid black;
        margin-bottom: 20px;
      }

      table, th, td {
        border: 1px solid;
        width: 100%;
        text-align: center;
        height: 50px;
      }

      th{
        background-color: green;
      }

      tr:hover {
        background-color: coral;
      }
    </style>
  </head>
  <body>
    <div id = "header">
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
                          WHERE titolo LIKE '%$nameLibro%' AND aggiunto = false";
                $result = mysqli_query($connessione, $query);
                if(mysqli_num_rows($result) == 0){
                  $error = true;
                  $_SESSION['messaggio_errore'] = $error;
                  header('Location: http://localhost/LibraryPHP/infoBook.php/');
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
                            echo "<td><a href = 'http://localhost/LibraryPHP/aggiuntaLibro.php/?idLibro=$row[id]'><input type = 'submit' value = 'aggiungi'></td>";
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
                    <nav id = "navLinkButton">
                      <?php
                        echo "<button type = 'submit'><a href = 'http://localhost/LibraryPHP/researchBook.php/'>Torna alla home</a></button>";
                        echo "<button type = 'submit'><a href = 'http://localhost/LibraryPHP/viewBooks.php/'>vedi i tuoi libri salvati</a></button>";
                      ?>
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