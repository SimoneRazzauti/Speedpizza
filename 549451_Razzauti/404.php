<?php
session_start();
if(!isset($_SESSION['username'])){
  header('Location: index.html?error=2'); //non autenticato
  exit;
}
//session_unset();
//session_destroy();
?>

<!DOCTYPE HTML>
<html lang="it">
	<head>
	<meta charset="UTF-8">
	<title>Error 404</title>
	<link href="CSS/stile404.css" rel="stylesheet" type="text/css">
	<link rel="icon" href="immagini/error_icon.png" sizes="32x32"> 
	</head>
<body>
	<div id="center_div">
		<div id="image">
		<img src="immagini/sad_face.png" alt="sad_face">
		</div>
		<h1> 404 </h1>
		<h3> Pagina non trovata </h3>
		<p id="p1"> La pagina a cui stai cercando di accedere non esiste o si è verificato un errore.</p>
		<p id="p2"> Accedi alla <a href="index.html"> Home </a> oppure riprova successivamente.</p>
	</div>
</body>
</html>