<?php
session_start();
include "../config/conexion.php";
include "IB.php";
$accion =$_REQUEST['accion'];
msg($accion);
if($accion=="guardarOpc"){
$cupo   = $_POST['cupo'];
$opcion   = $_POST['opc'];
$grado   = $_POST['gradom'];
$seccion  = $_POST['seccion'];
$anio  = $_POST['anio'];

$query = "SELECT efk_bto, efk_grado, efk_seccion FROM topciones WHERE efk_bto like '%".$opcion."%' AND efk_grado like '%".$grado."%' AND efk_seccion like '%".$seccion."';";
$result = $conexion->query($query);
    if($result->num_rows == 0){
        $consulta  = "INSERT INTO topciones VALUES('null','" . $cupo . "','" .$opcion. "','" .$grado. "','" .$seccion. "','1','0','" .$anio. "')";
        $resultado = $conexion->query($consulta);
          if ($resultado) {
             IB:: insertar($_SESSION["id"],"Registró una nueva Opcion de Bachillerato");
              $mensaje="Se agregaron los datos correctamente";
          } else {
              $mensaje="Error al insertar los datos";
          }
        
    }else{

        $mensaje="Esta opcion de bachillerato ya existe ";
    }
        
echo $mensaje;
}else if($accion=="guardarGrado"){
    $grado   = $_POST['gradom'];
    $query = "SELECT cgrado FROM tgrado WHERE cgrado like '%".$grado."';";
    $result = $conexion->query($query);
    if($result->num_rows == 0){
        $consulta  = "INSERT INTO tgrado VALUES('null','" . $grado . "')";
        $resultado = $conexion->query($consulta);
          if ($resultado) {
            IB:: insertar($_SESSION["id"],"Registró un nuevo grado");
              $mensaje="Se agregaron los datos correctamente";
          } else {
              $mensaje="Error al insertar los datos";
          }
        
    }else{

        $mensaje="Los datos que desea ingresar ya existen";
    }
        
    echo $mensaje;


}else if($accion=="guardarTipo"){
    $tipoo   = $_POST['tipomo'];
    $query = "SELECT ctipo FROM ttipobachillerato WHERE ctipo like '%".$tipoo."';";
    $result = $conexion->query($query);
    if($result->num_rows == 0){
        $consulta  = "INSERT INTO ttipobachillerato VALUES('null','" . $tipoo . "')";
        $resultado = $conexion->query($consulta);
          if ($resultado) {
            IB:: insertar($_SESSION["id"],"Registró un nuevo tipo de bachillerato");
              $mensaje="Se agregaron los datos correctamente";
          } else {
              $mensaje="Error al insertar los datos";
          }
        
    }else{

        $mensaje="Los datos que desea ingresar ya existen";
    }
    echo $mensaje;


}else if($accion=="guardarBto"){
    $codigo   = $_POST['codigoo'];
    $nombre   = $_POST['nombrem'];
    $tipo  = $_POST['tipob'];
    $descripcion  = $_POST['descripcion'];
    $query = "SELECT ccodigo, cnombe FROM tbachilleratos WHERE ccodigo like '%".$codigo."%' AND cnombe like '%".$nombre."';";
    $result = $conexion->query($query);
    if($result->num_rows == 0){
        $consulta  = "INSERT INTO tbachilleratos VALUES('null','" . $codigo . "','" .$nombre. "','" .$descripcion. "','" .$tipo. "','1')";
        $resultado = $conexion->query($consulta);
          if ($resultado) {
            IB:: insertar($_SESSION["id"],"Registró un nuevo bachillerato");
              $mensaje="Se guardaron los datos correctamente";
          } else {
              $mensaje="Error al insertar los datos";
          }
        
    }else{

        $mensaje="Los datos ingresados ya existen.!";
    }
        
echo $mensaje;

}else if($accion=="guardarSeccion"){
    $seccion   = $_POST['seccionm'];
    $query = "SELECT cseccion FROM tsecciones WHERE cseccion like '%".$seccion."';";
    $result = $conexion->query($query);
    if($result->num_rows == 0){
        $consulta  = "INSERT INTO tsecciones VALUES('null','" . $seccion . "')";
        $resultado = $conexion->query($consulta);
          if ($resultado) {
            IB:: insertar($_SESSION["id"],"Registró una nueva Seccion");
              $mensaje="Se agregaron los datos correctamente";
          } else {
              $mensaje="Error al insertar los datos";
          }
        
    }else{

        $mensaje="Los datos que desea ingresar ya existen: ";
    }
        
    echo $mensaje;


}
function msg($texto)
{
    echo "<script type='text/javascript'>";
    echo "alert('$texto');";
    echo "document.location.href='fagregaropcion.php';";
    echo "</script>";
}
?>

