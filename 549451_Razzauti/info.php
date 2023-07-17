<?php
session_start();
require('inc/db.php');
include('utility/function.php'); # funzioni di utilità

if (!isset($_SESSION["username"]) && !isset($_COOKIE["NOME"])) {
  header('location: 404.php');
  exit;
}

if (isset($_COOKIE["NOME"])) {
  $_SESSION["username"] = $_COOKIE["NOME"];
}

$query = "SELECT * FROM users WHERE username='" . $_SESSION["username"] . "'";
$result = mysqli_query($con, $query);
$row = mysqli_fetch_assoc($result);
$nome = $row['nome'];
$cognome = $row['cognome'];
$email = $row['email'];
$indirizzo = $row['indirizzo'];
$citta = $row['citta'];
$cap = $row['cap'];
$date = $row['trn_date'];

?>

<!DOCTYPE html>
<html lang="it">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title> Informazioni Utente </title>
  <link rel="stylesheet" href="css/styleMenu.css" type="text/css">
  <link rel="stylesheet" href="css/stileinfo.css" type="text/css">
  <link rel="stylesheet" href="css/styleModalUser.css" type="text/css">
  <link rel="icon" href="immagini/icon.png" sizes="32x32" type="image/x-icon">
  <style>
    #welcome-message {
      display: none;
      position: absolute;
      width: 100%;
      left: -1%;
      bottom: 80%;
      font-size: 24px;
      color: #ffff;
      background-color: #333;
      padding: 20px;
      text-align: center;
      border-radius: 10px;
      margin-top: 20vw;
    }
  </style>
</head>

<body>
  <!-- MENU -->
  <?= template_menu(); ?>

  <div id="center_div">
    <div id="image">
      <img src="immagini/user.png" alt="avatar">
    </div>
    <form class="center-form" method="post">
      <div class="form-row">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" value="<?php echo $_SESSION["username"] ?>" readonly>
      </div>
      <div class="form-row">
        <label for="name">Nome:</label>
        <input type="text" id="name" name="name" value="<?php echo $nome ?>" readonly>
      </div>
      <div class="form-row">
        <label for="cognome">Cognome:</label>
        <input type="text" id="cognome" name="cognome" value="<?php echo $cognome ?>" readonly>
      </div>
      <div class="form-row">
        <label for="indirizzo">Indirizzo:</label>
        <input type="text" id="indirizzo" name="indirizzo" value="<?php echo $indirizzo ?>" readonly>
      </div>
      <div class="form-row">
        <label for="citta">Città:</label>
        <input type="text" id="citta" name="citta" value="<?php echo $citta ?>" readonly>
      </div>
      <div class="form-row">
        <label for="cap">CAP:</label>
        <input type="text" id="cap" name="cap" value="<?php echo $cap ?>" readonly>
      </div>
      <div class="button-row">
        <input type="button" name="submit" value="Modifica Profilo" class="submit-button">
      </div>
    </form>
  </div>
  <!-- POSSIBILE IMPLEMENTAZIONE DELLA MODIFICA DELLE INFORMAZIONI -->

  <!-- welcome -->
  <h1 id="welcome-message" class="hidden">Benvenuto! Grazie per esserti registrato.</h1>

  <!-- MODAL UTENTE -->
  <div id="id03" class="modal">
    <div class="modal-content animate">
      <div class="imgcontainer">
        <span onclick="closemodal2()" class="close" title="Close Modal">&times;</span> <!-- Span chiusura modal -->
        <img src="immagini/user.png" alt="Avatar" class="avatar">
      </div>

      <div class="container-modal">
        <p><strong><?php echo $_COOKIE["NOME"]; ?></strong></p>
        <button type="button" onclick="location.href = 'storico.php';" class="modalbutton">Storico Ordini</button>
        <button type="button" onclick="location.href = './utility/logout.php';" class="modalbutton">Logout</button>
      </div>
    </div>
  </div>
  <!-- FINE MODAL UTENTE -->

  <script src="js/mainscript.js"> </script>
  <script>
    // EVENTO DEL MESSAGGIO DI BENVENUTO
    document.addEventListener("DOMContentLoaded", function() {
      var urlParams = new URLSearchParams(window.location.search);
      var welcomeMessage = urlParams.get('welcome');
      if (welcomeMessage) {
        var messageElement = document.getElementById("welcome-message");
        messageElement.style.display = "block";
        messageElement.innerText = welcomeMessage;
      }
    });
  </script>

</body>

</html>