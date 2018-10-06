<?php
	
	      $loginNombre = $_POST["usuario"];
		  $loginPassword =$_POST["pass"];
		  $correcto=false;
		  $activo=false;
		  include "../config/conexion.php";
		 
    $result = $conexion->query("SELECT tpersonal.cnombre,capellido,iestado,tusuarios.cusuario,cpass,etipo FROM tusuarios INNER JOIN tpersonal ON tusuarios.efk_personal = tpersonal.eid_personal where cusuario='$loginNombre' AND cpass='$loginPassword' AND iestado='1'");
	if ($result) {
		while ($fila = $result->fetch_object()) {
			$estado=$fila->iestado;
			$passR = $fila->cpass;
			$Nombre=$fila->cnombre;
			$tipo=$fila->etipo;	
			$apellido=$fila->capellido;
			if($passR==$loginPassword){
			  $correcto=true;
			}
		}
	}
				if(isset($loginNombre) && isset($loginPassword)) {
					if($correcto==true) {
						if($estado==1){
							session_start();
							$_SESSION["logueado"] = TRUE;
							$_SESSION["usuario"] = $Nombre." ".$apellido;
							$_SESSION["tipo"] = $tipo;
							if($tipo==1){
								header("Location:inicio.php?tipo=1");
							}else{
								header("Location:inicio.php?tipo=0");
							}
						}else{
							Header("Location:index.php?error=loginInactivo");
						}
						
					}else{
						Header("Location:index.php?error=login");
					}
				}
				
					
				
			
		function msg($texto){
    		echo "<script type='text/javascript'>";
    		echo "alert('$texto');";
    		//echo "document.location.href='materias.php';";
    		echo "</script>";
    }
 ?>
