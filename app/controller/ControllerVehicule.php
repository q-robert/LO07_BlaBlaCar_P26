<!-- ----- debut ControllerVehicule -->
<?php
require_once '../model/ModelVehicule.php';

class ControllerVehicule {

    // Affiche la liste des vehicules
    public static function vehiculeListe() {
        $results = ModelVehicule::getAll();
        include 'config.php';
        $vue = $root . 'app/view/administrateur/viewAllVehicule.php';
        if (DEBUG){
            echo ("ControllerVehicule : vehiculeListe : vue = $vue");
        }
        require ($vue);
    }

    // Affiche le formulaire pour ajouter un vehicule
    public static function ajouterVehiculeForm() {
        include 'config.php';
        $vue = $root . 'app/view/administrateur/viewAjouterVehiculeForm.php';
        $results = ModelUtilisateur::conducteurListeSansDoublon();
        if (DEBUG){
            echo ("ControllerVehicule : ajouterVehiculeForm : vue = $vue");
        }
        require ($vue);        
    }

    // Ajout du nouveau vehicule et affiche les informations le concernant
    public static function ajouterVehiculeAction() {
        $results = ModelVehicule::insertVehicule(htmlspecialchars($_POST['marque']),htmlspecialchars($_POST['modele']),
                    htmlspecialchars($_POST['annee']),htmlspecialchars($_POST['immatriculation']),
                    htmlspecialchars($_POST['proprietaire']));
        include 'config.php';
        $vue = $root . 'app/view/administrateur/viewAjouterVehiculeAction.php';
        if (DEBUG){
            echo ("ControllerVehicule : ajouterVehiculeAction : vue = $vue");
        }
        require ($vue); 
    }
    
    // Affichage de la liste des vehicules du conducteur connecté
    public static function conducteurVehiculeListe() {
        include 'config.php';
        $id = $_SESSION['login_id'];
        $results = ModelVehicule::getMyVehicule($id);
        $vue = $root . 'app/view/conducteur/viewMyVehicule.php';
        if (DEBUG) {
            echo ("ControllerVehicule : conducteurVehiculeListe : vue = $vue");
        }
        require ($vue);
    }
}
?>
<!-- ----- fin ControllerVehicule -->