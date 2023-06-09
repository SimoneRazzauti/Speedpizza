<?php
include_once("include/config.php");
include("include/utility.php");

$con = config::connect();

$optionsValide = fetchRecords($con);
$optionsNonValide = fetchRecordsN($con);

$con = NULL;

?>

<!DOCTYPE html>
<html lang="it">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- per "visualizzare" mobile -->

    <title> Registrazione </title>
	
	<link rel="stylesheet" href="css/footer.css">
	<link rel="stylesheet" href="css/registrazione.css">
	<link rel="stylesheet" href="css/stileMenu.css"  type="text/css">

	<style>
	footer{
		position: relative!important;
		margin-bottom: 0;
	}
	</style>
	<script>
	function checkform(){
		var uscita = true;
		var tb = document.getElementById('nome');
			if(tb.value == '')
				{uscita = false;}
		tb = document.getElementById('cognome');
			if(tb.value == '')
				{uscita = false;}
		tb = document.getElementById('email');
			if(tb.value == '')
				{uscita = false;}
		tb = document.getElementById('username');
			if(tb.value == '')
				{uscita = false;}
		tb = document.getElementById('password');
			if(tb.value == '')
				{uscita = false;}
		tb = document.getElementById('squadra');
			if(tb.value == '')
				{uscita = false;}
		if(uscita == false )
		{alert('campo vuoto');}
		
		if(uscita == true)
		{
			tb = document.getElementById("myCheck").checked;
			if(!tb)
				uscita = confirm('confermi?');
		}
		return uscita;
	}
	
	function disabilita() {
		document.getElementById("nuovaLega").disabled=true;
		document.getElementById("numeroPartecipanti").disabled=true;
		document.getElementById("nuovaLega").value="";
	}
	
	function abilita() {
		document.getElementById("nuovaLega").disabled=false;
		document.getElementById("numeroPartecipanti").disabled=false;
	}
	
	function resetLega() {
        var dropDown = document.getElementById("legheEsistenti");
        if(dropDown.selectedIndex == 0)
			abilita();
		else
			disabilita();
    }
	
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
<?=template_menu()?>
	<div class="Centra">
<h1 class="section-title">REGISTRAZIONE FANTABALL</h1>

	<form class="form form-login" name="registrazione" action="process.php" method="POST" >
		
	<div class="separa">
	<label class="colonna">
	<p class="small">Nome</p>
		<input type="text" id="nome" name="nome" value="" placeholder="nome">
    
  </label>
  
  <label class="colonna">
	<p class="small">Cognome</p>
  <input type="text" id="cognome" name="cognome" value="" placeholder="cognome">
  </label>
  </div>
  
  <label>
	<p class="small">email</p>
  <input type="email" id="email" name="email" value="" placeholder="email"/>
  </label>

  <label>
	<p class="small">username</p>
  <input type="text" id="username" name="username" value="" placeholder="username per accedere"/>
  </label>

  <div class="separa">
  <label class="colonna">
	<p class="small">password</p>
  <input type="password" name="password" id="password" value="" autocomplete="off" placeholder="inserisci una password" onmouseover="rivela()">
  </label>

<label class="colonna">
	<p class="small">Conferma Password</p>
<input type="password" name="confirmPassword" id="confirmPassword" value="" autocomplete="off" placeholder="conferma la password" onmouseover="rivela()">
</label>
  </div>

<label>
	<p class="small">Nome Squadra</p>
<input type="text" id="squadra" name="squadra" value="" placeholder="inserisci il nome della tua squadra"/>
</label>

<label for="legheEsistenti"><p class="small">Seleziona una lega</p> </label>
<select id="legheEsistenti" name="legheEsistenti" onchange="resetLega();">
				<option value="0">Scegli una lega</option>
				<optgroup label="Leghe disponibili">
				<?php foreach($optionsValide as $legheDisponibili){?>
						<option value = "<?php echo $legheDisponibili['idTorneo']?>" > <?php echo $legheDisponibili['nomeTorneo'] ?> </option>
				<?php } ?>
				</optgroup>
				<optgroup label="Leghe non disponibili">
				<?php foreach($optionsNonValide as $legheNonDisponibili){?>
						<option value = "<?php echo $legheNonDisponibili['idTorneo']?>" disabled> <?php echo $legheNonDisponibili['nomeTorneo'] ?> </option>
				<?php } ?>	
				</optgroup>
				</select>


				
<label>
<p class="small">Oppure crea una nuova lega</p>
<input type="text" id= "nuovaLega" name="nuovaLega" value="" placeholder="inserisci il nome della nuova lega"/>
</label>
<label for="numeroPartecipanti"><p class="small"> Numero Partecipanti</p> </label>
<select id="numeroPartecipanti" name="numeroPartecipanti">
				<option value="6">6</option>
				<option value="8" selected>8</option>
				<option value="10">10</option>
				</select>
<br>
				<input type="submit" name="register" value="Registrati" onclick="return checkform();"/> 
		<input type="reset" value="Reset"/><br />

		<div class="accetta">Accetto i termini, condizioni e politica della privacy <input type="checkbox" id="myCheck">
		</div>
		
		
	</form>
	<br>
		<a href="login.php" class="accediOra">Hai gia un account? Accedi ora</a><br />
		
		
	<br>
	<br>
	<?php

	if(isset($_GET['error'])){
		switch($_GET['error'])
        {
			case "username":
				echo "<p>ERRORE: username già esistente, provare di nuovo con un altro username</p>"."<br />";
			break;
          
			case "email":
				echo "<p>ERRORE: email già esistente, provare di nuovo con un'altra email</p>"."<br />";
			break;
          
			case "squadra":
				echo "<p>ERRORE: squadra già esistente, provare di nuovo con un'altra squadra</p>"."<br />";
			break;
        
			case "lega":
				echo "<p>ERRORE: lega già esistente, provare di nuovo con un'altra lega</p>"."<br />";
			break;
		
			case "false":
            echo "<p>Registrazione avvenuta con successo! Accedi ora alla tua Homepage</p>"."<br />";
			echo "<p><a href='users.php?welcome=new'> Entra nella tua Homepage </a></p>"."<br />";
          break;
        }
      }
	?>
	</div>

	
    <?=template_footer()?>
</body>
</html>

