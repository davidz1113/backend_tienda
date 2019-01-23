<?php

include './usuario.php';


if ($_SERVER['REQUEST_METHOD'] == 'GET') {

    if (isset($_GET["opcion"]) && !empty($_GET["opcion"])) {
        $opcion = $_GET["opcion"];

        if ($opcion == '1') {//logear usuario
            $correo = $_GET['correo'];
            $contrasenia = $_GET['contrasenia'];

            $usuario = Usuario::logearUsuario($correo, $contrasenia);
            if ($usuario) {
                $mensaje["estado"] = 1;
                $mensaje["usuario"] = $usuario;
            } else {
                $mensaje["estado"] = 2;
                $mensaje["mensaje"] = 'Correo o contraseña incorrectos';
            }
        }
        print json_encode($mensaje);
    }
}