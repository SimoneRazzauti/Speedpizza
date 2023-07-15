<?php
session_start();
include("include/utility.php");
if(!isset($_SESSION['username']) || $_SESSION['name'] == "admin"){
  header('Location: login.php?error=2'); //non autenticato
  exit;
}

include_once("include/config.php");
?>


<!DOCTYPE html>
<html lang="it">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
	<link href="css/stileMenu.css" rel="stylesheet">
	
	<link rel="stylesheet" href="css/registrazione.css">
	<title>Modifica password di <?php echo $_SESSION['username'];?> </title>
	<style>
		form label{
			margin: auto;
    text-align: center;
		}
		.centra{
			margin: auto;
			text-align: center;
			margin-top: 20px;
		}
		.accetta {
   			display: block;
		}
		body {
    background: #35dc9b;
    /* background: linear-gradient(to bottom, #35dc9b, #3857af); */
    align-items: center;
    justify-content: center;
    height: 100%;
}
		</style>

<script>
	function rivela(){
		var x = document.getElementById("password");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
	}
	
	function rivela1(){
		var x = document.getElementById("password1");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
	}
	
	function rivela2(){
		var x = document.getElementById("password2");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
	}
</script>
</head>
<body>
	
<?=template_menu_users()?>
<h2 style="text-align: center";>Ciao <?php echo $_SESSION['nome'] ?>, modifica la password!</h2>

	<form name="modificaPassword" action="process.php" method="POST">
	<label>
	<p class="small">Inserisci la password corrente:</p>
	<img src="immagini/eye.png" style="display: inline;"  width="15px" height="15px" onclick="rivela()">
	<input type="password" id="password" name="oldPassword" placeholder="****" autocomplete="off"/>
  </label>
  <label>
	<p class="small">Inserisci la nuova password:</p>
	<img src="immagini/eye.png" style="display: inline;"  width="15px" height="15px" onclick="rivela1()">
	<input type="password" id="password1"  name="newPassword" placeholder="nuova password" autocomplete="off"/>
 </label>
  <label>
	<p class="small">Conferma la nuova password corrente:</p>
	<img src="immagini/eye.png" style="display: inline;"  width="15px" height="15px" onclick="rivela2()">
	<input type="password" id="password2"  name="confirmNewPassword" placeholder="conferma la nuova password" autocomplete="off"/>	
</label>
<div class="accetta">
		<div class="centra">
		
	<input type="submit" name="updatePassword" value="Invia le modifiche"/>
	<input type="reset" value="Annulla"/><br><br>
	<a href="updateUser.php"  style="color: white;">Torna alla modifica dei tuoi dati personali</a>
  <br>
</div>
</div>

	</form>
  


</body>
</html>

<?php
  if (isset($_GET['ok']))
  {
    if ($_GET['ok'] == "true")
      echo "<p> Password modificata con successo </p>"."<br />";
    else
      echo "<p> La password che vuoi modificare non è corretta </p>"."<br />";
  }

?>