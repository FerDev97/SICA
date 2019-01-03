<?php
session_start();

include "../config/conexion.php";
include "IB.php";

$dia1 = $_POST['diaUno'];
$dia2 = $_POST['diaDos'];
$bloque = $_POST['bloque'];
$activo = 1;
$mensaje = "3";
$a;
$b;
$dias;
//para resolver incoherencias de Lunes y Martes != Martes y Lunes
//verificando dia uno
if($_POST['diaUno'] == "Lunes"){
    $a=1;
}
if($_POST['diaUno'] == "Martes"){
    $a=2;
}
if($_POST['diaUno'] == "Miercoles"){
    $a=3;
}
if($_POST['diaUno'] == "Jueves"){
    $a=4;
}
if($_POST['diaUno'] == "Viernes"){
    $a=5;
}
 //verificando dia dos
if($_POST['diaDos'] == "Lunes"){
    $b=1;
}
if($_POST['diaDos'] == "Martes"){
    $b=2;
}
if($_POST['diaDos'] == "Miercoles"){
    $b=3;
}
if($_POST['diaDos'] == "Jueves"){
    $b=4;
}
if($_POST['diaDos'] == "Viernes"){
    $b=5;
}

//ordenando dias

if($a < $b){
    $dias = $dia1.' y '.$dia2;
}else{
    $dias = $dia2.' y '.$dia1;
}



$query = "SELECT eid_horario ,cdia, chora, estado FROM thorarios WHERE cdia like '%".$dias."%' AND chora like '%".$bloque."%';";
$result = $conexion->query($query);
$fila=$result->fetch_row(); 

    if($result->num_rows == 0){
        $consulta  = "INSERT INTO thorarios VALUES('null','" .$dias. "','" . $bloque . "','".$activo."')";
        $resultado = $conexion->query($consulta);
          if ($resultado) {
            IB:: insertar($_SESSION["id"],"Inserto un nuevo horario");
              $mensaje="1";
          } else {
              $mensaje="2";
          }
        
    }else{
            
            $mensaje="3/".$fila[0]."/".$fila[1]."/".$fila[2]."/".$fila[3];
        
    }
        
echo($mensaje);

?>