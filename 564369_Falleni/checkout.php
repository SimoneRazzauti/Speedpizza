 <?php
  session_start();
  include "php/sessionUtil.php";
  include "php/connessione.php";


  $id= $_SESSION['userId'];
  
  $sql = "SELECT prodotti.idProd, prodotti.immagine, prodotti.nomePr as Nome, sum(carrello.quantita) as quantita, carrello.prezzo as prezzo
  from carrello inner join prodotti on prodotti.idProd=carrello.idProd 
  where carrello.idUser=".$id." group by prodotti.nomePr;";
  $result = mysqli_query($conn,$sql);
  $prod = mysqli_fetch_all($result, MYSQLI_ASSOC);

 
  $variabileMobile = true;

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">

<title>Spesa On-line</title>
<link rel="stylesheet" href="css/stileLista.css" type="text/css">
<link rel="stylesheet" href="css/stileCC.css" type="text/css">
</head>

<body>

<?php include('header.php'); ?>

 <div class="row">
 <div class="title">
    <h3>Lista prodotti</h3>
  </div>
<?php foreach ($prod as $pro) {
  $totaleprezzo='0'; ?>
 

<div class="shopping-cart">

 
  <div class="item">
    
 
    <div class="image">
        <h3><?php echo htmlspecialchars($pro['Nome']); ?></h3>
      <img src='<?php echo ($pro['immagine']); ?>'>
    </div>
 


 
    <div class="total-price">
      <span><?php echo "Quantita: ".htmlspecialchars($pro['quantita']); ?></span>
      <h4><?php echo "Prezzo: ".htmlspecialchars($pro['prezzo']*$pro['quantita'])."€";?></h4>
      <h5><?php $sqlprr = "SELECT quantita from prodotti WHERE idProd='".$pro['idProd']."';";
            $resultprr = mysqli_query($conn,$sqlprr);
            $prodprr = mysqli_fetch_array($resultprr);
              if($prodprr['quantita']<$pro['quantita']){
                echo "Prodotto in eccesso, modificare.";
                $variabileMobile = false;
            }

  ?></h5>
    </div>
  </div>
</div>

<?php  } ?>

  
<?php 
  
  $sqlPrezzo = "SELECT sum(test.pr*test.quantita) as PrezzoTot
    from (SELECT distinct(prodotti.nomePr) as Nome, sum(carrello.quantita) as quantita, carrello.prezzo as pr
    from carrello inner join prodotti on prodotti.idProd=carrello.idProd 
    where carrello.idUser='".$id."' group by prodotti.nomePr) as Test;";

 


  $resultPrezzo = mysqli_query($conn,$sqlPrezzo);
  $prodPrezzo = mysqli_fetch_array($resultPrezzo);

 ?>
    </div>

 <div class="card">
<?php  
$prezzoFinale = $prodPrezzo['PrezzoTot'];
$_SESSION['prezzo'] = $prezzoFinale;
echo "Prezzo totale: ".$prezzoFinale."€"; ?>
 </div>




<div class="button_cont" align="center"><?php 
 if($variabileMobile==false)
  echo "<a class='checkoutQuanti' target='_blank'>Modifica quantit&agrave; </a>";
 else if($variabileMobile==true)
  echo "<a class='checkoutQuanti' target='_blank' onclick='apri()'>Check Out</a>";
?>
</div>






<div id="check" class="modalcheck">
  
<div id="check_form">
           
<div class="check animate">
 

    <div class="checkcontainer">
      <h2>Scegli metodo di pagamento</h2>
      
      <div class="colL">
  <ul class="prezz">
    <li class="testa">contrassegno</li>
    <li class="grigio">5,00 € per la spedizione</li>
    
    <?php echo"<li class='grigio'><a href='contrassegno.php' class='button'>Vai!</a></li>"?>
  </ul>
</div>

<div class="colL">
  <ul class="prezz">
    <li class="testa">carta di credito</li>
    <li class="grigio">3,00 € per la spedizione</li>
    
    <?php echo"<li class='grigio'><a href='cartaCredito.php' class='button'>Vai!</a></li>"?>
  </ul>
</div>


  </div>



      <div class="button_cont" align="center">
        <button class="annulla" onclick="document.getElementById('check').style.display='none'">ANNULLA</button>
      </div>


  </div>
 </div>
  
</div>






<br>
<br>







<script type='text/javascript'>
  function apri(){
    document.getElementById('check').style.display="block";
  }
    var modalcheck = document.getElementById('check');

    window.onclick = function(event) {
      if (event.target == modalcheck) {
          modalcheck.style.display = "none";
      }
    }

</script> 
</body>

</html>