<!-- ----- debut ModelVehicule -->
<?php
require_once 'Model.php';

class ModelVehicule {

    private $id, $marque, $modele, $annee, $immatriculation, $proprietaire_id;

    // Constructeur de la class Vehicule
    public function __construct($id = NULL, $marque = NULL, $modele = NULL, $annee = NULL, $immatriculation = NULL, $proprietaire_id = NULL) {
        // valeurs nulles si pas de passage de parametres
        if (!is_null($id)) {
            $this->id = $id;
            $this->marque = $marque;
            $this->modele = $modele;
            $this->annee = $annee;
            $this->immatriculation = $immatriculation;
            $this->proprietaire_id = $proprietaire_id;
        }
    }

    // Ensemble des gettes et setters de la class Vehicule :
    public function getNom() {
        return $this->nom;
    }

    function getId() {
        return $this->id;
    }

    function setId($id) {
        $this->id = $id;
    }

    public function setNom($nom): void {
        $this->nom = $nom;
    }

    public function getMarque() {
        return $this->marque;
    }

    public function getModele() {
        return $this->modele;
    }

    public function getAnnee() {
        return $this->annee;
    }

    public function getImmatriculation() {
        return $this->immatriculation;
    }

    public function getProprietaire_id() {
        return $this->proprietaire_id;
    }

    public function setMarque($marque): void {
        $this->marque = $marque;
    }

    public function setModele($modele): void {
        $this->modele = $modele;
    }

    public function setAnnee($annee): void {
        $this->annee = $annee;
    }

    public function setImmatriculation($immatriculation): void {
        $this->immatriculation = $immatriculation;
    }

    public function setProprietaire_id($proprietaire_id): void {
        $this->proprietaire_id = $proprietaire_id;
    }

    // Ajoute un véhicule dans la table vehicule à partir de son/sa marque, modele, annee, immatriculation et l'id de son propriétaire
    public static function insertVehicule($marque, $modele, $annee, $immatriculation, $proprietaire_id) {
        try {
            $database = Model::getInstance();
            // recherche de la valeur de la clé = max(id) + 1
            $query = "select max(id) from vehicule";
            $statement = $database->query($query);
            $tuple = $statement->fetch();
            $id = $tuple['0'];
            $id++;
            // ajout d'un nouveau tuple;
            $query = "insert into vehicule values (:id, :marque, :modele, :annee, :immatriculation, :proprietaire_id)";
            $statement = $database->prepare($query);
            $statement->execute([
                'id' => $id,
                'marque' => $marque,
                'modele' => $modele,
                'annee' => $annee,
                'immatriculation' => $immatriculation,
                'proprietaire_id' => $proprietaire_id,
            ]);
            return $id;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return -1;
        }
    }

    // Renvoie une liste de l'ensemble des vehicules
    public static function getAll() {
        try {
            $database = Model::getInstance();
            $query = " select marque, modele, annee, immatriculation, nom, prenom from vehicule, utilisateur
            where proprietaire_id = utilisateur.id ";
            $statement = $database->prepare($query);
            $statement->execute();
            $results = $statement->fetchAll(PDO::FETCH_ASSOC);
            return $results;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }

    // Renvoie les vehicules du conducteur à partir de son id
    public static function getMyVehicule($id) {
        try {
            $database = Model::getInstance();
            $query = "select * from vehicule where vehicule.proprietaire_id=$id";
            $statement = $database->prepare($query);
            $statement->execute();
            $results = $statement->fetchAll(PDO::FETCH_ASSOC);
            return $results;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }
}
?>
<!-- ----- fin ModelVehicule -->