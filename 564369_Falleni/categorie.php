 <?php
	session_start();
  include "php/sessionUtil.php";
	include "php/connessione.php";
  require ('php/validatorQuantit.php');

            $rowperpage = 4;
            $row = 0;

            // Bottone indietro
            if(isset($_POST['but_prev'])){
                $row = $_POST['row'];
                $row -= $rowperpage;
                if( $row < 0 ){
                    $row = 0;
                }
            }

            // Bottone avanti
            if(isset($_POST['but_next'])){
                $row = $_POST['row'];
                $allcount = $_POST['allcount'];

                $val = $row + $rowperpage;
                if( $val < $allcount ){
                    $row = $val;
                }
            }




  $sql = "SELECT count(*) as NumeroPxC, categoria from prodotti GROUP BY categoria limit $row,".$rowperpage;
  $result = mysqli_query($conn,$sql);
  $prod = mysqli_fetch_all($result, MYSQLI_ASSOC);
  


  if(isset($_POST['submit'])){/*quando clicchiamo submit*/
    $_SESSION['nmCat'] = mysqli_real_escape_string($conn, $_POST['NomCat']);
     
     header("Location: ./prodottiLista.php");
    }
?>










<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
 
<title>Spesa On-line - Categorie</title>
<link rel="stylesheet" href="css/stileLista.css" type="text/css">

</head>

<body>
<?php include('header.php');

 

$quer = "SELECT COUNT(*) AS cntrows FROM (SELECT * FROM prodotti GROUP BY categoria) as Tab;";
            $Queryresult = mysqli_query($conn,$quer);
            $fetchresult = mysqli_fetch_array($Queryresult);
            $allcount = $fetchresult['cntrows'];

?>


       
   
 
    <div class="impaginazione">
<div class="row">
<br>



 <?php $sno = $row + 1;
 
 foreach ($prod as $pro) {
  ?>
 <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST" > 
 	<div class="column">

 		<div class="carta">

 			<div>
        <input type="hidden" name="NomCat" value="<?php echo $pro['categoria']; ?>">
 				<h1><?php echo htmlspecialchars($pro['categoria']); ?></h1>
 				<p class="price">Prodotti disponibili: <?php echo htmlspecialchars($pro['NumeroPxC']);?></p>
      </div>
       <input type="submit" value="Spesa On" name="submit">
       
 		</div>
 	</div>
 </form>
<?php   $sno ++; } ?> 



</div>
<br>  
<form method="post" action="">
            <div class="div_pagination">
                <input type="hidden" name="row" value="<?php echo $row; ?>" >
                <input type="hidden" name="allcount" value="<?php echo $allcount; ?>">
                <input type="submit" class="button" name="but_prev" value="Indietro">
                <input type="submit" class="button" name="but_next" value="Avanti">
            </div>
        </form>
 
</div>


<?php include('footer.php'); ?>
</body>

</html>