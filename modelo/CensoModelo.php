<?php

class CensoModelo extends BaseModelo{
    
    public function __construct() {
     parent::__construct();
 }

    function setCuarto($cuarto) {
        $this->cuarto = $cuarto;
    }

    function setTipo($tipo) {
        $this->tipo = $tipo;
    }

    function setNum($num) {
        $this->num = $num;
    }

    function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    function setEdad($edad) {
        $this->edad = $edad;
    }

    function setDiagno($diagno) {
        $this->diagno = $diagno;
    }

    function setMedico($medico) {
        $this->medico = $medico;
    }

    function setObserva($observa) {
        $this->observa = $observa;
    }

    function setMnz($mnz) {
        $this->mnz = $mnz;
    }

    function setTf($tf) {
        $this->tf = $tf;
    }

    function setTr($tr) {
        $this->tr = $tr;
    }

    function setAnti($anti) {
        $this->anti = $anti;
    }

    function setEntidad($entidad) {
        $this->entidad = $entidad;
    }

    function setDieta($dieta) {
        $this->dieta = $dieta;
    }

    function setRiesgo($riesgo) {
        $this->riesgo = $riesgo;
    }

    function setUsuario($usuario) {
        $this->usuario = $usuario;
    }

    function setEquipo($equipo) {
        $this->equipo = $equipo;
    }

    function setIp($ip) {
        $this->ip = $ip;
    }

    function setFechamod($fechamod) {
        $this->fechamod = $fechamod;
    }

        
public function guardar($cuarto,$tipo,$num,$nombre,$edad,$diagno,$medico,$observa,$mnz,$tf,$tr,$anti,$entidad,$dieta,$riesgo,$usuario,$equipo,$ip,$fechamod)
        {
       
        $cuarto = new CuartoModelo();
        
        if ($cuarto->estadocuarto($this->cuarto))
        {
        $consulta= $this->Conectar()->prepare("INSERT INTO tbcenso(idcuarto,tipodoc,numerodoc,nombre,edad,diagnostico,medico,observacion,mnz,tf,tr,anticoagulacion,entidad,dieta,riesgo,usuario,equipo,ip,fechamod)
                                       VALUES(:cuarto,:tipo,:doc,:nombre,:edad,:diagno,:medico,:observa,:mnz,:tf,:tr,:anti,:entidad,:dieta,:riesgo,:usuario,:equipo,:ip,:fechamod)");
        
            $consulta->bindParam(':cuarto', $this->cuarto);
            $consulta->bindParam(':tipo', $this->tipo);
            $consulta->bindParam(':doc', $this->num);
            $consulta->bindParam(':nombre', $this->nombre);
            $consulta->bindParam(':edad', $this->edad);
            $consulta->bindParam(':diagno', $this->diagno);
            $consulta->bindParam(':medico', $this->medico);
            $consulta->bindParam(':observa', $this->observa );
            $consulta->bindParam(':mnz', $this->mnz);
            $consulta->bindParam(':tf', $this->tf);
            $consulta->bindParam(':tr', $this->tr);
            $consulta->bindParam(':anti', $this->anti);
            $consulta->bindParam(':entidad', $this->entidad);
	    $consulta->bindParam(':dieta', $this->dieta);
	    $consulta->bindParam(':riesgo', $this->riesgo);
	    $consulta->bindParam(':usuario', $this->usuario);
	    $consulta->bindParam(':equipo', $this->equipo);
	    $consulta->bindParam(':ip', $this->ip);
	    $consulta->bindParam(':fechamod', $this->fechamod);
            
            $consulta->execute();
            $cuarto->ocupar($this->cuarto);
            return TRUE;
        }
 else {
            echo 'el cuarto esta ocupado';
 }
    }
    
  public function inactivar($idcuarto){
      
        $actualizar ="UPDATE tbcenso SET estado='I' WHERE idcuarto= :idcuarto ";
        
        $a = $this->Conectar()->prepare($actualizar);
		$a->bindParam(':idcuarto',$idcuarto);
        $a->execute();
    }
    
 public function vector($sql){
     
     $arreglo = $this->Conectar()->prepare($sql);
     $arreglo->execute();
     
     $vector[]= $arreglo->fetch();
     return $vector;
 }
 
 public function actualizar($idcuarto,$medico,$anti,$dieta,$diagno,$observa){
    
     $query="UPDATE tbcenso SET medico= :medico,anticoagulacion= :anti,dieta= :dieta,diagnostico= :diagno,observacion= :observa where estado='A' and idcuarto=".$idcuarto;
     $consulta= $this->Conectar()->prepare($query);
     
     $consulta->bindParam(':medico', $medico);
     $consulta->bindParam(':anti', $anti);
     $consulta->bindParam(':dieta', $dieta);
     $consulta->bindParam(':diagno', $diagno);
     $consulta->bindParam(':observa', $observa);
     $consulta->execute();
 }
 
public function ImprimirTabla($sql,$encabezados) {
        echo '<table class="table table-bordered table-condensed" id="registros">';
            echo '<thead><tr>';
            $titulo = explode(',',$encabezados);
            $numreg = count($titulo);
            for($j=0;$j<$numreg;$j++)
            echo '<th>'.$titulo[$j].'</th>';
            echo '</tr></thead>';
            echo '<tbody>';
            $reg = $this->Conectar()->query($sql);
            while($row= $reg->fetch()){
            echo"<tr>";
            for($i=0;$i<$numreg;$i++) {
         
               echo "<td style='font-size:80%'>".$row[$i]."</td>";
          
            }
            echo"</tr>";
         }
        echo '</tbody>';
        echo '</table>';               
 }
 
}
    
   