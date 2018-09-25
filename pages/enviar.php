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
$mail->SMTPDebug = 2;
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
$mail->Username = "fer.aravalo1997@gmail.com";
// Contraseña a utilizar para la autenticación SMTP: poner su contraseña
$mail->Password = "abigail29";
// Establece de quién se va a enviar el mensaje desde
$mail->setFrom('fer.aravalo1997@gmail.com ',' primero ultimo ');
// Establecer una dirección alternativa de respuesta
//$mail->addReplyTo('replyto@example.com ',' First Last ');

// Establezca a quién se enviará el mensaje
$mail->addAddress('kevinjovel9@gmail.com ','Kevin Rosale ');
// Establecer la línea de asunto
$mail->Subject = 'Que pedo perro va';
// Lee un cuerpo de mensaje HTML de un archivo externo, convierte las imágenes referenciadas en incrustadas,
// convertir HTML en un cuerpo alternativo básico de texto plano
$mail->msgHTML(file_get_contents('contents.html'), dirname(__FILE__));
// Reemplazar el cuerpo de texto sin formato con uno creado manualmente
$mail->AltBody = 'Que ondas, esto es enviado desde el sistema';
// enviar el mensaje, comprobar si hay errores
if (!$mail->send()) echo "Mailer Error: ";// . $mail->ErrorInfo;
else echo "Mensaje enviado";
?> 