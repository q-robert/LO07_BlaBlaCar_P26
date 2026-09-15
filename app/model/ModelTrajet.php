<!-- ----- debut ModelTrajet -->
<?php
require_once 'Model.php';

class ModelTrajet {
    private $id, $ville_depart, $ville_arrivee, $conducteur_id, $vehicule_id, $prix, $date_depart, $heure_depart, $statut;

    // Constructeur de la class Trajet
    public function __construct($id = NULL, $ville_depart = NULL, $ville_arrivee = NULL, $conducteur_id = NULL, $vehicule_id = NULL, $prix = NULL, $date_depart = NULL, $heure_depart = NULL, $statut = NULL) {
        // valeurs nulles si pas de passage de parametres
        if (!is_null($id)) {
            $this->id = $id;
            $this->ville_depart = $ville_depart;
            $this->ville_arrivee = $ville_arrivee;
            $this->conducteur_id = $conducteur_id;
            $this->vehicule_id = $vehicule_id;
            $this->prix = $prix;
            $this->date_depart = $date_depart;
            $this->heure_depart = $heure_depart;
            $this->statut = $statut;
        }
    }

    // Ensembles des gettes et settes de la class Trajet : 
    public function getId() {
        return $this->id;
    }

    public function getVille_depart() {
        return $this->ville_depart;
    }

    public function getVille_arrivee() {
        return $this->ville_arrivee;
    }

    public function getConducteur_id() {
        return $this->conducteur_id;
    }

    public function getVehicule_id() {
        return $this->vehicule_id;
    }

    public function getPrix() {
        return $this->prix;
    }

    public function getDate_depart() {
        return $this->date_depart;
    }

    public function getHeure_depart() {
        return $this->heure_depart;
    }

    public function getStatut() {
        return $this->statut;
    }

    public function setId($id): void {
        $this->id = $id;
    }

    public function setVille_depart($ville_depart): void {
        $this->ville_depart = $ville_depart;
    }

    public function setVille_arrivee($ville_arrivee): void {
        $this->ville_arrivee = $ville_arrivee;
    }

    public function setConducteur_id($conducteur_id): void {
        $this->conducteur_id = $conducteur_id;
    }

    public function setVehicule_id($vehicule_id): void {
        $this->vehicule_id = $vehicule_id;
    }

    public function setPrix($prix): void {
        $this->prix = $prix;
    }

    public function setDate_depart($date_depart): void {
        $this->date_depart = $date_depart;
    }

    public function setHeure_depart($heure_depart): void {
        $this->heure_depart = $heure_depart;
    }

    public function setStatut($statut): void {
        $this->statut = $statut;
    }

    // Renvoie les trajets d'un conducteur à partir de son id
    public static function getMyTrajet($id) {
        try {
            $database = Model::getInstance();
            $query = "select vd.nom AS ville_depart, va.nom as ville_arrivee, t.date_depart, t.heure_depart, t.statut
                     from trajet t join ville vd on t.ville_depart = vd.id join ville va on t.ville_arrivee = va.id
                     where t.conducteur_id = :id";
            $statement = $database->prepare($query);
            $statement->execute(['id' => $id]);
            $results = $statement->fetchAll(PDO::FETCH_ASSOC);
            return $results;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }

    // Renvoie que les trajets actifs d'un conducteur à partir de son id
    public static function getMyTrajetActif($id) {
        try {
            $database = Model::getInstance();
            $query = "select t.id, vd.nom AS ville_depart, va.nom AS ville_arrivee, t.date_depart, t.heure_depart,
                     t.statut from trajet t join ville vd on t.ville_depart = vd.id join ville va on t.ville_arrivee = va.id
                     where t.conducteur_id = :id and t.statut = 'actif'";
            $statement = $database->prepare($query);
            $statement->execute(['id' => $id]);
            $results = $statement->fetchAll(PDO::FETCH_ASSOC);
            return $results;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }
    
    // Renvoie l'ensemble des trajets actifs
    public static function getAllTrajetActif() {
        try {
            $database = Model::getInstance();
            $query = "select t.id, vd.nom as ville_depart, va.nom as ville_arrivee, t.date_depart, t.heure_depart,
                t.statut from trajet t join ville vd on t.ville_depart = vd.id join ville va 
                on t.ville_arrivee = va.id where t.statut = 'actif' ";
            $statement = $database->prepare($query);
            $statement->execute();
            $results = $statement->fetchAll(PDO::FETCH_ASSOC);
            return $results;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }

    // Cloture un trajet avec son id
    public static function cloturerTrajet($trajet_id) {
        try {
            $database = Model::getInstance();
            $database->beginTransaction();
            $query = "select conducteur_id, prix from trajet where id = :id";
            $statement = $database->prepare($query);
            $statement->execute(['id' => $trajet_id]);
            $trajet = $statement->fetch(PDO::FETCH_ASSOC);
            if (!$trajet) {
                $database->rollBack();
                return false;
            }
            $conducteur_id = $trajet['conducteur_id'];
            $prix = $trajet['prix'];
            
            $query = "select passager_id from reservation where trajet_id = :id";
            $statement = $database->prepare($query);
            $statement->execute(['id' => $trajet_id]);
            $passagers = $statement->fetchAll(PDO::FETCH_ASSOC);

            $query = "update utilisateur set solde = solde - :prix where id = :id";
            $statement = $database->prepare($query);
            foreach ($passagers as $p) {
                $statement->execute(['prix' => $prix,'id' => $p['passager_id']]);
            }
            $query = "update utilisateur set solde = solde + :total where id = :id";
            $statement = $database->prepare($query);
            $statement->execute(['total' => $prix * count($passagers),'id' => $conducteur_id]);

            $query = "update trajet set statut = 'passif' where id = :id";
            $statement = $database->prepare($query);
            $statement->execute(['id' => $trajet_id]);

            $query = "delete from reservation where trajet_id = :id";
            $statement = $database->prepare($query);
            $statement->execute(['id' => $trajet_id]);

            $database->commit();
            return true;
            
        } catch (PDOException $e) {
            $database->rollBack();
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return false;
        }
    }

    // Ajoute dans la table trajet un nouveau trajet à partir de toutes les informations passées en paramètres
    public static function insertTrajet($conducteur_id, $ville_depart, $ville_arrivee, $vehicule_id, $prix, $date_depart, $heure_depart) {
        try {
            $database = Model::getInstance();
            // recherche de la valeur de la clé = max(id) + 1
            $query = "select max(id) from trajet";
            $statement = $database->query($query);
            $tuple = $statement->fetch();
            $id = $tuple['0'];
            $id++;
            // ajout d'un nouveau tuple;
            $query = "insert into trajet values  (:id, :ville_depart, :ville_arrivee, :conducteur_id, :vehicule_id, :prix, :date_depart, :heure_depart, :statut)";
            $statement = $database->prepare($query);
            $statement->execute([
                'id' => $id,
                'ville_depart' => $ville_depart,
                'ville_arrivee' => $ville_arrivee,
                'conducteur_id' => $conducteur_id,
                'vehicule_id' => $vehicule_id,
                'prix' => $prix,
                'date_depart' => $date_depart,
                'heure_depart' => $heure_depart,
                'statut' => 'actif',
            ]);
            return $id;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return -1;
        }
    }
}
?>
<!-- ----- fin ModelTrajet -->