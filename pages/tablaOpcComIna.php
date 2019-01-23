<?php
include "../config/conexion.php";
$result = $conexion->query("SELECT
tgrado.cgrado,
tbachilleratos.cnombe,ccodigo,
tsecciones.cseccion,
ttipobachillerato.ctipo,
topciones.eestado,eid_opcion
FROM
topciones
INNER JOIN tgrado ON topciones.efk_grado = tgrado.eid_grado
INNER JOIN tbachilleratos ON topciones.efk_bto = tbachilleratos.eid_bachillerato
INNER JOIN tsecciones ON topciones.efk_seccion = tsecciones.eid_seccion
INNER JOIN ttipobachillerato ON tbachilleratos.efk_tipo = ttipobachillerato.eid_tipo where topciones.eestado='0' and tbachilleratos.eestado='1' ORDER BY eid_grado");
if ($result) {
    while ($fila = $result->fetch_object()) {
        echo "<tr>";
       
        //echo "<tr>";
        //select * idempleado,empleado.nombre,apellido,dui,empleado.idagencia,agencia.nombre as nombreagencia from empleado,agencia where empleado.idagencia=agencia.idagencia order by nombre
        //echo "<td><img src='img/modificar.png' style='width:30px; height:30px' onclick=modify(".$fila->idasignatura.",'".$fila->codigo."','".$fila->nombre."');></td>";
        //echo "<td><img src='img/eliminar.png' style='width:30px; height:30px' onclick=elyminar(".$fila->idasignatura.",'".$fila->nombre."');></td>";
        echo "<td>" . $fila->ccodigo . "</td>";
        echo "<td>" . $fila->cgrado . "</td>";
        echo "<td>" . $fila->cnombe . "</td>";
        echo "<td>" . $fila->ctipo . "</td>";
        echo "<td>" . $fila->cseccion . "</td>";
        if ($fila->eestado==1) {
          echo "<td>Activo</td>";
           //echo "<td><img src='imagenes.php?id=" . $fila->idempleados . "&tipo=empleado' width=100 height=180></td>";
          echo "<td style='text-align:center;'><button title='Desactivar el registro' align='center' type='button' class='btn btn-default' onclick=confirmarAct(" . $fila->eid_opcion . ",1);><i class='fa fa-remove'></i>
             </button></td>";
       }else
       {
          echo "<td>Inactivo</td>";
           //echo "<td><img src='imagenes.php?id=" . $fila->idempleados . "&tipo=empleado' width=100 height=180></td>";
          echo "<td style='text-align:center;'><button title='Activar el registro' align='center' type='button' class='btn btn-default' onclick=confirmarAct(" . $fila->eid_opcion . ",2);><i class='fa fa-check'></i>
             </button></td>";
       }
       
    //    $aux= "<button type=\"button\" class=\"btn btn-warning btn-sm btn-round\" ";
    //    $aux.="onclick=\"editar('".$fila->eid_opcion."','".$fila->efk_grado."','".$fila->efk_bto."','".$fila->efk_seccion."','".$fila->ecupo_maximo."')\";>";
    //    $aux.="Modificar</button>";
    //    echo "<td width='90'>";
     
    //    echo $aux;
                                
        echo "</tr>";

    }
}
?>