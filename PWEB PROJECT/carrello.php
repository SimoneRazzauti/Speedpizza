<?php
session_start();
require('inc/db.php');
include('utility/function.php'); # funzioni di utilità

if(!isset($_SESSION["username"]) && !isset($_COOKIE["NOME"])){
	header('location: accesso.php?target=Carrello');
	exit;
}

if(isset($_COOKIE["NOME"])){
	$_SESSION["username"] = $_COOKIE["NOME"];
}

?>
<!DOCTYPE HTML>
<html lang="it">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title> Carrello </title>
	<link href="CSS/stilecarrello.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="css/styleMenu.css" type="text/css">
	<link rel="icon" href="immagini/icon.png" sizes="32x32" type="image/x-icon">
</head>
<body>
	<!-- MENU -->
	<?=template_menu();?>
	

	<div id="center_div">
		<h1> Pizze nel tuo Carrello </h1>
		<hr>

		<?php 

		$totale_finale = 0; /* Contatore prezzo totale carrello */

		$query = "SELECT * FROM ordini_log WHERE utente='".$_SESSION["username"]."'";
   		$result=mysqli_query($con,$query);
    	$resultCount=mysqli_num_rows($result);

    	if($resultCount == 0) { /* Se il carrello è vuoto */
    		echo '<h2 id="h2_empty"> Ops! Il tuo Carrello &egrave; vuoto.. </h2>
    			  <img src="immagini/emptycart.png" alt="carrello vuoto" id="empty_cart">
    			  <a href="creation.php" id="a_empty"> Inizia a ordinare adesso! </a>';

    	}

    	$rows_ordini = array();
		while($row = mysqli_fetch_assoc($result)){
        $rows_ordini[] = $row;
   		}


		for($i = 0; $i<$resultCount; $i++){

		$totale_finale += $rows_ordini[$i]['totale']; /* Incremento il totale */

		$query2 = "SELECT * FROM ingredienti_log WHERE pizza='".$rows_ordini[$i]['pizza']."'";
		$result2=mysqli_query($con,$query2);
		$resultCount2=mysqli_num_rows($result2);
		$rows_ingredienti = array();
		while($row2 = mysqli_fetch_assoc($result2)){
        $rows_ingredienti[] = $row2;
   		}

   		$counter_ingredients=0; // Contatore ingredienti

   		$query3 = "SELECT * FROM pizzacustom_log WHERE idpizza='".$rows_ordini[$i]['pizza']."'";
   		$result3=mysqli_query($con,$query3);
   		$row3 = mysqli_fetch_assoc($result3);

   		$counter_drinks=0; // Contatore Bibite

   		$query4 = "SELECT * FROM bevande_log WHERE pizza='".$rows_ordini[$i]['pizza']."'";
   		$result4=mysqli_query($con,$query4);
   		$resultCount4=mysqli_num_rows($result4);
		$rows_bibite = array();
		while($row4 = mysqli_fetch_assoc($result4)){
        $rows_bibite[] = $row4;
   		}

		echo '
		<section>

			<div class="image"> 
				<img src="immagini/pizza_sample.jpg" alt="pizza">
			</div>

			<div class="testo">

				<h2> Pizza Personalizzata - #'.$rows_ordini[$i]['pizza'].' </h2>

				<p class="price"> '.$rows_ordini[$i]['totale'].'&euro; </p>
				<form action="./utility/remove.php" class="remove_form" method="post">
				<input type="submit" value="Rimuovi" class="remove_btn" name="'.$rows_ordini[$i]['pizza'].'">
				</form>

				<p class="description_p"> <strong>Impasto:</strong> '.$row3['impasto'].' <strong>Salsa:</strong> '.$row3['salsa'].' 
					<strong>Formaggio:</strong> '.$row3['formaggio'].'
					<br>
					<strong>Ingredienti:</strong> ';
					while( $counter_ingredients < $resultCount2){
						if($counter_ingredients == 0){
						echo' '.$rows_ingredienti[$counter_ingredients]['ingrediente'];
						}
						else {
							echo ', '.$rows_ingredienti[$counter_ingredients]['ingrediente'];
						}
						$counter_ingredients++;
					}
				echo '
				</p>

				<p class="description_b"> <strong>Bibite: </strong>';
									while( $counter_drinks < $resultCount4){
										if($counter_drinks == 0){
											echo''.$rows_bibite[$counter_drinks]['bevanda'].' '.'('.$rows_bibite[$counter_drinks]['quantita'].')'.'';
										}
										else {
											echo ', '.$rows_bibite[$counter_drinks]['bevanda'].' '.'('.$rows_bibite[$counter_drinks]['quantita'].')';		
										}
									$counter_drinks++;
									}
				echo '
				</p>

			</div>

		</section>


		<br>
		<hr>
		';
	}

	$_SESSION["totale"] = $totale_finale;

	if ($resultCount > 0){
		echo '
	<div id="total">

		<p> Subtotale Carrello &emsp; '.$totale_finale.'&euro; </p>
		<p style="color: red"> Spedizione Gratuita &emsp; 0.00&euro; </p>
		<h2> Totale &emsp; '.$totale_finale.'&euro; </h2>

	</div>
	<hr style="width: 100%">
	<footer> 
		<a href="creation.php"> Continua ad ordinare </a>
		<form action="./utility/pay.php" id="pay_form">
		<input type="submit" id="order_complete" value="Check Out" name="checkout">
		</form>
	</footer>';
	}
	?>
</div>

	<!-- MODAL UTENTE -->

	<div id="id03" class="modal">
  
  <div class="modal-content animate">
    <div class="imgcontainer">
      <span onclick="closemodal2()" class="close" title="Close Modal">&times;</span> <!-- Span chiusura modal -->
      <img src="immagini/user.png" alt="Avatar" class="avatar">
    </div>

    <div class="container-modal">
      <p><strong><?php echo $_COOKIE["NOME"]; ?></strong></p>
		<br>
		<br>

	  <button type="button" onclick="location.href = 'info.php';" class="modalbutton">Le mie informazioni</button>
      <button type="button" onclick="location.href = 'storico.php';" class="modalbutton">Storico Ordini</button>
      <button type="button" onclick="location.href = './utility/logout.php';" class="modalbutton">Logout</button>
    </div>

    <div class="container" style="background-color:#f1f1f1">
    </div>
  </div>
 </div>

<script src="js/mainscript.js"> </script>
</body>
</html>