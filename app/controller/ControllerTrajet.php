<!-- ----- debut ControllerTrajet -->
<?php
require_once '../model/ModelTrajet.php';

class ControllerTrajet {

    // Affiche la liste des trajets du conducteur connecté
    public static function conducteurTrajetListe() {
        include 'config.php';
        $id = $_SESSION['login_id'];
        $results = ModelTrajet::getMyTrajet($id);
        $vue = $root . 'app/view/conducteur/viewMyTrajet.php';
        if (DEBUG){
            echo ("ControllerTrajet : conducteurTrajetListe : vue = $vue");
        }
        require ($vue);
    }

    // Affiche le formulaire pour ajouter un trajet avec les informations sur les villes et les véhicules
    public static function conducteurAjouterTrajetForm() {
        include 'config.php';
        $id = $_SESSION['login_id'];
        $vue = $root . 'app/view/conducteur/viewAjouterTrajetForm.php';
        $villes = ModelVille::getAll();
        $vehicules = ModelVehicule::getMyVehicule($id);
        if (DEBUG){
            echo ("ControllerTrajet : conducteurAjouterTrajetForm : vue = $vue");
        }
        require ($vue);
    }

    // Ajoute un trajet après avoir récupéré ses informations dans un form
    public static function conducteurAjouterTrajetAction() {
        include 'config.php';
        $id = $_SESSION['login_id'];
        $results = ModelTrajet::insertTrajet($id, htmlspecialchars($_POST['ville_depart']), htmlspecialchars($_POST['ville_arrivee']),
                htmlspecialchars($_POST['vehicule_id']), htmlspecialchars($_POST['prix']),
                htmlspecialchars($_POST['date_depart']), htmlspecialchars($_POST['heure_depart']));
        $vue = $root . 'app/view/conducteur/viewAjouterTrajetAction.php';
        if (DEBUG){
            echo ("ControllerTrajet : conducteurAjouterTrajetAction : vue = $vue");
        }
        require ($vue);
    }

    // Affiche le formulaire avec la liste des trajets actifs proposés par le conducteur connecté
    public static function conducteurListePassagerTrajetForm() {
        include 'config.php';
        $id = $_SESSION['login_id'];
        $vue = $root . 'app/view/conducteur/viewConducteurListePassagerTrajetForm.php';
        $trajets = ModelTrajet::getMyTrajetActif($id);
        if (DEBUG){
            echo ("ControllerTrajet : conducteurListePassagerTrajetForm : vue = $vue");
        }
        require ($vue);
    }

    // Affiche les passagers présent sur un trajet qui a été sélectionné précédemment dans le formulaire
    public static function conducteurListePassagerTrajetAction() {
        include 'config.php';
        $trajet_id = htmlspecialchars($_POST['trajet_id']);
        $passagers = ModelUtilisateur::getPassagersByTrajetId($trajet_id);
        $vue = $root . 'app/view/conducteur/viewConducteurListePassagerTrajetAction.php';
        if (DEBUG){
            echo ("ControllerTrajet : conducteurListePassagerTrajetAction : vue = $vue");
        }
        require($vue);
    }
    
    // Affiche le formulaire de sélection des trajets actifs pour en cloturer un
    public static function conducteurCloturerTrajetForm() {
        include 'config.php';
        $id = $_SESSION['login_id'];
        $vue = $root . 'app/view/conducteur/viewConducteurCloturerTrajetForm.php';
        $trajets = ModelTrajet::getMyTrajetActif($id);
        if (DEBUG) {
            echo ("ControllerTrajet : conducteurCloturerTrajetForm : vue = $vue");
        }
        require ($vue);
    }

    // Cloture le trajet et affiche un message de succès de l'opération
    public static function conducteurCloturerTrajetAction() {
        include 'config.php';
        $trajet_id = htmlspecialchars($_POST['trajet_id']);
        $reussi = ModelTrajet::cloturerTrajet($trajet_id);
        $_SESSION['solde'] = ModelUtilisateur::getSolde1($_SESSION['login_id']);
        $vue = $root . 'app/view/conducteur/viewConducteurCloturerTrajetAction.php';
        if (DEBUG){
            echo ("ControllerTrajet : conducteurCloturerTrajetAction : vue = $vue");
        }
        require($vue);
    }
}
?>
<!-- ----- fin ControllerTrajet -->