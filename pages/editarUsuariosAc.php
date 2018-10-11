<?php
include "../config/conexion.php";
include "EDE.php";

$opcion = $_REQUEST['opcion'];
$id = $_REQUEST['id'];
$tipo = $_REQUEST["tipo"];
$usuario = $_REQUEST['nombre'];
$contra = $_REQUEST['contra'];


//CODIGO QUE ENCRIPTA LA CONTRASENA
$contra=EDE:: encriptar($contra);
$mensaje = "";
//FIN CODIGO DE ENCRIPTACION DE CONTRASENA

//validando no mas de 3 admins
$validaSql = "SELECT COUNT(etipo) FROM tusuarios WHERE etipo=1";
$resultSet = $conexion->query($validaSql);
$dato = $resultSet->fetch_row();

if(($dato[0] < 3 && $tipo == 0) || ($dato[0] == 3 && $tipo ==0) || ($dato[0] < 3 && $tipo == 1)){
    if($opcion=="2"){

        $query = "SELECT * FROM tusuarios WHERE cusuario like '%".$usuario."%' OR cpass like '%".$contra."%' ;";
        $result = $conexion->query($query);
        $fila=$result->fetch_row();
        if($result->num_rows == 0){
            $consulta  = "UPDATE tusuarios SET cusuario='" .$usuario. "', cpass='" . $contra . "', etipo='".$tipo."' WHERE eid_usuario='".$id."'";
            $resultado = $conexion->query($consulta);
              if ($resultado) {
                  $mensaje="1";//los datos se agregaronc correctamente
              } else {
                  $mensaje="2";//Error al editar los datos
              }
            
        }else{
            
            
            if($fila[0] == $id){//si es el mismo que se desea modificar
                $consult  = "UPDATE tusuarios SET cusuario='" .$usuario. "', cpass='" . $contra . "', etipo='".$tipo."' WHERE eid_usuario='".$id."'";
                $resulta = $conexion->query($consult);
                if ($resulta) {
                    $mensaje="1";//los datos se agregaronc correctamente
                } else {
                    $mensaje="2";//Error al editar los datos
                }
            }else{//si es otro registro existente
                $mensaje="3";//los datos ya existen
            }
            
            
        }

    }else{
        $query2 = "SELECT * FROM tusuarios WHERE cusuario like '%".$usuario."%' ;";
        $result2 = $conexion->query($query2);
        $fila2=$result2->fetch_row();
        if($result2->num_rows == 0){
            $consulta2 = "UPDATE tusuarios SET cusuario='" .$usuario. "', etipo='".$tipo."' WHERE eid_usuario='".$id."'";
            $resultado2 = $conexion->query($consulta2);
              if ($resultado2) {
                  $mensaje="1";//los datos se agregaronc correctamente
              } else {
                  $mensaje="2";//Error al editar los datos
              }
            
        }else{
            
            
            if($fila2[0] == $id){//si es el mismo que se desea modificar
                $consult2  = "UPDATE tusuarios SET cusuario='" .$usuario. "', etipo='".$tipo."' WHERE eid_usuario='".$id."'";
                $resulta2 = $conexion->query($consult2);
                if ($resulta2) {
                    $mensaje="1";//los datos se agregaronc correctamente
                } else {
                    $mensaje="2";//Error al editar los datos
                }
            }else{//si es otro registro existente
                $mensaje="3";//los datos ya existen
            }
            
            
        }
    }
}else{

    if($dato[0] == 3 && $tipo == 1){

        $query = "SELECT eid_usuario FROM tusuarios WHERE eid_usuario=$id";
        $respuestas = $conexion->query($query);
        $data = $respuestas->fetch_row();

            if($respuestas->num_rows != 0){
                            
                
                if($opcion=="2"){

                    $query = "SELECT * FROM tusuarios WHERE cusuario like '%".$usuario."%' OR cpass like '%".$contra."%' ;";
                    $result = $conexion->query($query);
                    $fila=$result->fetch_row();
                    if($result->num_rows == 0){
                        $consulta  = "UPDATE tusuarios SET cusuario='" .$usuario. "', cpass='" . $contra . "', etipo='".$tipo."' WHERE eid_usuario='".$id."'";
                        $resultado = $conexion->query($consulta);
                          if ($resultado) {
                              $mensaje="1";//los datos se agregaronc correctamente
                          } else {
                              $mensaje="2";//Error al editar los datos
                          }
                        
                    }else{
                        
                        
                        if($fila[0] == $id){//si es el mismo que se desea modificar
                            $consult  = "UPDATE tusuarios SET cusuario='" .$usuario. "', cpass='" . $contra . "', etipo='".$tipo."' WHERE eid_usuario='".$id."'";
                            $resulta = $conexion->query($consult);
                            if ($resulta) {
                                $mensaje="1";//los datos se agregaronc correctamente
                            } else {
                                $mensaje="2";//Error al editar los datos
                            }
                        }else{//si es otro registro existente
                            $mensaje="3";//los datos ya existen
                        }
                        
                        
                    }
            
                }else{
                    $query2 = "SELECT * FROM tusuarios WHERE cusuario like '%".$usuario."%' ;";
                    $result2 = $conexion->query($query2);
                    $fila2=$result2->fetch_row();
                    if($result2->num_rows == 0){
                        $consulta2 = "UPDATE tusuarios SET cusuario='" .$usuario. "', etipo='".$tipo."' WHERE eid_usuario='".$id."'";
                        $resultado2 = $conexion->query($consulta2);
                          if ($resultado2) {
                              $mensaje="1";//los datos se agregaronc correctamente
                          } else {
                              $mensaje="2";//Error al editar los datos
                          }
                        
                    }else{
                        
                        
                        if($fila2[0] == $id){//si es el mismo que se desea modificar
                            $consult2  = "UPDATE tusuarios SET cusuario='" .$usuario. "', etipo='".$tipo."' WHERE eid_usuario='".$id."'";
                            $resulta2 = $conexion->query($consult2);
                            if ($resulta2) {
                                $mensaje="1";//los datos se agregaronc correctamente
                            } else {
                                $mensaje="2";//Error al editar los datos
                            }
                        }else{//si es otro registro existente
                            $mensaje="3";//los datos ya existen
                        }
                        
                        
                    }
                }

            }else{
                $mensaje="4"; 
            }
        

    }else{
        $mensaje="4";//ya se cuenta con 3 admins
    }
}
        
echo $mensaje;

?>