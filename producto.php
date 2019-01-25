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

    
    public static function insertarActualizarProducto($arrayObjs) {
        $sql = "insert into producto(idproducto,unidades) values ";
        //rECORREMOS EL ARRAY Y SE ARMA LA CONSULTA INSERT POR CADA OBJETO
    foreach ($arrayObjs as $obj) {
            $sql = $sql . "(" . $obj["idproducto"] . "," . $obj["unidades"] . "),";
        }
        //aL FINAL SUBSTRAEMOS LA CADENA LA ULTIMA COMA Y LE AGREGAMOS UN PUNTO Y COMA AL FINAL
        $sql = substr($sql, 0, -1) . " ON DUPLICATE KEY UPDATE unidades=VALUES(unidades);";
        //echo $sql;
        //return;
         try {
             $sentencia = Database::getInstance()->getDb()->prepare($sql);
               return $sentencia->execute();
             } catch (Exception $ex) {
                 return false;
         }
    }

}