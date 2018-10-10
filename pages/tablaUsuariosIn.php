<?php 
                            include "../config/conexion.php" ; 

                            $result = $conexion->query("SELECT * FROM tusuarios");

                            if($result->num_rows != 0){

                                while($fila = $result->fetch_object()){

                                    $consulta ="SELECT iestado, cdui, cnombre, capellido, eid_personal FROM tpersonal WHERE eid_personal = ".$fila->efk_personal;
                                    $resultado = $conexion->query($consulta);
                                    $aux=$resultado->fetch_row();

                                    if($aux[0] == 0){//si el personal esta inactivo

                                        echo "<tr>";
                                            echo "<td width='200'>".$fila->cusuario."</td>";
                                            

                                            if($fila->etipo == 1){
                                                echo "<td bgcolor=#dff8e7 width='180'> ADMINISTRADOR </td>";
                                            }
                                            else if($fila->etipo == 0){
                                                echo "<td> DOCENTE </td>";
                                            }
                                            
                                            echo "<td>".$aux[1]."</td>";
                                            echo "<td>".$aux[2]."</td>";
                                            echo "<td>".$aux[3]."</td>";

                                            $aux= "<button type=\"button\" class=\"btn btn-info btn-sm btn-round\" ";
                                            $aux.="onclick=\"activar('".$aux[4]."')\";>";
                                            $aux.="Activar</button>";
                                            echo "<td width='90'>";
                                            
                                            echo $aux;
                                    
                                            
                                    
                                            echo "</td>";
                                            
                                        echo "</tr>";
                                    }
                                }
                            }
?>