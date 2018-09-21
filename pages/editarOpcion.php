<?php
include "../config/conexion.php";

$grado = $_POST['grado'];
$opcion = $_POST['opcion'];
$seccion = $_POST['seccion'];
$cupo = $_POST['cupo'];
$id = $_POST['id'];
$mensaje = "";

$query = "SELECT efk_bto, efk_grado, efk_seccion FROM topciones WHERE efk_bto like '%".$opcion."%' AND efk_grado like '%".$grado."%'AND ecupo_maximo like'%".$cupo."%' AND efk_seccion like '%".$seccion."';";
$result = $conexion->query($query);
    if($result->num_rows == 0){
        $consulta  = "UPDATE topciones SET efk_grado='" .$grado. "', efk_bto='" . $opcion . "', efk_seccion='".$seccion."',ecupo_maximo='".$cupo."' WHERE eid_opcion='".$id."'";
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