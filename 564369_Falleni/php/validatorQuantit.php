<?php

    
	class validatorQuantit {

		private $data;
		private $errors = [];
		private static $fields = ['quantita', 'idProd'];
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
			 $this->validateQuantita(); 


			 return $this->errors;
		}

		private function validateQuantita(){
			include "connessione.php";
			 $val = trim($this->data['quantita']);
			 $id = trim($this->data['idProd']);
			 if(empty($val)){
			 	$this->addError('quantita', 'quantita non può essere vuoto');
			 }
			 else {

			 	$query_email = "SELECT quantita FROM prodotti WHERE idProd ='".$id."';";/*valore max prodotto in questione*/
			 	$result_email=mysqli_query($conn, $query_email); 
				$numero = mysqli_fetch_array($result_email);

				$user = $_SESSION['userId'];
				$query_em = "SELECT sum(carrello.quantita) as somm FROM carrello WHERE idProd ='".$id."' AND idUser='".$user."';";/*quanto ha gia inserito*/
			 	$result_em =mysqli_query($conn, $query_em); 
				$num = mysqli_fetch_array($result_em);

			 	if(($val + $num['somm'])>$numero['quantita']){
			 		$this->addError('quantita', 'quantita eccessiva');
			 	}
			 }
		}
 

		private function addError($key, $val){
			$this->errors[$key] = $val;
		}



	}
?>