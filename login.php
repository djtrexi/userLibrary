<?php
  session_start();
?>
<?php
  require('connessione.php');
?>
<!DOCTYPE html>
<html lang = "en">
  <head>
    <title>Login user</title>
    <meta charset = "UTF-8">
    <style>
      body{
        height: 100%;
        width: 100%;
      }

      #title{
        font-size: 35px;
      }

      header{
        text-align: center;
        border: 2px solid black;
      }

      form{
        text-align: center;
      }

      #inviadati{
        margin: 25px;
        text-align: center;
        width: 120px;
      }

      #zoneError{
        margin: 6px;
        text-align: center;
        font-size: 15px;
        border-radius: 14px;
        border: 2px solid black;
      }
    </style>
  </head>
  <body>
    <div id = "header">
      <header>
        <div id = "zone_title">
          <h1 id = "title">Login utente</h1>
        </div>
        <div id = "zone_text">
          <p id = "text">Creato da Leonardo Cerchioni</p>
        </div>
      </header>
      <?php
        echo "<div id = 'zoneError'>";
          $error = $_SESSION['messaggio_errore'];
          if($error){
            echo "<header>";
              echo "<div>";
                echo "<h2>Errore 404</h2>";
              echo "</div>";
              echo "<div>";
                echo "<p>";
                  echo "<strong>";
                    echo "I dati inseriti sono errati...";
                  echo "</strong>";
                echo "</p>";
              echo "</div>";
            echo "</header>";
          }
        echo "</div>";
      ?>
      <div>
        <main>
          <div>
            <section>
              <article>
                <div>
                  <?php
                    if(!isset($_POST['email']) || !isset($_POST['password'])){
                  ?>
                  <form action = "login.php" method = "POST">
                    <span>  
                      <p>
                        <strong>
                          Email
                        </strong>
                      </p>
                      <input type = "email" name = "email">
                    </span>
                    <span>
                      <p>
                        <strong>
                          Password
                        </strong>
                      </p>
                      <input type = "password" name = "password">
                    </span>
                    <br>
                    <input id = "inviadati" type = "submit" value = "login">
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
              <div>
                <?php
                      if(strlen($_POST['email']) == 0 && strlen($_POST['password']) == 0){
                        $error = true;
                        $_SESSION['messaggio_errore'] = $error;
                        header('Location: http://localhost/LibraryPHP/login.php/');
                      }
                      else{
                        $password = $_POST['password'];
                        $email = $_POST['email'];

                        $query = "SELECT *
                                  FROM utenti
                                  WHERE email = '$email'";
                        $result = mysqli_query($connessione, $query);
                        if(mysqli_num_rows($result) != 0){
                          $password_rows_user = mysqli_fetch_array($result);
                          $password = crypt($password, 0);
                          if($password == $password_rows_user['password']){
                            $_SESSION['emailUtente'] = $email;
                            $_SESSION['start_time'] = time();
                            $error = false;
                            $_SESSION['messaggio_errore'] = $error;
                            mysqli_free_result($result);
                            
                            $query = "SELECT id
                                      FROM utenti
                                      WHERE email = '$email'";
                            $result = mysqli_query($connessione, $query);
                            $row = mysqli_fetch_array($result);
                            $idUtente = (int) $row['id'];
                            $_SESSION['idUtente'] = $idUtente;
                            mysqli_free_result($result);

                            header('Location: http://localhost/LibraryPHP/researchBook.php/');
                          }
                          else{
                            $error = true;
                            $_SESSION['messaggio_errore'] = $error;
                            mysqli_free_result($result);
                            header('Location: http://localhost/LibraryPHP/login.php/');
                          }
                        }
                        else{
                          $error = true;
                          $_SESSION['messaggio_errore'] = $error;
                          mysqli_free_result($result);
                          header('Location: http://localhost/LibraryPHP/login.php/');
                        }
                      }
                    }
                ?>
              </div>
            </article>
          </section>
        </main>
      </div>
    </div>
  </body>    
</html>