<?php
session_start();
$target = $_GET['target'];

if (isset($_SESSION["username"]) || isset($_COOKIE["NOME"])) {
  header('location: 404.php');
  exit;
}

?>
<!DOCTYPE html>
<html lang="it">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title> Accesso </title>
  <link rel="stylesheet" href="css/styleMenu.css" type="text/css">
  <link rel="stylesheet" href="CSS/stileaccesso.css" type="text/css">
  <link rel="icon" href="immagini/icon.png" sizes="32x32" type="image/x-icon">
</head>

<body>

  <!-- MENU -->
  <nav class="topnav">
    <div class="menu-items">
      <a href="index.php" onclick="scrollup();">Home</a>
      <a href="index.php#hr1">Promozioni</a>
      <a href="creation.php">Ordina Online</a>
      <a href="index.php#image3">Prenotazione</a>
      <a href="carrello.php">Il Mio Carrello</a>
    </div>
    <div class="dropdown">
      <button onclick="toggleDropdown()" class="dropbtn">&#9776;</button>
      <div id="myDropdown" class="dropdown-content">
        <a href="index.php" onclick="scrollup(); closeMenu()">Home</a>
        <a href="index.php#hr1" onclick="closeMenu()">Promozioni</a>
        <a href="creation.php" onclick="closeMenu()">Ordina Online</a>
        <a href="index.php#image3" onclick="closeMenu()">Prenotazione</a>
        <a href="carrello.php" onclick="closeMenu()">Il Mio Carrello</a>
      </div>
    </div>
  </nav>

  <div class="container">
    <div id="center_div">
      <div class="imgdiv">
        <img src="immagini/pizza_avatar.png" alt="Avatar" class="avatar">
      </div>
      <div class="intestation">
        <p class="intestation-text">Per accedere a questa sezione devi essere loggato. <strong>Esegui il login. Oppure registrati nella <a href="index.php">Home</a></strong></p>
        <form method="post" action="./utility/login_accesso.php?target=<?= urlencode($target) ?>">
          <label><b>Username</b></label>
          <input type="text" placeholder="Inserisci Username" name="username" class="input" required>

          <label><b>Password</b></label>
          <input type="password" placeholder="Inserisci Password" name="password" class="input" required>

          <?php
          if (isset($_SESSION["error"])) {
            echo '<p class="error_login">' . ' ' . $_SESSION['error'] . '<p>';
            unset($_SESSION["error"]);
          }
          ?>

          <button type="submit" class="button">Login</button>
        </form>
      </div>
    </div>
  </div>

  <script src="js/mainscript.js"> </script>
</body>

</html>