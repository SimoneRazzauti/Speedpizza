<?php
session_start();
if(!isset($_SESSION['username']) || $_SESSION['name'] == "user"){
  header('Location: login.php?error=2'); //non autenticato
  exit;
} 
include_once("include/config.php");
include("include/utility.php");

$con = config::connect();
$rose = fetchRose($con);

?>

<!DOCTYPE html>
<html lang="it">
<head>
	<meta charset="UTF-8">
	<title>Modifica Rosa</title>
</head>
<script type="application/x-javascript">
  function campoVuoto(){
    
    /* inserire i controlli che deve essere diverso da "" e non duplicati */
  }

</script>
<body>

<form name="modifica_rose" action="modificaRose.php" method="POST">
	<label for="rose">Seleziona una squadra: </label>
		<select id="rose" name="rose">
			<option value="">Segli una rosa</option>
  <?php foreach($rose as $squadra){?>
			<option value = "<?php echo $squadra[1];?>" <?php if(isset($_POST['rose']) && $_POST['rose'] == $squadra[1]) echo "selected"?> > <?php echo $squadra[0].": ".$squadra[1]; ?> </option>
		<?php } ?>
		</select><br />
	<input type="submit" name="cerca" value="Cerca"/> <input type="reset" value="Annulla"/><br />
<!--</form>-->

<?php
  if(isset($_POST['rose']) && $_POST['rose']!=""){
    $sql = "SELECT lega FROM squadre WHERE nomeSquadra = '{$_POST['rose']}'";
    $query = $con->query($sql);
    $risultato = $query->fetch();
    $lega = $risultato[0];
    $squadra = $_POST['rose'];
    $portieri = selezionaCalciatoreRuolo($con, "P", $lega);
    $difensori = selezionaCalciatoreRuolo($con, "D", $lega);
    $centrocampisti = selezionaCalciatoreRuolo($con, "C", $lega);
    $attaccanti = selezionaCalciatoreRuolo($con, "A", $lega);
?>
<!--<form name="inserisci_rosa" action="modificaRose.php" method="POST">-->
<!-- PORTIERI -->
<?php for($i=1; $i<=3; $i++){ ?>
  <label for="portiere<?php echo $i?>">Seleziona portiere <?php echo $i?>: </label>
		<select id="portiere<?php echo $i?>" name="portiere<?php echo $i?>">
			<option value="">Segli un portiere</option>   
  <?php foreach($portieri as $risultato){?>
      <option value = "<?php echo $risultato[0];?>" > <?php echo $risultato[1]." ".$risultato[3]; ?> </option>
     <?php } ?>
		</select><br />
<?php }?><br />   
<!-- DIFENSORI -->
<?php for($i=1; $i<=8; $i++){ ?>
  <label for="difensore<?php echo $i?>">Seleziona difensore <?php echo $i?>: </label>
		<select id="difensore<?php echo $i?>" name="difensore<?php echo $i?>">
			<option value="">Segli un difensore</option>   
  <?php foreach($difensori as $risultato){?>
      <option value = "<?php echo $risultato[0];?>" > <?php echo $risultato[1]." ".$risultato[3]; ?> </option>
     <?php } ?>
		</select><br />
<?php }?><br />
<!-- CENTROCAMPISTI -->
<?php for($i=1; $i<=8; $i++){ ?>
  <label for="centrocampista<?php echo $i?>">Seleziona centrocampista <?php echo $i?>: </label>
		<select id="centrocampista<?php echo $i?>" name="centrocampista<?php echo $i?>">
			<option value="">Segli un centrocampista</option>   
  <?php foreach($centrocampisti as $risultato){?>
      <option value = "<?php echo $risultato[0];?>" > <?php echo $risultato[1]." ".$risultato[3]; ?> </option>
     <?php } ?>
		</select><br />
<?php }?><br />
<!-- ATTACCANTI -->
<?php for($i=1; $i<=6; $i++){ ?>
  <label for="attaccante<?php echo $i?>">Seleziona attaccante <?php echo $i?>: </label>
		<select id="attaccante<?php echo $i?>" name="attaccante<?php echo $i?>">
			<option value="">Segli un attaccante</option>   
  <?php foreach($attaccanti as $risultato){?>
      <option value = "<?php echo $risultato[0];?>" > <?php echo $risultato[1]." ".$risultato[3]; ?> </option>
     <?php } ?>
		</select><br />
<?php }?><br />


  <input type="submit" name="ok" value="Crea rosa di <?php echo $_POST['rose']?>" onclick="campoVuoto();"/> <input type="reset" value="Annulla"/>
</form> 
<?php
  } //fine if post rollback
  if(isset($_POST['ok']) && $_POST['portiere1']!="" ){
    foreach(array_slice($_POST, 1, 25) as $_key=>$calciatore){
        inserisciRosa($con, $squadra, $calciatore);  
    }
    if($con->rowCount() > 0)
      echo "Inserimento Rosa avvenuto con successo"."<br />";
    else "Errore: impossibile creare la rosa di $squadra"; 
  }
  $con = NULL;
?>
<br /><a href='admin.php'>Torna indietro</a>
</body>
</html>


<!-- con js verificare che tutti i campi siano inseriti e che non ci siano doppioni -->