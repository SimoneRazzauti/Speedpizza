<?php
session_start();
require('inc/db.php'); # chiamata al db
include('utility/function.php'); # funzioni di utilità
?>
<!DOCTYPE html>
<html lang="it">
	<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title> Fastpizza Home </title>
    <link href="CSS/stilemain.css" rel="stylesheet" type="text/css">
    <link rel="icon" href="immagini/icon.png" sizes="32x32">
	</head>
<body>

<!-- Template per il menù -->
<?=template_menu();?>

<!-- Collegamenti social -->
<aside class="rightnav"> 
  <div class="social-links">
    <a href="#" id="facebook"></a>
    <a href="#" id="instagram"></a>
    <a href="#" id="google"></a>
  </div>
</aside>

<!-- Tasto tutorial -->
<aside class="tutorial">
  <div> <img src="./immagini/alert_icon.png" alt="alert"> </div>
  <p> <a href="documentazione.html"> TUTORIAL! </a> </p>
</aside>

<!-- MAIN PIC-->
<div class="mainpic">
		<h1 id="title">FAST PIZZA</h1>
		<h3 id="subtitle">La pizza come vuoi tu</h3>
</div>

<!-- FIRSTDIV -->
<div class="firstdiv">
	<div class="production">
	 <h2 id="title1">Componi ora la tua pizza!</h2>
	 <img src="immagini/greyline.png" alt="greyline" id="linea">
	 <h4 id="subtitle1">Inizia a comporre adesso,tutto &eacute; personalizzabile!<br>
	 Parti scegliendo l'impasto che pi&ugrave; preferisci </h4>
	 <h4 id="subtitle2">e dai sfogo alla tua creativit&aacute;</h4>
	 <a href="creation.php">INIZIA ORA ></a>
    </div>
    <div class="rightimage">
	</div>
</div>

<!-- SEPARATOR 1 -->
<div id="separator1">
	<hr id="hr1">
	<p>Le nostre novit&aacute;!</p>
</div>

<!-- PROMOTIONS -->
<section class="promotions" id="promote">
  <div class="promotion">
    <div class="promotion-image" id="image1"></div>
    <div class="promotion-content">
      <h2>Introduzione del Tutorial!</h2>
      <p>Sei nuovo e non conosci Fastpizza? Ti consigliamo di dare un'occhiata al tutorial appena aggiunto!</p>
    </div>
  </div>
  <div class="promotion">
    <div class="promotion-image" id="image2"></div>
    <div class="promotion-content">
      <h2>Nuovo Ingrediente!</h2>
      <p>Da oggi è possibile inserire all'interno della vostra pizza preferita l'ingrediente "Acciughe", consigliato con salsa di pomodoro e capperi!</p>
    </div>
  </div>
  <div class="promotion">
    <div class="promotion-content">
      <h2>Storico Ordini!</h2>
      <p>Da oggi ogni utente potrà tener traccia dello storico ordini direttamente dal proprio menù utente!</p>
    </div>
    <div class="promotion-image" id="image3"></div>
  </div>
</section>


<!-- SEPARATOR 2 -->
<div id="separator2">
	<hr id="hr2">
	<p>Prenota adesso!</p>
</div>

<!-- RESERVATION -->
<div class="reservation">
  <form id="myForm" name="myForm" onsubmit="return validateForm()" method="post">
  Data: 
  <input type="date" id="theDate" name="theDate" onkeydown="return false" required>
  &nbsp;
  Nome:
  <input type="text" id="firstname" name="firstname" required>
  &nbsp;
  Orario:
  <select id="theTime" name="theTime">
  <option>12:00</option>
  <option>12:30</option>
  <option>13:00</option>
  <option>13:30</option>
  <option>14:00</option>
  <option>14:30</option>
  <option>18:30</option>
  <option>19:00</option>
  <option>19:30</option>
  <option>20:00</option>
  <option>20:30</option>
  <option>21:00</option>
  <option>21:30</option>
  <option>22:00</option>
  <option>22:30</option>
  </select>
  &nbsp;
  N&ordm;Persone:
  <input type="number" name="numb" min="1" max="6" onkeydown="return false" required>
  <input type="submit" name="save" value="Conferma!">
</form>
</div>

<?php /* VALIDAZIONE RESERVATION */

if(isset($_POST['save'])){

    if (empty($_POST["firstname"])) {
      $nameErr = "Devi inserire un nome.";
    }
      else{
        if(strlen($_POST['firstname']) < 3) {
        $nameErr = "Inserisci un nome valido.";
        }
         else $name = $_POST['firstname'];
      }

     if (empty($_POST["numb"])) {
      $numbErr = "Devi inserire un numero di persone.";
     }
      else{
        if($_POST['numb'] < 1 || $_POST['numb'] > 6 ) {
        $numbErr = "Inserisci un numero di persone valido (compreso tra 1 e 6).";
        }
         else $numb = $_POST['numb'];
      }

     if(!isset($name)){
       echo '<p class="err_reservation" id="nameErr">'.$nameErr.'</p>';
       unset($nameErr);
     }
     if(!isset($numb)){
       echo '<p class="err_reservation" id="numbErr">'.$numbErr.'</p>';
     }

     if(isset($name) && isset($numb)){
      $query_reserv = "SELECT * FROM prenotazioni WHERE data='".$_POST['theDate']."'AND orario='".$_POST['theTime']."'";
      $result_reserv = mysqli_query($con,$query_reserv);
      $result_reservCount= mysqli_num_rows($result_reserv);
      $query_reserv1 = "SELECT * FROM prenotazioni WHERE data='".$_POST['theDate']."'AND orario='".$_POST['theTime']."'AND nome='".$name."'";
      $result_reserv1 = mysqli_query($con,$query_reserv1);
      $result_reservCount1= mysqli_num_rows($result_reserv1);
      if($result_reservCount > 6){
        echo 
        '
        <div id="alertbox" style="display: block;">
          Ci dispiace ma non ci sono tavoli liberi per il giorno '.$_POST['theDate'].' con orario '.$_POST['theTime'].'
        </div>
        ';
      }
       else if($result_reservCount1 > 0){
        echo 
        '
        <div id="alertbox" style="display: block;">
          Ci dispiace ma &egrave; gi&agrave; presente una prenotazione in data '.$_POST['theDate'].' con orario '.$_POST['theTime'].' a suo nome.
        </div>
        ';
      } else{
       echo '
          <div id="alertbox" style="display: block; background-color: #6c95ec;">
              Prenotazione effettuata con successo!
          </div>
          ';
       mysqli_query($con,"INSERT INTO prenotazioni (nome, data, orario, numpersone) VALUES ('".$name."','".$_POST["theDate"]."','".$_POST["theTime"]."','".$numb."')");
      }
     }

}

?>
<div id="alertbox">
</div>
<!-- MODAL PER IL LOGIN --> 
<div id="id01" class="modal">

<form class="modal-content animate" method="post" name="login" action="./utility/login.php">
  <div class="imgcontainer">
    <span onclick="closemodal()" class="close" title="Close Modal">&times;</span> <!-- Span chiusura modal -->
    <img src="immagini/avatar.png" alt="Avatar" class="avatar">
  </div>

  <div class="container">
    <label><b>Username</b></label>
    <input type="text" placeholder="Inserisci Username" name="username" class="inputmodal" required>

    <label><b>Password</b></label>
    <input type="password" placeholder="Inserisci Password" name="password" class="inputmodal" required>
    <br><br>
    <button type="submit" class="modalbutton">Login</button>

    <?php
    if(isset($_SESSION["error"])){

    echo '<p id="errore_login">'.' '.$_SESSION['error'].'<p>';
    unset($_SESSION['error']);

    }

    ?>
  </div>

  <div class="container" style="background-color:#f1f1f1">
    <button type="button" onclick="closemodal()" class="cancelbtn">Cancel</button>
    <span class="psw"><a href="#">Password</a> dimenticata?</span>
  </div>
</form>
</div>

<!-- FINE MODAL LOGIN-->

<!-- MODAL PULSANTE UTENTE -->

<div id="id03" class="modal">

<div class="modal-content animate">
  <div class="imgcontainer">
    <span onclick="closemodal2()" class="close" title="Close Modal">&times;</span> <!-- Span chiusura modal -->
    <img src="immagini/user.png" alt="Avatar" class="avatar">
  </div>

  <div class="container">
   <p> <strong><?php echo $_SESSION["username"]; ?></strong> </p>
<br>
<br>
    <button type="button" onclick="location.href = 'info.php';" class="modalbutton">Le mie informazioni</button>
    <button type="button" onclick="location.href = 'storico.php';" class="modalbutton">Storico Ordini</button>
    <button type="button" onclick="location.href = './utility/logout.php';" class="modalbutton">Logout</button>
  </div>
  <div class="container" style="background-color:#f1f1f1">
  </div>
</div>
</div>

<!-- FINE MODAL UTENTE -->

<!-- MODAL REGISTRAZIONE -->

<div id="id02" class="modal1"> <!-- Modal1 -->
<span onclick="closemodal1()" class="close1" title="Close Modal">&times;</span>
<form class="modal-content1 animate" method="post" name="register" onsubmit="return validateFormRegister()" action="./utility/register.php">
  <div class="container1">
    <h1>Registrati</h1>
    <p>Perfavore inserisci i dati nei seguenti riquadri per creare un account.</p>
    <hr id="hrmodal1">
    <label><b>Email</b></label>
    <input type="text" placeholder="Inserisci Email" name="email" id="modal1_email" required>
    <p class="error_register" id="error_email"> Email non supportata, inserisci una email valida. </p>

    <label><b>Nome</b></label>
    <input type="text" placeholder="Inserisci Nome" name="nome" id="modal1_nome" required>
    <p class="error_register" id="error_nome"> Nome non supportato, inserisci un nome valido. </p>

    <label><b>Cognome</b></label>
    <input type="text" placeholder="Inserisci Cognome" name="surname" id="modal1_surname" required>
    <p class="error_register" id="error_surname"> Cognome non supportato, inserisci un cognome valido. </p>

    <label><b>Username</b></label>
    <input type="text" placeholder="Inserisci Username" name="uname" class="modal1_input" required>

    <label><b>Password</b></label>
    <input type="password" placeholder="Inserisci Password" name="psw" id="modal1_password" required>
    <p class="error_register" id="error_password"> Password non valida. Deve contenere almeno 8 caratteri, una lettera maiuscola, una lettera minuscola e un numero.</p>

    <label><b>Ripeti Password</b></label>
    <input type="password" placeholder="Ripeti Password" name="psw-repeat" id="modal1_repeat" required>
    <p class="error_register" id="error_repeat"> Le due password con coincidono. </p>

    <label><b>Citt&agrave;</b></label>
    <input type="text" placeholder="Inserisci Citt&agrave;" name="citta" class="modal1_input" required>

    <label><b>Indirizzo</b></label>
    <input type="text" placeholder="Inserisci Indirizzo" name="indirizzo" class="modal1_input" required>

    <label><b>CAP</b></label>
    <input type="text" placeholder="Inserisci CAP" name="cap" id="modal1_cap" required>
    <p class="error_register" id="error_cap"> CAP non valido. Ricorda: Il CAP &egrave; formato da 5 cifre numeriche </p>

    <p>Creando un account accetti i nostri <a href="#" style="color:dodgerblue">Termini e Condizioni</a>.</p>

    <div class="clearfix">
        <button type="submit" class="signupbtn" id="modal1button_signup">Conferma</button>
      <button type="button" onclick="closemodal1()" class="cancelbutn" id="modal1button_cancel">Annulla</button>
    </div>
    <?php

      if(isset($_SESSION['emailErr'])){
      echo '<p class="err_register" id="emailErr">'.$_SESSION['emailErr'].'</p>';
      unset($_SESSION['emailErr']);
      }

      if(isset($_SESSION['nomeErr'])){
      echo '<p class="err_register" id="nomeErr">'.$_SESSION['nomeErr'].'</p>';
      unset($_SESSION['nomeErr']);
      }

      if(isset($_SESSION['surnameErr'])){
      echo '<p class="err_register" id="surnameErr">'.$_SESSION['surnameErr'].'</p>';
      unset($_SESSION['surnameErr']);
      }

      if(isset($_SESSION['usernameErr'])){
      echo '<p class="err_register" id="usernameErr">'.$_SESSION['usernameErr'].'</p>';
      unset($_SESSION['usernameErr']);
      }

      if(isset($_SESSION['pswErr'])){
      echo '<p class="err_register" id="pswErr">'.$_SESSION['pswErr'].'</p>';
      unset($_SESSION['pswErr']);
      }

      if(isset($_SESSION['psw_repeatErr'])){
      echo '<p class="err_register" id="psw_repeatErr">'.$_SESSION['psw_repeatErr'].'</p>';
      unset($_SESSION['psw_repeatErr']);
      }

      if(isset($_SESSION['cittaErr'])){
      echo '<p class="err_register" id="cittaErr">'.$_SESSION['cittaErr'].'</p>';
      unset($_SESSION['cittaErr']);
      }

      if(isset($_SESSION['indirizzoErr'])){
      echo '<p class="err_register" id="indirizzoErr">'.$_SESSION['indirizzoErr'].'</p>';
      unset($_SESSION['indirizzoErr']);
      }

      if(isset($_SESSION['capErr'])){
      echo '<p class="err_register" id="capErr">'.$_SESSION['capErr'].'</p>';
      unset($_SESSION['capErr']);
      }

    ?>
  </div>
</form>

</div>
<!-- Fine Modal Registrazione -->
<footer class="contacts" id="contatti">
<h2> Vieni a trovarci! </h2>
<p id="leftp"> Corso Giuseppe Mazzini, 32 <br>
57126 Livorno LI <br> <br>
Tutti i giorni: <br>
dalle 12:30 alle 15:30 <br>
dalle 18:30 alle 00:30 <br> <br>
Email: <a href="mailto:indirizzo@email.com">fastpizza@inc.corporation.it</a></p>
<p id="copyright"> While using this site, you agree to have read and accepted our terms of use, cookie and privacy policy. Copyright &copy 2023 by FastPizza Inc. All Rights Reserved. </p>
<div id="map" onclick="location.href = 'https://www.google.com/maps/place/Corso+Giuseppe+Mazzini,+32,+57126+Livorno+LI/@43.5439481,10.3115133,19z/data=!4m6!3m5!1s0x12d5e9709e3dceab:0x1071aa61ab7235ab!8m2!3d43.5442401!4d10.3121772!16s%2Fg%2F11c29qlpqg?entry=ttu';"> </div>
<img src="immagini/arrow-up.png" alt="freccia" onclick="scrollup()" style="cursor: pointer;">
</footer>
<script src="JS/mainscript.js"> </script>
</body>
</html>
