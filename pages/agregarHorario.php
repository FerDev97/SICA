<?
session_start();

include "../config/conexion.php";
include "IB.php";

$dia1 = $_POST['diaUno'];
$dia2 = $_POST['diaDos'];
$bloque = $_POST['bloque'];
$dias = $dia1.' y '.$dia2;
$activo = 1;
$mensaje = "";

$query = "SELECT eid_horario ,cdia, chora, estado FROM thorarios WHERE cdia like '%".$dias."%' AND chora like '%".$bloque."%';";
$result = $conexion->query($query);
$fila=$result->fetch_row(); 
    if($result->num_rows == 0){
        $consulta  = "INSERT INTO thorarios VALUES('null','" .$dias. "','" . $bloque . "','".$activo."')";
        $resultado = $conexion->query($consulta);
          if ($resultado) {
             IB:: insertar($_SESSION["id"],"Inserto un nuevo horario");
              $mensaje="1"; //los datos se agregaron correctamente
          } else {
              $mensaje="2";// Error: Los datos no se agregaron
          }
        
    }else{
            
            $mensaje="3/".$fila[0]."/".$fila[1]."/".$fila[2]."/".$fila[3];
        
    }
        
echo $mensaje;

?>