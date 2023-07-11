<?php
	session_start();
    include "php/sessionUtil.php";
    include "php/connessione.php";
    require ('php/user_validator.php');

    if(isset($_POST['submit'])){/*quando clicchiamo submit*/
    	
    	$validation = new UserValidator($_POST);
    	$errors = $validation->validateForm();

    	//save to dB
    	if(array_filter($errors)){

    	}else {
    		$username = mysqli_real_escape_string($conn, $_POST['username']);
    		$email = mysqli_real_escape_string($conn, $_POST['email']);
    		$password = mysqli_real_escape_string($conn, $_POST['password']);
    		$citta = mysqli_real_escape_string($conn, $_POST['citta']);
    		$indirizzo = mysqli_real_escape_string($conn, $_POST['indirizzo']);
    		$nome = mysqli_real_escape_string($conn, $_POST['nome']);
    		$cognome = mysqli_real_escape_string($conn, $_POST['cognome']);
    		$cap = mysqli_real_escape_string($conn, $_POST['cap']);


    		$sql = "INSERT INTO user (email, nome, cognome, username, password, citta, indirizzo, cap)
    VALUES ('$email', '$nome', '$cognome', '$username', '".md5($password)."', '$citta', '$indirizzo', '$cap')";

    		if(mysqli_query($conn, $sql)){ //se ha funzionato
    		   $successo = true;
    		} else{
    			echo 'query error: ' . mysqli_error($conn);
    		}
    	}

    }
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">

<title>Spesa On-line</title>
<link rel="stylesheet" href="css/Stile.css" type="text/css">
<link rel="stylesheet" href="css/StileReg.css" type="text/css"> 
</head>

<body>
<?php include('header.php'); ?>
  
<div class="new-user">
	<h2>Registrati come utente</h2>
	<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST" > 

       <label>Username:</label>
       <input type="text" name="username" value="<?php echo isset($_POST['username']) ? htmlspecialchars($_POST['username'], ENT_QUOTES) : ''; ?>">
       <div class="error">
       	<?php echo isset($errors['username']) ? $errors['username'] : '' ?>
       	
       </div>

       <label>Email:</label>
       <input type="email" name="email" value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email'], ENT_QUOTES) : ''; ?>">
       <div class="error">
       	<?php echo isset($errors['email']) ? $errors['email'] : '' ?>
       </div>

       <label>Nome:</label>
       <input type="text" name="nome" value="<?php echo isset($_POST['nome']) ? htmlspecialchars($_POST['nome'], ENT_QUOTES) : ''; ?>">
       <div class="error">
       	<?php echo isset($errors['nome']) ? $errors['nome'] : '' ?>
       </div>

       <label>Cognome:</label>
       <input type="text" name="cognome"  value="<?php echo isset($_POST['cognome']) ? htmlspecialchars($_POST['cognome'], ENT_QUOTES) : ''; ?>">
       <div class="error">
       	<?php echo isset($errors['cognome']) ? $errors['cognome'] : '' ?>
       </div>

       <label>Password:</label>
       <input type="password" name="password" id="pass" value="<?php echo isset($_POST['password']) ? htmlspecialchars($_POST['password'], ENT_QUOTES) : ''; ?>">
       <div class="error">
       	<?php echo isset($errors['password']) ? $errors['password'] : '' ?>
       </div>
       
       <input type="checkbox" onclick="myFunctionn()" >Show Password 


       <label>Citta:</label>
       <input type="text" name="citta"  value="<?php echo isset($_POST['citta']) ? htmlspecialchars($_POST['citta'], ENT_QUOTES) : ''; ?>">
       <div class="error">
       	<?php echo isset($errors['citta']) ? $errors['citta'] : '' ?>
       </div>


       <label>indirizzo:</label>
       <input type="text" name="indirizzo"  value="<?php echo isset($_POST['indirizzo']) ? htmlspecialchars($_POST['indirizzo'], ENT_QUOTES) : ''; ?>">
       <div class="error">
       	<?php echo isset($errors['indirizzo']) ? $errors['indirizzo'] : '' ?>
       </div>

       <label>Cap:</label>
       <input type="text" name="cap"  value="<?php echo isset($_POST['cap']) ? htmlspecialchars($_POST['cap'], ENT_QUOTES) : ''; ?>">
       <div class="error">
       	<?php echo isset($errors['cap']) ? $errors['cap'] : '' ?>
       </div>


       <div class="successo">
       	<?php
       		if($successo== true){
       			echo "<p>Fatto!!!</p>";
       		}
       	?>
       </div>

       <input type="submit" value="Registrati" name="submit">

	</form>
</div>

 
</body>

</html>