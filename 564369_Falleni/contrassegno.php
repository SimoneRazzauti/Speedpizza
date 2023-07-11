

<?php
  session_start();
  include "php/sessionUtil.php";
  include "php/connessione.php";  
  
  $id = $_SESSION['userId'];



$prezzoFinale = $_SESSION['prezzo']+5;
 

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
    <input type="date" id="consegna" name="consegna" min="" required>
    <br>

    <input type="submit" value="Ordina ora" name="CompraT" id="ordinaora">
  
   

</form>
  </div>
 </div>
  







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