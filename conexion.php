<?php

/*

 * To change this license header, choose License Headers in Project Properties.

 * To change this template file, choose Tools | Templates

 * and open the template in the editor.

 */
require_once '../backend_tienda/login_mysql.php';

class Database {
    
    /**

     * Única instancia de la clase

     */
    private static $db = null;

    /**

     * Instancia de PDO

     */
    private static $pdo ;

    final private function __construct() {
     
        try {

            // Crear nueva conexión PDO

            self::getDb();
        } catch (PDOException $e) {

            // Manejo de excepciones
        }
    }

    /**

     * Retorna en la única instancia de la clase

     * @return Database|null

     */
    public static function getInstance() {

        if (self::$db === null) {

            self::$db = new self();
        }

        return self::$db;
    }

    /**

     * Crear una nueva conexión PDO basada

     * en los datos de conexión

     * @return PDO Objeto PDO

     */
    public function getDb() {



        if (self::$pdo == null) {

            self::$pdo = new PDO(
                    'mysql:dbname=' . DATABASE .
                    ';host=' . HOSTNAME ,
                   // ';port:63343;', // Eliminar este elemento si se usa una instalación por defecto
                    USERNAME, PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8")
            );

            // Habilitar excepciones

            self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }

        return self::$pdo;
    }

    /**

     * Evita la clonación del objeto

     */
    final protected function __clone() {
        
    }

    function _destructor() {
        
        self::$pdo = null;
        self::$db=null;
    }
    
   

}