<?php
include "../config/conexion.php";
$result = $conexion->query("SELECT tpersonal.cnombre,capellido,iestado,tcargos.ccargo,tusuarios.cusuario,eid_usuario
 FROM tpersonal INNER JOIN tusuarios ON tusuarios.efk_personal = tpersonal.eid_personal 
 INNER JOIN tcargos ON tpersonal.efk_idcargo = tcargos.eid_cargo where etipo ='0' ORDER BY eid_usuario");
if ($result) {
    while ($fila = $result->fetch_object()) {

        $consulta ="SELECT * FROM tpermisos WHERE efk_idusuario = ".$fila->eid_usuario;
        $resultado = $conexion->query($consulta);
        $aux1=$resultado->fetch_row();

        echo "<tr>";
            echo "<td>" . $fila->cusuario. "</td>";
            echo "<td>" . $fila->cnombre . "</td>";
            echo "<td>" . $fila->capellido . "</td>";
            echo "<td>" . $fila->ccargo . "</td>";
       
            if ($fila->iestado==1) {
                echo "<td>Activo</td>";
             }else{
                echo "<td>Inactivo</td>";
            }
                

                $aux= "<button type=\"button\" class=\"btn btn-info btn-sm btn-round\" ";
                $aux.="onclick=\"editar('".$fila->eid_usuario."','".$aux1[1]."','".$aux1[2]."')\";>";
                $aux.="<i class='fa fa-eye'></i></button>";
                echo "<td width='90'>";
                                            
                echo $aux;
           
             echo "</tr>";
            }
        }
?>