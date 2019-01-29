<?php

class CuartoModelo extends BaseModelo{
    
     public function __construct() {
     parent::__construct();
 }

    public function estadocuarto($idcuarto){
     
        $query = "SELECT motivo FROM tbcuarto where  idcuarto= $idcuarto ";
        $estado = $this->Conectar()->prepare($query);
        $estado->execute();
        $e = $estado->fetch();
          
        foreach ($e as $key) {
            $resultado = $key;
        }
        if ($resultado=='LIBRE'){
            RETURN true;
        }else{
            RETURN false;
        }
    }
    
    public function cuartoslibres($idservicio){
        
        $libres = "SELECT * FROM tbcuarto WHERE motivo='LIBRE' AND idservicio=$idservicio order by idcuarto";
        $arreglo = $this->Conectar()->query($libres);
        echo '<select class="form-control" name="idcuarto" id="idcuarto">';
        for ($i=0; $row = $arreglo->fetch();$i++){
            echo "<option value=".$row['idcuarto'].">".$row['numcuarto']."</option>";
        }
        echo '</select>';
    }

    public function ocupar($idcuarto){
  
        $actualizar ="UPDATE tbcuarto SET motivo='OCUPADO' WHERE idcuarto= $idcuarto";
        
        $a = $this->Conectar()->prepare($actualizar);
        $a->execute();
    }
    
    public function liberar($idcuarto){
       
        $actualizar ="UPDATE tbcuarto SET motivo='LIBRE' WHERE idcuarto= $idcuarto";
        
        $a = $this->Conectar()->prepare($actualizar);
        $a->execute();
    }
    
    
}


