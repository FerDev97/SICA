<?php
include "../config/conexion.php";

$nombre = $_POST['nombre'];
$tipo = $_POST['tipo'];
$descrip = $_POST['descrip'];
$id = $_POST['id'];
$mensaje = "";
        $consulta  = "UPDATE tbachilleratos SET cnombe='" .$nombre. "', cdescripcion='" . $descrip . "', efk_tipo='".$tipo."' WHERE eid_bachillerato='".$id."'";
        $resultado = $conexion->query($consulta);
          if ($resultado) {
              $mensaje="Se editaron los datos correctamente";
          } else {
              $mensaje="Error al editar los datos";
          }
echo $mensaje;
?>