<?php 
 
 include "../config/conexion.php" ; 

 $result = $conexion->query("select * from tanio where iestado=1 ");
 if($result)
 {
   while ($fila=$result->fetch_object()) {
     $anioActivo=$fila->eid_anio;   
   }
 }

$idMateria;
$periodoActivo;
$anio;

if(empty($_REQUEST)){
   
}else{

    $idMateria=$_REQUEST["idMateria"];
    $periodoActivo = $_REQUEST["periodo"];
    $anio = $_REQUEST["anio"];
    $aux="";

    $consulta="SELECT
    talumno.eid_alumno as idAlumno,
    talumno.cnie as nie,
    talumno.cnombre as nombre,
    talumno.capellido as apellido,talumno.anio,
    tmaterias.eid_materia,
    tmaterias.cnombre as nombreMat,
    tnotas.eid_notas as idnotas,
    tnotas.dnota1p1,
    tnotas.dnota2p1,
    tnotas.dnota3p1,
    tnotas.drecuperacionp1,
    tnotas.dpromediop1,
    tnotas.dnota1p2,
    tnotas.dnota2p2,
    tnotas.dnota3p2,
    tnotas.drecuperacionp2,
    tnotas.dpromediop2,
    tnotas.dnota1p3,
    tnotas.dnota2p3,
    tnotas.dnota3p3,
    tnotas.drecuperacionp3,
    tnotas.dpromediop3,
    tnotas.dnota1p4,
    tnotas.dnota2p4,
    tnotas.dnota3p4,
    tnotas.drecuperacionp4,
    tnotas.dpromediop4,
    tanio.eid_anio, tanio.iestado,
    tanio.canio
    FROM
    talum_mat_not
    INNER JOIN talumno ON talum_mat_not.efk_idalumno = talumno.eid_alumno
    INNER JOIN tmaterias ON talum_mat_not.efk_idmateria = tmaterias.eid_materia
    INNER JOIN tnotas ON talum_mat_not.efk_idnota = tnotas.eid_notas
    INNER JOIN tanio ON talum_mat_not.efk_anio = tanio.eid_anio
    WHERE tmaterias.eid_materia = $idMateria AND talum_mat_not.efk_anio = $anio AND talumno.anio= $anio";

    $result = $conexion->query($consulta);

    while($fila = $result->fetch_object()){
        
        $promedio=(($fila->dpromediop1 + $fila->dpromediop2 + $fila->dpromediop3 + $fila->dpromediop4)/4);
        $promedio=round($promedio * 100) / 100;

        echo "<tr>";

        echo "<td>$fila->nie</td>";
        echo "<td>$fila->apellido, $fila->nombre </td>";


                    
                    echo "<td style='text-align:center;'>$fila->dnota1p1</td>";
                    echo "<td style='text-align:center;'>$fila->dnota2p1</td>";
                    echo "<td style='text-align:center;'>$fila->dnota3p1</td>";
                    echo "<td style='text-align:center;'>$fila->drecuperacionp1</td>";
                    echo "<td style='text-align:center;'>$fila->dpromediop1</td>";
                  

                    echo "<td style='text-align:center;'>$fila->dnota1p2</td>";
                    echo "<td style='text-align:center;'>$fila->dnota2p2</td>";
                    echo "<td style='text-align:center;'>$fila->dnota3p2</td>";
                    echo "<td style='text-align:center;'>$fila->drecuperacionp2</td>";
                    echo "<td style='text-align:center;'>$fila->dpromediop2</td>";
                    

                    echo "<td style='text-align:center;'>$fila->dnota1p3</td>";
                    echo "<td style='text-align:center;'>$fila->dnota2p3</td>";
                    echo "<td style='text-align:center;'>$fila->dnota3p3</td>";
                    echo "<td style='text-align:center;'>$fila->drecuperacionp3</td>";
                    echo "<td style='text-align:center;'>$fila->dpromediop3</td>";
                   

                    echo "<td style='text-align:center;'>$fila->dnota1p4</td>";
                    echo "<td style='text-align:center;'>$fila->dnota2p4</td>";
                    echo "<td style='text-align:center;'>$fila->dnota3p4</td>";
                    echo "<td style='text-align:center;'>$fila->drecuperacionp4</td>";
                    echo "<td style='text-align:center;'>$fila->dpromediop4</td>";
                    
            
            
            echo "<td style='text-align:center;'>$promedio</td>";
            echo "<td style='text-align:center;'>
            <a class='btn btn-outline btn-default' >
                    <span onclick='reporte(".$fila->idAlumno.");' title='Imprimir Boleta'><i class='fa fa-print fa-lg'></i><br>Boleta</span>
                    </a>
            </td>";


        echo "</tr>";

    }//fin del while

}//fin del else
 
 