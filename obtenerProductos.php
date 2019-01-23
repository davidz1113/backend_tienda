<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include './producto.php';
header('Access-Control-Allow-Origin: *');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $body = json_decode(file_get_contents("php://input"), true);

}

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (isset($_GET["opcion"]) && !empty($_GET["opcion"])) {
        $opcion = $_GET["opcion"];
        if ($opcion == '1') {//obtener todos los productos
            $productos = Producto::obtenerTodosProductos();
            if($productos){
                $mensaje["estado"]=1;
                $mensaje["productos"]=$productos;
            }else{
                $mensaje["estado"]=2;
                $mensaje["mensaje"]='Error al obtener los productos';
            }
        }
        print json_encode($mensaje);
    }
}