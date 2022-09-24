<?php
  require('session.php');
  require('connessione.php');
?>
<!DOCTYPE html>
<html lang = 'en'>
  <head>
    <title>The book</title>
    <meta charset = "UTF-8">
    <style>
      body{
        height: 100%;
        width: 100%;
      }

      #header{
        text-align: center;
        border: 2px solid black;
      }

      #zoneError{
        margin: 6px;
        text-align: center;
        font-size: 15px;
        border-radius: 14px;
        border: 2px solid black;
      }

      form{
        margin-top: 22px;
        text-align: center;
      }

      #zonelogout{
        margin-top: 15px;
        text-align: center;
      }
    </style>
  </head>
  <body>
    <div id = "header">  
      <header>
        <div id = "zoneTitle">
          <div>
            <h1 id = "title">Ricerca libro</h1>
          </div>
          <div id = "zoneText">
            <div id = "zoneCreate">
              <p id = "pHeader">Creato da Leonardo Cerchioni</p>
            </div>
            <div id = "zoneTextPostCreate">
              <p>La ricerca del libro si fa per titolo del nome del libro</p>
            </div>
          </div>
        </div>       
      </header>
    </div>
    <div>
      <main>
        <div>
          <section>
            <article>
              <?php
                $error = $_SESSION['messaggio_errore'];
                if($error){
              ?>
                  <div id = "zoneError">
                    <header>
                      <div>
                        <h2>Errore 404</h2>
                      </div>
                      <div>
                        <p>
                          <strong>
                            C'è stato un errore sulla ricerca del libro
                          </strong>
                        </p>
                      </div>
                    </header>
                  </div>
              <?php
                }
              ?>
            </article>
          </section>
        </div>
        <div>
          <section>
            <article>
              <div id = "inputBook">
                <?php
                  if(!isset($_POST['namebook'])){
                ?>
                    <form method = "POST" action = "researchBook.php">
                      <span>
                        <strong>
                          Nome libro:
                        </strong>
                        <input type = 'text' placeholder = "Ex: Diabolik" name = "namebook">
                      </span>
                      <input type = "submit" value = "research">
                    </form>
                    <?php
                  }
                  else{
                ?>
              </div>
            </article>
          </section>
        </div>
        <div id = "checkInputBook">
          <section>
            <article>
              <?php
                  $nomeLibro = $_POST['namebook'];
                  if(strlen($nomeLibro) == 0){
                    ?>
                    <div>
                      <?php
                        $_SESSION['messaggio_errore'] = true;
                        header('Location: http://localhost/LibraryPHP/researchBook.php/');
                      ?>
                    </div>
                    <?php
                  }
                  else{
                    $_SESSION['messaggio_errore'] = false;
                    $_SESSION['nameBook'] = $nomeLibro;
                    header('Location: http://localhost/LibraryPHP/infoBook.php/');
                  }
                }
            ?>
          </article>
        </section>
        </div>
        <section>
          <article>
            <div id = "zonelogout">
              <?php  
                echo "<button type = 'submit'><a href = 'http://localhost/LibraryPHP/logout.php/'>logout</a></button>";
              ?>
            </div>
          </article>
        </section>
      </main>
    </div>
  </body>
</html>