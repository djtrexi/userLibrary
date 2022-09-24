<?php
  session_start();
  session_unset();
  session_destroy();
?>
<!DOCTYPE html>
<html lang = "it">
  <head>
    <meta charset = "UTF-8">
  </head>
  <body>
    <?php
      header('Location: http://localhost/LibraryPHP/homePage.php/');
    ?>
  </body>
</html>