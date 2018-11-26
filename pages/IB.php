<?php

class IB {
public static function insertar($idusuario,$descripcion){
    include "../config/conexion.php";
    $consulta  = "INSERT INTO tbitacora VALUES('null','" . $idusuario . "',now(),'" .$descripcion. "')";
        $resultado = $conexion->query($consulta);
          if ($resultado) {
              
          } else {
           
          }
}

}
?>