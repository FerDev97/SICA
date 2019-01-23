<?php
include "../config/conexion.php";

$grado = $_REQUEST["grado"];
$bach = $_REQUEST["bach"];
$seccion = $_REQUEST["seccion"];
$respuesta="0";

$consulta1="SELECT
topciones.eid_opcion,
topciones.efk_bto,
topciones.efk_grado,
topciones.efk_seccion
FROM
topciones
WHERE topciones.efk_bto= $bach AND topciones.efk_grado = $grado AND topciones.efk_seccion = $seccion";

$resultado = $conexion->query($consulta1);
$fila=$resultado->fetch_row();
if($resultado->num_rows != 0){

    $respuesta=$fila[0];

}


echo $respuesta;

?>