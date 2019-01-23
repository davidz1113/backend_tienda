<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

require '../backend_tienda/conexion.php';

class Usuario
{

    function __construct()
    {

    }

    /**
     * @param $correo
     * @param $contrasenia
     */
    public static function logearUsuario($correo, $contrasenia)
    {
        $consulta = 'select * from usuario where correo=? and contrasenia =?';
        try {
            $sentencia = Database::getInstance()->getDb()->prepare($consulta);
            $sentencia->execute(array($correo, $contrasenia));
            return $sentencia->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $ex) {
            return false;
        }
    }

    
}



?>