<?php

class ServicioModelo extends BaseModelo{
    
 public function __construct() {
     parent::__construct();
 }

 public function listarServ (){
        //$conexion = new Conexion();
        $libres = "SELECT * FROM tbservicio";
        //$arreglo = $conexion->query($libres);
        $arreglo = $this->Conectar()->query($libres);
        echo '<select class="form-control" name="servicio" id="servicio" required>';
        for ($i=0; $row = $arreglo->fetch();$i++){
            echo "<option value=".$row['idservicio'].">".$row['descripcion']."</option>";
        }
        echo '</select>';
  }
}
