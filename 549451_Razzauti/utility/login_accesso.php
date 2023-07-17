<?php
require('../inc/db.php');

session_start();
$target = $_GET['target'];

if (isset($_POST['username'])){


  $username = stripslashes($_REQUEST['username']);
  $username = mysqli_real_escape_string($con,$username);
  $password = stripslashes($_REQUEST['password']);
  $password = mysqli_real_escape_string($con,$password);
  
   $query = "SELECT * FROM `users` WHERE username='$username' and password='".md5($password)."'";

   $result = mysqli_query($con,$query) or die(mysqli_error($con));
   
   $rows = mysqli_num_rows($result);
 
   if ($rows == 1) {

      //CREO VARIABILE DI SESSIONE
      $_SESSION["username"] = $username;

      // CREO UN COOKIE DI UNA SETTIMANA
      $expiry_time = time() + 3600*24*7; 
      $cookie_name = "NOME";
      $cookie_value = $username; 
      setcookie($cookie_name, $cookie_value, $expiry_time, "/");
      if ($target === 'Creation') {
          header("Location: ../creation.php");
          exit;
      } else {
          header("Location: ../carrello.php");
          exit;
      }
  } else {
      $_SESSION['error'] = "Username o Password errati. Riprova.";
      header("location: ../accesso.php?target=$target");
      exit;
  }
  
}
 ?>