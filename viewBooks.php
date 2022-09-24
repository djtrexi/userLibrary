<?php
  require('session.php');
  require('connessione.php');
?>
<!DOCTYPE html>
<html lang = "it">
  <head>
    <title>View books</title>
    <meta charset = "UTF-8">
    <style>
      body{
        height: 100%;
        width: 100%;
      }

      .header{
        text-align: center;
        border: 2px solid black;
      }

      .title{
        font-size: 35px;
      }

      #titlemain{
        font-size: 25px;
        text-align: center;
      }

      button{
        text-align: center;
        display: block;
        margin: 0 auto;
        width: 200px;
      }
    </style>
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
    <div id = "main">
      <main>
        <section>
          <article>
            <div id = "article">
              <div id = "titlemain">
                <h1>Come vuoi vedere i libri?</h1>
              </div>
              <div>
                <nav>
                  <div id = 'notShop'>
                    <?php
                      echo "<button type = 'submit'>
                              <a href = 'http://localhost/LibraryPHP/viewBooksNotShop.php/'>
                                Libri aggiunti alla lista ma non acquistati
                              </a>
                            </button>"; 
                    ?>
                  </div>
                  <div id = 'shop'>
                    <?php 
                      echo "<button type = 'submit'>
                              <a href = 'http://localhost/LibraryPHP/viewBooksShop.php/'>
                                Libri acquistati
                              </a>
                            </button>"; 
                    ?>
                  </div>
                  <div id = 'all'>
                    <?php
                      echo "<button type = 'submit'>
                              <a href = 'http://localhost/LibraryPHP/viewBooksAll.php/'>
                                Tutti i libri
                              </a>
                            </button>";
                    ?>
                  </div>
                </nav>
              </div>
            </div>
          </article>
        </section>
        <div>
          <article>
            <section>
              <div>
                <?php
                  echo "<button type = 'submit'>
                          <a href = 'http://localhost/LibraryPHP/researchBook.php/'>
                            Torna alla  home
                          </a>
                        </button>";
                ?>
              </div>
            </section>
          </article>
        </div>
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