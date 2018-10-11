<?php
//Codigo que muestra solo los errores exceptuando los notice.
session_start();
error_reporting(E_ALL & ~E_NOTICE);

 ?>
<!DOCTYPE html>
 <html lang="en">
 <head>
 <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1">
 <title>SICA</title>
 <link rel="stylesheet" type="text/css" href="../asset/css/sweetalert2.css"/>
 </head>
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

<SCRIPT  language=JavaScript> 
function go(){
     if(document.getElementById('usuario').value=="")
        {
          }else{
            
        
        // /  document.form.submit(); 
        // AJAX PARA COMPROBAR SI EL USUARIO TIENE CORREO
        var parametros={"usuario":document.getElementById("usuario").value};
        $.ajax(
            {
                data:parametros,
                url:'emailExiste.php',
                type:'post',
                beforeSend:function(){
                   
                },
                success:function(response) {
                    // alert(response);
                    if(response==""){
                        //alert("No existe ese correo.");
                        mailInexistente();
                        document.getElementById("usuario").value="";
                    }else{
                        const ventana = window.open("envioemail.php?id="+response,"_blank");
                        setTimeout(function(){
                        ventana.close();
                        }, 5000); /* 5 Segundos(tiempo a esperar para que envie el mail)*/
                        sweetGuardo("Se envío el correo correctamente.");
                        
                    }
                }
            }

        );
       


          }
} 
function sweetError(str){
          swal({
   type: 'error',
   title: 'Error...',
   text: ''+str,
   footer: 'Revise que todos los campos esten completados.'
 })
         }
         function mailInexistente(){
          swal({
   type: 'error',
   title: 'Error...',
   text: 'El usuario que ingresó no existe.',
   footer: 'Por favor ingrese su usuario correctamente.'
 })
         }
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
         function prueba(){
             alert("");
         }
</script> 
  
 <body oncopy="return false" onpaste="return false">
     
     <div class="limiter">
     <div class="container-login100">
     <div class="wrap-login100 p-l-25 p-r-20 p-t-45 p-b-60">
     <span class="login100-form-title p-b-73">
                         Recuperación de contrasena.
                     </span>
                     <div class="login">
                     <!-- <form name="form"> -->
                     <div style="border-radius: 25px;"  class="wrap-input100 validate-input" data-validate = "Es necesario un usuario valido:UserSica99">
                         <input style="font-size:17px;"  class="input100" type="text" name="usuario" id="usuario" placeholder="Digite su usuario." autocomplete="off" autofocus required>
                         <span class="focus-input100-1"></span>
                         <span class="focus-input100-2"></span>
                     </div>
                     <br>
                     <div  data-validate="La contraseña es Obligatoria">
                        <p>Si su usuario es correcto se le enviará un correo electronico con su contraseña. </p>
                     </div>
 
                     <div class="container-login100-form-btn m-t-20">
                         <button style="border-radius: 25px;"  class="login100-form-btn" onclick=go() name=enviar >
                             Enviar
                         </button>
                         
                     </div>
 
                     <div class="text-center p-t-45 p-b-4">
                         
 
                         <a href="index.php" class="txt2 hov1">
                             Regresar
                         </a>
                     </div>
                     <!-- </form> -->
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
    echo "sweetConfirm('$texto');";
    //echo "document.location.href='materias.php';";
    echo "</script>";
 }
 function msgError($texto)
{
    echo "<script type='text/javascript'>";
    echo "sweetError('$texto');";
    //echo "document.location.href='materias.php';";
    echo "</script>";
}
function msgAdd($texto)
{
    echo "<script type='text/javascript'>";
    echo "sweetGuardo('$texto');";
    echo "</script>";
}

 ?>
<?php
 
 $nombre=$_SESSION["usuario"];
 if ($_SESSION["logueado"]==TRUE) {
    $tipos=$_SESSION["tipo"];
     Header("Location: inicio.php?tipo=$tipos");
 }else {
     $errorLogin=$_GET["error"];
     if($errorLogin=="login") {
         $error="Usuario o contraseña Invalido";
         msgError($error);
      }else if($errorLogin=="loginInactivo"){
         $error="El usuario está inactivo.. Es necesario buscar ayuda con el administrador de SICA";
         msgError($error);
      }
 }
 ?>