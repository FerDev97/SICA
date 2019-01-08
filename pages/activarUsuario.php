<?php

session_start();

include "../config/conexion.php";
include "IB.php";

$idpersonal = $_POST['idp'];

$mensaje="1";
$estado="";

        $consulta  = "UPDATE tpersonal SET iestado=1 WHERE eid_personal=".$idpersonal;
        $resultado = $conexion->query($consulta);
          if ($resultado) {
            IB:: insertar($_SESSION["id"],"Activo un usuario con el personal asociado");
              $mensaje="1";//Se actualizaron los datos
          } else {
              $mensaje="2";//error no se actualizaron los datos
          }
        

        
echo $mensaje;

?>