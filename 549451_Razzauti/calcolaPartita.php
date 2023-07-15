<?php
session_start();
if(!isset($_SESSION['username']) || $_SESSION['name'] == "user"){
  header('Location: login.php?error=2'); //non autenticato
  exit;
}

include_once("include/config.php");
include("include/utility.php");

if(isset($_GET['partita'])){ //mi salvo le chiavi per il postback
$_SESSION['partita'] = $_GET['partita'];
$_SESSION['squadraA'] = $_GET['squadraA'];
$_SESSION['squadraB'] = $_GET['squadraB'];
}

$con = config::connect();
$squadraA_titolari = fetch_formazione($con, $_SESSION['partita'], "squadraA", 1);
$squadraB_titolari = fetch_formazione($con, $_SESSION['partita'], "squadraB", 1);
$squadraA_riserve = fetch_formazione($con, $_SESSION['partita'], "squadraA", 2);
$squadraB_riserve = fetch_formazione($con, $_SESSION['partita'], "squadraB", 2);
$con = NULL;
?>

<!DOCTYPE html>
<html lang='it'>
<head>
	<meta charset="UTF-8">
  
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <style type="text/css">
    #inserMod{
      background: none;
border: solid 2px black;
padding: 15px;
border-radius: 2em;
    }

    #inserMod:hover{
      background: black;
      color: white;
    }
  table, td, tr, th{
    border: 1px solid black;
    width: 50%;
    padding: 5px;
    border-collapse: collapse;
  }
#inserMod:disabled{
  border: 1px solid #999999;
  background-color: #cccccc;
  color: #666666;
  cursor: no-drop;
}
  #cap{
    font-size: 15px;
    font-weight: bold;
  }
  #td1{
    background-color: yellow;
  }
  body {
    background: #9bfffa!important;
  }
  label#lega {
    font: 18px Helvetica, Arial, sans-serif;
  }
  </style>
  <link rel="stylesheet" href="css/stileMenu.css"  type="text/css">

	<link rel="stylesheet" href="css/registrazione.css">
	<title>Calcola partita <?php echo $_SESSION['partita'] ?> </title>
</head>

<body>
<?=template_menu_ADMIN()?>
		<br>
		<br>
<form name="calcolaPartita" action="calcolaPartita.php" method="POST">

  <h1><?php echo $_SESSION['squadraA']?></h1>
  <p><h3>Titolari</h3></p>
<table border=1>  
<?php
    while ($squadraA = $squadraA_titolari->fetch()){
      echo "<tr>\n";
      echo "<td><label for='{$squadraA['idCalciatore']}'>"; for($i=0; $i<$squadraA_titolari->columnCount() -1; $i++) echo $squadraA[$i]." "; echo "</label></td>\n";
      echo "<td><label for='tb_votoBase_{$squadraA['idCalciatore']}'>Voto base: </label> <input type='text' id='tb_votoBase_{$squadraA['idCalciatore']}' name='tb_votoBase_{$squadraA['idCalciatore']}' value='SV' size=1px/></td>\n";
      echo "<td><label for='tb_goal_{$squadraA['idCalciatore']}'>Goal: </label> <input type='text' id='tb_goal_{$squadraA['idCalciatore']}' name='tb_goal_{$squadraA['idCalciatore']}' value='0' size=1px/></td>\n";
      echo "<td><label for='tb_assist_{$squadraA['idCalciatore']}'>Assist: </label> <input type='text' id='tb_assist_{$squadraA['idCalciatore']}' name='tb_assist_{$squadraA['idCalciatore']}' value='0' size=1px/></td>\n";
      echo "<td><label for='tb_giallo_{$squadraA['idCalciatore']}'>Giallo: </label> <input type='text' id='tb_giallo_{$squadraA['idCalciatore']}' name='tb_giallo_{$squadraA['idCalciatore']}' value='0' size=1px/></td>\n";
      echo "<td><label for='tb_rosso_{$squadraA['idCalciatore']}'>Rosso: </label> <input type='text' id='tb_rosso_{$squadraA['idCalciatore']}' name='tb_rosso_{$squadraA['idCalciatore']}' value='0' size=1px/></td>\n";
      echo "<td><label for='tb_autorete_{$squadraA['idCalciatore']}'>Autorete: </label> <input type='text' id='tb_autorete_{$squadraA['idCalciatore']}' name='tb_autorete_{$squadraA['idCalciatore']}' value='0' size=1px/></td>\n";
      echo "<td><label for='tb_rigSba_{$squadraA['idCalciatore']}'>Rigoti Sbagliati: </label> <input type='text' id='tb_rigSba_{$squadraA['idCalciatore']}' name='tb_rigSba_{$squadraA['idCalciatore']}' value='0' size=1px/></td>\n";
      if($squadraA['ruolo'] == 'P'){ //portieri
        echo "<td><label for='tb_rigPar_{$squadraA['idCalciatore']}'>Rigori Parati: </label> <input type='text' id='tb_rigPar_{$squadraA['idCalciatore']}' name='tb_rigPar_{$squadraA['idCalciatore']}' value='0' size=1px/></td>\n";
        echo "<td><label for='tb_goalSub_{$squadraA['idCalciatore']}'>Goal Subiti: </label> <input type='text' id='tb_goalSub_{$squadraA['idCalciatore']}' name='tb_goalSub_{$squadraA['idCalciatore']}' value='0' size=1px/></td>\n";
      }
        else{
          echo "<input type='hidden' id='tb_rigPar_{$squadraA['idCalciatore']}' name='tb_rigPar_{$squadraA['idCalciatore']}' value='0' size=1px/>\n";
          echo "<input type='hidden' id='tb_goalSub_{$squadraA['idCalciatore']}' name='tb_goalSub_{$squadraA['idCalciatore']}' value='0' size=1px/>\n";
        }
      echo "</tr>\n";
    }
?>  
</table>

  <p><h3>Riserve</h3></p>
<table border=1> 
<?php
    while ($squadraA = $squadraA_riserve->fetch()){
      echo "<tr>\n";
      echo "<td><label for='{$squadraA['idCalciatore']}'>"; for($i=0; $i<$squadraA_riserve->columnCount() -1; $i++) echo $squadraA[$i]." "; echo "</label></td>\n";
      echo "<td><label for='tb_votoBase_{$squadraA['idCalciatore']}'>Voto base: </label> <input type='text' id='tb_votoBase_{$squadraA['idCalciatore']}' name='tb_votoBase_{$squadraA['idCalciatore']}' value='SV' size=1px/></td>\n";
      echo "<td><label for='tb_goal_{$squadraA['idCalciatore']}'>Goal: </label> <input type='text' id='tb_goal_{$squadraA['idCalciatore']}' name='tb_goal_{$squadraA['idCalciatore']}' value='0' size=1px/></td>\n";
      echo "<td><label for='tb_assist_{$squadraA['idCalciatore']}'>Assist: </label> <input type='text' id='tb_assist_{$squadraA['idCalciatore']}' name='tb_assist_{$squadraA['idCalciatore']}' value='0' size=1px/></td>\n";
      echo "<td><label for='tb_giallo_{$squadraA['idCalciatore']}'>Giallo: </label> <input type='text' id='tb_giallo_{$squadraA['idCalciatore']}' name='tb_giallo_{$squadraA['idCalciatore']}' value='0' size=1px/></td>\n";
      echo "<td><label for='tb_rosso_{$squadraA['idCalciatore']}'>Rosso: </label> <input type='text' id='tb_rosso_{$squadraA['idCalciatore']}' name='tb_rosso_{$squadraA['idCalciatore']}' value='0' size=1px/></td>\n";
      echo "<td><label for='tb_autorete_{$squadraA['idCalciatore']}'>Autorete: </label> <input type='text' id='tb_autorete_{$squadraA['idCalciatore']}' name='tb_autorete_{$squadraA['idCalciatore']}' value='0' size=1px/></td>\n";
      echo "<td><label for='tb_rigSba_{$squadraA['idCalciatore']}'>Rigoti Sbagliati: </label> <input type='text' id='tb_rigSba_{$squadraA['idCalciatore']}' name='tb_rigSba_{$squadraA['idCalciatore']}' value='0' size=1px/></td>\n";
      if($squadraA['ruolo'] == 'P'){ //portieri
        echo "<td><label for='tb_rigPar_{$squadraA['idCalciatore']}'>Rigori Parati: </label> <input type='text' id='tb_rigPar_{$squadraA['idCalciatore']}' name='tb_rigPar_{$squadraA['idCalciatore']}' value='0' size=1px/></td>\n";
        echo "<td><label for='tb_goalSub_{$squadraA['idCalciatore']}'>Goal Subiti: </label> <input type='text' id='tb_goalSub_{$squadraA['idCalciatore']}' name='tb_goalSub_{$squadraA['idCalciatore']}' value='0' size=1px/></td>\n";
      }
        else{
          echo "<input type='hidden' id='tb_rigPar_{$squadraA['idCalciatore']}' name='tb_rigPar_{$squadraA['idCalciatore']}' value='0' size=1px/>\n";
          echo "<input type='hidden' id='tb_goalSub_{$squadraA['idCalciatore']}' name='tb_goalSub_{$squadraA['idCalciatore']}' value='0' size=1px/>\n";
        }
      echo "</tr>\n";
    }
?>
</table>

  <h1><?php echo $_SESSION['squadraB']?></h1>
  <p><h3>Titolari</h3></p>
<table border=1> 
<?php
    while ($squadraB = $squadraB_titolari->fetch()){
      echo "<tr>\n";
      echo "<td><label for='{$squadraB['idCalciatore']}'>"; for($i=0; $i<$squadraB_titolari->columnCount() -1; $i++) echo $squadraB[$i]." "; echo "</label></td>\n";
      echo "<td><label for='tb_votoBase_{$squadraB['idCalciatore']}'>Voto base: </label> <input type='text' id='tb_votoBase_{$squadraB['idCalciatore']}' name='tb_votoBase_{$squadraB['idCalciatore']}' value='SV' size=1px/></td>\n";
      echo "<td><label for='tb_goal_{$squadraB['idCalciatore']}'>Goal: </label> <input type='text' id='tb_goal_{$squadraB['idCalciatore']}' name='tb_goal_{$squadraB['idCalciatore']}' value='0' size=1px/></td>\n";
      echo "<td><label for='tb_assist_{$squadraB['idCalciatore']}'>Assist: </label> <input type='text' id='tb_assist_{$squadraB['idCalciatore']}' name='tb_assist_{$squadraB['idCalciatore']}' value='0' size=1px/></td>\n";
      echo "<td><label for='tb_giallo_{$squadraB['idCalciatore']}'>Giallo: </label> <input type='text' id='tb_giallo_{$squadraB['idCalciatore']}' name='tb_giallo_{$squadraB['idCalciatore']}' value='0' size=1px/></td>\n";
      echo "<td><label for='tb_rosso_{$squadraB['idCalciatore']}'>Rosso: </label> <input type='text' id='tb_rosso_{$squadraB['idCalciatore']}' name='tb_rosso_{$squadraB['idCalciatore']}' value='0' size=1px/></td>\n";
      echo "<td><label for='tb_autorete_{$squadraB['idCalciatore']}'>Autorete: </label> <input type='text' id='tb_autorete_{$squadraB['idCalciatore']}' name='tb_autorete_{$squadraB['idCalciatore']}' value='0' size=1px/></td>\n";
      echo "<td><label for='tb_rigSba_{$squadraB['idCalciatore']}'>Rigoti Sbagliati: </label> <input type='text' id='tb_rigSba_{$squadraB['idCalciatore']}' name='tb_rigSba_{$squadraB['idCalciatore']}' value='0' size=1px/></td>\n";
      if($squadraB['ruolo'] == 'P'){ //portieri
        echo "<td><label for='tb_rigPar_{$squadraB['idCalciatore']}'>Rigori Parati: </label> <input type='text' id='tb_rigPar_{$squadraB['idCalciatore']}' name='tb_rigPar_{$squadraB['idCalciatore']}' value='0' size=1px/></td>\n";
        echo "<td><label for='tb_goalSub_{$squadraB['idCalciatore']}'>Goal Subiti: </label> <input type='text' id='tb_goalSub_{$squadraB['idCalciatore']}' name='tb_goalSub_{$squadraB['idCalciatore']}' value='0' size=1px/></td>\n";
      }
        else{
          echo "<input type='hidden' id='tb_rigPar_{$squadraB['idCalciatore']}' name='tb_rigPar_{$squadraB['idCalciatore']}' value='0' size=1px/>\n";
          echo "<input type='hidden' id='tb_goalSub_{$squadraB['idCalciatore']}' name='tb_goalSub_{$squadraB['idCalciatore']}' value='0' size=1px/>\n";
        }
      echo "</tr>\n";
    }
?>
</table>

  <p><h3>Riserve</h3></p>
<table border=1> 
<?php
    while ($squadraB = $squadraB_riserve->fetch()){
      echo "<tr>\n";
      echo "<td><label for='{$squadraB['idCalciatore']}'>"; for($i=0; $i<$squadraB_riserve->columnCount() -1; $i++) echo $squadraB[$i]." "; echo "</label></td>\n";
      echo "<td><label for='tb_votoBase_{$squadraB['idCalciatore']}'>Voto base: </label> <input type='text' id='tb_votoBase_{$squadraB['idCalciatore']}' name='tb_votoBase_{$squadraB['idCalciatore']}' value='SV' size=1px/></td>\n";
      echo "<td><label for='tb_goal_{$squadraB['idCalciatore']}'>Goal: </label> <input type='text' id='tb_goal_{$squadraB['idCalciatore']}' name='tb_goal_{$squadraB['idCalciatore']}' value='0' size=1px/></td>\n";
      echo "<td><label for='tb_assist_{$squadraB['idCalciatore']}'>Assist: </label> <input type='text' id='tb_assist_{$squadraB['idCalciatore']}' name='tb_assist_{$squadraB['idCalciatore']}' value='0' size=1px/></td>\n";
      echo "<td><label for='tb_giallo_{$squadraB['idCalciatore']}'>Giallo: </label> <input type='text' id='tb_giallo_{$squadraB['idCalciatore']}' name='tb_giallo_{$squadraB['idCalciatore']}' value='0' size=1px/></td>\n";
      echo "<td><label for='tb_rosso_{$squadraB['idCalciatore']}'>Rosso: </label> <input type='text' id='tb_rosso_{$squadraB['idCalciatore']}' name='tb_rosso_{$squadraB['idCalciatore']}' value='0' size=1px/></td>\n";
      echo "<td><label for='tb_autorete_{$squadraB['idCalciatore']}'>Autorete: </label> <input type='text' id='tb_autorete_{$squadraB['idCalciatore']}' name='tb_autorete_{$squadraB['idCalciatore']}' value='0' size=1px/></td>\n";
      echo "<td><label for='tb_rigSba_{$squadraB['idCalciatore']}'>Rigoti Sbagliati: </label> <input type='text' id='tb_rigSba_{$squadraB['idCalciatore']}' name='tb_rigSba_{$squadraB['idCalciatore']}' value='0' size=1px/></td>\n";
      if($squadraB['ruolo'] == 'P'){ //portieri
        echo "<td><label for='tb_rigPar_{$squadraB['idCalciatore']}'>Rigori Parati: </label> <input type='text' id='tb_rigPar_{$squadraB['idCalciatore']}' name='tb_rigPar_{$squadraB['idCalciatore']}' value='0' size=1px/></td>\n";
        echo "<td><label for='tb_goalSub_{$squadraB['idCalciatore']}'>Goal Subiti: </label> <input type='text' id='tb_goalSub_{$squadraB['idCalciatore']}' name='tb_goalSub_{$squadraB['idCalciatore']}' value='0' size=1px/></td>\n";
      }
        else{
          echo "<input type='hidden' id='tb_rigPar_{$squadraB['idCalciatore']}' name='tb_rigPar_{$squadraB['idCalciatore']}' value='0' size=1px/>\n";
          echo "<input type='hidden' id='tb_goalSub_{$squadraB['idCalciatore']}' name='tb_goalSub_{$squadraB['idCalciatore']}' value='0' size=1px/>\n";
        }
      echo "</tr>\n";
    }
?>
</table>

  <input type="submit" name="confirm" value="Calcola giornata"/> 
	<input type="reset" value="Reset"/><br />
  
</form>
<?php
  if(isset($_POST['confirm'])){
  $con = config::connect();
  
  //update dei goal
    foreach($_POST as $key=>$value){
      if(strpos($key, "tb_goal_") !== false)
        updateGoal($con, $_SESSION['partita'], str_replace("tb_goal_", "", $key), $value);
    }
    
  //update degli assist
    foreach($_POST as $key=>$value){
      if(strpos($key, "tb_assist_") !== false)
        updateAssist($con, $_SESSION['partita'], str_replace("tb_assist_", "", $key), $value);
    }    

  //update dei gialli
    foreach($_POST as $key=>$value){
      if(strpos($key, "tb_giallo_") !== false)
        updateGialli($con, $_SESSION['partita'], str_replace("tb_giallo_", "", $key), $value);
    }     
    
  //update dei rossi
    foreach($_POST as $key=>$value){
      if(strpos($key, "tb_rosso_") !== false)
        updateRossi($con, $_SESSION['partita'], str_replace("tb_rosso_", "", $key), $value);
    } 
    
  //update delle autoreti
    foreach($_POST as $key=>$value){
      if(strpos($key, "tb_autorete_") !== false)
        updateAutoreti($con, $_SESSION['partita'], str_replace("tb_autorete_", "", $key), $value);
    }

    //update dei rigori sbagliati
    foreach($_POST as $key=>$value){
      if(strpos($key, "tb_rigSba_") !== false)
        updateRigoriSbagliati($con, $_SESSION['partita'], str_replace("tb_rigSba_", "", $key), $value);
    }
    
    //update dei rigori parati
    foreach($_POST as $key=>$value){
      if(strpos($key, "tb_rigPar_") !== false)
        updateRigoriParati($con, $_SESSION['partita'], str_replace("tb_rigPar_", "", $key), $value);
    }
    
    //update dei goal subiti
    foreach($_POST as $key=>$value){
      if(strpos($key, "tb_goalSub_") !== false)
        updateGoalSubiti($con, $_SESSION['partita'], str_replace("tb_goalSub_", "", $key), $value);
    }
    
    //update dei votiTotali
    foreach($_POST as $key=>$value){
      if(strpos($key, "tb_votoBase_") !== false)
        updateVoti($con, $_SESSION['partita'], str_replace("tb_votoBase_", "", $key), $value);
    }
    
    
    updateStatisticheCalciatore($con, $_SESSION['squadraA']);
    updateStatisticheCalciatore($con, $_SESSION['squadraB']);
    calcolaEsitoPartita($con, $_SESSION['partita'], $_SESSION['squadraA']);
    calcolaEsitoPartita($con, $_SESSION['partita'], $_SESSION['squadraB']);
    
    updateClassifica($con);
    
    echo "<p> giornata calcolata con successo </p>";
  }
  
?>
</body>
</html>
