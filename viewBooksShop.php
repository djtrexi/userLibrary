<?php
  require('session.php');
  require('connessione.php');
?>
<!DOCTYPE html>
<html lang = "en">
  <head>
    <title>View books</title>
    <meta charset = "UTF-8">
    <style>
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

      button{
        text-align: center;
        margin-bottom: 5px;
      }

      #header{
        border: 2px solid black;
        text-align: center;
        margin-bottom: 15px;
      }
    </style>
  </head>
  <body>
    <div id = "header">
      <header>
        <div id = "zonetitle">
          <h1 id = "title">View books shop</h1>
        </div>
        <div id = "zonetext">
          <p id = "text">Creato da Leonardo Cerchioni</p>
        </div>
      </header>
    </div>
    <div>
      <main>
        <section>
          <article>
            <div>
              <?php
                $idUtente = $_SESSION['idUtente'];
                $query = "SELECT l.id, l.titolo, l.casaeditrice, l.edizione, l.annodipubblicazione, l.prezzo, a.acquistato
                          FROM aggiunta a, libri l
                          WHERE a.codiceutente = '$idUtente' AND a.codicelibri = l.id AND acquistato = true";
                $result = mysqli_query($connessione, $query);
                if($result){
                  if(mysqli_num_rows($result) != 0){
                    echo "<table>";
                      echo "<tr>";
                        echo "<th>Titolo</th>";
                        echo "<th>Casa editrice</th>";
                        echo "<th>Edizione</th>";
                        echo "<th>Anno di pubblicazione</th>";
                      echo "</tr>";
                      while($row = mysqli_fetch_array($result)){
                        echo "<tr>";
                          echo "<td>$row[titolo]</td>";
                          echo "<td>$row[casaeditrice]</td>";
                          echo "<td>$row[edizione]</td>";
                          echo "<td>$row[annodipubblicazione]</td>";
                        echo "</tr>";
                      }
                  } 
                }
              ?>
            </div>
          </article>
        </section>
        <section>
          <article>
            <?php
              echo "<button type = 'submit'>
                      <a href = 'http://localhost/LibraryPHP/viewBooks.php/'>
                        Back to view books
                      </a>
                    </button>";
            ?>
          </article>
        </section>
        <div>
          <article>
            <section>
              <div>
                <?php
                  echo "<button type = 'submi'>
                          <a href = 'http://localhost/LibraryPHP/logout.php/'>
                            Logout
                          </a>
                        </button>";
                ?>
              </div>
            </section>
          </article>
        </div>
      </main>
    </div>
  </body>
</html>