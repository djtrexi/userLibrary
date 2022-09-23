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

      button{
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
    </style>
  </head>
  <body>
    <div>
      <header>
        <div>
          <h1>View books not shop</h1>
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
                          echo "<td><a href = 'http://localhost/LibraryPHP/aggiuntaLibro.php/?idLibro=$row[id]'><input type = 'submit' value = 'Compra'></td>";
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