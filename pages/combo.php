<?php
                           include "../config/conexion.php";
                           $result = $conexion->query("select * from ttipobachillerato order by eid_tipo");
                           if ($result) {
                               while ($fila = $result->fetch_object()) {
                                echo "<option value=".$fila->eid_tipo.">".$fila->ctipo."</option>";
                              }
                           }
                           ?>  