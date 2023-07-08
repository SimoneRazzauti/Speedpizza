<?php
session_start();
include("checkCOOKIE.php");

if(!isset($_SESSION['username']) || $_SESSION['name'] == "user"){
  header('Location: login.php?error=2'); //non autenticato
  exit;
}
$query = $con->prepare("
		SELECT idPartita, dataPartita-interval 1 hour  AS dataPartita FROM calendario WHERE stato = 1;
	");
$query->execute();
while ($partita = $query->fetch())
{
  if( strtotime(date("Y-m-d H:i:s")) > strtotime($partita[1])) //evento che blocca o sblocca l'inserimento della formazione di una data partita all'accesso come user o come admin
    modificaStatoPartita($con, $partita[0], 0);  
}
$con = NULL; 
?>

<!DOCTYPE html>
<html lang="it">
<head>
	<meta charset="UTF-8">
	<title><?php echo $_SESSION['username'] ?> HOMEPAGE</title>
  <script type="application/x-javascript">
    function welcome(){
      alert("Bentornato Admin");
    }
 
  </script>
</head>

<?php
  if(isset($_GET['welcome']))
  {
    echo "<body onload='welcome();'>";
  }else{
    echo "<body>";
  }
  
?>

<b><h1> Homepage di <?php echo $_SESSION['username']?></h1></b><br />
<a href='logout.php'>Logout</a><br />
<a href='modificaRose.php'>Modifica la rosa di un partecipante</a><br />
<a href='calcoloGiornata.php'>Calcola una giornata</a>
</body>
</html>
