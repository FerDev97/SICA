<?php 
 

	
 ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="../asset/css/sweetalert2.css"/>
<title>Login para 1 usuario</title>
</head>

<body oncopy="return false" onpaste="return false">
<SCRIPT  language=JavaScript> 
function go(){
        document.form.submit(); 
} 
function sweetError(str){
          swal({
   type: 'error',
   title: 'Error...',
   text: ''+str,
   footer: 'Revise que todos los campos esten completados.'
 })
         }
</SCRIPT> 
<FORM name=form method="post" action="chekLogin.php">

<P>Usuario:    <INPUT type=text name=usuario> 
<P>Contraseña: <INPUT type=password name=pass> 
<INPUT onclick=go() type=button value=Acceder name=enviar>

</FORM> 
<script src="../asset/js/sweetalert2.js"></script>
</body>
</html>
<?php
function msg($texto)
{
    echo "<script type='text/javascript'>";
    echo "sweetError('$texto');";
    //echo "document.location.href='materias.php';";
    echo "</script>";
}
?>
<?php session_start();
 
 if ($_SESSION["logueado"]==TRUE) {
    $tipos=$_SESSION["tipo"];
     Header("Location: inicio.php?tipo=$tipos");
 }else {
     $errorLogin=$_GET["error"];
     if($errorLogin=="login") {
         $error="El usuario o contraseña es invalido.";
         msg($error);
      }
 }



  ?>
 
 