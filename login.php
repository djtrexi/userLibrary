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
  </head>
  <body>
    <div>
      <header>
        <div>
          <h1>Login utente</h1>
        </div>
        <div>
          <p>Creato da Leonardo Cerchioni</p>
        </div>
      </header>
      <?php
        echo "<div>";
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
                    <input type = "submit" value = "login">
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
                        header('login.php');
                      }
                      else{
                        $password = $_POST['password'];
                        $password = crypt($password, 0);
                        
                        $email = $_POST['email'];

                        $query = "SELECT *
                                  FROM utenti
                                  WHERE email = '$email' AND password = '$password";
                        $result = mysqli_query($connessione, $query);
                        if($result){
                          $_SESSION['emailUtente'] = $email;
                          $_SESSION['start_time'] = time();
                          header('researchBook.php');
                        }
                        else{
                          $error = true;
                          $_SESSION['messaggio_errore'] = $error;
                          mysqli_free_result($result);
                          header('login.php');
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