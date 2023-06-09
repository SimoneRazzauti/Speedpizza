<?php
session_start();
if(!isset($_SESSION['username']) || $_SESSION['name'] == "admin"){
  header('Location: login.php?error=2'); //non autenticato
  exit;
}
include_once("include/config.php");
include_once("include/utility.php");

if(isset($_GET['partita'])){
  $con = config::connect();
  $partita = $_GET['partita'];
  $_SESSION['partita'] = $partita;
  $nD = findModulo($con, $partita, $_SESSION['squadra'], 'D');
  $nC = findModulo($con, $partita, $_SESSION['squadra'], 'C');
  $nA = findModulo($con, $partita, $_SESSION['squadra'], 'A');
  $d = $nD->fetch();
  $c = $nC->fetch();
  $a = $nA->fetch();
  $modulo = $d[0].$c[0].$a[0];

}
?>

<!DOCTYPE html>
<html lang="it">
<head>
	<meta charset="UTF-8">
	<title>Formazioni Fantaball</title>
</head>
<body>
<form name="formazioni" action="formazioni.php" method="POST">
	<label for="modulo">Modulo: </label>
		<select id="modulo" name="modulo">
			<option value ="352" <?php if((isset($_POST['modulo']) && $_POST['modulo'] == "352") || (isset($modulo) && $modulo == "352"))  echo "selected"?> >3-5-2</option>
      <option value ="343" <?php if((isset($_POST['modulo']) && $_POST['modulo'] == "343") || (isset($modulo) && $modulo == "343"))  echo "selected"?> >3-4-3</option>
      <option value ="451" <?php if((isset($_POST['modulo']) && $_POST['modulo'] == "451") || (isset($modulo) && $modulo == "451"))  echo "selected"?> >4-5-1</option>
      <option value ="442" <?php if((isset($_POST['modulo']) && $_POST['modulo'] == "442") || (isset($modulo) && $modulo == "442"))  echo "selected"?> >4-4-2</option>
      <option value ="433" <?php if((isset($_POST['modulo']) && $_POST['modulo'] == "433") || (isset($modulo) && $modulo == "433"))  echo "selected"?> >4-3-3</option>
      <option value ="532" <?php if((isset($_POST['modulo']) && $_POST['modulo'] == "532") || (isset($modulo) && $modulo == "532"))  echo "selected"?> >5-3-2</option>
      <option value ="541" <?php if((isset($_POST['modulo']) && $_POST['modulo'] == "541") || (isset($modulo) && $modulo == "541"))  echo "selected"?> >5-4-1</option>
	<input type="submit" name="cerca" value="Vai"/><br /><br />


<?php
  $mod = isset($modulo) ? $modulo : $_POST['modulo'];
  
    switch($mod)
    {
       case(""):
        $D = 3; $C = 5; $A = 2;
      break;
    
      case("352"):
        $D = 3; $C = 5; $A = 2;
      break;
      
      case("343"):
        $D = 3; $C = 4; $A =3;
      break;
      
      case("451"):
        $D = 4; $C = 5; $A = 1;
      break;
      
      case("442"):
        $D = 4; $C = 4; $A = 2;
      break;
      
      case("433"):
        $D = 4; $C = 3; $A = 3;
      break;
      
      case("532"):
        $D = 5; $C = 3; $A = 2;
      break;
      
      case("541"):
        $D = 5; $C = 4; $A = 1;
      break;     
    }
                
    $con = config::connect();
    $portieri = selCalciatoreRosa($con, "P", $_SESSION['squadra'], $_SESSION['partita']);
    $difensori = selCalciatoreRosa($con, "D", $_SESSION['squadra'], $_SESSION['partita']);
    $centrocampisti = selCalciatoreRosa($con, "C", $_SESSION['squadra'], $_SESSION['partita']);
    $attaccanti = selCalciatoreRosa($con, "A", $_SESSION['squadra'], $_SESSION['partita']);
?>
<!-- PORTIERI -->
  <label for="portiere">Seleziona portiere: </label>
		<select id="portiere" name="portiere">
			<option value="">Segli un portiere</option>   
  <?php foreach($portieri as $risultato){?>
      <option value = "<?php echo $risultato[0];?>" <?php if($risultato['rank'] == 1) echo "selected"?> > <?php echo $risultato[1]." ".$risultato[2]." ".$risultato[3]; ?> </option>
     <?php } ?>
		</select><br /><br />  
<!-- DIFENSORI -->
<?php for($i=1; $i<=$D; $i++){ ?>
  <label for="difensore<?php echo $i?>">Seleziona difensore <?php echo $i?>: </label>
		<select id="difensore<?php echo $i?>" name="difensore<?php echo $i?>">
			<option value="">Segli un difensore</option>   
  <?php foreach($difensori as $risultato){?>
      <option value = "<?php echo $risultato[0];?>" <?php if($risultato['rank'] == $i) echo "selected"?> > <?php echo $risultato[1]." ".$risultato[2]." ".$risultato[3]; ?> </option>
     <?php } ?>
		</select><br />
<?php }?><br />
<!-- CENTROCAMPISTI -->
<?php for($i=1; $i<=$C; $i++){ ?>
  <label for="centrocampista<?php echo $i?>">Seleziona centrocampista <?php echo $i?>: </label>
		<select id="centrocampista<?php echo $i?>" name="centrocampista<?php echo $i?>">
			<option value="">Segli un centrocampista</option>
      
  <?php foreach($centrocampisti as $risultato){ ?>
      <option value = "<?php echo $risultato[0]; ?>" <?php if($risultato['rank'] == $i) echo "selected"?> > <?php echo $risultato[1]." ".$risultato[2]." ".$risultato[3]; ?> </option>
     <?php } ?>
		</select><br />
<?php }?><br />
<!-- ATTACCANTI -->
<?php for($i=1; $i<=$A; $i++){ ?>
  <label for="attaccante<?php echo $i?>">Seleziona attaccante <?php echo $i?>: </label>
		<select id="attaccante<?php echo $i?>" name="attaccante<?php echo $i?>">
			<option value="">Segli un attaccante</option>   
  <?php foreach($attaccanti as $risultato){?>
      <option value = "<?php echo $risultato[0];?>" <?php if($risultato['rank'] == $i) echo "selected"?> > <?php echo $risultato[1]." ".$risultato[2]." ".$risultato[3]; ?> </option>
     <?php } ?>
		</select><br />
<?php }?><br />

<!-- RISERVE -->

<!-- PORTIERI -->
  <label for="portiere_riserva">Seleziona portiere Panchina: </label>
		<select id="portiere_riserva" name="portiere_riserva">
			<option value="">Segli un portiere</option>   
  <?php foreach($portieri as $risultato){?>
      <option value = "<?php echo $risultato[0];?>" <?php if($risultato['rank'] == 2) echo "selected"?> > <?php echo $risultato[1]." ".$risultato[2]." ".$risultato[3]; ?> </option>
     <?php } ?>
		</select><br /><br />  
<!-- DIFENSORI -->
<?php for($i=$D+1; $i<=$D+2; $i++){ ?>
  <label for="difensore_riserva<?php echo $i?>">Seleziona difensore Panchina <?php echo $i?>: </label>
		<select id="difensore_riserva<?php echo $i?>" name="difensore_riserva<?php echo $i?>">
			<option value="">Segli un difensore</option>   
  <?php foreach($difensori as $risultato){?>
      <option value = "<?php echo $risultato[0];?>" <?php if($risultato['rank'] == $i) echo "selected"?> > <?php echo $risultato[1]." ".$risultato[2]." ".$risultato[3]; ?> </option>
     <?php } ?>
		</select><br />
<?php }?><br />
<!-- CENTROCAMPISTI -->
<?php for($i=$C+1; $i<=$C+2; $i++){ ?>
  <label for="centrocampista_riserva<?php echo $i?>">Seleziona centrocampista Panchina <?php echo $i?>: </label>
		<select id="centrocampista_riserva<?php echo $i?>" name="centrocampista_riserva<?php echo $i?>">
			<option value="">Segli un centrocampista</option>
      
  <?php foreach($centrocampisti as $risultato){ ?>
      <option value = "<?php echo $risultato[0]; ?>" <?php if($risultato['rank'] == $i) echo "selected"?> > <?php echo $risultato[1]." ".$risultato[2]." ".$risultato[3]; ?> </option>
     <?php } ?>
		</select><br />
<?php }?><br />
<!-- ATTACCANTI -->
<?php for($i=$A+1; $i<=$A+2; $i++){ ?>
  <label for="attaccante_riserva<?php echo $i?>">Seleziona attaccante Panchina <?php echo $i?>: </label>
		<select id="attaccante_riserva<?php echo $i?>" name="attaccante_riserva<?php echo $i?>">
			<option value="">Segli un attaccante</option>   
  <?php foreach($attaccanti as $risultato){?>
      <option value = "<?php echo $risultato[0];?>" <?php if($risultato['rank'] == $i) echo "selected"?> > <?php echo $risultato[1]." ".$risultato[2]." ".$risultato[3]; ?> </option>
     <?php } ?>
		</select><br />
<?php }?><br />

  <input type="submit" name="ok" value="Conferma formazione" onclick="campoVuoto();"/> <input type="reset" value="Annulla"/>
</form> 
<?php
  if(isset($_POST['ok'])){
    $sql = "DELETE FROM formazioni WHERE idPartita >= '{$_SESSION['partita']}' AND squadra = '{$_SESSION['squadra']}'";
    $comandoSQL = $con->query($sql);
    $i=1;
    foreach(array_slice($_POST, 1, 11) as $_key=>$calciatore){
        inserisciFormazione($con, $_SESSION['squadra'], $calciatore, $_SESSION['partita'], 1, $i);
        $i++;
    }
    $i = 12;
    foreach(array_slice($_POST, 12, 7) as $_key=>$calciatore){
        inserisciFormazione($con, $_SESSION['squadra'], $calciatore, $_SESSION['partita'], 2, $i);
      $i++;
    }
  }
  $con = NULL;
  
  if(isset($_POST['ok']))
    echo "<p>formazione salvata per le prossime partite</p>";
?>
<br /><a href='users.php'>Torna indietro</a>
  
</body>
</html>