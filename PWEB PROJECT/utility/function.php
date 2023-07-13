<?php
function template_menu(){
  echo '<nav class="topnav">';
  echo '<div class="menu-items">';
  echo '<a onclick="scrollup()">Home</a>';
  echo '<a href="#hr1">Promozioni</a>';
  echo '<a href="creation.php">Ordina Online</a>';
  echo '<a href="#hr2">Prenotazione</a>';
  echo '<a href="#contatti">Contatti</a>';

  if(!isset($_SESSION["username"])){
    echo '<a onclick="openmodal()">Login</a>';
    echo '<a onclick="openmodal1()">Registrati</a>';
  }else{
    echo '<a onclick="openmodal2()"><strong>'.' '. $_SESSION["username"] . '</strong></a>';
  }

  echo '<a href="carrello.php">Il Mio Carrello</a>';
  echo '</div>';
  echo '</nav>';
};

?>