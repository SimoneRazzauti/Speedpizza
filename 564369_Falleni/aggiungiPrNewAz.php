<?php
	session_start();
  include "php/sessionUtil.php";  
  include "php/connessione.php";
  
if(isset($_POST['but_upload'])){
$aznd = mysqli_real_escape_string($conn, $_SESSION['userAz']);
  
        $ricercaAzienda = "SELECT * FROM azienda WHERE userAz='".$aznd."';";
        $resultContoFinale=mysqli_query($conn, $ricercaAzienda);
        $cittaAziendaX = mysqli_fetch_array($resultContoFinale);

        $citta = $cittaAziendaX['citta'];
     
  $quantita = mysqli_real_escape_string($conn, $_POST['quantita']);
  $nomePr = mysqli_real_escape_string($conn, $_POST['nomePr']);
  $prezzo = mysqli_real_escape_string($conn, $_POST['prezzo']);
  $categoria = mysqli_real_escape_string($conn, $_POST['categoria']);
         



  $target_file = basename($_FILES["file"]["name"]);

  // Select file type
  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

  // Valid file extensions
  $extensions_arr = array("jpg","jpeg","png","gif");

  // Check extension
  if( in_array($imageFileType,$extensions_arr) )
 
    // Convert to base64 
    $image_base64 = base64_encode(file_get_contents($_FILES['file']['tmp_name']) );
    $image = 'data:image/'.$imageFileType.';base64,'.$image_base64;
    // Insert record
    $query = "INSERT into prodotti(immagine, nomePr, citta, quantita, prezzo, idAzienda, categoria) 
    values('".$image."','".$nomePr."','".$citta."','".$quantita."','".$prezzo."', '".$aznd."', '".$categoria."');";
    if(mysqli_query($conn, $query)){ //se ha funzionato
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
<style>






/*selection boxes*/

select {
   -webkit-appearance:none;
   -moz-appearance:none;
   -ms-appearance:none;
   appearance:none;
   outline:0;
   box-shadow:none;
   border:0!important;
   background: #5c6664;
   background-image: none;
   flex: 1;
   padding: 0 .5em;
   color:#fff;
   cursor:pointer;
   font-size: 1em;
   font-family: 'Open Sans', sans-serif;
}

.select {
   position: relative;
   display: flex;
   width: 20em;
   height: 3em;
   line-height: 3;
   background: #5c6664;
   overflow: hidden;
   border-radius: .25em;
}
.select::after {
   content: '\25BC'; /*freccina in basso*/
   position: absolute;
   top: 0;
   right: 0;
   padding: 0 1em;
   background: #2b2e2e;
   cursor:pointer;
   pointer-events:none;
   transition:.25s all ease;
}
.select:hover::after {
   color: #23b499;
}
 
 
</style>
<title>Spesa On-line</title>
<link rel="stylesheet" href="css/Stile.css" type="text/css"> 
<link rel="stylesheet" href="css/StileReg.css" type="text/css">  
</head>

<body>
<?php include('header.php'); ?>




<div class="new-user">
  <h2>Inserisci i tuoi prodotti! </h2>
 
  <form enctype="multipart/form-data" method="POST">
    Inserisci immagine: <input name="file" type="file"></br>



       <label>Nome:</label>
       <input type="text" name="nomePr" value="<?php echo isset($_POST['nomePr']) ? htmlspecialchars($_POST['nomePr'], ENT_QUOTES) : ''; ?>">
       <div class="error">
        <?php echo isset($errors['nomePr']) ? $errors['nomePr'] : '' ?>
       </div>

       <label>Quantita:</label>
       <input type="number" name="quantita"  value="<?php echo isset($_POST['quantita']) ? htmlspecialchars($_POST['quantita'], ENT_QUOTES) : ''; ?>">
       <div class="error">
        <?php echo isset($errors['quantita']) ? $errors['quantita'] : '' ?>
       </div>


       <label>Prezzo:</label>
       <input type="number" name="prezzo"  value="<?php echo isset($_POST['prezzo']) ? htmlspecialchars($_POST['prezzo'], ENT_QUOTES) : ''; ?>" step=".01">
       <div class="error">
        <?php echo isset($errors['prezzo']) ? $errors['prezzo'] : '' ?>
       </div>

<label>Scegli categoria: </label>
      <div class="select">
   <select name="categoria" id="categoria" required>
      <option selected disabled>categoria</option>
      <option value="CARNI">CARNI</option>
      <option value="PESCI">PESCI</option>
      <option value="ORTAGGI ">ORTAGGI</option>
      <option value="UOVA">UOVA</option>
      <option value="FORMAGGI">FORMAGGI</option>
      <option value="CONDIMENTI">CONDIMENTI</option>
      <option value="LEGUMI">LEGUMI</option>
      <option value="FRUTTA">FRUTTA</option>
      <option value="PASTA">PASTA</option>
   </select>
</div>

       <div class="successo">
        <?php
          if($successo == true){
            echo "<p>Fatto!!!</p>";
          }
        ?>
       </div>

  <input type="submit" name="but_upload">
</form>
</div>



  

 
</body>

</html>