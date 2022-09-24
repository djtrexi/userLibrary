<?php
  require('session.php');
  require('connessione.php');
?>
<!DOCTYPE html>
<html lang = "en">
  <head>
    <title>View books</title>
    <style>
      body{
        height: 100%;
        width: 100%;
      }

      #header{
        border: 2px solid black;
        text-align: center;
      }

      #back{
        text-align: center;
        margin-bottom: 5px;
      }

      button{
        text-align: center;
        margin: 15px;
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
      
      #zonemysqliqueryerror{
        text-align: center;
        font-size: 30px;
        border: 2px solid black;
        margin: 15px;
      }
    </style>
  </head>
  <body>
    <div id = "header">
      <header>
        <div id = "zonetitle">
          <h1 id = "title">View books not shop</h1>
        </div>
        <div id = "zonetext">
          <p id = "text">Creato da Leonardo Cerchioni</p>
        </div>
      </header>
    </div>
    <div id = "main">
      <main>
        <section>
          <article>
            <div>
              <?php
                $idUtente = $_SESSION['idUtente'];
                $query = "SELECT l.id, l.titolo, l.casaeditrice, l.edizione, l.annodipubblicazione, l.prezzo
                          FROM aggiunta a, libri l
                          WHERE a.codiceutente = '$idUtente' AND a.codicelibri = l.id AND acquistato = false";
                $result = mysqli_query($connessione, $query);
                if($result){
                  if(mysqli_num_rows($result) != 0){
                    echo "<table>";
                      echo "<tr>";
                        echo "<th>Titolo</th>";
                        echo "<th>Casa editrice</th>";
                        echo "<th>Edizione</th>";
                        echo "<th>Anno di pubblicazione</th>";
                        echo "<th>Compra</th>";
                      echo "</tr>";
                      while($row = mysqli_fetch_array($result)){
                        echo "<tr>";
                          echo "<td>$row[titolo]</td>";
                          echo "<td>$row[casaeditrice]</td>";
                          echo "<td>$row[edizione]</td>";
                          echo "<td>$row[annodipubblicazione]</td>";
                          echo "<td><a href = 'http://localhost/LibraryPHP/shopBook.php/?idLibro=$row[id]'><input type = 'submit' value = 'Compra'></td>";
                        echo "</tr>";
                      }
                  }
                  else{
                    echo "<div id = 'zonemysqliqueryerror'>";
                      echo "<div id = 'zonetitlerror'>";
                        echo "<h1 id = 'titlerror'>Non ci sono libri da comprare</h1>";
                      echo "</div>";
                      echo "<div>";
                        echo "<button type = 'submit'>Torna alla home</button>";
                      echo "</div>";
                    echo "</div>";
                  } 
                }
              ?>
            </div>
          </article>
        </section>
        <section>
          <article>
            <?php
              echo "<button id = 'back' type = 'submit'>
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