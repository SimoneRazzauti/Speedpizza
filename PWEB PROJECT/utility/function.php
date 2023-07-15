<?php

function template_menu() {
  echo '
    <nav class="topnav">
      <div class="menu-items">
        <a onclick="scrollup()" onclick="closeMenu()">Home</a>
        <a href="#hr1" onclick="closeMenu()">Promozioni</a>
        <a href="creation.php" onclick="closeMenu()">Ordina Online</a>
        <a href="#hr2" onclick="closeMenu()">Prenotazione</a>
        <a href="#footer" onclick="closeMenu()">Contatti</a>';

  if(!isset($_SESSION["username"])){
    echo '
        <a onclick="openmodal()">Login</a>
        <a onclick="openmodal1()">Registrati</a>';
  } else {
    echo '
        <a onclick="openmodal2()"><strong>' . $_SESSION["username"] . '</strong></a>';
  }

  echo '
        <a href="carrello.php" onclick="closeMenu()">Il Mio Carrello</a>
      </div>
      <div class="dropdown">
        <button onclick="toggleDropdown()" class="dropbtn">&#9776;</button>
        <div id="myDropdown" class="dropdown-content">
          <a onclick="scrollup()" onclick="closeMenu()">Home</a>
          <a href="#hr1" onclick="closeMenu()">Promozioni</a>
          <a href="creation.php" onclick="closeMenu()">Ordina Online</a>
          <a href="#hr2" onclick="closeMenu()">Prenotazione</a>
          <a href="#footer" onclick="closeMenu()">Contatti</a>';

  if(!isset($_SESSION["username"])){
    echo '
          <a onclick="openmodal()">Login</a>
          <a onclick="openmodal1()">Registrati</a>';
  } else {
    echo '
          <a onclick="openmodal2()"><strong>' . $_SESSION["username"] . '</strong></a>';
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
          Email: <a href="mailto:fastpizza@inc.corporation.it">fastpizza@inc.corporation.it</a></p>
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
        <img src="immagini/arrow-up.png" alt="freccia" onclick="scrollup()" class="arrow-icon">
      </div>
      <div class="div-right">
        <div class="map-container">
          <div id="map" onclick="location.href = \'https://www.google.com/maps/place/Corso+Giuseppe+Mazzini,+32,+57126+Livorno+LI/@43.5439481,10.3115133,19z/data=!4m6!3m5!1s0x12d5e9709e3dceab:0x1071aa61ab7235ab!8m2!3d43.5442401!4d10.3121772!16s%2Fg%2F11c29qlpqg?entry=ttu\';">
          </div>
        </div>
      </div>
    </div>
    <div class="div-bottom">
      <p>&copy; <?php echo date(\'Y\'); ?> by FastPizza Inc. All Rights Reserved.</p>
    </div>
  </div>
  ';
}

?>

