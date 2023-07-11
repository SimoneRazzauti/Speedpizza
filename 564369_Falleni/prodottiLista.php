 <?php
	session_start();
  include "php/sessionUtil.php";
	include "php/connessione.php";
  require ('php/validatorQuantit.php');



  $catt= $_SESSION['nmCat']; //categoria selezionata




            $rowperpage = 4;
            $row = 0;

            // Previous Button
            if(isset($_POST['but_prev'])){
                $row = $_POST['row'];
                $row -= $rowperpage;
                if( $row < 0 ){
                    $row = 0;
                }
            }

            // Next Button
            if(isset($_POST['but_next'])){
                $row = $_POST['row'];
                $allcount = $_POST['allcount'];

                $val = $row + $rowperpage;
                if( $val < $allcount ){
                    $row = $val;
                }
            }



  $sql = "SELECT * from prodotti WHERE categoria='".$catt."' ORDER BY nomePr limit $row,".$rowperpage;
  $result = mysqli_query($conn,$sql);
  $prod = mysqli_fetch_all($result, MYSQLI_ASSOC);
  
  if(isset($_POST['Search'])){/*quando clicchiamo submit*/

  $query = $_POST['ricerca'];
  $sql = "SELECT * from prodotti  WHERE categoria='".$catt."' AND (`nomePr` LIKE '%".$query."%') ORDER BY nomePr limit $row,".$rowperpage;
  $result = mysqli_query($conn,$sql);
  $prod = mysqli_fetch_all($result, MYSQLI_ASSOC);
   
  }


  if(isset($_POST['submit'])){/*quando clicchiamo submit*/
      
      $validation = new validatorQuantit($_POST);
      $errors = $validation->validateForm();

      //save to dB
      if(array_filter($errors)){
        $successo = false;
      }else {
    	 	$idProd = mysqli_real_escape_string($conn, $_POST['idProd']);

    		$quantita = mysqli_real_escape_string($conn, $_POST['quantita']);
    		 
    		$prezzo = mysqli_real_escape_string($conn, $_POST['prezzo']);

    		$user =  $_SESSION['userId'];
 



        $ricerca = "SELECT * FROM carrello WHERE idProd='".$idProd."' AND idUser ='".$user."';";
    
        $resultCont = mysqli_query($conn, $ricerca);
        $variabileQuanti = mysqli_fetch_array($resultCont);
        $quantiNuova = $variabileQuanti['quantita'];
        $num = mysqli_num_rows($resultCont);


        if($num>0){

         $quantitaTot = $quantita+$quantiNuova;

         $update = "UPDATE carrello
         SET quantita='".$quantitaTot."'
         WHERE idProd='".$idProd."' AND idUser ='".$user."';";

        if(mysqli_query($conn, $update)){ //se ha funzionato
           $successo = true;
        } else{
          $successo = false;
          echo 'query error: ' . mysqli_error($conn);
           
        }

        }
        else{
          $inserisci = "INSERT INTO carrello (idProd, quantita, prezzo, idUser)
                VALUES ('$idProd', '$quantita', '$prezzo', '$user')";

        if(mysqli_query($conn, $inserisci)){ //se ha funzionato
           $successo = true;
        } else{
          $successo = false;
          echo 'query error: ' . mysqli_error($conn);
          
        }
      
        }

    		

      }





    }
?>










<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
 
<title>Spesa On-line</title>
<link rel="stylesheet" href="css/stileLista.css" type="text/css">






<style>
.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  max-width: 300px;
  margin: auto;
  text-align: center;
  font-family: arial;
  background-color: #f0f8ff;
}

.image {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  max-width: 300px;
  max-height: 300px;
  margin: auto;
  text-align: center;
  font-family: arial;
  border-radius: 50%;
  z-index: 1000;
}

.image img{
  border-radius: 50%;
}
.price {
  color: grey;
  font-size: 22px;
}
</style>





</head>

<body>
<?php include('header.php'); 
$quer = "SELECT COUNT(*) AS cntrows FROM prodotti"; //DIMENTICATO DI AGGIUNGERE WHERE CATEGORIA= A QUELLA SCELTA. Cosi come è prende tutti e scorre troppo avanti.......
            $Queryresult = mysqli_query($conn,$quer);
            $fetchresult = mysqli_fetch_array($Queryresult);
            $allcount = $fetchresult['cntrows'];

?>


       
   
 
    <div class="impaginazione">
<div class="row">
<br>
<h3>Cerca il tuo prodotto!:</h3>

<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
<div class="cerca">
  <input type="search" name="ricerca" placeholder="Cerca..">
  
  <input type="submit" value="search" name="Search"/>
</div>
</form>



 <?php $sno = $row + 1;
 
 foreach ($prod as $pro) {
  ?>
 <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST"> 
 	<div class="column">

 		<div class="card">
 			<div class="image">
 				<img src='<?php echo ($pro['immagine']); ?>' >
 			</div>
 			<div>
 				<h1><?php echo htmlspecialchars($pro['nomePr']); ?></h1>
        <?php echo isset($errors['quantita']) ? $errors['quantita'] : '' ?>
 				<p class="price"><?php echo htmlspecialchars($pro['prezzo'])."€";?></p>
      </div>
 			
<?php 
       
      if(isset($_SESSION['userId'])){
        if($pro['quantita']==0){
          echo '<img src="immagini/Block-icon.png">';
        }else {
          include "php/insProd.php";
        }
      }
      else{
        echo '<p>Registrati/accedi per poter acquistare</p>';
      }
        ?>

      






 		</div>
 	</div>
 </form>
<?php   $sno ++; } ?> 



</div>
<br>

<form method="post">
            <div class="div_pagination">
                <input type="hidden" name="row" value="<?php echo $row; ?>" >
                <input type="hidden" name="allcount" value="<?php echo $allcount; ?>">
                <input type="submit" class="button" name="but_prev" value="Indietro">
                <input type="submit" class="button" name="but_next" value="Avanti">
            </div>
        </form>
<br>
</div>
<?php include('footer.php'); ?>


</body>

<?php 
echo "<script type='text/javascript'>";
  if ($successo==true) {
    echo "alert('Prodotto aggiunto')";
  }
  else {
    $fixErrore= $errors['quantita'];
    echo  "alert('$fixErrore')"; 
  }
echo "</script>";
 ?>


</html>

