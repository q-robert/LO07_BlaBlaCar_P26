<!-- ----- debut ControllerReservation -->
<?php
require_once '../model/ModelReservation.php';

class ControllerReservation {
    
    // Récupère la liste des réservations de l'utilisateur connecté et l'affiche
    public static function passagerListeReservation() {
        include 'config.php';
        $id = $_SESSION['login_id'];
        $results = ModelReservation::getMyReservation($id);
        $vue = $root . 'app/view/passager/viewMyReservation.php';
        if (DEBUG){
            echo ("ControllerReservation : passagerListeReservations : vue = $vue");
        }
        require ($vue);
    }
    
    // Récupère l'ensemble des trajets actifs et affiche le formulaire pour choisir l'un de ces trajets
    public static function passagerReserverTrajetActifForm() {
        include 'config.php';
        $vue = $root . 'app/view/passager/viewPassagerReservationTrajetActifForm.php';
        $trajets = ModelTrajet::getAllTrajetActif();
        if (DEBUG){
            echo ("ControllerReservation : passagerReserverTrajetActifForm : vue = $vue");
        }
        require ($vue);
    }
    
    // Récupère l'id du trajet sélectionné et l'id de l'utilisateur connecté pour ajouter un trajet dans la table réservation
    public static function passagerReserverTrajetActifAction() {
        include 'config.php';
        $passager_id = $_SESSION['login_id'];
        $trajet_id = htmlspecialchars($_POST['trajet_id']);
        $value = ModelReservation::ajouterReservation($trajet_id,$passager_id);
        $vue = $root . 'app/view/passager/viewPassagerReservationTrajetActifAction.php';
        if (DEBUG){
            echo ("ControllerReservation : passagerReserverTrajetActifAction : vue = $vue");
        }
        require($vue);
    }
    
    // Ajoute 10 réservations aléatoires
    public static function ajout10ReservationsAleatoires(){
        include 'config.php';
        $results = ModelReservation::generer10ReservationsAleatoires();
        $vue = $root . 'app/view/utilisateur/viewAjouter10Reservations.php';
        if (DEBUG){
            echo ("ControllerReservation : ajout10ReservationsAleatoires : vue = $vue");
        }
        require ($vue);
    }
    
}
?>
<!-- ----- fin ControllerReservation -->