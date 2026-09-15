<!-- ----- debut de la page index -->
<?php
session_start();
$_SESSION = [];
$_SESSION['login_id'] = -1;
header('Location: app/router/router1.php?action=truc');
?>
<!-- ----- fin de la page index -->