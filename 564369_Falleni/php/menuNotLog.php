


<li id="borderr"><a href="registrazione.php">Registrazione</a></li> 
<li><p onclick="document.getElementById('logbox').style.display='block'">Login</p></li>






<div id="logbox" class="popup">

<form class="boxes animate" action="php/login.php" method="post">
<span onclick="document.getElementById('logbox').style.display='none'" class="chiudi">&times;</span>
    <div class="Logincontainer">
      <h2>Login Utente</h2>
      <label for="uname"><b>Username</b></label>
      <input type="text" placeholder="Inserisci username" name="username" required autofocus>

      <label for="psw"><b>Password</b></label>
      <input type="password" placeholder="Inserisci password" name="password" required>


      <div class="button_accedi" align="center">
      <button class="accBott" type="submit">ACCEDI</button>
      </div>

    <?php
          if (isset($_GET['errorMessage'])){
            echo '<div class="sign_in_error">';
            echo '<span>' . $_GET['errorMessage'] . '</span>';
            echo '</div>';
          }
        ?>

    </div>

    <div class="Logincontainer" style="background-color:#f1f1f1" align="center">
      
  <li><p onclick="aziendaPop()">Login Azienda</p></li>
     
    </div>
  </form>

  
</div>






<div id="azzbox" class="popup">
          
<form class="boxes animate" action="php/LogAz.php" method="post">
  <span onclick="document.getElementById('azzbox').style.display='none'" class="chiudi">&times;</span>
    <div class="Logincontainer">
      <h2>Login azienda</h2>
      <label for="uname"><b>Username</b></label>
      <input type="text" placeholder="Inserisci username" name="username" required autofocus>

      <label for="psw"><b>Password</b></label>
      <input type="password" placeholder="Inserisci password" name="password" required>


      <div class="button_accedi" align="center">
      <button class="accBott" type="submit">ACCEDI</button>
      </div>

    <?php
          if (isset($_GET['errorMessage'])){
            echo '<div class="sign_in_error">';
            echo '<span>' . $_GET['errorMessage'] . '</span>';
            echo '</div>';
          }
        ?>

    </div>

    
  </form>

  
</div>




