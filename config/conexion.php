<?php
$conexion = new mysqli('localhost', 'root', '', '');
if ($conexion->connect_errno) {
    echo "Error de conexion";
}
