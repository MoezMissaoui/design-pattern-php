<?php

// Singleton pour connecter au bd.
class ConnexionBD
{
    // Gardez l'instance de classe.
    private static $instance = null;
    private $conn;

    // La connexion au bd est établie dans le constructeur privé.
    private function __construct()
    {
        $this->conn = new PDO("mysql:host=localhost; dbname=shorturl", "root", "cc");
    }

    public static function getInstance()
    {
        if (!self::$instance) {
            try {
                self::$instance = new ConnexionBD();
            } catch (\Throwable $th) {
                echo "There is a probleme db cnx !";
            }
        }

        return self::$instance;
    }

    public function getConnection()
    {
        return $this->conn;
    }
}


$instance = ConnexionBD::getInstance();
if ($instance) {
    $conn = $instance->getConnection();
    var_dump($conn);
}
