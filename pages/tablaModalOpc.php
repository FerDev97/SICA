<?php
                  include "../config/conexion.php";
                  $result = $conexion->query("SELECT ttipobachillerato.ctipo, ccodigo,cnombe FROM ttipobachillerato INNER JOIN tbachilleratos ON tbachilleratos.efk_tipo = ttipobachillerato.eid_tipo ORDER BY eid_bachillerato");
                  if ($result) {
                    while ($fila = $result->fetch_object()) {
                    echo "<tr>";
                    echo "<td>" . $fila->ccodigo . "</td>";
                    echo "<td>" . $fila->cnombe . "</td>";
                    echo "<td>" . $fila->ctipo . "</td>";
                    echo "</tr>";
      }
      }
      ?>