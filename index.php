<?php

require_once 'config/global.php';

require_once 'libs/ControladorBase.php';

require_once 'libs/ControladorFrontal.func.php';

if (isset($_GET["controller"])){
    $controllerObj = cargarControlador($_GET["controller"]);
} else {
    $controllerObj = cargarControlador(CONTROLADOR_DEFECTO);
}

lanzarAccion($controllerObj);