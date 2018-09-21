<?php
include "../config/conexion.php";

$dia1 = $_POST['diaUno'];
$dia2 = $_POST['diaDos'];
$bloque = $_POST['bloque'];
$dias = $dia1.' y '.$dia2;
//$dias2 = $dia2.' y '.$dia1; //para resolver incoherencias de Lunes y Martes = Martes y Lunes
$activo = $_POST['estado'];
$id = $_POST['id'];
$mensaje = "";

$query = "SELECT eid_horario ,cdia, chora FROM thorarios WHERE cdia like '%".$dias."%' AND chora like '%".$bloque."%' ;";
$result = $conexion->query($query);
$fila=$result->fetch_row();
    if($result->num_rows == 0){
        $consulta  = "UPDATE thorarios SET cdia='" .$dias. "', chora='" . $bloque . "', estado='".$activo."' WHERE eid_horario='".$id."'";
        $resultado = $conexion->query($consulta);
          if ($resultado) {
              $mensaje="1";//los datos se agregaronc correctamente
          } else {
              $mensaje="2";//Error al editar los datos
          }
        
    }else{
        
        if($fila[0] == $id){//si es el mismo que se desea modificar
            $consult  = "UPDATE thorarios SET cdia='" .$dias. "', chora='" . $bloque . "', estado='".$activo."' WHERE eid_horario='".$id."'";
            $resulta = $conexion->query($consult);
            if ($resulta) {
                $mensaje="1";//los datos se agregaronc correctamente
            } else {
                $mensaje="2";//Error al editar los datos
            }
        }else{//si es otro registro existente
            $mensaje="3";//los datos ya existen
        }
        
    }
        
echo $mensaje;

?>