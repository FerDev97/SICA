<?php
include "../config/conexion.php";
$result = $conexion->query("SELECT ttipobachillerato.ctipo,tbachilleratos.ccodigo,eid_bachillerato,cnombe,eestado,cdescripcion,efk_tipo FROM tbachilleratos INNER JOIN ttipobachillerato ON tbachilleratos.efk_tipo = ttipobachillerato.eid_tipo ORDER BY cnombe");
if ($result) {
    while ($fila = $result->fetch_object()) {
        echo "<tr>";
        
        //echo "<tr>";
        //echo "<td><img src='img/modificar.png' style='width:30px; height:30px' onclick=modify(".$fila->idasignatura.",'".$fila->codigo."','".$fila->nombre."');></td>";
        //echo "<td><img src='img/eliminar.png' style='width:30px; height:30px' onclick=elyminar(".$fila->idasignatura.",'".$fila->nombre."');></td>";
        echo "<td>" . $fila->ccodigo . "</td>";
        echo "<td>" . $fila->cnombe . "</td>";
        echo "<td>" . $fila->ctipo . "</td>";
        if ($fila->eestado==1) {
            echo "<td>Activo</td>";
             //echo "<td><img src='imagenes.php?id=" . $fila->idempleados . "&tipo=empleado' width=100 height=180></td>";
            echo "<td style='text-align:center;'><button title='Desactivar Opcion' align='center' type='button' class='btn btn-default' onclick=confirmarAct(" . $fila->eid_bachillerato . ",1);><i class='fa fa-remove'></i>
               </button></td>";
         }else
         {
            echo "<td>Inactivo</td>";
             //echo "<td><img src='imagenes.php?id=" . $fila->idempleados . "&tipo=empleado' width=100 height=180></td>";
            echo "<td style='text-align:center;'><button title='Activar Opcion' align='center' type='button' class='btn btn-default' onclick=confirmarAct(" . $fila->eid_bachillerato . ",2);><i class='fa fa-check'></i>
               </button></td>";
         }
        
        $aux= "<button type=\"button\" class=\"btn btn-warning btn-sm btn-round\" ";
       $aux.="onclick=\"editar('".$fila->eid_bachillerato."','".$fila->ccodigo."','".$fila->cnombe."','".$fila->cdescripcion."','".$fila->efk_tipo."')\";>";
       $aux.="Modificar</button>";
       echo "<td width='90'>";
     
       echo $aux;
        
        
        echo "</tr>";

    }
}
?>