<?php
echo "hola";
	if(isset($_POST["enviar"])) {
			$loginNombre = $_POST["usuario"];
			$loginPassword =$_POST["pass"];
      $correcto=false;
      include "../config/conexion.php";
    
      $result = $conexion->query("SELECT tpersonal.cnombre,capellido,tusuarios.cusuario,cpass FROM tusuarios INNER JOIN tpersonal ON tusuarios.efk_personal = tpersonal.eid_personal where cusuario='$loginNombre' AND cpass='$loginPassword'");
     
      echo "<script>function hola(){
        alert('".$loginNombre."');
      }</script>";
if ($result) {
    while ($fila = $result->fetch_object()) {
        $passR = $fila->cpass;
		$Nombre=$fila->cnombre;
        if($passR==$loginPassword){
          $correcto=true;
        }
    }
}
			if(isset($loginNombre) && isset($loginPassword)) {
				if($correcto==true) {
					session_start();
					$_SESSION["logueado"] = TRUE;
					$_SESSION["usuario"] = $Nombre;
					header("Location:inicio.php");
				}
				else {
					Header("Location:index.php?error=login");
				}
			}
		} else {
			header("Location:index.php");
		}
 ?>
