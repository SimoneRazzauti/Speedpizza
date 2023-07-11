 <?php
	session_start();
  include "php/sessionUtil.php";
	include "php/connessione.php";

  $id=$_SESSION['userId'];


  $sql = "SELECT * from ordinieseguiti WHERE idUsr='".$id."' ORDER BY id DESC;";
  $result = mysqli_query($conn,$sql);
  $prod = mysqli_fetch_all($result, MYSQLI_ASSOC);
  



?>



<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
 
<title>Spesa On-line</title>
<link rel="stylesheet" href="css/stileLista.css" type="text/css"> 


<style>
.listaOr{
width:410px;
margin:0 auto;
}


@media screen and (max-width: 550px) {
  .listaOr{
      width:auto;
      margin:auto;
}
}


.listaOr img{
width: 100px;
height: 85px;
}

.listaOr ol {
list-style-type: none;
margin: 0;
margin-left: 1em;
padding: 0;
counter-reset: li-counter;
}

.listaOr ol li{
position: relative;
margin-bottom: 1.5em;
padding: 0.5em;
background-color: #F0D756;
padding-left: 58px;
}



.listaOr li:hover{
box-shadow:inset -1em 0 #f0f8ff;
-webkit-transition: box-shadow 0.5s; /* For Safari 3.1 to 6.0 */
transition: box-shadow 0.5s;
}

.listaOr ol li:before {
position: absolute;
top: -0.4em;
left: -0.6em;
width: 1.9em;
height: 1.2em;
font-size: 2em;
line-height: 1.2;
font-weight: bold;
text-align: center;
color: white;
background-color: #292c2f;
transform: rotate(-20deg);
z-index: 99;
overflow: hidden;
content: counter(li-counter);
counter-increment: li-counter;
}

.titolo{text-align: center;}
</style>


















</head>

<body>
<?php include('header.php'); ?>


       
  
 
<div class="titolo">
<h1>Ordini fatti</h1>
</div> 


<div class="listaOr">
  <ol>
 <?php

 foreach ($prod as $pro) {
  
 $gg = $pro['giorno'];
  $sqlx = "SELECT * from prodottiComprati pc INNER JOIN ordinieseguiti oe ON oe.idUsr=pc.idUsr WHERE pc.giorno='".$gg."'group by nomePr;";
  $resultx = mysqli_query($conn,$sqlx);
  $prodx = mysqli_fetch_all($resultx, MYSQLI_ASSOC);
  ?>
 
    <li>
      <img src="immagini/ponyexp.png" >
      <h3><?php echo "Giorno previsto: "; echo $pro['giorno']; ?></h3>
      <?php
      
 foreach ($prodx as $prox) {
    echo $prox['quantita'];
    echo " di ";
    echo $prox['nomePr'];
    echo "<br>";
  }
  ?>
      <p><?php echo "Prezzo totale: "; echo $pro['prezzo']; echo" €"; ?></p>
    </li>
      
    
 

<?php } ?>
  </ol>
</div>








</body>

</html>
