<!-- ----- debut ModelUtilisateur -->
<?php
require_once 'Model.php';

class ModelUtilisateur {

    private $id, $nom, $prenom, $role, $login, $password, $solde;

    // Constructeur de la class Utilisateur
    public function __construct($id = NULL, $nom = NULL, $prenom = NULL, $role = NULL, $login = NULL, $password = NULL, $solde = NULL) {
        // valeurs nulles si pas de passage de parametres
        if (!is_null($id)) {
            $this->id = $id;
            $this->nom = $nom;
            $this->prenom = $prenom;
            $this->role = $role;
            $this->login = $login;
            $this->password = $password;
            $this->solde = $solde;
        }
    }

    // Ensembles des gettes et settes de la class Utilisateur : 
    public function getNom() {
        return $this->nom;
    }

    public function getPrenom() {
        return $this->prenom;
    }

    public function getRole() {
        return $this->role;
    }

    public function getLogin() {
        return $this->login;
    }

    public function getPassword() {
        return $this->password;
    }

    public function getSolde() {
        return $this->solde;
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

    public function setPrenom($prenom): void {
        $this->prenom = $prenom;
    }

    public function setRole($role): void {
        $this->role = $role;
    }

    public function setLogin($login): void {
        $this->login = $login;
    }

    public function setPassword($password): void {
        $this->password = $password;
    }

    public function setSolde($solde): void {
        $this->solde = $solde;
    }

    // Renvoie le solde l'utilisateur connecté
    public static function getSolde1($id) {
        try {
            $database = Model::getInstance();
            $query = "select solde from utilisateur where id = :id";
            $statement = $database->prepare($query);
            $statement->execute(['id' => $id]);
            $result = $statement->fetch(PDO::FETCH_ASSOC);
            return $result['solde'] ?? 0;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }

    // Renvoie une liste de l'ensemble des utilisateurs avec toutes leurs informations
    public static function getAll() {
        try {
            $database = Model::getInstance();
            $query = "select * from utilisateur";
            $statement = $database->prepare($query);
            $statement->execute();
            $results = $statement->fetchAll(PDO::FETCH_CLASS, "ModelUtilisateur");
            return $results;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }

    // Renvoie la liste des passagers d'un trajet à partir de son id
    public static function getPassagersByTrajetId($trajet_id) {
        try {
            $database = Model::getInstance();
            $query = " select u.nom, u.prenom from reservation r join utilisateur u
                on r.passager_id = u.id where r.trajet_id = :trajet_id";
            $statement = $database->prepare($query);
            $statement->execute(['trajet_id' => $trajet_id]);
            return $statement->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }

    // Renvoie les id des passagers qui sont inscrit sur le trajet ($trajet_id)
    public static function getPassagersIdByTrajetId($trajet_id) {
        try {
            $database = Model::getInstance();
            $query = " select u.id from reservation r join utilisateur u
                on r.passager_id = u.id where r.trajet_id = :trajet_id";
            $statement = $database->prepare($query);
            $statement->execute(['trajet_id' => $trajet_id]);
            return $statement->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }

    // Ajoute un conducteur à partir de son nom, prenom et son solde
    public static function insertConducteur($nom, $prenom, $solde) {
        try {
            $database = Model::getInstance();
            // recherche de la valeur de la clé = max(id) + 1
            $query = "select max(id) from utilisateur";
            $statement = $database->query($query);
            $tuple = $statement->fetch();
            $id = $tuple['0'];
            $id++;
            // ajout d'un nouveau tuple;
            $query = "insert into utilisateur value (:id, :nom, :prenom, :role, :login, :password, :solde)";
            $statement = $database->prepare($query);
            $statement->execute([
                'id' => $id,
                'nom' => $nom,
                'prenom' => $prenom,
                'role' => 'conducteur',
                'login' => strtolower($nom . $prenom),
                'password' => 'secret',
                'solde' => $solde
            ]);
            return $id;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return -1;
        }
    }

    // Ajoute un passager à partir de son nom, prenom et son solde
    public static function insertPassager($nom, $prenom, $solde) {
        try {
            $database = Model::getInstance();
            // recherche de la valeur de la clé = max(id) + 1
            $query = "select max(id) from utilisateur";
            $statement = $database->query($query);
            $tuple = $statement->fetch();
            $id = $tuple['0'];
            $id++;
            // ajout d'un nouveau tuple;
            $query = "insert into utilisateur value (:id, :nom, :prenom, :role, :login, :password, :solde)";
            $statement = $database->prepare($query);
            $statement->execute([
                'id' => $id,
                'nom' => $nom,
                'prenom' => $prenom,
                'role' => 'passager',
                'login' => strtolower($nom . $prenom),
                'password' => 'secret',
                'solde' => $solde
            ]);
            return $id;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return -1;
        }
    }

    // Renvoie la liste des conducteurs sans doublon
    public static function conducteurListeSansDoublon() {
        try {
            $database = Model::getInstance();
            $query = "select id,nom,prenom from utilisateur where role='conducteur'";
            $statement = $database->prepare($query);
            $statement->execute();
            $results = $statement->fetchAll(PDO::FETCH_ASSOC);
            return $results;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return NULL;
        }
    }

    // Renvoie un utilisateur à partir du login et password
    public static function getUtilisateurByLoginPassword($login, $password) {
        try {
            $database = Model::getInstance();
            $requete = "select * from utilisateur where login = :login and password = :password";
            $statement = $database->prepare($requete);
            $statement->execute([
                'login' => $login,
                'password' => $password
                    ]);
            $resultat = $statement->fetch(PDO::FETCH_ASSOC);
            return $resultat;
        } catch (PDOException $e) {
            printf("%s - %s<p/>\n", $e->getCode(), $e->getMessage());
            return false;
        }
    }
}
?>
<!-- ----- fin ModelUtilisateur -->