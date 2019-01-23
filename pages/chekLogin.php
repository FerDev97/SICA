<?php
		include "EDE.php";	
		include "IB.php";
		include "../config/conexion.php";
	      $loginNombre = $_POST["usuario"];
		  $loginPassword =$_POST["pass"];
		$loginPassword=EDE:: encriptar($loginPassword);//CODIGO AGREGADO PARA COMPROBAR LAS CADENAS ENCRIPTADAS
		  $correcto=false;
		  $activo=false;
		  
		 
    $result = $conexion->query("SELECT tpersonal.cnombre,capellido,iestado,tusuarios.cusuario, eid_usuario,cpass,tusuarios.etipo FROM tpersonal INNER JOIN tusuarios ON tusuarios.efk_personal = tpersonal.eid_personal  where cusuario='$loginNombre' AND cpass='$loginPassword'");
	if ($result) {
		while ($fila = $result->fetch_object()) {
			$estado=$fila->iestado;
			$passR = $fila->cpass;
			$Nombre=$fila->cnombre;
			$tipo=$fila->etipo;	
			$usuario=$fila->cusuario;
			$id=$fila->eid_usuario;
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
							$_SESSION["nombre"] = $Nombre." ".$apellido;
							$_SESSION["usuario"] = $usuario;
							$_SESSION["id"] = $id;
							$_SESSION["tipo"] = $tipo;
							
							if($tipo==1){
								IB:: insertar($_SESSION["id"],"Inició sesion Administrador");
								header("Location:inicio.php?tipo=1");
							}else{
								$result = $conexion->query("SELECT tpermisos.ep_inscripciones,ep_estadisticas FROM tpersonal INNER JOIN tusuarios ON tusuarios.efk_personal = tpersonal.eid_personal INNER JOIN tpermisos ON tpermisos.efk_idusuario = tusuarios.eid_usuario where cusuario='$loginNombre' AND cpass='$loginPassword'");
									if ($result) {
										while ($fila = $result->fetch_object()) {
											$permisoI=$fila->ep_inscripciones;
											$permisoE=$fila->ep_estadisticas;
								    }
									}else{
										IB:: insertar($_SESSION["id"],"Inició sesion Docente");
										header("Location:inicio.php?tipo=0");
									}
									$_SESSION["permisoI"] = $permisoI;
									$_SESSION["permisoE"] = $permisoE;
									IB:: insertar($_SESSION["id"],"Inició sesion Docente ");
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
