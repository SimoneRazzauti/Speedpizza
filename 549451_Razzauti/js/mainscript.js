// Menu in modalità mobile
function toggleDropdown() {
	var dropdown = document.getElementById("myDropdown");
	if (dropdown.style.display === "block") {
		dropdown.style.display = "none";
	} else {
		dropdown.style.display = "block";
	}
}

// Chiusura menu in modalità mobile
function closeMenu() {
	var dropdown = document.getElementById("myDropdown");
	dropdown.style.display = "none";
}

/* setta la data corrente nella date form */

var date = new Date();

var day = date.getDate();
var month = date.getMonth() + 1;
var year = date.getFullYear();

if (month < 10) month = "0" + month;
if (day < 10) day = "0" + day;

var today = year + "-" + month + "-" + day;
var elemento = document.getElementById("theDate");
if (elemento) {
	document.getElementById("theDate").defaultValue = today;
	document.getElementById("theDate").min = today;
}

/* setta l'ora corrente nella time form */

var time = new Date();

var hours = time.getHours();
var minutes = time.getMinutes();

var time = hours + ":" + minutes;
var elemento = document.getElementById("theTime");
if (elemento) {
	document.getElementById("theTime").defaultValue = time;
}

/* funzione scroll verso l'alto */

function scrollup() {
	window.scrollTo(0, 0);
}

function scrollpromozioni() {
	window.scrollTo(0, 1020);
}

function scrollprenotazione() {
	window.scrollTo(0, 2200);
}

function scrollcontatti() {
	window.scrollTo(0, 2590);
}

function closeAlert() {
	var node = document.getElementById("alertbox");
	while (node.hasChildNodes()) {
		node.removeChild(node.firstChild);
	}
	var alert_x = document.getElementById("alertbox");
	alert_x.style.display = "none";
}

var element = document.getElementById("firstname");

if (element) {
	element.addEventListener(
		"animationEnd",
		function () {
			this.style.animationName = "";
		},
		false
	);
}
// valida il nome che deve essere maggiore di 3 caratteri e minore di 10	
function validateForm() {
	var _name = document.forms["myForm"]["firstname"].value; /* nome inserito */
	var withoutSpace = _name.replace(/ /g, ""); /* rimuovo gli spazi bianchi */
	var _length = withoutSpace.length; /* conta i caratteri */
	var alert_x = document.getElementById("alertbox"); /* variabile supporto alertbox */

	if (_length < 3 || _length > 10) {
		closeAlert(); /* svuota l'alert box */
		alert_x.style.display = "block"; /* fa apparire l'alert */
		alert_x.style.backgroundColor = "#ff9741";
		document.getElementById('alertbox').innerHTML += 'Warning: Impossibile inserire un nome con meno di 3 caratteri o con pi&ugrave; di 10!'; /* scrive nell'alert */
		document.getElementById("firstname").style.animation = "shake .5s"; /*animazione keyframe shake sull'input*/
		document.getElementById("firstname").style.backgroundColor = "#f44336"; /* setta colore input a red */
		return false;
	}
	else {
		return true;
	}

}

// MODAL SCRIPT //

// Get the modal
var modal = document.getElementById('id01'); // login
var modal1 = document.getElementById('id02'); // registrazione
var modal2 = document.getElementById('id03'); // utente
var modal3 = document.getElementById('id04');

function openmodal() {
	modal.style.display = 'block';
}

function closemodal() {
	modal.style.display = 'none';
}

function openmodal1() {
	modal1.style.display = 'block';
}

function closemodal1() {
	modal1.style.display = 'none';
}


function openmodal2() {
	modal2.style.display = 'block';
}

function closemodal2() {
	modal2.style.display = 'none';
}

// QUANDO SI CLICCA IN UNA ZONA CHE NON E' IL MODAL SI CHIUDE IL MODAL 
window.onclick = function (event) {
	if (event.target == modal) {
		modal.style.display = "none";
	}
	if (event.target == modal1) {
		modal1.style.display = "none";
	}
	if (event.target == modal2) {
		modal2.style.display = "none";
	}
}

function validateEmail(email) { /* Funzione per validare email */
	var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
	return re.test(email);
}


function validateNameInput(nomeinput) {
	var reex = /^[a-zA-Z0-9]{2,10}$/;
	return reex.test(nomeinput);
}

function validatePassword(password) {
	var rex = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])[0-9a-zA-Z]{8,}$/;
	return rex.test(password);
}

function validateCAP(cap) {
	var regex = /^\d{5,5}$/;
	return regex.test(cap);
}


var element_email = document.getElementById('modal1_email');

if (element_email) {
	element_email.addEventListener('animationEnd', function () {
		this.style.animationName = '';
	}, false);

	document.getElementById('modal1_nome').addEventListener('animationEnd', function () {
		this.style.animationName = '';
	}, false);

	document.getElementById('modal1_surname').addEventListener('animationEnd', function () {
		this.style.animationName = '';
	}, false);

	document.getElementById('modal1_password').addEventListener('animationEnd', function () {
		this.style.animationName = '';
	}, false);

	document.getElementById('modal1_repeat').addEventListener('animationEnd', function () {
		this.style.animationName = '';
	}, false);

	document.getElementById('modal1_cap').addEventListener('animationEnd', function () {
		this.style.animationName = '';
	}, false);
}
function validateFormRegister() {

	var errore_ = true;

	var _email = document.forms["register"]["email"].value; /* email inserita */

	if (!validateEmail(_email)) {
		document.getElementById("modal1_email").style.animation = "shake .5s"; /*animazione keyframe shake sull'input*/
		document.getElementById("modal1_email").style.backgroundColor = "#f44336"; /* setta colore input a red */
		element_email.focus();
		document.getElementById("error_email").style.display = 'block';
		event.preventDefault(); /* impedisce il refresh della pagina con una submit a buon fine*/
		errore_ = false;
	}
	else {
		document.getElementById("error_email").style.display = 'none';
		document.getElementById("modal1_email").style.backgroundColor = 'white';
	}

	var _nomeform = document.forms["register"]["nome"].value; /* Nome inserito */

	if (!validateNameInput(_nomeform)) { /* Controlla nome dai 4 ai 10 caratteri composto solo da caratteri alfanumerici */
		document.getElementById("modal1_nome").style.animation = "shake .5s"; /*animazione keyframe shake sull'input*/
		document.getElementById("modal1_nome").style.backgroundColor = "#f44336"; /* setta colore input a red */
		document.getElementById("modal1_nome").focus();
		document.getElementById("error_nome").style.display = 'block';
		event.preventDefault();
		errore_ = false;
	}
	else {
		document.getElementById("error_nome").style.display = 'none';
		document.getElementById("modal1_nome").style.backgroundColor = 'white';
	}

	var _cognome = document.forms["register"]["surname"].value; /* Cognome inserito */

	if (!validateNameInput(_cognome)) { /* Controlla cognome dai 4 ai 10 caratteri composto solo da caratteri alfanumerici */
		document.getElementById("modal1_surname").style.animation = "shake .5s"; /*animazione keyframe shake sull'input*/
		document.getElementById("modal1_surname").style.backgroundColor = "#f44336"; /* setta colore input a red */
		document.getElementById("modal1_surname").focus();
		document.getElementById("error_surname").style.display = 'block';
		event.preventDefault();
		errore_ = false;
	}
	else {
		document.getElementById("error_surname").style.display = 'none';
		document.getElementById("modal1_surname").style.backgroundColor = 'white';
	}

	var _password = document.forms["register"]["psw"].value; /* Password inserita */

	if (!validatePassword(_password)) { /* Controlla password, almeno 8 caratteri di cui una lettera, un numero e un carattere speciale*/
		document.getElementById("modal1_password").style.animation = "shake .5s"; /*animazione keyframe shake sull'input*/
		document.getElementById("modal1_password").style.backgroundColor = "#f44336"; /* setta colore input a red */
		document.getElementById("modal1_password").focus();
		document.getElementById("error_password").style.display = 'block';
		event.preventDefault();
		errore_ = false;
	}
	else {
		document.getElementById("error_password").style.display = 'none';
		document.getElementById("modal1_password").style.backgroundColor = 'white';
	}

	var psw_repeat = document.forms["register"]["psw-repeat"].value; /* Password Ripetuta inserita */

	if (psw_repeat != _password) {
		document.getElementById("modal1_repeat").style.animation = "shake .5s"; /*animazione keyframe shake sull'input*/
		document.getElementById("modal1_repeat").style.backgroundColor = "#f44336"; /* setta colore input a red */
		document.getElementById("modal1_repeat").focus();
		document.getElementById("error_repeat").style.display = 'block';
		event.preventDefault();
		errore_ = false;
	}
	else {
		document.getElementById("error_repeat").style.display = 'none';
		document.getElementById("modal1_repeat").style.backgroundColor = 'white';
	}

	var _cap = document.forms["register"]["cap"].value; /* CAP inserito */

	if (!validateCAP(_cap)) {
		document.getElementById("modal1_cap").style.animation = "shake .5s"; /*animazione keyframe shake sull'input*/
		document.getElementById("modal1_cap").style.backgroundColor = "#f44336"; /* setta colore input a red */
		document.getElementById("modal1_cap").focus();
		document.getElementById("error_cap").style.display = 'block';
		event.preventDefault();
		errore_ = false;
	}
	else {
		document.getElementById("error_cap").style.display = 'none';
		document.getElementById("modal1_cap").style.backgroundColor = 'white';
	}

	if (errore_ == false) return false;
	else return true;


}


// tasto per la password oscurata
var timerIds = {}; // Variabile per memorizzare gli ID dei timer

function togglePasswordVisibility(inputId) {
	var passwordInput = document.getElementById(inputId);
	var passwordVisibilityButton = passwordInput.nextElementSibling;

	if (passwordInput.type === "password") {
		passwordInput.type = "text";
		passwordVisibilityButton.classList.add("visible");
		clearTimeout(timerIds[inputId]); // Cancella il timer precedente, se presente
		timerIds[inputId] = setTimeout(function () {
			passwordInput.type = "password";
			passwordVisibilityButton.classList.remove("visible");
		}, 5000); // Imposta il timer a 5 secondi (5000 millisecondi)
	} else {
		passwordInput.type = "password";
		passwordVisibilityButton.classList.remove("visible");
		clearTimeout(timerIds[inputId]); // Cancella il timer se l'utente ha fatto clic prima che scattasse
	}
}