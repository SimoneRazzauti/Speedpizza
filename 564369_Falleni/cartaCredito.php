

<?php
  session_start();
  include "php/sessionUtil.php";
  include "php/connessione.php";  
  
$id = $_SESSION['userId'];


$prezzoFinale =  $_SESSION['prezzo']+3;
 

 if(isset($_POST['CompraT'])){
   
      //save to dB
    $DataG = mysqli_real_escape_string($conn, $_POST['consegna']); 
    
    $timezone = date('H:i');

    $dataFinale=$DataG.' '.$timezone;


  $sql = "SELECT c.idProd, p.nomePr, c.quantita as quantitax from carrello c inner join prodotti p on c.idProd=p.idProd WHERE c.idUser='".$id."';";
  $result = mysqli_query($conn,$sql);
  $prod = mysqli_fetch_all($result, MYSQLI_ASSOC);


 foreach ($prod as $pro) {
  $quantis = $pro["quantitax"];
  $nomes = $pro["nomePr"];
  $idPr = $pro["idProd"];


  $sql = "INSERT INTO prodottiComprati (idUsr, nomePr, quantita, giorno)
                VALUES ('$id', '$nomes', '$quantis', '$dataFinale')";

        if(mysqli_query($conn, $sql)){ //se ha funzionato
        } else{
          echo 'query error: ' . mysqli_error($conn);
        }
   $aggiorn = "UPDATE prodotti SET quantita=quantita-".$quantis."
                WHERE idProd='".$idPr."';";

        if(mysqli_query($conn, $aggiorn)){ //se ha funzionato
        } else{
          echo 'query error: ' . mysqli_error($conn);
        }



 } 









        $sql = "INSERT INTO ordiniEseguiti (idUsr, giorno, prezzo)
                VALUES ('$id', '$dataFinale', '$prezzoFinale')";

        if(mysqli_query($conn, $sql)){ //se ha funzionato
           $Comprato = true;
           $delete = "DELETE FROM carrello WHERE idUser ='".$id."';";
           if(mysqli_query($conn, $delete)){ //se ha funzionato
           header('location: ./index.php');
        } else{
          echo 'query error: ' . mysqli_error($conn);
          
        }
        } else{
          echo 'query error: ' . mysqli_error($conn);
          $Comprato = false;
        }
      

    
  }
?>




<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Payment card checkout</title>
  
  
      <link rel="stylesheet" href="css/stileCC.css">

  
</head>

 <body onload="controlDate()"> 
<?php include('header.php'); ?>

<?php  
  $sqlCarr = "SELECT * FROM user WHERE userId='".$id."';";
 $resultCarr = mysqli_query($conn,$sqlCarr);
 $prodCarr = mysqli_fetch_array($resultCarr, MYSQLI_ASSOC);

 ?>

 <div class="row">
    <div class="carta">
    
    <h2>Riepilogo Informazioni</h2>
    <h4>Nome: <?php echo "- ". $prodCarr['nome']; ?></h4>
    <h4>Cognome: <?php echo "- ". $prodCarr['cognome']; ?></h4>
    <h4>Citta: <?php echo "- ". $prodCarr['citta']; ?></h4>
    <h4>Indirizzo: <?php echo "- ". $prodCarr['indirizzo']; ?></h4>
    <h4>Cap: <?php echo "- ". $prodCarr['cap']; ?></h4>
    <h4>Prezzo Totale con consegna: <?php
    
    echo "- ". $prezzoFinale ."$"; ?></h4>
<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST" >
    <label for="consegna">Giorno consegna:</label>
    <input type="date" id="consegna" name="consegna" required>
    
    <input type="submit" value="Ordina ora" name="CompraT" id="ordinaora">
  
   

</form>
  </div>
 </div>
  




<div class="row">
<div class="contenitore">
  <div class="col1">
    <div class="card">
      <div class="front">
        <div class="type">
          <img class="bankid"/>
        </div>
        <span class="chip"></span>
        <span class="card_number">&#x25CF;&#x25CF;&#x25CF;&#x25CF; &#x25CF;&#x25CF;&#x25CF;&#x25CF; &#x25CF;&#x25CF;&#x25CF;&#x25CF; &#x25CF;&#x25CF;&#x25CF;&#x25CF; </span>
        <div class="date"><span class="date_value">MM / YYYY</span></div>
        <span class="fullname">FULL NAME</span>
      </div>
      <div class="back">
        <div class="magnetic"></div>
        <div class="bar"></div>
        <span class="seccode">&#x25CF;&#x25CF;&#x25CF;</span>
        
      </div>
    </div>
  </div>
  <div class="col2">

    <label>Card Number</label>
    <input required class="number" type="text" placeholder="xxxx xxxx xxxx xxxx" ng-model="ncard" maxlength="19" onkeypress='return event.charCode >= 48 && event.charCode <= 57' >
    <label>Cardholder name</label>
    <input class="inputname" type="text" placeholder="name" required/>
    <label>Expiry date</label>
    <input class="expire" type="text" placeholder="MM / YYYY" required/>
    <label>Security Number</label>
    <input class="ccv" type="text" placeholder="CVC" maxlength="3" onkeypress='return event.charCode >= 48 && event.charCode <= 57' required/>
    
    
  </div>
</div>
</div>

 

<script src='https://cdnjs.cloudflare.com/ajax/libs/angular.js/1.6.1/angular.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js'></script>

    <script src="js/funzioneCC.js"></script>
    <script src="js/controllaGiorno.js"></script>
</body>
</html>
 
<?php 
echo "<script type='text/javascript'>";

  
  if ($Comprato==true) {
    echo "alert('Ordine andato a buon fine')";
  }
  else {
    
    echo  "alert('errore')"; 
  }

echo "</script>";
 ?>