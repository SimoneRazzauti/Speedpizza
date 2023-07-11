<?php
	$successo = false; /*per la registrazione*/

	
	function setSession($username, $userId){
		$_SESSION['userId'] = $userId;
		$_SESSION['username'] = $username;
	}


	function setSessionAz($username, $userAz){
		$_SESSION['userAz'] = $userAz;
		$_SESSION['username'] = $username;
	}


	function isLogged(){		
		if(isset($_SESSION['userId']))
			return $_SESSION['userId'];
		else if(isset($_SESSION['userAz']))
			return $_SESSION['userAz'];
		else
			return false;
	}

?>