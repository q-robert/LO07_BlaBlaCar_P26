<!-- ----- debut Model -->
<?php

class Model extends PDO {

    private static $_instance;

    // Constructeur : héritage public obligatoire par héritage de PDO
    public function __construct() {
        
    }

    //Singleton
    public static function getInstance() {
        // les variables sont définies dans le fichier config.php
        include '../controller/config.php';
        if (DEBUG) {
            echo ("Model : getInstance : dsn = $dsn</br>");
        }
        $options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);

        if (isset(self::$_instance) == FALSE) {
            try {
                self::$_instance = new PDO($dsn, $username, $password, $options);
            } catch (Exception $ex) {
                printf("%s- %s</p> \n", $e->getCode(), $e->getMessage());
            }
        }
        return self::$_instance;
    }
}
?>
<!-- ----- fin Model -->