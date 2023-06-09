<?php
include("include/config.php");

$con = config::connect();


		$sql1 = "select voto + 3*goal + assist - 0.5*giallo - rosso - 3*autorete - 3*rigoreSbagliato - goalSubito + 3*rigoreParato
				 from  formazioni
				 where idPartita = 1 and calciatore = 82";
		$query1 = $con->query($sql1);
		while($res = $query1->fetch())
			$votoTot = $res[0];
		
		echo $votoTot;

?>