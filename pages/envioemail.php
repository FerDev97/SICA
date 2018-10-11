<?php 
$iduser=$_REQUEST["id"];
echo $iduser;
 include '../config/conexion.php';
 include 'EDE.php';
 

                      $result = $conexion->query("SELECT cnombre as nombre, capellido as apellido, cpass as contra, ccorreo as correo FROM tusuarios,tpersonal where eid_usuario='".$iduser."' and efk_personal=eid_personal");
                      if ($result) {
                            
                            while ($fila = $result->fetch_object()) { 
                            $nombre=$fila->nombre;
                            $apellido=$fila->apellido;
                            $contra=$fila->contra;
                            $contra=EDE:: desencriptar($contra);//agregue esta linea para mostrar la contrasena desencriptada
                            $correo=$fila->correo;
                            }
                            $row_cnt = mysqli_num_rows($result);
                      }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Enviando email...</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../asset/css/sweetalert2.css"/>
    <script src="../asset/js/sweetalert2.js"></script>
        
        <script>
         function sweetGuardo(){
           swal(
        'Exito!',
        ''+Enviando su mail,
         'success'
            )
         }
    </script>
</head>
<body onload="sweetGuardo();">
    
</body>
</html>
<?php
 date_default_timezone_set('Etc/UTC');
 include_once('libs/class.phpmailer.php');
include_once('libs/class.smtp.php');
 //Crear una nueva instancia de PHPMailer
$mail = new PHPMailer;
 //le decimos a PHPMailer que use SMTP
$mail->isSMTP();
// Habilitar la depuración SMTP
// 0 = off (para uso en producción)
// 1 = mensajes de cliente
// 2 = mensajes de cliente y servidor
$mail->SMTPDebug = 0;
// Solicita salida de depuración amigable para HTML
$mail-> Debugoutput = 'html';
 // Establecer el nombre de host del servidor de correo gmail
$mail-> Host = 'smtp.gmail.com';
// utilizar
// $ mail-> Host = gethostbyname ( 'smtp.gmail.com');
// si su red no admite SMTP a través de IPv6
// Establece el número de puerto SMTP - 587 para TLS autenticado, a.k.a. RFC4409 SMTP
$mail->Puerto = 587;
// Establece el sistema de cifrado para usar - ssl (obsoleto) o tls
$mail->SMTPSecure = 'tls';
// Si se debe usar la autenticación SMTP
$mail->SMTPAuth = true;
// Nombre de usuario para la autenticación SMTP: use la dirección de correo electrónico completa para gmail
$mail->Username = "lasantafamiliaasv@gmail.com";
// Contraseña a utilizar para la autenticación SMTP: poner su contraseña
$mail->Password = "familiasv";
// Establece de quién se va a enviar el mensaje desde
$mail->setFrom('lasantafamiliaasv@gmail.com ','SICA');
// Establecer una dirección alternativa de respuesta
//$mail->addReplyTo('replyto@example.com ',' First Last ');
 // Establezca a quién se enviará el mensaje
$mail->addAddress($correo,$nombre." ".$apellido);
// Establecer la línea de asunto
$mail->Subject = 'Recuperación de contrasena.';
// Lee un cuerpo de mensaje HTML de un archivo externo, convierte las imágenes referenciadas en incrustadas,
// convertir HTML en un cuerpo alternativo básico de texto plano
//$mail->msgHTML("<p>Esta es tu contraseña, porfavor guardala en un lugar seguro:hola", dirname(__FILE__));
$mail->Body = "<p>Esta es tu contraseña, porfavor guardala en un lugar seguro:<b>".$contra."<b></p>";
// Reemplazar el cuerpo de texto sin formato con uno creado manualmente
$mail->AltBody = 'Esta es tu contraseña, porfavor guardala en un lugar seguro:hola';
// enviar el mensaje, comprobar si hay errores
if (!$mail->send()) echo "Mailer Error: ";// . $mail->ErrorInfo;
else echo "Mensaje enviado";

?> 