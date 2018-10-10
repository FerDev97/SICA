<?php 
                            include "../config/conexion.php" ; 
                            include "EDE.php";//INCLUDE DE LA CLASE PARA ENCRIPTAR

                            $result = $conexion->query("SELECT * FROM tusuarios");

                            if($result->num_rows != 0){

                                while($fila = $result->fetch_object()){

                                    $consulta ="SELECT tpersonal.iestado, tpersonal.cdui, tpersonal.cnombre, tpersonal.capellido, tcargos.eid_cargo FROM tpersonal 
                                    INNER JOIN tcargos ON tpersonal.efk_idcargo = tcargos.eid_cargo WHERE eid_personal = ".$fila->efk_personal;
                                    $resultado = $conexion->query($consulta);
                                    $aux1=$resultado->fetch_row();

                                    if($aux1[0] == 1){//si el personal esta activo

                                        echo "<tr>";
                                            echo "<td width='200'>".$fila->cusuario."</td>";
                                            

                                            if($fila->etipo == 1){
                                                echo "<td bgcolor=#dff8e7 width='180'> ADMINISTRADOR </td>";
                                            }
                                            else if($fila->etipo == 0){
                                                echo "<td> DOCENTE </td>";
                                            }
                                            
                                            echo "<td>".$aux1[1]."</td>";
                                            echo "<td>".$aux1[2]."</td>";
                                            echo "<td>".$aux1[3]."</td>";

                                            $aux= "<button type=\"button\" class=\"btn btn-warning btn-sm btn-round\" ";
                                            $aux.="onclick=\"editar('".$fila->eid_usuario."','".$fila->cusuario."','".$fila->cpass."','".$fila->etipo."','".$aux1[4]."')\";>";
                                            $aux.="Modificar</button>";
                                            echo "<td width='90'>";
                                            
                                            echo $aux;
                                    
                                            
                                    
                                            echo "</td>";
                                            
                                        echo "</tr>";
                                    }
                                }
                            }
?>