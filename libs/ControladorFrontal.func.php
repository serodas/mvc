<?php

function cargarControlador($controller){
    $controlador= ucwords($controller).'Controller';
    $strFileController='controlador/'.$controlador.'.php';
    
    if(!is_file($strFileController)){
        $strFileController='controlador/'.ucwords(CONTROLADOR_DEFECTO).'Controller.php';
    }
    
    require_once $strFileController;
    $controllerObject = new $controlador();
    return $controllerObject;
}


function cargarAccion($controllerObj,$action){
    $accion=$action;
    $controllerObj->$accion();
}

function lanzarAccion($controllerObj){
    if(isset($_GET["action"]) and method_exists($controllerObj, $_GET["action"])){
        cargarAccion($controllerObj, $_GET["action"]);
    }
    else{
        cargarAccion($controllerObj, ACCION_DEFECTO);
    }
}