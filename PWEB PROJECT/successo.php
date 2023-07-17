<?php
 	$daily_date = date("Y-m-d"); // Data corrente
	if(!isset($_SESSION["username"]) && !isset($_COOKIE["NOME"])){
		header('location: 404.php');
		exit;
	}
?>
<!DOCTYPE html>
<html lang="it">
	<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title> Ordine effettuato con successo </title>
		<link href="./CSS/stilesuccesso.css" rel="stylesheet" type="text/css">
		<link rel="icon" href="immagini/icon.png" sizes="32x32" type="image/x-icon">
	</head>
<body>
	<div id="center_div">
		<div class="imgdiv">
      		<img src="immagini/check.png" alt="check" class="check">
    	</div>
    	<div id="intestation">
    		<h1> Grazie! </h1>
    		<p> Il tuo ordine del giorno <?php echo $daily_date ?> &egrave; stato confermato con successo. </p>
    		<a href="index.php"> &#8592; TORNA ALLA HOME </a>
		</div>
	</div>
</body>
</html>


