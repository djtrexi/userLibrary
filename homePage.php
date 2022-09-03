<!DOCTYPE html>
<html lang = "en">
  <head>
    <title>Welcome</title>
    <meta charset = "UTF-8">
  </head>
  <body>
    <div id = "header">
      <header>
        <div id = "title">  
          <h1>Welcome on the Library</h1>
        </div>  
        <div id = "name">
          <p>
            <strong>
              Creato da Cerchioni Leonardo
            </strong>
          </p>
        </div>
      </header>
    </div>
    <div id = "main">
      <main>
        <div id = "login">
          <section>
            <article>
              <?php
                echo "<a href = 'login.php'><input type = 'submit'>Login</input></a>";
              ?>
              </article>
          </section>
        </div>
        <div id = "sing">
          <section>
            <article>
              <?php
                echo "<a href = 'sign.php'><input type = 'submit'>Sign</input></a>";
              ?>
            </article>
          </section>
        </div>
      </main>
    </div>
  </body>
</html>