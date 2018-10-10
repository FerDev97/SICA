<?php 
    error_reporting(E_ALL & ~E_NOTICE);
    $usuario=$_POST["usuario"];
    
    
   
                      include '../config/conexion.php';

                      $result = $conexion->query("SELECT eid_personal as id FROM tusuarios,tpersonal where cusuario='".$usuario."' and efk_personal=eid_personal");
                      if ($result) {
                            
                            while ($fila = $result->fetch_object()) { 
                            $id=$fila->id;
                            }
                            $row_cnt = mysqli_num_rows($result);
                      }
                      if($row_cnt==1){
                        echo $id;
                      }else{
                        echo"";
                      }
                      
?>