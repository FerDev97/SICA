<?php
include "../config/conexion.php";

$id = $_POST['id'];
$perIns = $_POST['perIns'];
$perEst = $_POST['perEst'];
$mensaje = "";

$query = "SELECT * FROM tpermisos WHERE efk_idusuario =".$id;
$result = $conexion->query($query);
$fila=$result->fetch_row();
    if($result->num_rows == 0){
        $consult  = "INSERT INTO tpermisos VALUES('null','" .$perIns. "','" . $perEst . "','".$id."')";
        $result = $conexion->query($consult);
          if ($result) {
              $mensaje="1"; //los datos se agregaron correctamente
          } else {
              $mensaje="2";// Error: Los datos no se agregaron
          }
        
    }else{

        $consulta  = "UPDATE tpermisos SET ep_inscripciones='" .$perIns. "', ep_estadisticas='" . $perEst . "' WHERE efk_idusuario='".$id."'";
        $resultado = $conexion->query($consulta);
          if ($resultado) {
              $mensaje="1";//los datos se agregaronc correctamente
          } else {
              $mensaje="2";//Error al editar los datos
          }

        
    }
        
echo $mensaje;

?>