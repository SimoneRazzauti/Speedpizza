<?php
 
    
	class UserValidator {

		private $data;
		private $errors = [];
		private static $fields = ['username', 'email', 'nome', 'cognome', 'password', 'citta', 'indirizzo', 'cap'];
		public function __construct($post_data){
			$this->data = $post_data;
		}

		public function validateForm(){

			 foreach (self::$fields as $field) {
			 	if(!array_key_exists($field, $this->data)){
			 				 		trigger_error("$field non è presente");
			 				 		return;
			 				 	}
			 }
			 $this->validateUsername();
			 $this->validateEmail();
			 $this->validateNome();
			 $this->validateCognome();
			 $this->validatePassword();
			 
			 $this->validateCitta();
			 $this->validateIndirizzo();
			 $this->validateCap();


			 return $this->errors;
		}

		private function validateUsername(){
			 $val = trim($this->data['username']);

			 if(empty($val)){
			 	$this->addError('username', 'username non può essere vuoto');
			 }
			 else {
			 	if(!preg_match('/^[a-zA-z0-9]{6,12}$/', $val)){
			 		$this->addError('username', 'username deve essere tra i 6-12 caratteri e solo alphanumerici');
			 	}
			 }
		}

		private function validateEmail(){
			include "connessione.php";
			 $val = trim($this->data['email']);
			  if(empty($val)){
			 	$this->addError('email', 'email non può essere vuoto');
			 }
			 else {
			 	$query_email = "SELECT * FROM user WHERE email ='".$val."'";
			 	$result_email=mysqli_query($conn, $query_email); 
				$result_emailCount= mysqli_num_rows($result_email);

				if($result_emailCount  > 0){
					$this->addError('email', 'email gi&agrave; usata');
				}
			 	else if(!filter_var($val, FILTER_VALIDATE_EMAIL)){
			 		$this->addError('email', 'email non valida');
			 	}
			 }
		}


		private function validateNome(){
			 $val = trim($this->data['nome']);
			  if(empty($val)){
			 	$this->addError('nome', 'nome non può essere vuoto');
			 }
			 else {
			 	if(!preg_match("/^[a-zA-Z ]*$/",$val)){
			 		$this->addError('nome', 'nome non valido');
			 	}
			 }
		}

		private function validateCognome(){
			 $val = trim($this->data['cognome']);
			  if(empty($val)){
			 	$this->addError('cognome', 'cognome non può essere vuoto');
			 }
			 else {
			 	if(!preg_match("/^[a-zA-Z ]*$/",$val)){
			 		$this->addError('cognome', 'cognome non valido');
			 	}
			 }
		}


		private function validatePassword(){
			 $val = trim($this->data['password']);
			  if(empty($val)){
			 	$this->addError('password', 'password non può essere vuota');
			 }
			 else {

            if (strlen($val) <= '7') {
             $this->addError('password', 'La tua password deve contenere almeno 8 caratteri.');
            }
            elseif (!preg_match("#[0-9]+#",$val)) {
             $this->addError('password', 'La tua password deve contenere almeno un numero');
            }
            elseif(!preg_match("#[A-Z]+#",$val)) {
             $this->addError('password', 'La tua password deve contenere almeno un carattere maiuscolo');
            }
            elseif(!preg_match("#[a-z]+#",$val)) {
             $this->addError('password', 'La tua password deve contenere almeno un carattere minuscolo');
            }
			}
		}
 



		private function validateCitta(){
			 $val = trim($this->data['citta']);
			  if(empty($val)){
			 	$this->addError('citta', 'citta non può essere vuoto');
			 }
			 else {
			 	if(!preg_match("/^[a-zA-Z ]*$/",$val)){
			 		$this->addError('citta', 'citta non valido');
			 	}
			 }
		}


		private function validateIndirizzo(){
			 $val = trim($this->data['indirizzo']);
			  if(empty($val)){
			 	$this->addError('indirizzo', 'indirizzo non può essere vuoto');
			 }
		}


		private function validateCap(){
			 $val = trim($this->data['cap']);
			  if(empty($val)){
			 	$this->addError('cap', 'cap non può essere vuota');
			 }
			 else {
            	if (!preg_match("/^\d{5}$/",$val)){
             	$this->addError('cap', 'Il cap deve essere di 5 caratteri.');
           		} 
			}
		}


		private function addError($key, $val){
			$this->errors[$key] = $val;
		}



	}
?>