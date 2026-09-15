<!-- ----- debut config -->
<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
} 

// Utile pour le débugage
if (!defined('DEBUG')) {
    define('DEBUG', FALSE);
}

// ===============
// Configuration de la base de données sur dev-isi
$dsn = 'mysql:dbname=;host=localhost;charset=utf8';
$username = '';
$password = '';

if (!defined('LOCAL')) {
    define('LOCAL', FALSE);
}

if (LOCAL) {
    // Configuration de la base de données sur localhost
    $dsn = 'mysql:dbname=BlaBlaCar;host=localhost;charset=utf8';
    $username = 'root';
    $password = 'root';
}

// chemin absolu vers le répertoire du projet SUR DEV-ISI 
$root = dirname(dirname(__DIR__)) . "/";

if (DEBUG) {
    echo ("<ul>");
    echo (" <li>dsn = $dsn</li>");
    echo (" <li>username = $username</li>");
    echo (" <li>password = $password</li>");
    echo ("<li>---</li>");
    echo (" <li>root = $root</li>");

    echo ("</ul>");
}
?>
<!-- ----- fin config -->