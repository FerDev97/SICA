<?php
include "../config/conexion.php";

$dia1 = $_POST['diaUno'];
$dia2 = $_POST['diaDos'];
$bloque = $_POST['bloque'];

$dias = $dia1.' y '.$dia2;

$mensaje = "";

$query = "SELECT cdia, chora FROM thorarios WHERE cdia like '%".$dias."%' AND chora like '%".$bloque."%';";
$result = $conexion->query($query);
    if($result->num_rows == 0){
        $consulta  = "INSERT INTO thorarios VALUES('null','" .$dias. "','" . $bloque . "')";
        $resultado = $conexion->query($consulta);
          if ($resultado) {
              $mensaje="Se agregaron los datos correctamente";
          } else {
              $mensaje="Error al insertar los datos";
          }
        
    }else{

        $mensaje="Los datos que desea ingresar ya existen: ";
    }
        
echo $mensaje;

?>