<?php
  session_start();
?>
<?php
  require("connessione.php");
?>
<!DOCTYPE html>
<html lang = "en">
  <head>
    <title>Sign</title>
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

      #formNewClient{
        text-align: center;
      }

      input{
        margin: 5px;
        width: 100px;
      }
    </style>
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
                      <span>  
                        <p>
                          <strong>
                            Nome 
                          </strong>
                        </p>
                        <input type = "text" name = "nome">
                      </span>
                      <br><br>
                      <span>
                        <p>
                          <strong>
                            Cognome 
                          </strong>
                        </p>
                        <input type = "text" name = "cognome">
                      </span>
                      <br><br>
                      <span>
                        <p>
                          <strong>
                            Email 
                          </strong>
                        </p>
                        <input type = "email" name = "email">
                      </span>
                      <br><br>
                      <span>
                        <p>
                          <strong>
                            Password 
                          </strong>
                        </p>
                        <input type = "password" name = "password">
                      </span>
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
                if(strlen($nome) != 0 &&
                   strlen($cognome) != 0 &&
                   strlen($email) != 0 &&
                   strlen($password) != 0){
                    $password = crypt($password, 0);
                    $query = "SELECT *
                              FROM utenti
                              WHERE email = '$email'";
                    $result = mysqli_query($connessione, $query);
                    if(mysqli_num_rows($result) != 0){
                      $message = "Error 404...Utente già registrato nel nostro sito";
                      echo "<script type='text/javascript'>
                              alert('$message');
                            </script>";
                    }
                    else{
                      $query = "INSERT INTO utenti(nome, cognome, email, password) VALUES('$nome', '$cognome', '$email', '$password')";
                      $result = mysqli_query($connessione, $query);
                      if(!$result){
                        ?>
                        <div>
                          <?php
                            header("Location: http://localhost/LibraryPHP/sign.php/");
                            echo "<a href = 'login.php'>login for you</a>";
                          ?>
                        </div>
                        <?php
                      }
                      else{
                        $error = false;
                        $_SESSION['messaggio_errore'] = $error;
                        header("Location: http://localhost/LibraryPHP/login.php/");
                      }
                    }
                }
                else{
                  header("Location: http://localhost/LibraryPHP/sign.php/");
                }
              }
            ?>
        </section>
      </main>
    </div>
  </body>    
</html>