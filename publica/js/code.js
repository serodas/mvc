$(document).ready(ini);

function ini(){
    $("#btnsignin").click(validar);
}

function enviarDatos(){
    var usuario= $("#usuario").val();
    var clave=$("#clave").val();
    $.ajax({
        url:"vistas/insertar.php",
        success:function(result){
            if(result == "true"){
                $("#resultado").html("Se ha registrado el usuario Correctamente");
            }
            else{
               $("#resultado").html("No Se ha podido registrar  el usuario Correctamente"); 
            }
        },
        data:{
            usuario:usuario,
            clave:clave
        },
        type:"GET"   
    });
}

function validar(){
 var usuario= $("#usuario").val();
    var clave=$("#clave").val();
    $.ajax({
        url:"controlador/usuariosValidar_con.php",
        success:function(result){
            if(result == "true"){
                document.location.href="vistas/menu.php";
            }
            else{
               $("#resultado").html("<div class='alert alert-danger' role='alert'>Acceso Denegado</div>"); 
            }
        },
        data:{
            usuario:usuario,
            clave:clave
        },
        type:"POST"   
    });   
}

