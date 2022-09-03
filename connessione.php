<?php
  $connessione = mysqli_connect("localhost", "root", "", "bibloteca");
  
  if(mysqli_connect_errno()){
    echo "<div>";
      echo "<h3>La connessione al database è falita</h3>" .mysqli_connect_error();
    echo "</div>";
  }
?>