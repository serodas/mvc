<?php


class AyudaVistas {
   public function url($controlador,$accion){
       $urlString="index.php?controlador=".$controlador."&action=".$accion;
       return $urlString;
   }
   
}
