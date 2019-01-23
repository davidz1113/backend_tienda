<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require '../backend_tienda/conexion.php';

class Producto{

    function __construct()
    {
        
    }

    public static function obtenerTodosProductos(){
        $consulta = 'select * from producto';
        try {
            $sentencia = Database::getInstance()->getDb()->prepare($consulta);
            $sentencia->execute();
            return $sentencia->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $ex) {
            return false;
        }
    }

}