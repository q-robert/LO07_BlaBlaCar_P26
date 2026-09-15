<!-- ----- debut ModelVille -->
<?php
require_once 'Model.php';

class ModelVille {

    private $id, $nom;

    // Constructeur de la class Ville
    public function __construct($id = NULL, $nom = NULL) {
        // valeurs nulles si pas de passage de parametres
        if (!is_null($id)) {
            $this->id = $id;
            $this->nom = $nom;
        }
    }

    // Ensemble des gettes/setters da la classe Ville
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
    
    // Ajoute une nouvelle ville dans la table ville
    public static function insertVille($nom) {
        try {
            $database = Model::getInstance();
            // recherche de la valeur de la clé = max(id) + 1
            $query = "select max(id) from ville";
            $statement = $database->query($query);
            $tuple = $statement->fetch();
            $id = $tuple['0'];
            $id++;
            // ajout d'un nouveau tuple;
            $query = "insert into ville value (:id, :nom)";
            $statement = $database->prepare($query);
            $statement->execute([
                'id' => $id,
                'nom' => $nom,
            ]);
            return $id;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return -1;
        }
    }
    
    // Renvoie une liste contenant l'ensemble des villes de la table ville
    public static function getAll() {
        try {
            $database = Model::getInstance();
            $query = "select * from ville";
            $statement = $database->prepare($query);
            $statement->execute();
            $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelVille");
            return $results;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }
}
?>
<!-- ----- fin ModelVille -->