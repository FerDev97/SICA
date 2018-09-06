<?php
include "../config/conexion.php";

$dia1 = $_POST['diaUno'];
$dia2 = $_POST['diaDos'];
$bloque = $_POST['bloque'];
$dias = $dia1.' y '.$dia2;
$activo = $_POST['estado'];
$id = $_POST['id'];
$mensaje = "";

$query = "SELECT cdia, chora FROM thorarios WHERE cdia like '%".$dias."%' AND chora like '%".$bloque."%' AND estado like '%".$activo."%';";
$result = $conexion->query($query);
    if($result->num_rows == 0){
        $consulta  = "UPDATE thorarios SET cdia='" .$dias. "', chora='" . $bloque . "', estado='".$activo."' WHERE eid_horario='".$id."'";
        $resultado = $conexion->query($consulta);
          if ($resultado) {
              $mensaje="Se editaron los datos correctamente";
          } else {
              $mensaje="Error al editar los datos";
          }
        
    }else{

        $mensaje="Los datos que desea editar ya existen: ";
    }
        
echo $mensaje;

?>