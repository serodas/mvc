<?php

class BaseModelo {
 private $conectar;
 
    public function __construct() {
        
        require_once 'Conexion.php';
        $this->conectar = new Conexion();
    }
    
 public function Conectar(){
     return $this->conectar;
 }
  
}
