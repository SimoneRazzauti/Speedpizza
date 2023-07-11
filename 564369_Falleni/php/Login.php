<?php

    require_once "trackMyDb.php"; 
    require_once "sessionUtil.php";
 
	$username = $_POST['username'];
	$password = $_POST['password'];
	
	$errorMessage = login($username, $password);
	if($errorMessage === null)
		header('location: ../index.php');
	else
		header('location: ../index.php?errorMessage=' . $errorMessage );


	function login($username, $password){   
		if ($username != null && $password != null){
			$userId = authenticate($username, $password);
    		if ($userId > 0){
    			session_start();
    			setSession($username, $userId);
    			return null;
    		}

    	} else
    		return 'Hai inserito qualcosa di errato';
    	
    	return 'Username and password non validi.';
	}
	
	function authenticate ($username, $password){   
		global $trackMyDb;
		$username = $trackMyDb->sqlInjectionFilter($username);
		$password = $trackMyDb->sqlInjectionFilter($password);

		$queryText = "SELECT * FROM user WHERE username='" . $username . "' AND password='" . md5($password) . "'";

		$result = $trackMyDb->performQuery($queryText);
		$numRow = mysqli_num_rows($result);
		if ($numRow != 1)
			return -1;
		
		$trackMyDb->closeConnection();
		$userRow = $result->fetch_assoc();
		$trackMyDb->closeConnection();
		return $userRow['userId'];
	}

?>