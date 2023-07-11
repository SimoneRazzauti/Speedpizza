 <?php
  session_start();
  include "php/sessionUtil.php";
	include "php/connessione.php";
  require ('php/validatorQuantit.php');




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




  $sql = "SELECT * from ricette ORDER BY titolo limit $row,".$rowperpage;
  $result = mysqli_query($conn,$sql);
  $prod = mysqli_fetch_all($result, MYSQLI_ASSOC);
  
  if(isset($_POST['Search'])){/*quando clicchiamo submit*/

  $query = $_POST['ricerca'];
  $sql = "SELECT * from ricette WHERE (`titolo` LIKE '%".$query."%') ORDER BY titolo limit $row,".$rowperpage;
  $result = mysqli_query($conn,$sql);
  $prod = mysqli_fetch_all($result, MYSQLI_ASSOC);
   
  }


    if(isset($_POST['submit'])){/*quando clicchiamo submit*/
      
      
    $idRicetta = mysqli_real_escape_string($conn, $_POST['idRic']);
    $x = mysqli_real_escape_string($conn, $_POST['quantita']);
    $lista = "SELECT prodotti.idProd as idProd, prodotti.prezzo as prezzo, prodotti.nomePr as NomeIngr, abbinRicProd.quantitaPr as quanti, abbinRicProd.idRic 
                  FROM abbinRicProd inner join prodotti on prodotti.idProd=abbinRicProd.idPro WHERE idRic= '".$idRicetta."';";
    $risDaIns = mysqli_query($conn,$lista);
    $risperCarr = mysqli_fetch_all($risDaIns, MYSQLI_ASSOC);

    foreach ($risperCarr as $perCarr) {
   

    	 	$idProd = $perCarr['idProd'];

    		$quantita = $x*$perCarr['quanti'];
    		 
    		$prezzo = $perCarr['prezzo'];

    		$user = mysqli_real_escape_string($conn, $_SESSION['userId']);
 

        
        $ricerca = "SELECT * FROM carrello WHERE idProd='".$idProd."' AND idUser ='".$user."';";
    
        $resultCont=mysqli_query($conn, $ricerca);
        $variabileQuanti = mysqli_fetch_array($resultCont);
        $quantiNuova = $variabileQuanti['quantita'];
        $num= mysqli_num_rows($resultCont);
        $quantitaTot = $quantita+$quantiNuova;

        $query_email = "SELECT quantita FROM prodotti WHERE idProd ='".$idProd."';";/*valore max prodotto in questione*/
        $result_email=mysqli_query($conn, $query_email); 
        $numero = mysqli_fetch_array($result_email);

        if($quantitaTot<=$numero['quantita']){
        if($num>0){
         $update = "UPDATE carrello
         SET quantita='".$quantitaTot."'
         WHERE idProd='".$idProd."' AND idUser ='".$user."';";

         if(mysqli_query($conn, $update)){ //se ha funzionato
           $successo = true;
        } else{
          echo 'query error: ' . mysqli_error($conn);
        }
       }else{
    		$sql = "INSERT INTO carrello (idProd, quantita, prezzo, idUser)
                VALUES ('$idProd', '$quantita', '$prezzo', '$user')";

    		if(mysqli_query($conn, $sql)){ //se ha funzionato
    		   $successo = true;
    		} else{
    			echo 'query error: ' . mysqli_error($conn);
    		}
        }
        }else{
                $InserireN=$numero['quantita'];

                  if($num>0){
         $update = "UPDATE carrello
         SET quantita='".$InserireN."'
         WHERE idProd='".$idProd."' AND idUser ='".$user."';";

         if(mysqli_query($conn, $update)){ //se ha funzionato
           $successo = true;
        } else{
          echo 'query error: ' . mysqli_error($conn);
        }
       }else{
        $sql = "INSERT INTO carrello (idProd, quantita, prezzo, idUser)
                VALUES ('$idProd', '$InserireN', '$prezzo', '$user')";

        if(mysqli_query($conn, $sql)){ //se ha funzionato
           $successo = true;
        } else{
          echo 'query error: ' . mysqli_error($conn);
        }
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
.image img{
  float: left;
  left: 0;
  margin-left: 7px;
  width: 180px;
  height: 120px;
  border: none;
  border-radius: 20%;
}
.collapsible {
  background-color: #292c2f;
  color: white;
  cursor: pointer;
  padding: 18px;
  width: 90%;
  border: none;
  outline: none;
  font-size: 15px;
  margin-left: 5%;
  margin-right: 5%;
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
}
.collapsible p{
  margin-top: 50px;
}
.active, .collapsible:hover {
  background-color: #555;
}

.content {
  padding: 0 18px;
  max-height: 0;
  overflow: hidden;
  transition: max-height 0.2s ease-out;
  background-color: #f0f8ff;
  margin-bottom: 5px;
  margin-left: 7%;
  margin-right: 7%;
  border: 1px solid #ccc;
}

.collapsible:after {
  content: '\02795'; /* Unicode character for "plus" sign (+) */
  font-size: 13px;
  color: white;
  float: right;
  margin-left: 5px;
  margin-top:-40px;
}

.active:after {
  content: "\2796"; /* Unicode character for "minus" sign (-) */
}

.fondino input[type=submit]{
  border: none;
  outline: 0;
  padding: 12px;
  color: white;
  background-color: #000;
  text-align: center;
  cursor: pointer;
  width: 100%;
  font-size: 18px;
}
.fondino input[type=submit]:hover {
  opacity: 0.4;
}

</style>


















</head>

<body>
<?php 
include('header.php'); 
$quer = "SELECT COUNT(*) AS cntrows FROM ricette";
            $Queryresult = mysqli_query($conn,$quer);
            $fetchresult = mysqli_fetch_array($Queryresult);
            $allcount = $fetchresult['cntrows'];

?>


       <div class="impaginazione">
      
<div class="row">
 



<br>
<h3>Cerca la tua ricetta!:</h3>




<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
<div class="cerca">
  <input type="search" name="ricerca" placeholder="Cerca..">
  
  <input type="submit" value="search" name="Search"/>
</div>
</form>



<br>
<br>

 <?php foreach ($prod as $pro) {  ?>
 
<button class="collapsible"><div class="image">
        <img src='<?php echo ($pro['immagine']); ?>' >
      </div>
      <p><?php echo htmlspecialchars($pro['titolo']);  ?></p></button>
<div class="content">
<h3>Descrizione: </h3>
  <p><?php echo ($pro['descrizione']); ?></p><br>
  <h3>Ingredienti: </h3>
  <?php 
    $listaIngr = "SELECT prodotti.nomePr as NomeIngr, abbinRicProd.quantitaPr as quanti, abbinRicProd.idRic FROM abbinRicProd inner join prodotti on prodotti.idProd=abbinRicProd.idPro WHERE idRic= '".$pro['idRicette']."';";
    $resultIngr = mysqli_query($conn,$listaIngr);
    $risultatoIngr = mysqli_fetch_all($resultIngr, MYSQLI_ASSOC);

    foreach ($risultatoIngr as $risIng) {
   ?>
   <p><?php echo "- " .htmlspecialchars($risIng['NomeIngr']); 
   echo "  quantit&agrave: ".  htmlspecialchars($risIng['quanti']);?></p>
   <?php } ?> 
<br>
<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST" >
<?php 
 if(isset($_SESSION['userId'])){
        
          include "php/insRic.php";
        }
      
      else{
        echo '<p>Registrati/accedi per poter acquistare</p>';
      }
 ?>
<br>


    </form>
</div>


<?php } ?> 



 
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






</div>




<?php include('footer.php'); ?>


 
<script>
//per far scendere la ricetta, collapsible
var coll = document.getElementsByClassName("collapsible");
var i;

for (i = 0; i < coll.length; i++) {
  coll[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var content = this.nextElementSibling;
    if (content.style.maxHeight){
      content.style.maxHeight = null;
    } else {
      content.style.maxHeight = content.scrollHeight + "px";
    } 
  });
}
</script>

</body>

</html>
 