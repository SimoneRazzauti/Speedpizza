<?php
session_start();
require('inc/db.php');
include('utility/function.php'); # funzioni di utilità

if (!isset($_SESSION["username"]) && !isset($_COOKIE["NOME"])) {
	header('location: 404.php');
	exit;
}

if (isset($_COOKIE["NOME"])) {
	$_SESSION["username"] = $_COOKIE["NOME"];
}

?>
<!DOCTYPE HTML>
<html lang="it">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Storico Utente</title>
	<link rel="stylesheet" href="CSS/stilecarrello.css" type="text/css">
	<link rel="stylesheet" href="css/styleMenu.css" type="text/css">
	<link rel="stylesheet" href="css/styleModalUser.css" type="text/css">
	<link rel="icon" href="immagini/icon.png" sizes="32x32" type="image/x-icon">
</head>

<body>
	<!-- MENU -->
	<?= template_menu(); ?>

	<!-- CORPO CENTRALE -->
	<div id="center_div">
		<h1> Storico Ordini </h1>
		<hr>
		<?php
		$query = "SELECT * FROM ordini_def WHERE utente='" . $_SESSION["username"] . "'";
		$result = mysqli_query($con, $query);
		$resultCount = mysqli_num_rows($result);

		if ($resultCount == 0) { /* Se il carrello è vuoto */
			echo '<h2 id="h2_empty"> Ops! Non hai ancora effettuato ordini.. </h2>
    			  <img src="immagini/storico_empty.jpg" alt="nessun ordine" id="empty_cart">
    			  <a href="creation.php" id="a_empty"> Inizia a ordinare adesso! </a>';
		}

		$rows_ordini = array();
		while ($row = mysqli_fetch_assoc($result)) {
			$rows_ordini[] = $row;
		}

		for ($i = 0; $i < $resultCount; $i++) {

			$query2 = "SELECT * FROM pizzacustom_def WHERE codordine='" . $rows_ordini[$i]['codordine'] . "'";
			$result2 = mysqli_query($con, $query2);
			$resultCount2 = mysqli_num_rows($result2);

			echo '
   			<section>
				<div class="image">
					<img src="immagini/pizza_delivery.png" alt="pizza_delivery">
				</div>
				<div class="testo">
					<h2> Ordine - ' . $rows_ordini[$i]['codordine'] . ' </h2>
					<p class="description_p"> x' . $resultCount2 . ' - Pizza Personalizzata </p>
				<p class="description_b"> Data Pagamento: <strong>' . $rows_ordini[$i]['data_pagamento'] . '</strong> </p>
				<p class="totalePagamento"> Totale <br> &nbsp;&nbsp;<strong>' . $rows_ordini[$i]['totale_ordine'] . '&euro; </strong></p>
				</div>
			</section>
			<hr>
			';
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
				<button type="button" onclick="location.href = 'info.php';" class="modalbutton">Le mie informazioni</button>
				<button type="button" onclick="location.href = './utility/logout.php';" class="modalbutton">Logout</button>
			</div>
		</div>
	</div>
	<!-- FINE MODAL UTENTE -->

	<script src="js/mainscript.js"> </script>
</body>

</html>