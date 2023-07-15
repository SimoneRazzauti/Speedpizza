//<?php
//session_start();
//if(!isset($_SESSION['username']) || $_SESSION['name'] == "admin"){
//  header('Location: login.php?error=2'); //non autenticato
//  exit;
//}
//include_once("include/config.php");
//
//$username = $_SESSION['username'];
//$con = config::connect();
////gestione dell'errore che se cancello l'ultimo utente mi si bugga tutto
//$query = $con->prepare("
//
//DELETE FROM squadre WHERE (giocatore=:username);
//DELETE FROM utenti WHERE (username=:username);
//
//");
//
//$query->bindParam(":username", $username);
//
//$query->execute();
//$con = NULL;
//session_unset();
//session_destroy();
//header("Location: index.html");
//exit;
//?>