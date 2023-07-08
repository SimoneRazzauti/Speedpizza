<?php
session_start();
if(!isset($_SESSION['username']) || $_SESSION['name'] == "user"){
  header('Location: login.php?error=2'); //non autenticato
  exit;
}
include_once("include/config.php");
include("include/utility.php");

$con = config::connect();
$fetch_leghe = fetch_leghe($con);
$con = NULL;
?>

<!DOCTYPE html>
<html lang="it">
<head>
	<meta charset="UTF-8">
	<title>Calcolo della giornata</title>
</head>

<body>
	<form name="calcolaGiornata" action="calcoloGiornata.php" method="POST">
    
    <label for="selezionaLega">Seleziona una lega su cui calcolare la giornata: </label>
    	<select id="selezionaLega" name="selezionaLega">
        <option value="">Segli una lega</option>
          <?php foreach($fetch_leghe as $lega){?>
			<option value = "<?php echo $lega[0];?>" <?php if(isset($_POST['selezionaLega']) && $_POST['selezionaLega'] == $lega[0]) echo "selected"?> > <?php echo$lega[1]; ?> </option>
		<?php } ?>
		</select><br />
    
		<input type="submit" value="Cerca lega"/>
    
  </form>
<?php
  if(isset($_POST['selezionaLega']) && $_POST['selezionaLega']!=""){
    $lega = $_POST['selezionaLega'];
    
    $con = config::connect();
    $query = $con->prepare("SELECT idPartita, nGiornata, dataPartita, squadraA, squadraB
                            FROM calendario
                            WHERE idTorneo =:lega AND stato = 0;"); //calcolo la giornata solo di quelle partite con stato=0 
    $query->bindParam(":lega", $lega);
    $query->execute();
    while ($partita = $query->fetch())
    {
      echo "<table border='1'>\n";
      echo "<tr>\n";
      echo "<th>idPartita</th>
          <th>Giornata</th>
          <th>Data partita</th>
          <th>Squadra casa</th>
          <th>Squadra trasferta</th>";
      echo "</tr>\n";
      for($i=0; $i<$query->columnCount(); $i++)
        echo "<td>".$partita[$i]."</td>";
      echo "</tr>\n";
      echo "<td><a href='calcolaPartita.php?partita=$partita[0]&squadraA=$partita[3]&squadraB=$partita[4]'><button type='button'> Calcola la giornata </button></a></td>";
      echo "</table><br />\n";
    }
    $con = NULL;   
  }
  

   
?>
<a href='admin.php'>Torna indietro</a>
</body>
</html>
