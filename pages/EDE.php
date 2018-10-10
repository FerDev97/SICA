<?php
define('METHOD','AES-256-CBC');//METODO A USAR
define('SECRET_KEY','$SICA@2018SV');//CLAVE SECRETA USADA PARA GENERAR LOS HASHES
define('SECRET_IV','101712');//CLAVE AUXILIAR
//DEFINIMOS LA CLASE Y SUS METODOS PARA QUE SOLO SEA LLAMADA DESDE DONDE SEA NECESARIO SU USO

class EDE {
public static function encriptar($cadena){
    $salida=FALSE;
    $llave=hash('sha256',SECRET_KEY);
    $iv=substr(hash('sha256',SECRET_IV),0,16);
    $salida=openssl_encrypt($cadena,METHOD,$llave,0,$iv);
    $salida=base64_encode($salida);
    return $salida;
}
public static function desencriptar($cadena){
    $llave=hash('sha256',SECRET_KEY);
    $iv=substr(hash('sha256',SECRET_IV),0,16);
    $salida=openssl_decrypt(base64_decode($cadena),METHOD,$llave,0,$iv);
    return $salida;

}
}
?>