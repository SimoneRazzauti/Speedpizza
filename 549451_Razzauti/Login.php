<?php
session_start();
include("checkCOOKIE.php");
?>
<!DOCTYPE html>
<html lang="it">
<head>
	<meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!-- per "visualizzare" mobile -->

    <title> Login </title>
	<link rel="stylesheet" href="css/stileLogin.css"  type="text/css">
		<link rel="stylesheet" href="css/footer.css"  type="text/css">
	<link rel="stylesheet" href="css/stileMenu.css"  type="text/css">



	<script>
	function rivela(){
		var x = document.getElementById("login-password");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
	}
	</script>


</head>
<body>
<?=template_menu()?>

<section class="forms-section">
  <h1 class="section-title">Area personale</h1>
  <div class="forms">
    <div class="form-wrapper is-active">
      <button type="button" class="switcher switcher-login">
        Login
        <span class="underline"></span>
      </button>
      	<form class="form form-login" name="login" action="process.php" method="POST">
        <fieldset>
          <legend>Inserire Username e Password</legend>
          <div class="input-block">
            <label for="login-email">Username</label>
            <input id="login-email" type="text" name="username" value="" required/>

          </div>
          <div class="input-block">
            <label for="login-password">Password</label>
	          <img src="immagini/eye.png" style="display: inline; margin-bottom: -3px;"  width="15px" height="15px" onclick="rivela()">
            <input id="login-password" type="password" name="password" value="" autocomplete="off" required/>
            <span>
        <i class="fa fa-eye" aria-hidden="true"  type="button" id="eye"></i>
     </span>
          </div>
        </fieldset>

		<input type="submit" name="login" value="Accedi" class="btn-login"/>
      </form>
    </div>
   
  </div>
</section>

<?php
if(isset($_GET['error']))
{
	echo "<p id='box_errore'"."style='text-align: center; width: 80%;background-color: red;
  margin: auto;
margin-top: 30px;
 font-weight: bold; color: yellow; border: 2px solid white;'>";
	
	switch ($_GET['error'])
	{
		
		case 1:
			echo "Errore: Username o Password non corretti";
		break;
	
		case 2:
			echo "Errore: Impossibile procedere, devi autenticarti o registrarti";
		break;
	}
	
	echo "</p>";
}
?>

<br>
<br>

<?=template_footer()?>


</body>

<script type="text/javascript">
	const switchers = [...document.querySelectorAll('.switcher')]

switchers.forEach(item => {
	item.addEventListener('click', function() {
		switchers.forEach(item => item.parentElement.classList.remove('is-active'))
		this.parentElement.classList.add('is-active')
	})
})

</script>
</html>


