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
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <link href="css/table.css" rel="stylesheet">
	<title>Rosa calciatori di <?php echo $_SESSION['squadra']?></title>
  <style>

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

  </style>


    <link href="css/stileMenu.css" rel="stylesheet">
</head>

<body>


<?=template_menu_users()?>


<b><h1 style="text-align: center;"> Elenco calciatori di <?php echo $_SESSION['squadra']?></h1></b><br />
<br />

<div class="table-wrapper">
<table class="fl-table">
<caption>I tuoi difensori </caption>
  <tr>
    <th>Ruolo</th>
    <th>Calciatore</th>
    <th>Club</th>
    <th>Valore</th>   
  </tr>
<?php
$con = config::connect();
  $sql = "SELECT ruolo, nomeCalciatore, club, valore
          FROM calciatori INNER JOIN rose on idCalciatore=calciatore
          WHERE squadra = '{$_SESSION['squadra']}' and ruolo = 'D';";
  foreach($con->query($sql) as $query){
    echo "<tr>\n";
    echo "<td>".$query[0]."</td>\n"."<td>".$query[1]."</td>\n"."<td>".$query[2]."</td>\n"."<td>".$query[3]."</td>\n";
    echo "</tr>\n";
  }
$con = NULL;
?> 
</table>
</div>

<br />

<div class="table-wrapper">
<table class="fl-table">
<caption>I tuoi centrocampisti </caption>
  <tr>
    <th>Ruolo</th>
    <th>Calciatore</th>
    <th>Club</th>
    <th>Valore</th>   
  </tr>
<?php
$con = config::connect();
  $sql = "SELECT ruolo, nomeCalciatore, club, valore
          FROM calciatori INNER JOIN rose on idCalciatore=calciatore
          WHERE squadra = '{$_SESSION['squadra']}' and ruolo = 'C';";
  foreach($con->query($sql) as $query){
    echo "<tr>\n";
    echo "<td>".$query[0]."</td>\n"."<td>".$query[1]."</td>\n"."<td>".$query[2]."</td>\n"."<td>".$query[3]."</td>\n";
    echo "</tr>\n";
  }
$con = NULL;
?>   
</table></div><br />

<div class="table-wrapper">
<table class="fl-table">
<caption>I tuoi attaccanti </caption>
  <tr>
    <th>Ruolo</th>
    <th>Calciatore</th>
    <th>Club</th>
    <th>Valore</th>   
  </tr>
<?php
$con = config::connect();
  $sql = "SELECT ruolo, nomeCalciatore, club, valore
          FROM calciatori INNER JOIN rose on idCalciatore=calciatore
          WHERE squadra = '{$_SESSION['squadra']}' and ruolo = 'A';";
  foreach($con->query($sql) as $query){
    echo "<tr>\n";
    echo "<td>".$query[0]."</td>\n"."<td>".$query[1]."</td>\n"."<td>".$query[2]."</td>\n"."<td>".$query[3]."</td>\n";
    echo "</tr>\n";
  }
$con = NULL;
?> 
</table></div><br />




  <span id="tornaIndietro"><a href="users.php"></a></span>

</body>
</html>
