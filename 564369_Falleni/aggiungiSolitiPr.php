 <?php
  session_start();
  
  include "php/sessionUtil.php";
  include "php/connessione.php";



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



  $aznd = mysqli_real_escape_string($conn, $_SESSION['userAz']);          
  $sql = "SELECT * from prodotti WHERE idAzienda='".$aznd."' ORDER BY nomePr limit $row,".$rowperpage;
  $result = mysqli_query($conn,$sql);
  $prod = mysqli_fetch_all($result, MYSQLI_ASSOC);
  
  if(isset($_POST['Search'])){/*quando clicchiamo Search*/

  $query = $_POST['ricerca'];
  $sql = "SELECT * from prodotti WHERE idAzienda='".$aznd."' AND (`nomePr` LIKE '%".$query."%') ORDER BY nomePr limit $row,".$rowperpage;
  $result = mysqli_query($conn,$sql);
  $prod = mysqli_fetch_all($result, MYSQLI_ASSOC);
   
  }


    if(isset($_POST['submit'])){/*quando clicchiamo submit*/
      

      //save to dB
        $idProd = mysqli_real_escape_string($conn, $_POST['idProd']);

        $quantita = mysqli_real_escape_string($conn, $_POST['quantita']);
         
        $prezzo = mysqli_real_escape_string($conn, $_POST['prezzo']);

        
 



        $ricerca = "SELECT * FROM prodotti WHERE idProd='".$idProd."';";
        $resultCont=mysqli_query($conn, $ricerca);
        $variabileQuanti = mysqli_fetch_array($resultCont);

        $quantiNuova = $variabileQuanti['quantita'];



         $quantitaTot = $quantita+$quantiNuova;

         $update = "UPDATE prodotti
         SET quantita='".$quantitaTot."'
         WHERE idProd='".$idProd."';";

        if(mysqli_query($conn, $update)){ //se ha funzionato
           $successo = true;
        } else{
          echo 'query error: ' . mysqli_error($conn);
        }
    }

    if(isset($_POST['newPrezzo'])){/*quando clicchiamo submit*/
      

      //save to dB
        $idProd = mysqli_real_escape_string($conn, $_POST['idProd']);

        $quantita = mysqli_real_escape_string($conn, $_POST['quantita']);
         
        $prezzo = mysqli_real_escape_string($conn, $_POST['prezzoNuovo']);


         $update = "UPDATE prodotti
         SET prezzo='".$prezzo."'
         WHERE idProd='".$idProd."';";

        if(mysqli_query($conn, $update)){ //se ha funzionato
           $successo = true;
        } else{
          echo 'query error: ' . mysqli_error($conn);
        }
    }












?>










<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
 
<title>Spesa On-line</title>
<link rel="stylesheet" href="css/stileLista.css" type="text/css"> 
<link rel="stylesheet" href="css/stileReg.css" type="text/css">





<style>

.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  max-width: 300px;
  margin: auto;
  text-align: center;
  font-family: arial;
}

.image {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  max-width: 300px;
  max-height: 300px;
  margin: auto;
  text-align: center;
  font-family: arial;
}
.parte{
  display: inline-block;
  float: none;
  margin-right: 5px;
  margin-left: 5px; 
}
.price {
  color: grey;
  font-size: 22px;
  margin-top: -23px;

}
</style>
</head>



<body>
<?php include('header.php'); 
$quer = "SELECT COUNT(*) AS cntrows FROM prodotti WHERE idAzienda='".$aznd."';";
            $Queryresult = mysqli_query($conn,$quer);
            $fetchresult = mysqli_fetch_array($Queryresult);
            $allcount = $fetchresult['cntrows'];

?>

<br><br>
       
   
 
    
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
 <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST" > 
  <div class="column">

    <div class="card">
      <div class="image">
        <img src='<?php echo ($pro['immagine']); ?>' >
      </div>
      <h1><?php echo htmlspecialchars($pro['nomePr']); ?></h1>
      <div>
        <div class="parte">
          <h3>Prezzo </h3>
        <p class="price"><?php echo htmlspecialchars($pro['prezzo'])."€";?></p></div>

       <div class="parte">
          <h3> Quantita</h3>
        <p class="price"><?php echo htmlspecialchars($pro['quantita'])." pezzi";?></p></div>
      </div>
      <div class="fondino">

    <input type="text" name="quantita" value="1">


       <div class="error">
        <?php echo isset($errors['quantita']) ? $errors['quantita'] : '' ?> 
        
       </div>
        

       <input type="submit" value="Aggiorna quantit&agrave" name="submit">

       <input type="text" name="prezzoNuovo" value="<?php echo htmlspecialchars($pro['prezzo']); ?>">


       <div class="error">
        <?php echo isset($errors['quantita']) ? $errors['quantita'] : '' ?>
        
       </div>
        <div class="successo">
        <?php
          if($successo == true){
            echo '<script type="text/javascript">
      alert("Modificato con successo");
      window.location.href = "aggiungiSolitiPr.php";
      </script>';
          }
        ?>
       </div>

       <input type="submit" value="Cambia prezzo" name="newPrezzo">


       <input type="hidden" name="idProd" value="<?php echo $pro['idProd']; ?>">
       <input type="hidden" name="prezzo" value="<?php echo $pro['prezzo']; ?>"> 
      </div>
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


</body>

</html>
 