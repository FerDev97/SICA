<?php
	@session_start();
	session_destroy();
	include "IB.php";
    include "../config/conexion.php";
	IB:: insertar($_SESSION["id"],"Cerró la sesion");
	header("Location: index.php");

 ?>