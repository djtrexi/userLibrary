<!DOCTYPE html>
<html lang = "en">
  <head>
    <title>Welcome</title>
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

      #title{
        font-size: 35px;
      }

      #choise{
        text-align: center;
      }

      button{
        margin: 15px;
        width: 100px;
      }
    </style>
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
        <div id = "choise">
          <section>
            <article>
              <?php
                echo "<button type = 'submit'><a href = 'login.php'>Login</a></button>";
                echo "<button type = 'submit'><a href = 'sign.php'>Sign</a></button>";
              ?>
            </article>
          </section>
        </div>
      </main>
    </div>
  </body>
</html>