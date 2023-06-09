<?php

//funzione che rimuove i tag html e gli spazi vuoti dalla form di login e reg
function sanitizeString($string)
{
	$string = strip_tags($string); //rimuovo i tag 
	$string = str_replace(" ","",$string); //rimuovo gli spazi
	
	return $string;
}

//funzione per inserire i dati della form nella tabella utenti
function insertUtente ($con, $username, $nome, $cognome, $email, $password, $squadra, $lega)
{

	$password = md5($password);
	$query = $con->prepare("
	INSERT INTO utenti (username, nome, cognome, email, password) VALUES (:username, :nome, :cognome, :email, :password);
	INSERT INTO squadre (nomeSquadra, giocatore, lega) VALUES(:nomeSquadra, :username, :idLega);
	");
	
	$query->bindParam(":username", $username);
	$query->bindParam(":nome", $nome);
	$query->bindParam(":cognome", $cognome);
	$query->bindParam(":email", $email);
	$query->bindParam(":password", $password);
	$query->bindParam(":nomeSquadra", $squadra);
	$query->bindParam(":idLega", $lega);
	return $query->execute();
		
}


//funzione di check del login
function checkLogin($con,$username,$password)
{
	$password = md5($password);
	$query = $con->prepare("
		SELECT * FROM utenti LEFT OUTER JOIN squadre ON username = giocatore LEFT OUTER JOIN tornei ON lega = idTorneo WHERE username=:username AND password=:password; 
	");
	
	$query->bindParam(":username", $username);
	$query->bindParam(":password", $password);
	
	$query->execute();
	$risultato = $query->fetch(PDO::FETCH_ASSOC);
	$_SESSION['squadra'] = $risultato['nomeSquadra'];
	$_SESSION['lega'] = $risultato['lega'];
	$_SESSION['email'] = $risultato['email'];
	$_SESSION['nome'] = $risultato['nome'];
	$_SESSION['cognome'] = $risultato['cognome'];
	$_SESSION['nomeLega'] = $risultato['nomeTorneo'];
	//check delle righe che restituisce
	if($query->rowCount() == 1)
	{
		return true;
	}
	else{
		return false;
	}
}

//funzione di update dei dati di un utente tranne la password
function updateUserDetails($con, $currentUsername, $NEWnome, $NEWcognome, $NEWemail, $NEWusername, $NEWsquadra)
{
	$query = $con->prepare("
		UPDATE utenti SET username=:NEWusername, nome=:NEWnome, cognome=:NEWcognome, email=:NEWemail WHERE username=:currentUsername;
		UPDATE squadre SET nomeSquadra=:NEWsquadra WHERE giocatore=:NEWusername; 
	");
	
	$query->bindParam(":NEWusername",$NEWusername);
	$query->bindParam(":currentUsername",$currentUsername);
	$query->bindParam(":NEWnome",$NEWnome);
	$query->bindParam(":NEWcognome",$NEWcognome);
	$query->bindParam(":NEWemail",$NEWemail);
	$query->bindParam(":NEWsquadra",$NEWsquadra);
	return $query->execute();

}


//funzione di update della password
function updatePassword($con, $username, $password)
{
	
	$password = md5($password);
	$query = $con->prepare("
		UPDATE utenti SET password=:password WHERE username=:username; 
	");
	
	$query->bindParam(":username", $username);
	$query->bindParam(":password", $password);
	
	return $query->execute();
			
}



//check che non ci siano duplicati per l'username se si vuole modificare tale campo
function checkUsernameExist($con, $username)
{
	$query = $con->prepare("
		SELECT * FROM utenti WHERE username=:username
	");
	
	$query->bindParam(":username", $username);
	$query->execute();
	$risultato = $query->fetch(PDO::FETCH_ASSOC);
	if($query->rowCount()==1 && $risultato['username'] != $_SESSION['username'])
	{
		return false; //username  già esistente diverso dal proprio ritorna falso 
	}
	else{
		return true;
	}
}

//funzione che fai il check per i duplicati nel caso si voglia cambiare email
function checkEmailExist($con, $email)
{
	$query = $con->prepare("
		SELECT * FROM utenti WHERE email=:email
	");
	
	$query->bindParam(":email", $email);
	$query->execute();
	$risultato = $query->fetch(PDO::FETCH_ASSOC);
	if($query->rowCount()==1 && $risultato['email'] != $_SESSION['email'])
	{
		return false; //email già esistente diversa dalla propria  ritorna falso 
	}
	else{
		return true;
	}
}

//check che non ci siano doppioni di squadre
function checkSquadraExist($con, $squadra)
{
	$query = $con->prepare("
		SELECT * FROM squadre WHERE nomeSquadra=:nomeSquadra
	");
	
	$query->bindParam(":nomeSquadra", $squadra);
	$query->execute();
	$risultato = $query->fetch(PDO::FETCH_ASSOC);
	if($query->rowCount()==1 && $risultato['nomeSquadra'] != $_SESSION['squadra'])
	{
		return false; //squadra già esistente diversa dalla propria  ritorna falso 
	}
	else{
		return true;
	}
}

//check che non ci siano doppioni di nuove leghe
function checkLegaExist($con, $lega)
{
	$query = $con->prepare("
		SELECT * FROM tornei WHERE nomeTorneo=:lega
	");
	
	$query->bindParam(":lega", $lega);
	$query->execute();
	//check
	if($query->rowCount()==1)
	{
		return false;
	}
	else{
		return true;
	}
}

//funzione che visualizza le leghe iscrivibili alla registrazione in una ddl
function fetchRecords($con)
{
	$query = $con->prepare("
	SELECT idTorneo, nomeTorneo
	FROM squadre INNER JOIN tornei ON lega = idTorneo
	GROUP BY idTorneo, numeroMaxPartecipanti
	HAVING COUNT(*) < numeroMaxPartecipanti	
	");
	$query->execute();
	
	return $query->fetchAll();
}

//funzione che visualizza le leghe non iscrivibili alla registrazione in una ddl
function fetchRecordsN($con)
{
	$query = $con->prepare("
	SELECT T.idTorneo, T.nomeTorneo
	FROM tornei T LEFT JOIN (SELECT idTorneo, nomeTorneo
							 FROM squadre INNER JOIN tornei ON lega = idTorneo
							 GROUP BY idTorneo , numeroMaxPartecipanti
							 HAVING COUNT(*) < numeroMaxPartecipanti) AS T1
			ON T.idTorneo = T1.idTorneo
	WHERE T1.idTorneo IS NULL
	");
	$query->execute();
	
	return $query->fetchAll();
}

//funzione che crea un nuovo torneo
function creaTorneo($con, $lega, $dataInizoLega, $numeroPartecipanti)
{
	
	$query = $con->prepare("
	INSERT INTO tornei (nomeTorneo, dataInizio, numeroMaxPartecipanti) VALUES (:torneo, :dataInizio, :numeroMaxPartecipanti);
	");
	
	$query2 = $con->prepare("
	SELECT idTorneo, nomeTorneo FROM tornei WHERE nomeTorneo=:torneo;
	");
	
	$query->bindParam(":torneo", $lega);
	$query2->bindParam(":torneo", $lega);
	$query->bindParam(":dataInizio", $dataInizoLega);
	$query->bindParam(":numeroMaxPartecipanti", $numeroPartecipanti);
	$query->execute();
	$query2->execute();
	
	return $query2->fetch();
}

//funzione che crea un calendario di un nuovo torneo
function creaCalendario($con, $lega)
{
	$query = $con->prepare("call crea_Calendario(:lega)");
	$query->bindParam(":lega", $lega);
	return $query->execute();
}


//funzione che proietta le squadre degli utenti che non hanno ancora una rosa assegnata
function fetchRose($con)
{
	$query = $con->prepare("
	SELECT nomeTorneo, nomeSquadra, lega
	FROM squadre INNER JOIN tornei on lega = idTorneo
	WHERE nomeSquadra NOT IN (SELECT squadra FROM rose)
	");
	$query->execute();
	
	return $query->fetchAll();
}

//funzione di selezione dei calciatori attualmente disponibili in un torneo, assegnabili dalla inserisciRosa
function selezionaCalciatoreRuolo($con, $ruolo, $lega)
{
	$query = $con->prepare("
		SELECT *
        FROM calciatori
        WHERE ruolo =:ruolo AND idCalciatore NOT IN (SELECT calciatore
													 FROM rose 
													 WHERE squadra in (SELECT nomeSquadra
													                   FROM squadre
													                   WHERE lega =:lega
																	  )
													)
	");
	$query->bindParam(":ruolo", $ruolo);
	$query->bindParam(":lega", $lega);
	$query->execute();
	
	return $query->fetchAll();
}

//funzione di inserimento della rosa ad un utente
function inserisciRosa($con, $squadra, $calciatore)
{
	$query = $con->prepare("
		INSERT INTO rose (squadra, calciatore) VALUES (:squadra, :calciatore);
	");
	$query->bindParam(":squadra", $squadra);
	$query->bindParam(":calciatore", $calciatore);
	return $query->execute();
}

//inserisce la squadra nel nuovo utente nel calendario
function inserisciInCalendario($con, $squadra, $lega)
{
	$sql = "select count(*) as quanti from squadre where lega = $lega;";
    $query = $con->query($sql);
    $risultato = $query->fetch();
    $quanti = $risultato[0];
	$lettere = array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'L');
	$quanti = $lettere[$quanti-1];
	
	$query1 = $con->prepare("
		update calendario set squadraA =:squadra where idTorneo =:lega and etichettaA =:etichetta;
		update calendario set squadraB =:squadra where idTorneo =:lega and etichettaB =:etichetta;
	");
	
	$query1->bindParam(":squadra", $squadra);
	$query1->bindParam(":etichetta", $quanti);
	$query1->bindParam(":lega", $lega);
	
	return $query1->execute();
}

//inserisci la squadra creata in classifica
function inserisciInClassifica($con, $squadra)
{
	$sql = "insert into classifica (squadra) values ('$squadra')";
	return $query = $con->query($sql);
}

//funzione per l'inserimento della formazione
function selCalciatoreRosa($con, $ruolo, $squadra, $partita)
{
	$query = $con->prepare("
		SELECT T.*, @rank:=@rank +1 AS rank
		FROM(
			SELECT rose.calciatore, ruolo, nomeCalciatore, club, ifnull(stato, 3) AS stato 
			FROM rose LEFT OUTER JOIN (SELECT * FROM formazioni WHERE idPartita =:partita) AS D ON (rose.calciatore = D.calciatore AND rose.squadra = D.squadra)
					  INNER JOIN calciatori ON rose.calciatore = idCalciatore
			WHERE rose.squadra =:squadra AND ruolo =:ruolo
			ORDER BY stato) AS T, (SELECT @rank:=0) r
	");
	$query->bindParam(":ruolo", $ruolo);
	$query->bindParam(":partita", $partita);
	$query->bindParam(":squadra", $squadra);
	$query->execute();
	
	return $query->fetchAll();
}

//funzione di inserimentto di una formazione
function inserisciFormazione($con, $squadra, $calciatore, $partita, $stato, $maglia)
{
	$sql = "SELECT idPartita FROM calendario WHERE (squadraA = '$squadra' or squadraB = '$squadra') and idPartita >= $partita";
	$comandoSQL = $con->query($sql);
	
	while($nextMatch = $comandoSQL->fetch()){
		$query = $con->prepare("
			INSERT INTO formazioni (idPartita, squadra, calciatore, stato, maglia) VALUES (:idPartita, :squadra, :calciatore, :stato, :maglia);
		");
		
		$query->bindParam(":idPartita", $nextMatch[0]);
		$query->bindParam(":squadra", $squadra);
		$query->bindParam(":calciatore", $calciatore);
		$query->bindParam(":stato", $stato);
		$query->bindParam(":maglia", $maglia);
		$query->execute();
	}
	return true;
}

//funzione per la ricerca del modulo di una partita
function findModulo($con, $partita, $squadra, $ruolo)
{
	$sql = "SELECT count(*)-2 as quanti 
			FROM formazioni INNER JOIN calciatori on calciatore = idCalciatore
			WHERE ruolo = '$ruolo' AND squadra = '$squadra' AND idPartita = '$partita'
			GROUP BY ruolo
			ORDER BY ruolo DESC";
	$query = $con->query($sql);		
	
	return $query;
}

//funzione che modifica lo stato della partita 1=aperta 2=chiusa 3=non calcolabile
function modificaStatoPartita($con, $partita, $stato)
{
	$sql = "UPDATE calendario SET stato = $stato WHERE (idPartita = '$partita');";
	$query = $con->query($sql);
	
	return $query;
}

//stampa la lista delle leghe disponibili ne DB su cui si può calcolare la giornata (per disponibile si intende una lega aperta che abbia tutti gli iscritti, quindi il calendario completo)
function fetch_leghe($con)
{
	$query = $con->prepare("
	SELECT DISTINCT idTorneo, nomeTorneo
	FROM tornei  NATURAL JOIN  calendario T
	WHERE dataFine IS NULL AND NOT EXISTS (SELECT * FROM calendario C WHERE C.idTorneo = T.idTorneo AND (C.squadraA IS NULL OR C.squadraB IS NULL))
	");
	$query->execute();
	
	return $query->fetchAll();
}

//funzione che stampa l'elenco dei calciatori schierati in una partita
function fetch_formazione($con, $partita, $squadra, $stato)
{
	$sql= "
		SELECT ruolo, nomeCalciatore, club, idCalciatore
		FROM formazioni F INNER JOIN  calendario C ON F.idPartita = C.idPartita INNER JOIN calciatori ON F.calciatore = idCalciatore
		WHERE F.idPartita =$partita AND F.squadra =$squadra AND F.stato = $stato
		ORDER BY F.stato, ruolo DESC";
	
	$query = $con->query($sql);
	return $query;
}

//update goal di una partita
function updateGoal($con, $partita, $calciatore, $goal)
{
	$sql= "UPDATE formazioni SET goal = $goal WHERE (idPartita = $partita) and (calciatore = $calciatore);";
	
	$query = $con->query($sql);
	return $query;
}

//update assist di una partita
function updateAssist($con, $partita, $calciatore, $assist)
{
	$sql= "UPDATE formazioni SET assist = $assist WHERE (idPartita = $partita) and (calciatore = $calciatore);";
	
	$query = $con->query($sql);
	return $query;
}

//update gialli di una partita
function updateGialli($con, $partita, $calciatore, $giallo)
{
	$sql= "UPDATE formazioni SET giallo = $giallo WHERE (idPartita = $partita) and (calciatore = $calciatore);";
	
	$query = $con->query($sql);
	return $query;
}

//update rossi di una partita
function updateRossi($con, $partita, $calciatore, $rosso)
{
	$sql= "UPDATE formazioni SET rosso = $rosso WHERE (idPartita = $partita) and (calciatore = $calciatore);";
	
	$query = $con->query($sql);
	return $query;
}

//update autoreti di una partita
function updateAutoreti($con, $partita, $calciatore, $autorete)
{
	$sql= "UPDATE formazioni SET autorete = $autorete WHERE (idPartita = $partita) and (calciatore = $calciatore);";
	
	$query = $con->query($sql);
	return $query;
}

//update dei rigori sbagliati di una partita
function updateRigoriSbagliati($con, $partita, $calciatore, $rigoreSbagliato)
{
	$sql= "UPDATE formazioni SET rigoreSbagliato = $rigoreSbagliato WHERE (idPartita = $partita) and (calciatore = $calciatore);";
	
	$query = $con->query($sql);
	return $query;
}

//update dei rigori parati di una partita
function updateRigoriParati($con, $partita, $calciatore, $rigoreParato)
{
	$sql= "UPDATE formazioni SET rigoreParato = $rigoreParato WHERE (idPartita = $partita) and (calciatore = $calciatore);";
	
	$query = $con->query($sql);
	return $query;
}

//update dei goal subiti di una partita
function updateGoalSubiti($con, $partita, $calciatore, $goalSubito)
{
	$sql= "UPDATE formazioni SET goalSubito = $goalSubito WHERE (idPartita = $partita) and (calciatore = $calciatore);";
	
	$query = $con->query($sql);
	return $query;
}

//update dei voti di una partita
function updateVoti($con, $partita, $calciatore, $voto)
{
	if($voto == "SV")
		$sql= "UPDATE formazioni SET voto = NULL, goal = 0, assist = 0, giallo = 0, rosso = 0, autorete = 0, rigoreSbagliato = 0, goalSubito = 0, rigoreParato = 0  WHERE (idPartita = $partita) and (calciatore = $calciatore);";
	else{
		$sql1 = "select 3*goal + assist - 0.5*giallo - rosso - 3*autorete - 3*rigoreSbagliato - goalSubito + 3*rigoreParato
				 from  formazioni
				 where idPartita = $partita and calciatore = $calciatore";
		$query1 = $con->query($sql1);
		while($votoTot = $query1->fetch()){
			$sql= "UPDATE formazioni SET voto = $voto + {$votoTot[0]} WHERE (idPartita = $partita) and (calciatore = $calciatore);";
		}
	}
	
	$query = $con->query($sql);
	return $query;
}

//funzione che aggiorna le statistiche di un calciatore per una rosa
function updateStatisticheCalciatore($con, $squadra)
{
	$query = $con->prepare("
		SET SQL_SAFE_UPDATES = 0;
		UPDATE rose R
			INNER JOIN
				(SELECT squadra, calciatore, SUM(goal) as goalTot, SUM(voto) as puntiTot, SUM(assist) as assistTot, SUM(giallo) as gialliTot, SUM(rosso) as rossiTot,
						SUM(autorete) as autoretiTot, SUM(goalSubito) as goalSubitiTot, SUM(rigoreSbagliato) as rigoriSbagliatiTot,  SUM(rigoreParato) as rigoriParatiTot
				 FROM formazioni
				WHERE squadra =:squadra AND voto IS NOT NULL
				GROUP BY calciatore) AS F ON R.calciatore = F.calciatore AND R.squadra = F.squadra
		SET R.goalTot = F.goalTot, R.puntiTot = F.puntiTot, R.assistTot = F.assistTot, R.rossiTot = F.rossiTot, R.autoretiTot = F.autoretiTot, R.goalSubitiTot = F.goalSubitiTot, R.rigoriSbagliatiTot = F.rigoriSbagliatiTot, R.rigoriParatiTot = F.rigoriParatiTot;
		SET SQL_SAFE_UPDATES = 1;
	");
	$query->bindParam(":squadra", $squadra);
	return $query->execute();
}

//funzione che calcola l'esito di una partita e modifica la tabella del calendiario
function calcolaEsitoPartita($con, $partita, $squadra)
{
	$query = $con->prepare("call calcolo_Voti(:partita, :squadra)");
	$query->bindParam(":partita", $partita);
	$query->bindParam(":squadra", $squadra);
	return $query->execute();
}

//funzione per update della classifica dopo aver calcolato una giornata
function updateClassifica($con)
{
	$query = $con->prepare("
		SET SQL_SAFE_UPDATES = 0;
		UPDATE classifica C inner join parzialeAndata A on C.squadra = A.squadra INNER JOIN parzialeRitorno R ON C.squadra = R.squadra
			set C.punti = A.punti + R.punti, C.giocate = A.giocate + R.giocate, C.vittorie = A.vittorie + R.vittorie, C.pareggi = A.pareggi + R.pareggi, C.sconfitte = A.sconfitte + R.sconfitte, C.goalFatti = A.goalFatti + R.goalFatti,
				C.goalSubiti = A.goalSubiti + R.goalSubiti, C.votiTot = A.votiTot + R.votiTot; 
		SET SQL_SAFE_UPDATES = 0;					   
	");
	return $query->execute();
}

/**FOOTER */


function template_footer() {
echo '
        
<footer>
        <div class="footer-content">
            <h3>NOME</h3>
            <p>Testo</p>
            
        </div>
        <div class="footer-bottom">
            <p>copyright &copy; <a href="#">NOME</a>  </p>
                    <div class="footer-menu">
                      <ul class="f-menu">
                        <li><a href="">Home</a></li>
                        <li><a href="">About</a></li>
                        <li><a href="">Contact</a></li>
                        <li><a href="">Blog</a></li>
                      </ul>
                    </div>
        </div>

    </footer>
';
}


/** MENU */



function template_menu() {
	echo '<div class="hamburger-menu">
    <input id="menu__toggle" type="checkbox" />
    <label class="menu__btn" for="menu__toggle">
      <span></span>
    </label>

    <ul class="menu__box">
      <li><a class="menu__item" href="index.php">Home</a></li>
			<li><a class="menu__item" href="registrazione.php">registrazione</a></li>
			<li><a class="menu__item" href="login.php">login</a></li>
			<li><a class="menu__item" href="tutorial.html">tutorial</a></li>
    </ul>
  </div>';
	}
	
	function template_menu_users() {
		echo '<div class="hamburger-menu">
		<input id="menu__toggle" type="checkbox" />
		<label class="menu__btn" for="menu__toggle">
		  <span></span>
		</label>
	
		<ul class="menu__box">
		  <li><a class="menu__item" href="users.php">Home</a></li>
				<li><a class="menu__item" href="rose.php">Visualizza la tua rosa</a></li>
				<li><a class="menu__item" href="updateUser.php">Update</a></li>
				<li><a class="menu__item" href="logout.php">Logout</a></li>
		</ul>
	  </div>';
		}
		