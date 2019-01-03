<?php
include "../config/conexion.php";

$dia1 = $_POST['diaUno'];
$dia2 = $_POST['diaDos'];
$bloque = $_POST['bloque'];
$dias;
$activo = $_POST['estado'];
$id = $_POST['id'];
$mensaje = "";
$a;
$b;
$asignado;
//para resolver incoherencias de Lunes y Martes != Martes y Lunes
//verificando dia uno
if($_POST['diaUno'] == "Lunes"){
    $a=1;
}
if($_POST['diaUno'] == "Martes"){
    $a=2;
}
if($_POST['diaUno'] == "Miercoles"){
    $a=3;
}
if($_POST['diaUno'] == "Jueves"){
    $a=4;
}
if($_POST['diaUno'] == "Viernes"){
    $a=5;
}
 //verificando dia dos
if($_POST['diaDos'] == "Lunes"){
    $b=1;
}
if($_POST['diaDos'] == "Martes"){
    $b=2;
}
if($_POST['diaDos'] == "Miercoles"){
    $b=3;
}
if($_POST['diaDos'] == "Jueves"){
    $b=4;
}
if($_POST['diaDos'] == "Viernes"){
    $b=5;
}

//ordenando dias ej: Miercoles y Lunes = Lunes y Miercoles

if($a < $b){
    $dias = $dia1.' y '.$dia2;
}else{
    $dias = $dia2.' y '.$dia1;
}
//verifica si hay horarios asignados a materias, si los hay no se pueden desactivar
$verificar="SELECT * FROM tmaterias WHERE efk_idhorario = ".$id;
$respuesta = $conexion->query($verificar);
$registros= $respuesta->fetch_row();

if( ($respuesta->num_rows != 0) && ($activo == "0") ){//hay horarios asignados a materias, no se puede 
        $asignado=true;
}else{
    $asignado=false;
}


$query = "SELECT eid_horario ,cdia, chora FROM thorarios WHERE cdia like '%".$dias."%' AND chora like '%".$bloque."%' ;";
$result = $conexion->query($query);
$fila=$result->fetch_row();
    if($result->num_rows == 0){//si no se encuentran coincidencias
        if($asignado==true){
            $mensaje="4";//el horario esta asignado y no se puede modificar
        }else{

            $consulta  = "UPDATE thorarios SET cdia='" .$dias. "', chora='" . $bloque . "', estado='".$activo."' WHERE eid_horario='".$id."'";
            $resultado = $conexion->query($consulta);
            if ($resultado) {
                $mensaje="1";
            } else {
                $mensaje="2";//Error al editar los datos del lado del servidor
            }
        }
        
    }else{
        
        if($fila[0] == $id){//si es el mismo registro que se desea modificar
            
            if($asignado==true){
                $mensaje="4";
            }else{

                $consult  = "UPDATE thorarios SET cdia='" .$dias. "', chora='" . $bloque . "', estado='".$activo."' WHERE eid_horario='".$id."'";
                $resulta = $conexion->query($consult);
                if ($resulta) {
                    $mensaje="1";//los datos se agregaronc correctamente
                } else {
                    $mensaje="2";//Error al editar los datos
                }
            }


        }else{//si es otro registro existente
            $mensaje="3";//los datos ya existen
        }
        
    }
        

    echo $mensaje;

?>