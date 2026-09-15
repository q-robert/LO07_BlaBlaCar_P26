<!-- ----- debut Router1 -->
<?php
require ('../controller/ControllerConnexion.php');
require ('../controller/ControllerUtilisateur.php');
require ('../controller/ControllerVille.php');
require ('../controller/ControllerVehicule.php');
require ('../controller/ControllerTrajet.php');
require ('../controller/ControllerReservation.php');

// --- récupération de l'action passée dans l'URL
$query_string = $_SERVER['QUERY_STRING'];

// fonction parse_str permet de construire 
// une table de hachage (clé + valeur)
parse_str($query_string, $param);

// --- $action contient le nom de la méthode statique recherchée
$action = htmlspecialchars($param["action"]);

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$effectue = false;
if (isset($_SESSION['role'])) {
    $role = $_SESSION['role'];
    if ($role == 'administrateur') {
        switch ($action) {
            case "utilisateurListe":
            case "ajouterConducteurForm":
            case "ajouterConducteurAction":
            case "ajouterPassagerForm":
            case "ajouterPassagerAction":
            case "superGlobales":
                ControllerUtilisateur::$action();
                break;
            case"vehiculeListe":
            case "ajouterVehiculeForm":
            case "ajouterVehiculeAction":
                ControllerVehicule::$action();
                break;
            case "villeListe":
            case "ajouterVilleForm":
            case "ajouterVilleAction":
                ControllerVille::$action();
                break;
            case "ajout10ReservationsAleatoires":
                ControllerReservation::$action();
                break;
            case "proposezFonctionnaliteOriginale":
            case "proposezAmeliorationMVC":
            case "loginAction":
            case "deconnexion":
            case "viewBlaBlaCarAccueil";
                ControllerConnexion::$action();
                break;
            // Tache par défaut
            default:
                $action = "loginForm";
                ControllerConnexion::$action();
        }
        $effectue = true;
    } elseif ($role == 'conducteur') {
        switch ($action) {
            case "conducteurVehiculeListe":
                ControllerVehicule::$action();
                break;
            case "conducteurTrajetListe":
            case "conducteurAjouterTrajetForm":
            case "conducteurAjouterTrajetAction":
            case "conducteurListePassagerTrajetForm":
            case "conducteurListePassagerTrajetAction":
            case "conducteurCloturerTrajetForm":
            case "conducteurCloturerTrajetAction":
                ControllerTrajet::$action();
                break;
            case "superGlobales":
                ControllerUtilisateur::$action();
                break;
            case "ajout10ReservationsAleatoires":
                ControllerReservation::$action();
                break;
            case "proposezFonctionnaliteOriginale":
            case "proposezAmeliorationMVC":
            case "loginAction":
            case "deconnexion":
            case "viewBlaBlaCarAccueil";
                ControllerConnexion::$action();
                break;
            // Tache par défaut
            default:
                $action = "loginForm";
                ControllerConnexion::$action();
        }
        $effectue = true;
    } elseif ($role == 'passager') {
        switch ($action) {
            case "passagerReserverTrajetActifForm":
            case "passagerReserverTrajetActifAction":
            case "passagerListeReservation":
                ControllerReservation::$action();
                break;
            case "superGlobales":
                ControllerUtilisateur::$action();
                break;
            case "ajout10ReservationsAleatoires":
                ControllerReservation::$action();
                break;
            case "proposezFonctionnaliteOriginale":
            case "proposezAmeliorationMVC":
            case "loginAction":
            case "deconnexion":
            case "viewBlaBlaCarAccueil";
                ControllerConnexion::$action();
                break;
            // Tache par défaut
            default:
                $action = "loginForm";
                ControllerConnexion::$action();
        }
        $effectue = true;
    }
}



if ($effectue == false) {
// --- Liste des méthodes autorisées
    switch ($action) {
        case "superGlobales":
            ControllerUtilisateur::$action();
            break;
        case "ajout10ReservationsAleatoires":
            ControllerReservation::$action();
            break;
        case "proposezFonctionnaliteOriginale":
        case "proposezAmeliorationMVC":
        case "loginAction":
        case "deconnexion":
        case "viewBlaBlaCarAccueil";
            ControllerConnexion::$action();
            break;
        // Tache par défaut
        default:
            $action = "loginForm";
            ControllerConnexion::$action();
    }
}
?>
<!-- ----- Fin Router1 -->