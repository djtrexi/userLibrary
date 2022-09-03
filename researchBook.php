<?php
  require('session.php');
  require('connessione.php');
?>
<!DOCTYPE html>
<html lang = 'en'>
  <head>
    <title>The book</title>
  </head>
  <body>
    <div>  
      <header>
        <div>
          <div>
            <h1>Ricerca libro</h1>
          </div>
          <div>
            <p>Creato da Leonardo Cerchioni</p>
          </div>
          <div>
            <p>La ricerca del libro si fa per titolo del nome del libro</p>
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
                  <div>
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
              <div>
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
        <section>
          <article>
            <?php
                  $nomeLibro = $_POST['namebook'];
                  if(strlen($nomeLibro) == 0){
                    ?>
                    <div>
                      <?php
                        $_SESSION['messaggio_errore'] = true;
                        header('researchBook.php');
                      ?>
                    </div>
                    <?php
                  }
                  else{
                    $_SESSION['messaggio_errore'] = false;
                    $_SESSION['nameBook'] = $nomeLibro;
                    header('infoBook.php');
                  }
                }
            ?>
          </article>
        </section>
      </main>
    </div>
  </body>
</html>