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
                  <button>
                    <?php 
                      echo "<a href = 'viewBooksNotShop.php'></a>"; 
                      ?>
                    Libri aggiunti alla lista ma non acquistati
                  </button>
                  <button>
                    <?php 
                      echo "<a href = 'viewBooksShop.php'></a>"; 
                    ?>
                    Libri acquistati
                  </button>
                  <button>
                    <?php
                      echo "<a href = 'viewBooksAll.php'></a>";
                    ?>
                    Tutti i libri sia che non acquistati
                  </button>
                </nav>
              </div>
            </div>
          </article>
        </section>
      </main>
    </div>
  </body>
</html>