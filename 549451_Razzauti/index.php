<?php
  session_start();
  include("checkCOOKIE.php"); //se l'utente è Loggato non richiede i dati ma utilizza i cookie salvati
?>

<!DOCTYPE html>
<html lang="it">
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/footer.css">
  
  <head>
    <title> FantaBall HOME </title>
    <link rel="icon" href = "./immagini/favicon.ico" type = "image/x-icon">
    <link rel="stylesheet" href="css/styleIndex.css"  type="text/css">
    <link rel="stylesheet" href="css/stileMenu.css"  type="text/css">
  </head>
  
  <body>
    <div class="container">
      <div class="slider">
        <img class="active" src="./immagini/homepage.png">
        <img src="./immagini/homepage.png">
        <img src="./immagini/homepage.png">
      </div>
      <nav class="slider-nav">
        <ul>
          <li class="arrow">
            <button class="previous">
              PREV
              <!-- <img src="./immagini/LeftArrow.png" alt="leftArrow">
              -->
            </button>
          </li>
          <li class="arrow">
            <button class="next">
              <!-- <img src="./immagini/RightArrow.png" alt="rightArrow">
              -->
              NEXT
            </button>
          </li>
        </ul>
      </nav>
    </div>

<script>
	const items = document.querySelectorAll('img');
  const itemCount = items.length;
  const nextItem = document.querySelector('.next');
  const previousItem = document.querySelector('.previous');
  let count = 0;

function showNextItem() {
  items[count].classList.remove('active');

  if(count < itemCount - 1) {
    count++;
  } else {
    count = 0;
  }

  items[count].classList.add('active');
  console.log(count);
}

function showPreviousItem() {
  items[count].classList.remove('active');

  if(count > 0) {
    count--;
  } else {
    count = itemCount - 1;
  }

  items[count].classList.add('active');
  console.log(count);
}

function keyPress(e) {
  e = e || window.event;
  
  if (e.keyCode == '37') {//per le freccette
    showPreviousItem();
  } else if (e.keyCode == '39') {
    showNextItem();
  }
}

nextItem.addEventListener('click', showNextItem);
previousItem.addEventListener('click', showPreviousItem);
document.addEventListener('keydown', keyPress);
</script>

<?=template_menu()?>
<?=template_footer()?>
</body>
</html>

