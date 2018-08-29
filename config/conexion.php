<?php
$conexion = new mysqli('localhost', 'root', 'sica', '');
if ($conexion->connect_errno) {
    echo "Error de conexion";
}
