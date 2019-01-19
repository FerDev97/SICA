<?php
session_start();
include "../config/conexion.php";
include "IB.php";
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
            IB:: insertar($_SESSION["id"],"Brindó permiso temporal a un usuario");
              $mensaje="1"; //los datos se agregaron correctamente
          } else {
              $mensaje="2";// Error: Los datos no se agregaron
          }
    }else{

        $consulta  = "UPDATE tpermisos SET ep_inscripciones='" .$perIns. "', ep_estadisticas='" . $perEst . "' WHERE efk_idusuario='".$id."'";
        $resultado = $conexion->query($consulta);
          if ($resultado) {
            IB:: insertar($_SESSION["id"],"Modificó un permiso temporal");
              $mensaje="1";//los datos se agregaronc correctamente
          } else {
              $mensaje="2";//Error al editar los datos
          }

        
    }
        
echo $mensaje;

?>