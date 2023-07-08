<?php
session_start();
include_once("include/config.php");
include("include/utility.php");


		$con = config::connect();
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
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title><?php echo $_SESSION['username'] ?> HOMEPAGE</title>
  <script type="application/x-javascript">
    function welcome(){
      alert("Bentornato Admin");
    }
 
  </script>
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
  </style>
  <link rel="stylesheet" href="css/stileMenu.css"  type="text/css">

</head>

<?php
  if(isset($_GET['welcome']))
  {
    echo "<body onload='welcome();'>";
  }else{
    echo "<body>";
  }
  
?>

<?=template_menu_ADMIN()?>

<h2 id="titoloPOP" style="text-align: center;">Bentornato <?=$_SESSION['username']?></h2>
    <p style="text-align: center;">frase frase frase</p>





</body>
</html>
