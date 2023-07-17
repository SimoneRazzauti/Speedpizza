<?php
session_start();

// DEALLOCO IL COOKIE
setcookie("NOME", "", time()-(60*60*24*7), "/"); // Nota l'aggiunta del percorso "/"

// DEALLOCO LE VARIABILI DI SESSIONE
session_unset();
session_destroy();

// REDIRECT
header("Location: ../index.php");
exit();
?>