<?php
$conexion = new mysqli('localhost', 'root', '', 'agencia');
if ($conexion->connect_errno) {
    echo "Error de conexion";
}
