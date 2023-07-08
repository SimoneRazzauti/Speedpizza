<?php
//classe per la connessione al DB
class config {
	
	public static function connect()
	{
		$host = "localhost";
		$username = "root";
		$password = "";
		$dbname = "fantaball";
		
		try {
			$con = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
			// setta il PDO error mode per le eccezioni
			$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			
		}catch(PDOException $e)
		{
			echo $e->getMessage()."<br />";
			echo "Connessione fallita con il server, attendere che venga ripristinato il collegamento o riprovare più tardi";
			die();
		}
		
		return $con;
		
	}
}

?>