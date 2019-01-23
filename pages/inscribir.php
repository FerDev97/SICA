<?php
session_start();
include "../config/conexion.php";
include "IB.php";
//Captura de datos 
$ida = $_POST['ida'];
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
$sexo =  $_POST['sexo'];
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

//Adicionales
$anio=$_POST['anio']; 
//Consulta para el control de cupos
$resultC = $conexion->query("SELECT
topciones.eid_opcion,
topciones.ecupo_maximo,
topciones.inscritos
FROM
topciones WHERE eid_opcion='".$bto."'");
if ($resultC) {
    while ($fila4 = $resultC->fetch_object()) {
      $cupo=$fila4->ecupo_maximo;
      $inscr=$fila4->inscritos;
    if($cupo>0){
      $ncupo=$cupo-1;
      $ninscritos=$inscr+1;
      //consulta para verificar si el NIE se repite
      $query = "SELECT cnie FROM talumno WHERE cnie like '%".$NIE."';";
      $result = $conexion->query($query);
      if($result->num_rows == 0||$NIE==""){
        // consulta que Inserta los datos del alumno a la base de datos
      $consulta  = "INSERT INTO talumno VALUES('null','" .$codigo. "','" .$NIE. "','" .$nombre. "','" .$apellido. "','" .$sexo. "','" .$direcc. "','" .$depart. "','" .$fecha. "','" .$llega. "','" .$bto. "','" .$anterior. "','" .$enfer. "','" .$alergia. "','" .$distancia. "','" .$parvu. "','" .$trabaja. "','" .$zona. "','" .$repite. "','" .$bautizo. "','" .$comunion. "','" .$confirmacion. "','" .$nombrep. "','" .$lugarp."','" .$duip. "','" .$housephonep. "','" .$workphonep. "','" .$smartphonep. "','" .$direccionp. "','" .$estado. "','" .$convive. "','" .$nombrem. "','" .$lugarm. "','" .$oficiom. "','" .$duim. "','" .$telefonocm. "','" .$telefonotm. "','" .$celularm. "','" .$miembrosm. "','" .$religiionm. "','" .$anio. "')";
      $resultado = $conexion->query($consulta);
                if ($resultado) {
                  //Consulta que recorre el numero de materias asignada a la opcion elegida
                  $result = $conexion->query("SELECT
      tmaterias.cnombre,
      tbachilleratos.cnombe,
      topciones.eid_opcion,
      tsecciones.cseccion,
      tmaterias.eid_materia
      FROM
      topciones
      INNER JOIN tmaterias ON tmaterias.efk_idopcion = topciones.eid_opcion
      INNER JOIN tbachilleratos ON topciones.efk_bto = tbachilleratos.eid_bachillerato
      INNER JOIN tsecciones ON topciones.efk_seccion = tsecciones.eid_seccion
      where eid_opcion='" .$bto. "'");
      if ($result) {
          while ($fila = $result->fetch_object()) {
            //en base al numero de materias recorridas se crea un nuevo registro en tnotas
              $consulta  = "INSERT INTO tnotas VALUES('null',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ',' ')";
              $resultado = $conexion->query($consulta);
         if ($resultado) {
           //consulta para recuperar el ultimo id de tnotas
          $result2 = $conexion->query("SELECT tnotas.eid_notas FROM tnotas order by eid_notas asc ");
        if ($result2) {
            while ($fila1 = $result2->fetch_object()) {
              $idnota=$fila1->eid_notas;
            }
            //Insercion a la tabla talum_mat_not recibiendo el ultimo id de notas (actualmente creado para esa relacion) con año activo para contrl de años clausurados
            $consulta = "INSERT INTO talum_mat_not VALUES('null','".$ida."','" . $fila->eid_materia. "','" .$idnota. "','".$anio."')";
              $resultado = $conexion->query($consulta);
                        if ($resultado) {
                          //consulta para decrementar el cupo en la opcion elegida
                          $consulta  = "UPDATE topciones set ecupo_maximo='" . $ncupo . "',inscritos='".$ninscritos."' where eid_opcion='" .$bto. "'";
                          $resultado = $conexion->query($consulta);
                          if ($resultado) {
                            //Si todo ese desvergue esta bien WTF.!!
                            IB:: insertar($_SESSION["id"],"Inscribio un nuevo alumno");
                            $mensaje="Se agregaron los datos correctamente";
                           header('Location: ingresoAlumno.php?guardo=1&ida='.$ida.'&idop='.$bto);   
                          } else {
                            $mensaje="Error al insertar los datos";
                          }
                        } else {
                           $mensaje="Error al insertar los datos";
                        }
          } 
         } else {
             $mensaje="Error al insertar los datos";
             msg($mensaje);
         }
           
          }
      }else{
      
        $mensaje="Esta Opcion no tiene materias Asignadas";
          header('Location: ingresoAlumno.php?guardo=2');
          }

                 
                  }else{
      
                       $mensaje="Error al insertar datos a la DB";
                         header('Location: ingresoAlumno.php?guardo=2');
                         }
              }else{
      
                $mensaje="El alumno con NIE ya esta inscrito";
                header('Location: ingresoAlumno.php?guardo=2');
            }
    }else{
      $mensaje="Esta Opción ha exedido el cupo maximo de alumnos";
      header('Location: ingresoAlumno.php?guardo=2');

    }
    }
}
?>