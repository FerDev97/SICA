<?php 
                            include "../config/conexion.php" ; 

                            $result = $conexion->query("SELECT * FROM thorarios GROUP BY cdia");

                            if($result->num_rows != 0){

                                while($fila = $result->fetch_object()){

                                  echo "<tr>";
                                    echo "<td>".$fila->cdia."</td>";
                                    echo "<td>".$fila->chora."</td>";
                                    if($fila->estado == 0){
                                      echo "<td> INACTIVO </td>";
                                    }
                                    else if($fila->estado == 1){
                                      echo "<td bgcolor=#dff8e7> ACTIVO </td>";
                                    }
                                      $aux= "<button type=\"button\" class=\"btn btn-warning btn-sm btn-round\" ";
                                      $aux.="onclick=\"editar('".$fila->eid_horario."','".$fila->cdia."','".$fila->chora."','".$fila->estado."')\";>";
                                      $aux.="Modificar</button>";
                                    echo "<td width='90'>";
                                    
                                      echo $aux;
                              
                                    
                               
                                    echo "</td>";
                                    
                                  echo "</tr>";
                                }
                            }
?>