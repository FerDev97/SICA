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
$promedio=$_POST['pro'];

/*if($rec == 0 || $rec==0.00){
    $promedio=(($nota1 + $nota2 + $nota3)/3);
    $promedio=round($promedio * 100) / 100;
}else{
    $promedio=(($nota1 + $nota2 + $nota3 + $rec)/4);
    $promedio=round($promedio * 100) / 100;
}*/

$periodoAct = $_POST['periodoAct'];
$query;
$mensaje="0";

if($periodoAct == 1){
    $query = "UPDATE tnotas SET dnota1p1='".$nota1."', dnota2p1 = '".$nota2."', 
    dnota3p1='".$nota3."', drecuperacionp1='".$rec."', dpromediop1='".$promedio."'
    WHERE eid_notas = $idnotas";
}
if($periodoAct == 2){
    $query = "UPDATE tnotas SET dnota1p2='".$nota1."', dnota2p2 = '".$nota2."', 
    dnota3p2='".$nota3."', drecuperacionp2='".$rec."', dpromediop2='".$promedio."'
    WHERE eid_notas = $idnotas";
}
if($periodoAct == 3){
    $query = "UPDATE tnotas SET dnota1p3='".$nota1."', dnota2p3 = '".$nota2."', 
    dnota3p3='".$nota3."', drecuperacionp3='".$rec."', dpromediop3='".$promedio."'
    WHERE eid_notas = $idnotas";
}
if($periodoAct == 4){
    $query = "UPDATE tnotas SET dnota1p4='".$nota1."', dnota2p4 = '".$nota2."', 
    dnota3p4='".$nota3."', drecuperacionp4='".$rec."', dpromediop4='".$promedio."'
    WHERE eid_notas = $idnotas";
}

$result = $conexion->query($query);
$fila=$result->fetch_row(); 

if($result->num_rows != 0){
       
    IB:: insertar($_SESSION["id"],"Actualizó las notas");
    $mensaje="1";
          
        
}else{
            
    $mensaje="0";
        
}
        
echo $mensaje;

?>