<?php
session_start();
require('../inc/db.php');


if (isset($_POST['username'])){
  
  // rimuovi gli spazzi
  $username = stripslashes($_REQUEST['username']);
  
  
  // rimuovi tutti i caratteri speciali
  $username = mysqli_real_escape_string($con,$username);  
  $password = stripslashes($_REQUEST['password']);  
  $password = mysqli_real_escape_string($con,$password);
  
  
  
  //CHECK NEL DB  
  $query = "SELECT * FROM `users` WHERE username='$username' and password='".md5($password)."'";  
  $result = mysqli_query($con,$query) or die(mysqli_error($con));  
  $rows = mysqli_num_rows($result);
  
  // SE C'E' CORRISPONDENZA ACCEDO  
  if($rows==1){

      //CREO VARIABILE DI SESSIONE
      $_SESSION['username'] = $username;
      
      // CREO UN COOKIE DI UNA SETTIMANA
      $expiry_time = time() + 3600*24*7; 
      $cookie_name = "NOME";
      $cookie_value = $username; 
      setcookie($cookie_name, $cookie_value, $expiry_time, "/");
      
      //REDIRECT
      header("location: ../info.php");
      exit;
         }else{
      $_SESSION['error'] = "Username o Password errati. Riprova.";
      header("location: ../index.php?error=1");
      exit;
  }
}
