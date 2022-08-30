<?php
  session_start();
  if(!isset($_SESSION['start_time'])){
    header('homePage.php');
    die;
  }
  else{
    $now = time();
    $time = $now - $_SESSION['start_time'];
    if($time > 3600){
      header("logut.php");
      die;
    }
  }
?>