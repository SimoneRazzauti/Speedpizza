<?php
session_start();
include("checkCOOKIE.php");

if(!isset($_SESSION['username']) || $_SESSION['name'] == "admin"){
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

    <link href="css/pop.css" rel="stylesheet">
    <link href="css/table.css" rel="stylesheet">
    <link href="css/menuLog.css" rel="stylesheet">


<meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

	<title><?php echo $_SESSION['username'] ?> HOMEPAGE</title>
  <script type="application/x-javascript">
    function welcome(){
      alert("Benvenuto su FantaBall! Grazie per la tua iscrizione.");
    }
    function cheers(){
      alert("Bentornato, torna da dove eri rimasto.");
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
<body>



<div id="myModalAvv" class="modal" >

<!-- Modal content -->
<div class="modal-content"style="padding:0!important; border-radius: 25px; height: 380px; z-index: 1000;">
  
  <div class="modal-body" style="padding:0!important; border-radius: 25px; height: 380px;">
  
  <div class="row">
    <span class="close" onclick="chiudi()" style="color: black; font-size: 45px!important;margin-right: 10px;
margin-top: 5px;">&times;</span>
  <div class="column left" style="background-color:none;border-bottom-left-radius: 25px;border-top-left-radius: 25px; height: auto;">
    <img src="immagini/logo.png" style="margin: auto;
    margin-top: auto;
min-width: 45%;
margin-top: 15px;max-height: 270px;">
  </div>
  <div class="column right" style="background-color:white;
  border-bottom-right-radius: 25px;
  border-top-right-radius: 25px;">
  
  <div class="vertical-center">
  
  <h2 id="titoloPOP">Bentornato <?=$_SESSION['username']?></h2>
    <p>frase frase frase</p>
  </div>
    
  </div>
</div>
    
  </div>
  
</div>

</div>
<?php

  if (isset($_COOKIE['PopUP']))
  {
    $cookiePOP = $_COOKIE['PopUP'];
  

  if ($cookiePOP=="1")
  {



        setcookie("PopUP", "", time() - 3600);
    echo "<script>
            function chiudi(){
              var modal = document.getElementById('myModalAvv');
              modal.style.display = 'none';
            }
            var modal = document.getElementById('myModalAvv');
            modal.style.display = 'block';
            setTimeout(function(){
              modal.style.display = 'none';
             }, 4000);

            
            
            
            
               </script>";
  }
}
?>

<?=template_menu_users()?>












<b><h1 style="text-align: center;"> Homepage di <?=$_SESSION['username']?></h1></b><br />



<div class="table-wrapper">
<table class="fl-table">
<caption id="cap">Classifica di: <?php echo $_SESSION['nomeLega'] ?></caption>
<thead>
  <tr>
    <th>Posizione</th>
    <th>Squadra</th>
    <th>p.ti</th>
    <th>G</th>
    <th>V</th>
    <th>P</th>
    <th>S</th>
    <th>GF</th>
    <th>GS</th>
    <th>DR</th>
  <th>TOT</th>
  </tr>
</thead>
<tbody>
<?php
$con = config::connect();
$query = $con->prepare("call classifica_lega({$_SESSION['lega']})"); //classifica mediante stored procedure

try
{
  $query->execute();
  
}
catch (PDOException $e)
{
  echo $e->getMessage()."<br />";
  echo "Nessuna classifica disponibile";
  
  die();
}

$p=1; //posizione in classifica
while ($riga = $query->fetch())
{
  //$_SESSION['nomeLega'] = $riga[12];
  echo "<tr "; if($riga['squadra'] == $_SESSION['squadra']) echo"id='td1'"; echo ">";
  echo "<td>";
  echo $p;
  echo "</td>";
  for($i=0; $i<$query->columnCount() -1; $i++){
	echo "<td>";
  echo $riga[$i];
  echo "</td>";
  }
  echo "\n</tr>\n";
  $p++;

}
$con = NULL;
?>
</tbody>
</table>
</div>
<br />
<?php
$con = config::connect();
$query = $con->prepare("SELECT idPartita, nGiornata, dataPartita, squadraA, squadraB, datediff(dataPartita, curdate()) AS giorniMancanti,
                              (timestampdiff(hour,  curdate(), dataPartita))%24 AS oreMancanti, IFNULL(0, goalA) AS goalA, IFNULL(0, goalB) AS goalB, stato
                        FROM calendario 
                        WHERE squadraA =:squadra OR squadraB =:squadra");
$query->bindParam(":squadra", $_SESSION['squadra']);
$query->execute();








while ($partita = $query->fetch())
{
  echo '<div class="table-wrapper">';
  echo '<table class="fl-table">';
  echo "<caption id='cap'>Giornata $partita[1]</caption>";
  echo "<thead>\n";
  echo "<tr>\n";
  echo "<th>Data</th>
        <th>Casa</th>
        <th>Trasferta</th>
        <th>Giorni mancanti</th>
        <th>Ore mancanti</th>
        <th colspan='2'>Risultato</th>";
  echo "</thead>\n";
  echo "<tbody>\n"; 
  echo "</tr>\n";
    for($i=2; $i<$query->columnCount() -1 ; $i++)
      echo "<td>".$partita[$i]."</td>";
  echo "</tr>\n";
  echo "</tbody>\n";
  echo "<tfoot>\n";
  echo "<td colspan='7'><a href='formazioni.php?partita=$partita[0]' title='inserisci una nuova formazione'><button id='inserMod' type='button'"; if($partita['stato'] != 1)  echo "disabled"; echo "> Inserisci/modifica la formazione </button></a></td>";
  echo "</tfoot>\n";
  echo "</table>\n";

  echo "</div><br />\n";
}
$con = NULL;

?> 

</body>
</html>
