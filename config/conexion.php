<?php
$conexion = new mysqli('localhost', 'root', '', 'sicanew');
if ($conexion->connect_errno) {
    echo "Error de conexion";
}
