<?php 

    include "php/connessione.php";

    if(isset($_POST['carr'])){/*quando clicchiamo submit*/
      

      //save to dB
  
        $user = mysqli_real_escape_string($conn, $_POST['user']);
        $idProd = mysqli_real_escape_string($conn, $_POST['idP']);
        $quantit = mysqli_real_escape_string($conn, $_POST['elim']);


        $seleziona = "SELECT quantita FROM carrello WHERE idProd='".$idProd."' AND idUser ='".$user."';";
    
        $resultSel=mysqli_query($conn, $seleziona);
        $vecchioValore = mysqli_fetch_array($resultSel);
        $vecchioVal = $vecchioValore['quantita'];
        
        $quantitaTott = $vecchioVal-$quantit;

        if($quantitaTott>0){//se va sopra lo zero

         $updateCarr = "UPDATE carrello
         SET quantita='".$quantitaTott."'
         WHERE idProd='".$idProd."' AND idUser ='".$user."';";

        if(mysqli_query($conn, $updateCarr)){ //se ha funzionato
           $eliminato = true;
        } else{
          echo 'query error: ' . mysqli_error($conn);
          $eliminato=false;
        }

        }
        else{
          //cancella
          $delete = "DELETE FROM carrello WHERE idProd='".$idProd."' AND idUser ='".$user."';";

        if(mysqli_query($conn, $delete)){ //se ha funzionato
           $eliminato = true;
        } else{
          echo 'query error: ' . mysqli_error($conn);
          $eliminato=false;
        }
      
        }
      

    }
?>




 <?php 

 
 $id= $_SESSION['userId'];
$sql="SELECT sum(quantita) as quanti from carrello where idUser = '".$id."';";
$result=mysqli_query($conn,$sql);
$numero = mysqli_fetch_array($result);


  ?>

 <div class="dropdown">
  <button onclick="myFunctioyn()" class="dropbtn">
    <div class="carrImg">
    <p> <?php echo $numero['quanti']; ?> </p>
    <img src="immagini/cart.jpg">
    </div>
  </button>

  <div id="myDropdown" class="dropdown-content">
 

<table class='table'>
<tr>
<th> nome </th><th> quantita </th><th> prezzo </th><th></th><th></th>
</tr>
<?php 
 	$id= $_SESSION['userId'];

 $sqlCarr = "SELECT prodotti.idProd as idProd, prodotti.nomePr as Nome, sum(carrello.quantita) as quantita, carrello.prezzo as prezzo
  from carrello inner join prodotti on prodotti.idProd=carrello.idProd 
  where carrello.idUser=".$id." group by prodotti.nomePr;";
 $resultCarr = mysqli_query($conn,$sqlCarr);
 $prodCarr = mysqli_fetch_all($resultCarr, MYSQLI_ASSOC);
 $row_cnt = mysqli_num_rows($resultCarr);

foreach($prodCarr as $roww) {
echo "<tr>";
echo "<td>" . $roww['Nome'] . "</td>";
echo "<td>" . $roww['quantita'] . "</td>";
echo "<td>" . $roww['prezzo']*$roww['quantita'] . "</td>";?>
<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST" >
  <?php
echo "<td>";?>
<div class="val">
<input type="number" name="elim" value="1" min="1">
</div><?php
echo "</td>";
echo "<td>";
?>
<div class="sub">
<input type="submit" value="Rimuovi" name="carr">
</div>
<?php
echo "</td>";
echo "<td>";?>
<input type="hidden" name="idP" value="<?php echo $roww['idProd']; ?>">
<?php
echo "</td>";
echo "<td>";?>
<input type="hidden" name="user" value="<?php echo $_SESSION['userId']; ?>">
<?php
echo "</td>";
?>
</form>
<?php
echo "</tr>"; 
}
?>
</table>

<?php 
  if($row_cnt>0)
    echo "<a href='checkOut.php' class='button'>Compra e/o modifica</a>";
  else
    echo "Aggiungi prodotto";


 ?>


  </div>
</div> 

<script>

function myFunctioyn() {
  document.getElementById("myDropdown").classList.toggle("show");
}

window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
} 
</script>


 
<?php 
echo "<script type='text/javascript'>";

  
  if ($eliminato==true) {
    echo "alert('Prodotto eliminato correttamente')";
  }
  else {
    
    echo  "alert('errore')"; 
  }

echo "</script>";
 ?>