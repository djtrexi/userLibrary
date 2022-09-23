<?php
  require('session.php');
  require('connessione.php');
?>
<!DOCTYPE html>
<html lang = "it">
  <head>
    <title>View books</title>
  </head>
  <body>
    <div class = "header">
      <header>
        <div class = "text">
          <div class = "title">
            <h1>View books</h1>
          </div>
          <div class = "made">
            <p>
              <strong>
                Creato da Leonardo Cerchioni
              </strong>
            </p>
          </div>
        </div>
      </header>
    </div>
    <div>
      <main>
        <section>
          <article>
            <div>
              <div>
                <h1>Come vuoi vedere i libri?</h1>
              </div>
              <div>
                <nav>
                  <?php
                      echo "<a href = 'http://localhost/LibraryPHP/viewBooksNotShop.php/'>Libri aggiunti alla lista ma non acquistati</a>"; 
                    ?>
                    
                    <?php 
                      echo "<a href = 'http://localhost/LibraryPHP/viewBooksShop.php/'>Libri acquistati</a>"; 
                    ?>
                    
                    <?php
                      echo "<a href = 'http://localhost/LibraryPHP/viewBooksAll.php/'>Tutti i libri</a>";
                    ?>
                </nav>
              </div>
            </div>
          </article>
        </section>
      </main>
    </div>
  </body>
</html>