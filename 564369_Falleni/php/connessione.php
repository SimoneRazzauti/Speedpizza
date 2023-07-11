<?php
    require "dbConfig.php"; 			// includes database class
    
	$conn = mysqli_connect($dbHostname, $dbUsername, $dbPassword, $dbName);
	if(!$conn){
		echo 'Errore di connessione: '.mysqli_connect_error();
	}
?>