<?php
session_start();
include "../config/conexion.php";
include "IB.php";
//Captura de datos 
//Geberales
$codigo   = $_POST['codigoa'];
$nombre  = $_POST['nombrea'];
$depart = $_POST['departamentoa'];
$direcc = $_POST['direcciona'];
$llega = $_POST['llegadaa'];
$bto =  $_POST['bachilleratoa'];
$anterior =  $_POST['anteriora'];
$enfer = $_POST['enfermedadesa'];
$alergia = $_POST['alergiaa'];

$NIE =  $_POST['niea'];
$apellido =  $_POST['apellidoa'];
$fecha =  $_POST['fecha'];
$distancia =  $_POST['distanciaa'];
//$parvu = $_POST['enfermedadesa'];
//$trabaja = $_POST['alergiaa'];
//$zona = $_POST['enfermedadesa'];
//$repite = $_POST['alergiaa'];
//$sacramentos = $_POST['alergiaa']; no se si deben
//Encargado

//Adicionales
$nombreh  = $_POST['nombreh1'];


msg($codigo);
msg($nombre);
msg($depart);
msg($direcc);
msg($llega);
msg($bto);

//$consulta  = "INSERT INTO topciones VALUES('null','" . $cupo . "','" .$opcion. "','" .$grado. "','" .$seccion. "','1')";
        //$resultado = $conexion->query($consulta);
          //if ($resultado) {
            // IB:: insertar($_SESSION["id"],"Registró una nueva Opcion de Bachillerato");
           //   $mensaje="Se agregaron los datos correctamente";
         // } else {
        //      $mensaje="Error al insertar los datos";
          //}

          function msg($texto)
{
    echo "<script type='text/javascript'>";
    echo "alert('$texto');";
   // echo "document.location.href='ingresoAlumno.php';";
    echo "</script>";
}

?>
