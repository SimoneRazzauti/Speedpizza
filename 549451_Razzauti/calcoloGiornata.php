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
  
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link href="css/pop.css" rel="stylesheet">
    <link href="css/table.css" rel="stylesheet">
	<title>Calcolo della giornata</title>
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
span{
  position: relative;
  display: inline-flex;
  width: 180px;
  height: 55px;
  margin: 0 15px;
  perspective: 1000px;
}
span a{
  font-size: 19px;
  letter-spacing: 1px;
  transform-style: preserve-3d;
  transform: translateZ(-25px);
  transition: transform .25s;
  font-family: 'Montserrat', sans-serif;
  
}
span a:before,
span a:after{
  position: absolute;
  content: "Torna indietro";
  height: 55px;
  width: 180px;
  display: flex;
  align-items: center;
  justify-content: center;
  border: 5px solid black;
  box-sizing: border-box;
  border-radius: 5px;
}
span a:before{
  color: #fff;
  background: #000;
  transform: rotateY(0deg) translateZ(25px);
}
span a:after{
  color: #000;
  transform: rotateX(90deg) translateZ(25px);
}
span a:hover{
  transform: translateZ(-25px) rotateX(-90deg);
}
#tornaIndietro{
    margin: 0;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
}
@media screen and (min-width: 600px){
select {
    width: 100%!important;
}
}
  </style>
  <link rel="stylesheet" href="css/stileMenu.css"  type="text/css">

	<link rel="stylesheet" href="css/registrazione.css">
</head>

<body>
  
<?=template_menu_ADMIN()?>
		<br>
		<br>

	<form name="calcolaGiornata" action="calcoloGiornata.php" method="POST">
    
    <label id="lega" for="selezionaLega">Seleziona una lega su cui calcolare la giornata: </label>
    	<select id="selezionaLega" name="selezionaLega">
        <option value="">Segli una lega</option>
          <?php foreach($fetch_leghe as $lega){?>
			<option value = "<?php echo $lega[0];?>" <?php if(isset($_POST['selezionaLega']) && $_POST['selezionaLega'] == $lega[0]) echo "selected"?> > <?php echo$lega[1]; ?> </option>
		<?php } ?>
		</select><br>
    
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
      echo '<div class="table-wrapper">';
      echo "<table border='1' class='fl-table'><thead>";
      echo "<tr>";
      echo "<th>idPartita</th>
          <th>Giornata</th>
          <th>Data partita</th>
          <th>Squadra casa</th>
          <th>Squadra trasferta</th>";
      echo "</tr></thead>
      <tbody>";
        echo "<tr>\n";
      for($i=0; $i<$query->columnCount(); $i++){
        echo "<td>".$partita[$i]."</td>";
      }
        echo "</tr>\n";
      
      echo "<td><a href='calcolaPartita.php?partita=$partita[0]&squadraA=$partita[3]&squadraB=$partita[4]'><button type='button'> Calcola la giornata </button></a></td>";
      
      echo "</tbody></table>";
      echo '</div>
      <br />
      <br />';
    }
    $con = NULL;   
  }
  

   
?>
</body>
</html>
