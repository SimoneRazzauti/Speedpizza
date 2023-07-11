
<li><a 
	<?php  if(isset($_SESSION['userId'])){
                echo 'href="ordini.php"';   
	        }
            else if(isset($_SESSION['userAz'])){
	            echo 'href="#"';   
	        } 
	?>  class="button">
	<?php
			echo $_SESSION['username'];
		?>
	</a>
</li>
<li><a href="php/logout.php" class="button">esci</a></li>
