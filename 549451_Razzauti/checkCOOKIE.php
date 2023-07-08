<?php
include_once("include/config.php");
include("include/utility.php");


		$con = config::connect();
		if((isset($_COOKIE['NOME']) && isset($_COOKIE['PSW'])) ){
			$username = $_COOKIE['NOME'];
			$password = $_COOKIE['PSW'];

        if(checkLogin($con, $username, $password))
	    {
		$_SESSION['username'] = $username;
        $_SESSION['password'] = $password;
        $time_cookie=3600*24*7;
		if($username == "admin")
        {
            $_SESSION['name'] = "admin";
            $con = NULL;
			header("Location: admin.php"); //redirect alla pagina admin con welcome
            exit;
		}
		else{
			$_SESSION['name'] = "user";
            $con = NULL;
        header("Location: users.php"); //redirect alla pagina users con welcome
        exit;
		}
	}
	else{
    $con = NULL;
		header("Location: login.php?error=1"); //i dati inseriti di login non sono corretti
    exit;
	}
    }
	

