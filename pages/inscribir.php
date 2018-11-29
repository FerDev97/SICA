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
if($_POST['bautismo']==""){
  $bautizo = 0;
}else{
  $bautizo = $_POST['bautismo'];
}
if($_POST['confirmacion']==""){
  $confirmacion = 0;
}else{
  $confirmacion = $_POST['confirmacion'];
}
if($_POST['comunion']==""){
  $comunion = 0;
}else{
$comunion = $_POST['comunion'];
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
$anio=$_POST['anio'];
//Adicionales

//odos llegan con exito 
$consulta  = "INSERT INTO talumno VALUES('null','" .$codigo. "','" .$NIE. "','" .$nombre. "','" .$apellido. "','" .$direcc. "','" .$depart. "','" .$fecha. "','" .$llega. "','" .$bto. "','" .$anterior. "','" .$enfer. "','" .$alergia. "','" .$distancia. "','" .$parvu. "','" .$trabaja. "','" .$zona. "','" .$repite. "','" .$bautizo. "','" .$comunion. "','" .$confirmacion. "','" .$nombrep. "','" .$lugarp."','" .$duip. "','" .$housephonep. "','" .$workphonep. "','" .$smartphonep. "','" .$direccionp. "','" .$estado. "','" .$convive. "','" .$nombrem. "','" .$lugarm. "','" .$oficiom. "','" .$duim. "','" .$telefonocm. "','" .$telefonotm. "','" .$celularm. "','" .$miembrosm. "','" .$religiionm. "','" .$anio. "')";
$resultado = $conexion->query($consulta);
          if ($resultado) {
             IB:: insertar($_SESSION["id"],"Inscribio un nuevo alumno");
              $mensaje="Se agregaron los datos correctamente";
              header('Location: ingresoAlumno.php?guardo=1');
          } else {
             $mensaje="Error al insertar los datos";
          }
          
?>