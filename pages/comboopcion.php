<?php
                           include "../config/conexion.php";
                           $result = $conexion->query("select * from tbachilleratos where eestado='1' order by eid_bachillerato");
                           if ($result) {
                               while ($fila = $result->fetch_object()) {
                                echo "<option value=".$fila->eid_bachillerato.">".$fila->cnombe."</option>";
                              }
                           }
                           ?> 