<?php
echo " 
                     <thead>
                        <tr>
                        
                          <th>Editar</th>
                          <th>Codigo</th>
                          <th>Opcion</th>
                          <th>Tipo</th>
                          <th>Alta/Baja</th>
                        </tr>
                      </thead>
                      <tbody>";
                      
?>
<?php
include "../config/conexion.php";
$result = $conexion->query("select * from tbachilleratos order by eid_bachillerato");
if ($result) {
    while ($fila = $result->fetch_object()) {
        echo "<tr>";
        echo "<td>
          <div class='col-md-2' style='margin-top:1px'>
            <button class='btn ripple-infinite btn-round btn-warning' onclick='modify(" . $fila->eid_bachillerato . ")';>
            <div>
              <span>Editar</span>
            </div>
            </button>
            </div>
        </td>";
        //echo "<tr>";
        //echo "<td><img src='img/modificar.png' style='width:30px; height:30px' onclick=modify(".$fila->idasignatura.",'".$fila->codigo."','".$fila->nombre."');></td>";
        //echo "<td><img src='img/eliminar.png' style='width:30px; height:30px' onclick=elyminar(".$fila->idasignatura.",'".$fila->nombre."');></td>";
        echo "<td>" . $fila->ccodigo . "</td>";
        echo "<td>" . $fila->cnombe . "</td>";
        echo "<td>" . $fila->cdescripcion . "</td>";

        echo "<td>
          <div class='col-md-2' style='margin-top:1px'>
            <button class='btn ripple-infinite btn-round btn-success' onclick='confirmar(" . $fila->idcatalogo . ")'>
            <div>
              <span>Alta</span>
            </div>
            </button>
            </div>
        </td>";
        echo "</tr>";

    }
}
?>
<?php
  echo " </tbody>
   </table>
 </div>
</div>
</div>

         
  </div>
 </div>"
?>
                   