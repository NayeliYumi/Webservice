<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

class conexion extends PDO {
    private $host = 'sql308.infinityfree.com';
    private $bd = 'if0_36835495_Colegio5deJunio';
    private $usuario = 'if0_36835495';
    private $passw = 'WwQuzWEhtK';

    public function __construct() {
        try {
            parent::__construct('mysql:host=' . $this->host . ';dbname=' . $this->bd . ';charset=utf8', $this->usuario, $this->passw, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
           // echo 'Conexión exitosa';
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
            exit;
        }
    }
}

// Intentar crear una instancia de la clase para probar la conexión
new conexion();


?>
