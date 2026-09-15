<!-- ----- debut ControllerVille -->
<?php
require_once '../model/ModelVille.php';

class ControllerVille {

    // Affiche la liste des villes
    public static function villeListe() {
        $results = ModelVille::getAll();
        include 'config.php';
        $vue = $root . 'app/view/administrateur/viewAllVille.php';
        if (DEBUG) {
            echo ("ControllerVille : villeListe : vue = $vue");
        }
        require ($vue);
    }

    // Affiche le formulaire pour ajouter une ville
    public static function ajouterVilleForm() {
        include 'config.php';
        $vue = $root . 'app/view/administrateur/viewAjouterVilleForm.php';
        if (DEBUG){
            echo ("ControllerVille : ajouterVilleForm : vue = $vue");
        }
        require ($vue);
    }

    // Ajoute la ville et affiche les informations concernant celle-ci
    public static function ajouterVilleAction() {
        $results = ModelVille::insertVille(htmlspecialchars($_POST['nom']));
        include 'config.php';
        $vue = $root . 'app/view/administrateur/viewAjouterVilleAction.php';
        if (DEBUG){
            echo ("ControllerVille : ajouterVilleAction : vue = $vue");
        }
        require ($vue);
    }
}
?>
<!-- ----- fin ControllerVille -->