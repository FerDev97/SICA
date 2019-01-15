<?php
session_start();

include "../config/conexion.php";
include "IB.php";

$idnotas = $_POST['idnotas'];
$idAlumno = $_POST['idAlumno'];
$idMateria = $_POST['idMateria'];
$nota1 = $_POST['nota1'];
$nota2 = $_POST['nota2'];
$nota3 = $_POST['nota3'];
$rec = $_POST['rec'];
$pro = $_POST['pro'];
$periodoAct = $_POST['periodoAct'];



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