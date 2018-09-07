<?php
                           include "../config/conexion.php";
                           $result = $conexion->query("select * from tsecciones order by eid_seccion");
                           if ($result) {
                               while ($fila = $result->fetch_object()) {
                                echo "<option value=".$fila->eid_seccion.">".$fila->cseccion."</option>";
                              }
                           }
                           ?> 