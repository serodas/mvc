<?php 

class DefaultController extends ControladorBase{
    
    public function __construct(){
        parent::__construct();
    }

    public function index(){
        $this->view("layout", array(
            "Hola" => " HOla Mundo"
        ));
    }    
}