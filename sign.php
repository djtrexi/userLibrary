<?php
  require("connessione.php");
?>
<!DOCTYPE html>
<html lang = "en">
  <head>
    <title>Sign</title>
  </head>
  <body>
    <div id = "header">
      <header>
        <div id = "title">
          <h1>Sign</h1>
        </div>
      </header>
    </div>
    <div>
      <main>
        <section>
            <?php
              if(!isset($_POST['nome']) ||
                !isset($_POST['cognome']) || 
                !isset($_POST['email']) || 
                !isset($_POST['password'])){
            ?>
                <article>
                  <div id = "formNewClient">
                    <form method = "POST" action = "sign.php">
                      Nome <input type = "text" name = "nome">
                      <br><br>
                      Cognome <input type = "text" name = "cognome">
                      <br><br>
                      Email <input type = "email" name = "email">
                      <br><br>
                      Password <input type = "password" name = "password">
                      <br><br>
                      <input type = "submit" value = "Sign">
                      <input type = "reset" value = "Reset">
                    </form>
                  </div>
                </article>
            <?php
              }
              else{
            ?>
            <?php
                $nome = $_POST['nome'];
                $cognome = $_POST['cognome'];
                $email = $_POST['email'];
                $password = $_POST['password'];
                if(strlen($nome) == 0 &&
                   strlen($cognome) == 0 &&
                   strlen($email) == 0 &&
                   strlen($password) == 0){
                    $password = crypt($password, 0);
                    $query = "SELECT *
                              FROM utenti
                              WHERE email = '$email'";
                    $result = mysqli_query($connessione, $query);
                    if(mysqli_num_rows($result) == 0){
                      ?>
                      <div>
                        <p>Utente già registrato... :(</p>
                      </div>
                      <?php
                    }
                    else{
                      $query = "INSERT INTO utenti VALUES('$nome', '$cognome', '$email', '$password')";
                      $result = mysqli_query($connessione, $query);
                      if(!$result){
                        ?>
                        <div>
                          <p>Problemi nella registrazione dell'utente riprova tra poco... :(</p>
                        </div>
                        <?php
                      }
                      else{
                        echo "<a href = ''>Link</a>";
                      }
                    }
                }
              }
            ?>
        </section>
      </main>
    </div>
  </body>    
</html>