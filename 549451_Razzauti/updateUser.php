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
	<title> Update delle informazioni di <?php echo $_SESSION['username'];?></title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link href="css/stileMenu.css" rel="stylesheet">
	
	<link rel="stylesheet" href="css/registrazione.css">
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
	</script>
</head>
	<body>
		
<?=template_menu_users()?>
<br>
	<h2 style="text-align: center";>Ciao <?php echo $_SESSION['nome'] ?>, modifica i tuoi dati utente</h2>

	
	
	<form class="form form-login" name="updateUserData" action="process.php" method="POST" >
		
	<div class="separa">
	<label class="colonna">
	<p class="small">Nome</p>
	<input type="text" name="nome" value="" placeholder="<?php echo $_SESSION['nome'];?>" />
    
  </label>
  
  <label class="colonna">
	<p class="small">Cognome</p>
	<input type="text" name="cognome" value="" placeholder="<?php echo $_SESSION['cognome'];?>" />
  </label>
  </div>
  
  <label>
	<p class="small">email</p>
	<input type="email" name="email"  value="" placeholder="<?php echo $_SESSION['email'];?>" />
  </label>

  <label>
	<p class="small">username</p>
	<input type="text" name="username" value="" placeholder="<?php echo $_SESSION['username'];?>" />
  </label>

  <div class="separa">
  <label class="colonna">
	<p class="small">password</p>
	<img src="immagini/eye.png" style="display: inline"  width="15px" height="15px" onclick="rivela()">

  <input type="password" name="password" id="password" value="" autocomplete="off" placeholder="inserisci una password"  >
  </label>

<label class="colonna">
	<p class="small">Nome squadra</p>
	<input type="text" name="squadra"  value="" placeholder="<?php echo $_SESSION['squadra'];?>" />
</label>
  </div>


	<div class="accetta">
		<div class="centra">
			
	<input type="submit" name="updateUserData" value="Modifica"/> 
	<input type="reset" name="reset" value="Annulla"/><br>
	<br>
    <a href="modificaPassword.php" style="color: white;">Modifica la password</a>
	<a href="users.php" style="color: white;">Torna indietro</a>
	</div>
</div>
		
		
	</form>





    <?php
      if(isset($_GET['error'])){
        switch($_GET['error'])
        {
          case "username":
            echo "<p>username già esistente, provare di nuovo con un altro username</p>"."<br />";
          break;
          
          case "email":
            echo "<p>email già esistente, provare di nuovo con un'altra email</p>"."<br />";
          break;
          
          case "squadra":
            echo "<p>squadra già esistente, provare di nuovo con un'altra squadra</p>"."<br />";
          break;
        
          case "false":
            echo "<p>modifica avvenuta con successo, tornare indietro alla homepage utente</p>"."<br />";
          break;
        }
      }
    ?>
	</body>
</html>
