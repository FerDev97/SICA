<?php
$idbus = $_REQUEST["idbus"];
include "../config/conexion.php";

$result = $conexion->query("select foto,tipo from bus where idbus=" . $idbus . "");
if ($result) {
    while ($fila = $result->fetch_object()) {
        $imagen = $fila->foto;
        $tipo   = $fila->tipo;
        header("Content-type: " . $tipo . "");
        echo $imagen;
    }

} else {
    echo '<option value="">Error en la BD</opcion>';
}
