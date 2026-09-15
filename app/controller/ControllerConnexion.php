<!-- ----- debut ControllerConnexion -->
<?php
require_once '../model/ModelUtilisateur.php';

class ControllerConnexion {

    // Affiche le formulaire de connexion dans la page viewLogin.php
    public static function loginForm() {
        include 'config.php';
        $vue = $root . '/app/view/utilisateur/viewLogin.php';
        if (DEBUG) {
            echo ("ControllerConnexion : loginForm : vue = $vue");
        }
        require ($vue);
    }

    // Affiche la page d'accueil
    public static function viewBlaBlaCarAccueil() {
        include 'config.php';
        $vue = $root . '/app/view/viewBlaBlaCarAccueil.php';
        if (DEBUG) {
            echo ("ControllerConnexion : loginForm : vue = $vue");
        }
        require ($vue);
    }

    // Vérifie le login et password après avoir remplie le formulaire de connexion de loginForm
    public static function loginAction() {
        include 'config.php';
        if (isset($_POST['login']) && isset($_POST['password'])) {
            $login = $_POST['login'];
            $password = $_POST['password'];

            // Vérification dans la base de donné si le login et password sont correctes
            $utilisateur = ModelUtilisateur::getUtilisateurByLoginPassword($login, $password);

            // Si l'utilisateur est trouvé, on se connecte 
            // Et on remplie les variables de sessions avec les infos de sont profils
            if ($utilisateur != false) {
                $_SESSION['login_id'] = $utilisateur['id'];
                $_SESSION['nom'] = $utilisateur['nom'];
                $_SESSION['prenom'] = $utilisateur['prenom'];
                $_SESSION['role'] = $utilisateur['role'];
                $_SESSION['solde'] = $utilisateur['solde'];

                // On regarde quelle est le rôle de la personne qui vient de se connecter
                if ($_SESSION['role'] == 'administrateur') {
                    $vue = $root . 'app/view/administrateur/viewAccueil.php';
                    if (DEBUG) {
                        echo ("ControllerConnexion : loginAction (administrateur) : vue = $vue");
                    }
                    require ($vue);
                } elseif ($_SESSION['role'] == 'conducteur') {
                    $vue = $root . 'app/view/conducteur/viewAccueil.php';
                    if (DEBUG) {
                        echo ("ControllerConnexion : loginAction (conducteur) : vue = $vue");
                    }

                    require ($vue);
                } elseif ($_SESSION['role'] == 'passager') {
                    $vue = $root . 'app/view/passager/viewAccueil.php';
                    if (DEBUG)
                        echo ("ControllerConnexion : loginAction  (passager) : vue = $vue");
                    require ($vue);
                }
            } else {
                $vue = $root . 'app/view/utilisateur/viewLoginError.php';
                if (DEBUG) {
                    echo ("ControllerConnexion : loginAction (erreur, il n'a pas de rôle connu) : vue = $vue");
                }
                require ($vue);
                exit();
            }
        }

        // échec du login ou du mot de passe
        else {
            $vue = $root . 'app/view/utilisateur/viewLoginError.php';
            if (DEBUG) {
                echo ("ControllerConnexion : loginAction (le login ou mdf est faux) : vue = $vue");
            }
            require ($vue);
            exit();
        }
    }

    // Déconnexion de l'utilisateur
    public static function deconnexion() {
        include 'config.php';
        $_SESSION = [];
        $_SESSION['login_id'] = -1;
        $vue = $root . 'app/view/viewBlaBlaCarAccueil.php';
        if (DEBUG) {
            echo ("ControllerConnexion : deconnexion : vue = $vue");
        }
        require ($vue);
        exit();
    }

    // Affichage de la vue qui propose une fonctionnalité originale
    public static function proposezFonctionnaliteOriginale() {
        include 'config.php';
        $vue = $root . 'app/view/innovations/viewFonctionnaliteOriginale.php';
        if (DEBUG) {
            echo ("ControllerConnexion : proposezFonctionnaliteOriginale : vue = $vue");
        }
        require ($vue);
    }

    // Affichage de la vue qui propose une possibilité d'amélioration du MVC
    public static function proposezAmeliorationMVC() {
        include 'config.php';
        $vue = $root . 'app/view/innovations/viewAmeliorationMVC.php';
        if (DEBUG) {
            echo ("ControllerConnexion : proposezAmeliorationMVC : vue = $vue");
        }
        require ($vue);
    }

    // Affiche la page d'accueil des administrateurs
    public static function viewAccueilAdmin() {
        include 'config.php';
        $vue = $root . '/app/view/administrateur/viewAccueil.php';
        if (DEBUG) {
            echo ("ControllerConnexion : viewAccueilAdmin : vue = $vue");
        }
        require ($vue);
    }

    // Affiche la page d'accueil des conducteurs
    public static function viewAccueilConducteur() {
        include 'config.php';
        $vue = $root . '/app/view/conducteur/viewAccueil.php';
        if (DEBUG) {
            echo ("ControllerConnexion : viewAccueilConducteur : vue = $vue");
        }
        require ($vue);
    }
    
    // Affiche la page d'accueil des passagers
    public static function viewAccueilPassager() {
        include 'config.php';
        $vue = $root . '/app/view/passager/viewAccueil.php';
        if (DEBUG) {
            echo ("ControllerConnexion : viewAccueilPassager : vue = $vue");
        }
        require ($vue);
    }
}
?>
<!-- ----- fin ControllerConnexion -->