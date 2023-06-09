<?php
session_start();
if(!isset($_SESSION['username']))
  header('Location: login.php?error=2'); //non autenticato
  
include_once("include/config.php");
include("include/utility.php");

//da implementare il controllo che siano settati tutti i campi
//REGISTRAZIONE
if(isset($_POST['register']))
{
	//apro connessione al DB con OOP
	$con = config::connect();
	
	//setto le variabili dalla form
	$nome = ucwords($_POST['nome']);
	$cognome = ucwords($_POST['cognome']);
	$email = sanitizeString(strtolower($_POST['email']));
	$username = sanitizeString($_POST['username']);
	$password = sanitizeString($_POST['password']);
	$squadra = ucwords($_POST['squadra']);
	$legaSelezionata = ($_POST['legheEsistenti']);
	$nuovaLega = isset($_POST['nuovaLega']) ? ucwords($_POST['nuovaLega']) : "0";
	$numeroPartecipanti = isset($_POST['numeroPartecipanti']) ? $_POST['numeroPartecipanti'] : NULL;
	$dataInizoLega = date("Y-m-d H:i:s");
	
	
	
	
	//check sulla duplicate key
	if(!checkUsernameExist($con, $username))
	{
		$con = NULL;
    header("Location: registrazione.php?error=username"); //username già esistente
    exit; //return;
	}
	
    elseif(!checkEmailExist($con, $email))
    {
      $con = NULL;
      header("Location: registrazione.php?error=email"); //email già esistente
      exit; //return;
	
    }
      elseif(!checkSquadraExist($con, $squadra))
      {
        $con = NULL;
        header("Location: registrazione.php?error=squadra"); //squadra già esistente
        exit; //return;
      }

	//se creo nuova lega
	if($legaSelezionata == "0"){
		if(!checkLegaExist($con, $nuovaLega))
		{
      $con = NULL;
      header("Location: registrazione.php?error=lega"); //lega già esistente
			exit; //return
		}else{
			$lega = $nuovaLega;
			$risultato = creaTorneo($con, $lega, $dataInizoLega, $numeroPartecipanti);
			$lega = $risultato['idTorneo'];
      $nomeLega = $risultato['nomeTorneo'];
      creaCalendario($con, $lega); //creo un calendario per il nuovo torneo
		}
	}
  
  //se scelgo una lega esistente libera
	else{
		$lega = $legaSelezionata;
    $query = $con->prepare("select nomeTorneo from tornei where idTorneo= $lega");
    $query->execute();
    $risultato = $query->fetch();
    $nomeLega = $risultato[0];
	}
	
  //registrazione utente con tutti i campi giusti
	if(insertUtente($con, $username, $nome, $cognome, $email, $password, $squadra, $lega))
	{
		//setto le variabili di sessione
    inserisciInCalendario($con, $squadra, $lega); //inserimento della squadra nel calendario
    //$con = config::connect();
    inserisciInClassifica($con, $squadra); //inserimento della squadra nella tabella della classifica
    $con = NULL;	
		$_SESSION['username'] = $username;
    $_SESSION['squadra'] = $squadra;
    $_SESSION['lega'] = $lega;
    $_SESSION['nomeLega'] = $nomeLega;
    $_SESSION['email'] = $email;
    $_SESSION['nome'] = $nome;
    $_SESSION['cognome'] = $cognome;
    $_SESSION['name'] = "user";
    $time_cookie=3600*24*7;
    setcookie("NOME", $username, time()+$time_cookie);
    setcookie("PSW", $password, time()+$time_cookie);
		header("Location: registrazione.php?error=false"); //redirect alla pagina utente
    exit;
		
	}

}

//LOGIN
if(isset($_POST['login']))
{
	$con = config::connect();
	
	$username = sanitizeString($_POST['username']);
	$password = sanitizeString($_POST['password']);
	
	//check del login con i dati passati dalla form
	if(checkLogin($con, $username, $password))
	{
		$_SESSION['username'] = $username;
    $_SESSION['password'] = $password;
    $time_cookie=3600*24*7;
		if($username == "admin")
    {
			$_SESSION['name'] = "admin";
      $con = NULL;
        setcookie("NOME", $username, time()+$time_cookie);
        setcookie("PSW", $password, time()+$time_cookie);


        setcookie("PopUP", "1", time()+$time_cookie);
			header("Location: admin.php"); //redirect alla pagina admin con welcome
      exit;
		}
		else{
			$_SESSION['name'] = "user";
      $con = NULL;
        setcookie("NOME", $username, time()+$time_cookie);
        setcookie("PSW", $password, time()+$time_cookie);

        setcookie("PopUP", "1", time()+$time_cookie);
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



//UPDATE anagrafica user
if(isset($_POST['updateUserData']))
{
	$con = config::connect();
	$NEWnome = ucwords($_POST['nome']);
	$NEWcognome = ucwords($_POST['cognome']);
	$NEWemail = sanitizeString(strtolower($_POST['email']));
	$NEWusername = sanitizeString($_POST['username']);
	$NEWsquadra = ucwords($_POST['squadra']);
	
  //se si vuole modificare solo uno di questi campi oppure solo il nome e il cognome si lascia inalterato il contenuto delle altre colonne di anagrafica e squadra
	if($NEWemail == "")
     $NEWemail = $_SESSION['email'];
     
  if($NEWusername == "")
    $NEWusername = $_SESSION['username'];
    
  if($NEWsquadra == "")
    $NEWsquadra = $_SESSION['squadra'];
    
  if($NEWcognome == "")
    $NEWcognome = $_SESSION['cognome'];
    
  if($NEWnome == "")
    $NEWnome = $_SESSION['nome'];

  //check sulla duplicate key
	if(!checkUsernameExist($con, $NEWusername))
	{
		$con = NULL;
    header("Location: updateUser.php?error=username"); //username già esistente
    exit;//return; 
	}
	
    elseif(!checkEmailExist($con, $NEWemail))
    {
      $con = NULL;
      header("Location: updateUser.php?error=email"); //email già esistente
      exit;//return; 
	
    }
      elseif(!checkSquadraExist($con, $NEWsquadra))
      {
        $con = NULL;
        header("Location: updateUser.php?error=squadra"); //squadra già esistente
        exit;//return; 
      }
      
  else{
    updateUserDetails($con, $_SESSION['username'], $NEWnome, $NEWcognome, $NEWemail, $NEWusername, $NEWsquadra);
    $con = NULL;
    //modifica delle variabili di sessione
    $_SESSION['email'] = $NEWemail;
    $_SESSION['username'] =  $NEWusername;
    $_SESSION['squadra'] = $NEWsquadra;
    $_SESSION['nome'] = $NEWnome;
    $_SESSION['cognome'] = $NEWcognome;
    header("Location: updateUser.php?error=false"); //redirect
    exit;
  }      
}

//update della password
if(isset($_POST['updatePassword']))
{
	$con = config::connect();
	$currentPassword = sanitizeString($_POST['oldPassword']);
	$NEWpassword = sanitizeString($_POST['newPassword']);
	$confirmNEWpassword = sanitizeString($_POST['confirmNewPassword']);
	$username = $_SESSION['username'];
	
  if($currentPassword === $_SESSION['password'])
  {
    updatePassword($con, $username, $NEWpassword);
    $con = NULL;
    $_SESSION['password'] = $NEWpassword;
    header("Location: modificaPassword.php?ok=true");
  }else{
    $con = NULL;
    header("Location: modificaPassword.php?ok=false");
  }
	
}




?>