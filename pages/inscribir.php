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
$parvu = $_POST['parvularia'];
$trabaja = $_POST['trabajaa'];
$zona = $_POST['zonaa'];
$repite = $_POST['repitea'];
//$sacramentos = $_POST['alergiaa']; no se si deben
//Encargado
$nombrep  = $_POST['nombrep'];
$lugarp  = $_POST['lugarp'];
$duip  = $_POST['duip'];
$housephonep  = $_POST['telefonocp'];
$workphonep  = $_POST['telefonotp'];
$smartphonep  = $_POST['celularp'];
$direccionp  = $_POST['direccionp'];
$estado  = $_POST['estadop'];
$convive  = $_POST['convivea'];
$nombrem  = $_POST['nombrem'];
$lugarm  = $_POST['lugarm'];
$oficiom  = $_POST['oficiom'];
$duim  = $_POST['duim'];

//Adicionales


//odos llegan con exito 
msg($estado);
msg($convive);
msg($nombrem);
msg($lugarm);
msg($oficiom);
msg($duim);

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
