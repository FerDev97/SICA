<?php
error_reporting(E_ALL & ~E_NOTICE);
session_start();
include "../config/conexion.php";
include "IB.php";
//Captura de datos
$idA = $_POST['idA'];
//Generales

$codigo = $_POST['codigoa'];

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

if($_POST['bautismo']==""){
  $bautizo = 0;
}else{
  $bautizo = $_POST['bautismo'];
}

if($_POST["confirma"]==""){
  $confirmacion = 0;
}else{
  $confirmacion = $_POST["confirma"];
}

if($_POST["comunion"]==""){
  $comunion = 0;
}else{
    $comunion = $_POST["comunion"];
}

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
$telefonocm  = $_POST['telefonocm'];
$telefonotm  = $_POST['telefonotm'];
$celularm  = $_POST['celularm'];
$miembrosm  = $_POST['miembrosm'];
$religiionm  = $_POST['religiionm'];
//Adicionales
//odos llegan con exito 
$consulta  = "UPDATE talumno SET ccodigo='".$codigo. "', cnie='" .$NIE. "', cnombre='" .$nombre. "',
    capellido='" .$apellido. "', cdireccion='" .$direcc. "', edepto='" .$depart. "', ffecha_nac='" .$fecha. "',
    cllegada='" .$llega. "', cbachillerato='" .$bto. "', canterior='" .$anterior. "', cenfermedades='" .$enfer. "',
    calergia='" .$alergia. "', cdistancia='" .$distancia. "', iparvularia='" .$parvu. "', itrabaja='" .$trabaja. "',
    izona='" .$zona. "', irepite='" .$repite. "', ibautizo='" .$bautizo. "', icomunion='" .$comunion. "', iconfirma='" .$confirmacion. "',
    cnombrep='" .$nombrep. "', clugar_trabajop='" .$lugarp."', cduip='" .$duip. "', ctelefonocp='" .$housephonep. "',
    ctelefonotp='" .$workphonep. "', ccelularp='" .$smartphonep. "', cdireccionp='" .$direccionp. "', cestadocivilp='" .$estado. "',
    cconvive='" .$convive. "', cnombrem='" .$nombrem. "', clugar_trabajom='" .$lugarm. "', cprofesionm='" .$oficiom. "',
    cduim='" .$duim. "', ctelefonocm='" .$telefonocm. "', ctelefonotm='" .$telefonotm. "', ccelularm='" .$celularm. "',
    cmiembros='" .$miembrosm. "', creligion='" .$religiionm. "' WHERE eid_alumno='".$idA."' ";
$resultado = $conexion->query($consulta);
          if ($resultado) {
             IB:: insertar($_SESSION["id"],"Se editó la inscripcion del alumno: ");
              $mensaje="Se editaron los datos correctamente";
          } else {
             $mensaje="Error al editar los datos ";
          }
          msg($mensaje);
function msg($mensaje)
{
    echo "<script type='text/javascript'>";
    echo "alert('$mensaje');";
    echo "document.location.href='listaalumnos.php';";
    echo "</script>";
}
?>