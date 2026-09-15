<!-- ----- debut ModelReservation -->

<?php
require_once 'Model.php';

class ModelReservation {
    private $id, $trajet_id, $passager_id;

    // Constructeur de la class Reservation
    public function __construct($id = NULL, $trajet_id = NULL, $passager_id = NULL) {
        // valeurs nulles si pas de passage de parametres
        if (!is_null($id)) {
            $this->id = $id;
            $this->trajet_id = $trajet_id;
            $this->passager_id = $passager_id;
        }
    }
    
    // Ensembles des gettes et settes de la class Reservation : 
    public function getId() {
        return $this->id;
    }

    public function getTrajet_id() {
        return $this->trajet_id;
    }

    public function getPassager_id() {
        return $this->passager_id;
    }

    public function setId($id): void {
        $this->id = $id;
    }

    public function setTrajet_id($trajet_id): void {
        $this->trajet_id = $trajet_id;
    }

    public function setPassager_id($passager_id): void {
        $this->passager_id = $passager_id;
    }

    // Renvoie toutes les réservations du passager connecté avec son id
    public static function getMyReservation($id) {
        try {
            $database = Model::getInstance();
            $query = "select t.id, t.date_depart, t.heure_depart, vd.nom AS ville_depart, va.nom AS ville_arrivee,
                     u.nom AS conducteur_nom, u.prenom AS conducteur_prenom, v.marque, v.modele, v.immatriculation
                     from reservation r join trajet t on r.trajet_id = t.id join ville vd on t.ville_depart = vd.id
                     join ville va on t.ville_arrivee = va.id join utilisateur u on t.conducteur_id = u.id 
                     join vehicule v on t.vehicule_id = v.id where r.passager_id = :id";
            $statement = $database->prepare($query);
            $statement->execute([
                'id' => $id
            ]);
            $results = $statement->fetchAll(PDO::FETCH_ASSOC);
            return $results;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }

    // Ajoute une réservation avec l'id du trajet et l'id du passager eet renvoie TRUE si l'insertion est bonne sinon FALSE
    public static function ajouterReservation($trajet_id, $passager_id) {
        try {
            $database = Model::getInstance();
            // recherche de la valeur de la clé = max(id) + 1
            $query = "select max(id) from reservation";
            $statement = $database->query($query);
            $tuple = $statement->fetch();
            $id = $tuple['0'];
            $id++;
            // ajout d'un nouveau tuple;
            $query = "insert into reservation values (:id, :trajet_id, :passager_id)";
            $statement = $database->prepare($query);
            $statement->execute([
                'id' => $id,
                'trajet_id' => $trajet_id,
                'passager_id' => $passager_id,
            ]);
            return TRUE;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return FALSE;
        }
    }

    // Génère 10 réservations aléatoirements
    public static function generer10ReservationsAleatoires() {
        try {
            $db = Model::getInstance();
            // Récupération des trajets actifs
            $query = "select id from trajet where statut = 'actif'";
            $stmt = $db->prepare($query);
            $stmt->execute();
            $trajets = $stmt->fetchAll(PDO::FETCH_ASSOC);

            // Récupération des passagers
            $query = "select id  from utilisateur where role = 'passager'";
            $stmt = $db->prepare($query);
            $stmt->execute();
            $passagers = $stmt->fetchAll(PDO::FETCH_ASSOC);

            // Création de 10 réservations aléatoires
            for ($i = 0; $i < 10; $i++) {
                $trajet = $trajets[array_rand($trajets)];
                $passager = $passagers[array_rand($passagers)];

                // Génération de l'id
                $query = "select max(id) from reservation";
                $id = $db->query($query)->fetchColumn();
                $id++;

                // Insertion
                $query = "insert into reservation values (:id, :trajet_id, :passager_id)";
                $stmt = $db->prepare($query);
                $stmt->execute(['id' => $id,'trajet_id' => $trajet['id'],'passager_id' => $passager['id']]);
            }

            // Résultat à afficher
            $query = "select vd.nom as ville_depart, va.nom as ville_arrivee, u.nom, u.prenom
                     from reservation r join trajet t on r.trajet_id = t.id join ville vd
                     on t.ville_depart = vd.id join ville va on t.ville_arrivee = va.id
                     join utilisateur u on r.passager_id = u.id order by r.id desc limit 10";
            $stmt = $db->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }
}
?>
<!-- ----- fin ModelReservation -->