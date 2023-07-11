 <?php
	session_start();
  include "php/sessionUtil.php";	
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
 
<title>Spesa On-line</title>
<link rel="stylesheet" href="css/Stile.css" type="text/css">
<style>



.slide {
  max-width: 700px;
  position: relative;
  margin: auto;
}



.punti {
  background-color: #008000;
  height: 15px;
  width: 15px;
  margin: 0 2px;
  border-radius: 50%;
  display: inline-block;
  transition: background-color 0.4s ease;
}

.attivi {
  background-color: #00ffff;
}

.slides {
  -webkit-animation-name: slides;
  -webkit-animation-duration: 1.2s;
  animation-name: slides;
  animation-duration: 1.2s;
}

@-webkit-keyframes slides {
  from {opacity: .6} 
  to {opacity: 1}
}

@keyframes slides {
  from {opacity: .6} 
  to {opacity: 1}
}
</style>
</head>



<body>
<?php include('header.php'); ?>

<div class="home">

  <div class="storia">
    <h2>Benvenuti su Food land</h2>
  <p id="test">FoodLand, nasce il 26 maggio 2018, come sito di ecommerce legato alla vendita di alimenti online. <br>
  Qua puoi iscriverti come utente. Cercare tutti i prodotti che ti servono e creare deliziosi piatti con ottimi prodotti. Possibilit&agrave di pagare con Contrassegno o CC. <br>
  Inoltre, con la funzione Ricetta "All in One", puoi scegliere quella che preferisci e, con un semplice click tutti i prodotti verranno messi nel carrello! <br><br>
  Potendosi iscrivere anche come azienda, si ha la possibilit&agrave di inserire dal pannello Admin i prodotti, con la foto, nome, e tanto altro. Una volta inserito, lo si pu&ograve trovare
  nei propri prodotti, con la funzione di aggiornare quantit&agrave e prezzo.
  Tutto questo, solo su <b>FoodLand</b></p>
  </div>
  
</div>













       
    
<div class="row">


  
  <div class="colonna">
  	<div class="card">
  	  <img src="immagini/utente.jpg" alt="immagine utente" />
	
    <h2>REGISTRATI COME UTENTE</h2>
    <p>Inizia a fare la spesa OnLine..</p>
    
		<a href="registrazione.php" class="button">Registrati</a>

	</div>
  </div>
  





  <div class="colonna">
  	<div class="card">
  	  <img src="immagini/azienda.jpg" alt="immagine azienda" />
	    
    <h2>REGISTRATI COME AZIENDA</h2>
    <p>Inserisci i tuoi prodotti..</p>
		  <a href="registrazioneAzienda.php" class="button">Registrati</a>
	</div>
  </div>


</div>


<br><br>

<div class="slide">

<div class="slides">
  <img src="immagini/uno.jpg" style="width:100%">
  
</div>

<div class="slides">
  <img src="immagini/due.jpg" style="width:100%">
  
</div>

<div class="slides">
  <img src="immagini/tre.jpg" style="width:100%">
  
</div>

</div>
<br>

<div style="text-align:center">
  <span class="punti"></span> 
  <span class="punti"></span> 
  <span class="punti"></span> 
</div>


<br><br>






<?php include('footer.php'); ?>

<script>
var slideIndex = 0;
showSlides();

function showSlides() {
  var i;
  var slides = document.getElementsByClassName("slides");
  var dots = document.getElementsByClassName("punti");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}    
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" attivi", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " attivi";
  setTimeout(showSlides, 3000); // cambia image ogni 3 seconds
}
</script>
</body>

</html>