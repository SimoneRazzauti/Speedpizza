<?php

/* connessione al db */

$con = mysqli_connect("localhost","root","","speedpizza");

// Verifica connessione

if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
?>