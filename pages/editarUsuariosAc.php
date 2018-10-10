<?php
include "../config/conexion.php";

$opcion = $_POST['opcion'];
$id = $_POST['id'];
$tipo = $_POST['tipo'];
$usuario = $_POST['usuario'];
$contra = $_POST['contrasena1'];
$mensaje = "";

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
        
echo $mensaje;

?>