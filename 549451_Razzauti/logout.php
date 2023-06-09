<?php
session_start();
setcookie("NOME", "", time()-(60*60*24*7));
setcookie("PSW", "", time()-(60*60*24*7));
unset($_COOKIE["NOME"]);
unset($_COOKIE["PSW"]);
session_unset();
session_destroy();

header("Location: index.php");
exit;

?>