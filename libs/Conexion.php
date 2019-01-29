<?php

class Conexion extends PDO { 
   private $tipo_de_base = 'mysql';
   private $host = 'localhost';
   private $nombre_de_base = 'bdcenso';
   private $usuario = 'root';
   private $contrasena = '';
         
    function __construct() {
      //Sobreescribo el método constructor de la clase PDO.
      try{
         parent::__construct($this->tipo_de_base.':host='.$this->host.';dbname='.$this->nombre_de_base, $this->usuario, $this->contrasena);
      }
      catch(PDOException $e){
         echo 'Ha surgido un error y no se puede conectar a la base de datos. Detalle: ' . $e->getMessage();
         exit;
      }
    }
   
    public function obtenerFecha(){
        return date("Y-m-d");
    }
    
    public function obtenerIp(){
        return $_SERVER['REMOTE_ADDR'];
    }
   
}





 

 
 
 



    
    




