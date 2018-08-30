<?php
include "../config/conexion.php";

$bandera       = $_REQUEST["bandera"];
$dias = $_REQUEST["dias"];
$horainicio = $_REQUEST["horainicio"];
$horafin = $_REQUEST["horafin"];
$bloque = $horainicio.' - '. $horafin;
$mensaje="";

if ($bandera == "add") {
    foreach($dias as $dia){
        $consulta  = "INSERT INTO thorarios VALUES('null','" .$dia. "','" . $bloque . "')";
        $resultado = $conexion->query($consulta);
          if ($resultado) {
              $mensaje="Se agregaron los datos correctamente";
          } else {
              $mensaje="Error al insertar los datos";
          }
      }
}

echo $mensaje;

?>