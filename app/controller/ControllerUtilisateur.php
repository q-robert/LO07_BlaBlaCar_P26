<!-- ----- debut ControllerUtilisateur -->
<?php
require_once '../model/ModelUtilisateur.php';

class ControllerUtilisateur {

    // Affichage de la liste des utilisateurs
    public static function utilisateurListe() {
        $results = ModelUtilisateur::getAll();
        include 'config.php';
        $vue = $root . 'app/view/administrateur/viewAllUtilisateur.php';
        if (DEBUG){
            echo ("ControllerUtilisateur : utilisateurListe : vue = $vue");
        }
        require ($vue);
    }

    // Affichage des supers globales utilisées (COOKIE et SESSION)
    public static function superGlobales() {
        include 'config.php';
        $vue = $root . 'app/view/utilisateur/viewSuperGlobales.php';
        if (DEBUG) {
            echo ("ControllerUtilisateur : superGlobales : vue = $vue");
        }
        require ($vue);
    }

    // Affiche le formulaire pour ajouter un conducteur
    public static function ajouterConducteurForm() {
        include 'config.php';
        $vue = $root . 'app/view/administrateur/viewAjouterConducteurForm.php';
        if (DEBUG){
            echo ("ControllerUtilisateur : ajouterConducteurForm : vue = $vue");
        }
        require ($vue);
    }

    // Ajoute un conducteur et affiche les informations sur le nouveau conducteur
    public static function ajouterConducteurAction() {
        $results = ModelUtilisateur::insertConducteur(
                htmlspecialchars($_POST['nom']), htmlspecialchars($_POST['prenom']), htmlspecialchars($_POST['solde'])
        );
        include 'config.php';
        $vue = $root . 'app/view/administrateur/viewAjouterConducteurAction.php';
        if (DEBUG){
            echo ("ControllerUtilisateur : ajouterConducteurAction : vue = $vue");
        }
        require ($vue);
    }

    // Affiche le formulaire pour ajouter un passager
    public static function ajouterPassagerForm() {
        include 'config.php';
        $vue = $root . 'app/view/administrateur/viewAjouterPassagerForm.php';
        if (DEBUG){
            echo ("ControllerUtilisateur : ajouterPassagerForm : vue = $vue");
        }
        require ($vue);
    }

    // Ajoute un passager et affiche les informations sur le nouveau passager
    public static function ajouterPassagerAction() {
        $results = ModelUtilisateur::insertPassager(
                htmlspecialchars($_POST['nom']), htmlspecialchars($_POST['prenom']), htmlspecialchars($_POST['solde'])
        );
        include 'config.php';
        $vue = $root . 'app/view/administrateur/viewAjouterPassagerAction.php';
        if (DEBUG){
            echo ("ControllerUtilisateur : ajouterPassagerAction : vue = $vue");
        }
        require ($vue);
    }
}
?>
<!-- ----- fin ControllerUtilisateur -->