<?php

class ControladorBase {
        public function __construct() {
            require_once 'BaseModelo.php';
            
            foreach (glob("modelo/*.php") as $file){
                require_once $file;
            }
        }
        
        public function view($vista,$datos){
            foreach ($datos as $id_assoc => $valor){
                ${$id_assoc} = $valor;
            }
            
            require_once 'libs/AyudaVistas.php';
            $helper = new AyudaVistas();
            
            require_once 'vistas/'.$vista.'View.php';
        }
        
        public function redirect($controlador,$accion){
            header("Location:index.php?controlador=".$controlador."&action=".$accion);
        }
}
