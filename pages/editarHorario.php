<?php
include "../config/conexion.php";

$dia1 = $_POST['diaUno'];
$dia2 = $_POST['diaDos'];
$bloque = $_POST['bloque'];
$dias = $dia1.' y '.$dia2;
$activo = $_POST['estado'];
$id = $_POST['id'];
$mensaje = "";

$query = "SELECT cdia, chora FROM thorarios WHERE cdia like '%".$dias."%' AND chora like '%".$bloque."%';";
$result = $conexion->query($query);
    if($result->num_rows == 0){
        $consulta  = "UPDATE thorarios SET cdia='" .$dias. "', chora='" . $bloque . "', estado='".$activo."' WHERE eid_horario='".$id."'";
        $resultado = $conexion->query($consulta);
          if ($resultado) {
              $mensaje="1";//los datos se agregaronc correctamente
          } else {
              $mensaje="2";//Error al editar los datos
          }
        
    }else{

        $mensaje="3";//los datos ya existen
    }
        
echo $mensaje;

?>