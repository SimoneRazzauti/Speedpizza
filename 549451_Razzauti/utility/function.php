<?php

function template_menu() {
  echo '
    <nav class="topnav">
      <div class="menu-items">
        <a href="index.php" onclick="scrollup();">Home</a>
        <a href="index.php#hr1">Promozioni</a>
        <a href="creation.php">Ordina Online</a>
        <a href="index.php#image3">Prenotazione</a>
        <a href="index.php#footer">Contatti</a>';

  if(!isset($_SESSION["username"]) && !isset($_COOKIE["NOME"])){
    echo '
        <a onclick="openmodal();";>Login</a>
        <a onclick="openmodal1();">Registrati</a>';
  } elseif(isset($_COOKIE["NOME"])) {
    echo '
        <a onclick="openmodal2();"><strong>' . $_COOKIE["NOME"] . '</strong></a>';
  }

  echo '
        <a href="carrello.php">Il Mio Carrello</a>
      </div>
      <div class="dropdown">
        <button onclick="toggleDropdown()" class="dropbtn">&#9776;</button>
        <div id="myDropdown" class="dropdown-content">
          <a href="index.php" onclick="scrollup(); closeMenu()">Home</a>
          <a href="index.php#hr1" onclick="closeMenu()">Promozioni</a>
          <a href="creation.php" onclick="closeMenu()">Ordina Online</a>
          <a href="index.php#image3" onclick="closeMenu()">Prenotazione</a>
          <a href="index.php#footer" onclick="closeMenu()">Contatti</a>';

  if(!isset($_SESSION["username"]) && !isset($_COOKIE["NOME"])){
    echo '
          <a onclick="openmodal(); closeMenu();";>Login</a>
          <a onclick="openmodal1(); closeMenu();">Registrati</a>';
  } elseif(isset($_COOKIE["NOME"])) {
    echo '
          <a onclick="openmodal2(); closeMenu();"><strong>' . $_COOKIE["NOME"] . '</strong></a>';
  }

  echo '
          <a href="carrello.php" onclick="closeMenu()">Il Mio Carrello</a>
        </div>
      </div>
    </nav>
  ';
}

function footer_php() {
  echo '
  <div class="contacts" id="footer">
    <div class="div-top">
      <h2> Vieni a trovarci! </h2>
    </div>
    <div class="div-content">
      <div class="div-left">
        <div class="contact-info">
          <p> Corso Giuseppe Mazzini, 32 <br>
          57126 Livorno LI <br>
          TEL: 0586 XXXXXX <br><br>
          Tutti i giorni: <br>
          dalle 12:30 alle 15:30 <br>
          dalle 18:30 alle 00:30 <br> <br>
          Email: <a href="mailto:speedpizza@inc.corporation.it">speedpizza@inc.corporation.it</a></p>
        </div>
        <div class="contact-social">
          <div class="social-links">
            <a href="#" id="facebook"></a>
            <a href="#" id="instagram"></a>
            <a href="#" id="google"></a>
          </div>
        </div>
      </div>
      <div class="div-center">
        <img src="immagini/arrow-up.png" alt="freccia" onclick="scrollup(); closeMenu();" class="arrow-icon">
      </div>
      <div class="div-right">
        <div id="map-container">
          <a href="https://www.google.com/maps/place/Corso+Giuseppe+Mazzini,+32,+57126+Livorno+LI/@43.5439481,10.3115133,19z/data=!4m6!3m5!1s0x12d5e9709e3dceab:0x1071aa61ab7235ab!8m2!3d43.5442401!4d10.3121772!16s%2Fg%2F11c29qlpqg?entry=ttu" target="_blank">
          <img src="immagini/map.png" alt="Mappa">
          </a>
        </div>
      </div>
    </div>
    <div class="div-bottom">
      <p>&copy; ' . date('Y') . ' by Speedpizza Inc. All Rights Reserved.</p>
    </div>
  </div>
  ';
}
?>

