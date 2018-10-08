<?php
//Codigo que muestra solo los errores exceptuando los notice.
error_reporting(E_ALL & ~E_NOTICE);
// include '../config/conexion.php';
session_start();

$nombre=$_SESSION["usuario"];
if ($_SESSION["logueado"]==TRUE) {
   $tipos=$_SESSION["tipo"];
    Header("Location: inicio.php?tipo=$tipos");
}
 ?>
<!DOCTYPE html>
 <html lang="en">
 <head>
     <title>SICA</title>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1">
     <link rel="stylesheet" type="text/css" href="../asset/css/sweetalert2.css"/>
 <!--===============================================================================================-->	
     <link rel="icon" type="image/png" href="../asset/images/icons/favicon.ico"/>
 <!--===============================================================================================-->
     <link rel="stylesheet" type="text/css" href="../vendor/bootstrap/css/bootstrap.min.css">
 <!--===============================================================================================-->
     <link rel="stylesheet" type="text/css" href="../asset/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
 <!--===============================================================================================-->
     <link rel="stylesheet" type="text/css" href="../asset/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
 <!--===============================================================================================-->
     <link rel="stylesheet" type="text/css" href="../vendor/animate/animate.css">
 <!--===============================================================================================-->	
     <link rel="stylesheet" type="text/css" href="../vendor/css-hamburgers/hamburgers.min.css">
 <!--===============================================================================================-->
     <link rel="stylesheet" type="text/css" href="../vendor/animsition/css/animsition.min.css">
 <!--===============================================================================================-->
     <link rel="stylesheet" type="text/css" href="../vendor/select2/select2.min.css">
 <!--===============================================================================================-->	
     <link rel="stylesheet" type="text/css" href="../vendor/daterangepicker/daterangepicker.css">
 <!--===============================================================================================-->
     <link rel="stylesheet" type="text/css" href="../asset/css/util.css">
     <link rel="stylesheet" type="text/css" href="../asset/css/main.css">
	 
 <!--===============================================================================================-->
 
 </head>
 <script type="text/javascript">    
 //SWEET ALERTS
function sweetConfirm(){
   swal({
   title: '¿Está seguro que desea continuar?',
   text: "¡No sera posible revertir esta acción!",
   type: 'warning',
   showCancelButton: true,
   confirmButtonColor: '#3085d6',
   cancelButtonColor: '#d33',
   confirmButtonText: 'Continuar',
   cancelButtonText:'Cancelar',
 }).then((result) => {
   if (result.value) {
     swal(
       '¡Exito!',
       'La accion ha sido completada.',
       'success'
     )
   }
 })
         }

         function sweetGuardo(str){
           swal(
        'Exito!',
        ''+str,
         'success'
            )
         }
		 function sweetError(str){
          swal({
   type: 'error',
   title: 'Error...',
   text: ''+str,
   footer: 'Revise que todos los campos esten completados.'
 })
         }
 
         function go(){
        // /  document.form.submit(); 
        // AJAX PARA COMPROBAR SI EL USUARIO TIENE CORREO
        var parametros={"usuario":document.getElementById("usuario").value};
        $.ajax(
            {
                data:parametros,
                url:'emailExiste.php',
                type:'post',
                beforeSend:function(){
                    alert('Procesando consulta por favor espere.');
                },
                success:function(response) {
                    alert(response);
                }
            }

        );
       

}
       </script>
 <body oncopy="return false" onpaste="return false">
     
     <div class="limiter">
     <div class="container-login100">
     <div class="wrap-login100 p-l-25 p-r-20 p-t-45 p-b-60">
     <span class="login100-form-title p-b-73">
                         Recuperacion de  contraseña.
                     </span>
                     <div class="login">
                 <!-- <form name="form" > -->
                     <div style="border-radius: 25px;"  class="wrap-input100 validate-input" data-validate = "Es necesario un usuario valido:UserSica99">
                         <input  class="input100" type="text" name="usuario" id="usuario" placeholder="Usuario." autocomplete="off" autofocus>
                         <span class="focus-input100-1"></span>
                         <span class="focus-input100-2"></span>
                     </div>
                     <br>
                     <div style="border-radius: 25px;" class="wrap-input100 rs1 validate-input" data-validate="La contraseña es Obligatoria">
                         <p>Por favor digite su usuario, si el usuario es correcto se le enviará un correo electronico con su contrasena.</p>
                     </div>
 
                     <div class="container-login100-form-btn m-t-20">
                         <button style="border-radius: 25px;"  class="login100-form-btn" onclick=go() name=enviar >
                             Enviar
                         </button>
                     </div>
 
                     <div class="text-center p-t-45 p-b-4">
                         
                         <a href="index.php" class="txt2 hov1">
                             Cancelar
                         </a>
                     </div>
                     <!-- </form> -->
             </div>
     </div>
     </div>
     </div>
     <script src="../asset/js/sweetalert2.js"></script>
 <!--===============================================================================================-->
     <script src="../vendor/jquery/jquery-3.2.1.min.js"></script>
 <!--===============================================================================================-->
     <script src="../vendor/animsition/js/animsition.min.js"></script>
 <!--===============================================================================================-->
     <script src="../vendor/bootstrap/js/popper.js"></script>
     <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
 <!--===============================================================================================-->
     <script src="../vendor/select2/select2.min.js"></script>
 <!--===============================================================================================-->
     <script src="../vendor/daterangepicker/moment.min.js"></script>
     <script src="../vendor/daterangepicker/daterangepicker.js"></script>
 <!--===============================================================================================-->
     <script src="../vendor/countdowntime/countdowntime.js"></script>
 <!--===============================================================================================-->
     <script src="../asset/js/mains.js"></script>
	
 
 </body>
 </html>
 <?php
 function msg($texto)
 {
     echo "<script type='text/javascript'>";
     echo "alert('$texto');";
     echo "</script>";
 }
 function msgError($texto)
{
    echo "<script type='text/javascript'>";
    echo "sweetError('$texto');";

    echo "</script>";
}
function msgAdd($texto)
{
    echo "<script type='text/javascript'>";
    echo "sweetGuardo('$texto');";
    echo "</script>";
}

 ?>
