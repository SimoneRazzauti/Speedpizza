<?php
	session_start();
    include "php/sessionUtil.php";
    include "php/connessione.php";
    require ('php/azienda_validator.php');

    if(isset($_POST['submit'])){/*quando clicchiamo submit*/
    	
    	$validation = new UserValidator($_POST);
    	$errors = $validation->validateForm();

    	//save to dB
    	if(array_filter($errors)){

    	}else {
    		$username = mysqli_real_escape_string($conn, $_POST['username']);
    		$password = mysqli_real_escape_string($conn, $_POST['password']);
    		$citta = mysqli_real_escape_string($conn, $_POST['citta']);
    		$indirizzo = mysqli_real_escape_string($conn, $_POST['indirizzo']);


    		$sql = "INSERT INTO azienda (username, password, citta, indirizzo)
    VALUES ( '$username', '".md5($password)."', '$citta', '$indirizzo')";

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
  
<div class="new-azienda">
	<h2>Registrati Come azienda </h2>
	<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST" > 

       <label>Username:</label>
       <input type="text" name="username" value="<?php echo isset($_POST['username']) ? htmlspecialchars($_POST['username'], ENT_QUOTES) : ''; ?>">
       <div class="error">
       	<?php echo isset($errors['username']) ? $errors['username'] : '' ?>
       	
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


       <div class="successo">
       	<?php
       		if($successo== true){
       			echo "<p>Fatto!!!</p>";
       		}
       	?>
       </div>

       <input type="submit" value="Registrati" name="submit">

	</form>


</body>

</html>