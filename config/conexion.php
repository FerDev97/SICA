<?php
//Esta conexion es porque la otra no me deja guardar, la razon? no lo se... asi que hice esta.

$conexion = new mysqli('localhost', 'root', '', 'sica');
if ($conexion->connect_errno) {
    echo "Error de conexion";
}
?>
