<?php
                           include "../config/conexion.php";
                           $result = $conexion->query("select * from tgrado order by eid_grado");
                           if ($result) {
                               while ($fila = $result->fetch_object()) {
                                echo "<option value=".$fila->eid_grado.">".$fila->cgrado."</option>";
                              }
                           }
                           ?>   