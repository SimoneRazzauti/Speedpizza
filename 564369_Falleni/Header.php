<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
 
<title>Spesa On-line</title>


<link rel="stylesheet" href="css/styleMenu.css" type="text/css">
<link rel="stylesheet" href="css/stileCarrello.css" type="text/css">


<body>
    <div class="totale">
    <div class="container-large header"> 
            <div class="container main">
                
                        <div class="main__logo">
                            <a href="index.php" class="logo" alt="home">
                                <img itemprop="logo" src="immagini/logo.png" alt="">
                                 
                            </a>
                        </div>

                        <ul class="main__menu">
                            <li><a href="categorie.php">I Nostri Prodotti</a></li>
                            <li><a href="ricette.php">Ricette</a></li>
                            <li><a href="tutorial.html">Tutorial</a></li>
                            <?php
                            require "php/dbConfig.php"; 	 
							    			

	                         if(isset($_SESSION['userId'])){
                                require "carr.php"; 
	                         }
                             else if(isset($_SESSION['userAz'])){
	                         	echo '<li><a href="aggiungiPrNewAz.php">Aggiungi Nuovi prodotti</a></li>';
	                            echo '<li><a href="aggiungiSolitiPr.php">Aggiorna prodotti</a></li>';
	                             }
	                       
                        ?>
                        </ul>
<br><br>
                 
			<div class="box-access large">
            <ul class="menu-access">  	
				<?php
		        if (isLogged())
		    	 include "php/menuLog.php";
		        else
		    	 include "php/menuNotLog.php"; 
		    	?>
		    </ul>
		    </div>

 
                     
                
            </div>
 							 
    </div> 


    <div class="main-invisible" id="myTopnav">
    <a href="categorie.php">I Nostri Prodotti</a>
    <a href="ricette.php">Ricette</a>
    <a href="tutorial.html">Tutorial</a>
    <?php
                   
                             if(isset($_SESSION['userAz'])){
                                echo '<a href="aggiungiPrNewAz.php">Aggiungi Nuovi prodotti</a>';
                                echo '<a href="aggiungiSolitiPr.php">Aggiorna prodotti</a>';
                            }
                        ?>
    <a href="javascript:void(0);" class="icon" onclick="myFunction()"> 


    <!--È un modo per scrivere un link “vuoto” e molto spesso equivale a
<a href=”#”>, con la differenza che il # fa puntare il browser in alto nella pagina.
Infatti se ci troviamo in una pagina molto lunga vedremo che dopo il click su <a href=”#”> il browser punta in alto.

La sintassi void(0) invece non fa nulla e non produce alcun effetto.-->


   	<i class="piusimbolo">+</i>
  	</a>
    </div>
    </div>
    
<script src="js/script.js"></script> 
</body>
</html>