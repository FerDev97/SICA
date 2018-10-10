<?php 
                            include "../config/conexion.php" ; 

                            $result = $conexion->query("SELECT * FROM tusuarios");

                            if($result->num_rows != 0){

                                while($fila = $result->fetch_object()){

                                    $consulta ="SELECT iestado, cdui, cnombre, capellido FROM tpersonal WHERE eid_personal = ".$fila->efk_personal;
                                    $resultado = $conexion->query($consulta);
                                    $aux=$resultado->fetch_row();

                                    if($aux[0] == 1){//si el personal esta activo

                                        echo "<tr>";
                                            echo "<td width='200'>".$fila->cusuario."</td>";
                                            echo "<td>".$fila->cpass."</td>";

                                            if($fila->etipo == 1){
                                                echo "<td bgcolor=#dff8e7 width='180'> ADMINISTRADOR </td>";
                                            }
                                            else if($fila->etipo == 0){
                                                echo "<td> DOCENTE </td>";
                                            }
                                            
                                            echo "<td>".$aux[1]."</td>";
                                            echo "<td>".$aux[2]."</td>";
                                            echo "<td>".$aux[3]."</td>";

                                            $aux= "<button type=\"button\" class=\"btn btn-warning btn-sm btn-round\" ";
                                            $aux.="onclick=\"editar('".$fila->eid_usuario."','".$fila->cusuario."','".$fila->cpass."','".$fila->etipo."')\";>";
                                            $aux.="Modificar</button>";
                                            echo "<td width='90'>";
                                            
                                            echo $aux;
                                    
                                            
                                    
                                            echo "</td>";
                                            
                                        echo "</tr>";
                                    }
                                }
                            }
?>