<?php 
 
 include "../config/conexion.php" ; 
                            
$idMateria;
$periodoActivo;

if(empty($_REQUEST)){
   
}else{

    $idMateria=$_REQUEST["idMateria"];
    $periodoActivo = $_REQUEST["periodo"];
    $aux="";

    $consulta="SELECT
    talumno.eid_alumno as idAlumno,
    talumno.cnie as nie,
    talumno.cnombre as nombre,
    talumno.capellido as apellido,
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
    tanio.eid_anio,
    tanio.canio
    FROM
    talum_mat_not
    INNER JOIN talumno ON talum_mat_not.efk_idalumno = talumno.eid_alumno
    INNER JOIN tmaterias ON talum_mat_not.efk_idmateria = tmaterias.eid_materia
    INNER JOIN tnotas ON talum_mat_not.efk_idnota = tnotas.eid_notas
    INNER JOIN tanio ON talum_mat_not.efk_anio = tanio.eid_anio
    WHERE tmaterias.eid_materia = $idMateria";

    $result = $conexion->query($consulta);

    while($fila = $result->fetch_object()){

        echo "<tr>";

        echo "<td>$fila->nie</td>";
        echo "<td>$fila->apellido, $fila->nombre </td>";

            if($periodoActivo == 1){

                    
                    echo "<td style='text-align:center;'>$fila->dnota1p1</td>";
                    echo "<td style='text-align:center;'>$fila->dnota2p1</td>";
                    echo "<td style='text-align:center;'>$fila->dnota3p1</td>";
                    echo "<td style='text-align:center;'>$fila->drecuperacionp1</td>";
                    echo "<td style='text-align:center;'>$fila->dpromediop1</td>";
                    $aux= "<button type=\"button\" class=\"btn btn-info btn-sm btn-round\" ";
                    $aux.="onclick=\"asignar('".$fila->idAlumno."','".$fila->idMateria."','".$fila->idnotas."',
                    '".$fila->dnota1p1."','".$fila->dnota2p1."','".$fila->dnota3p1."',
                    '".$fila->drecuperacionp1."','".$fila->dpromediop1."','".$fila->nombre."','".$fila->apellido."',
                    '".$fila->nombreMat."')\";>";
                    $aux.="Asignar notas</button>";

            }
            if($periodoActivo == 2){

                    echo "<td style='text-align:center;'>$fila->dnota1p2</td>";
                    echo "<td style='text-align:center;'>$fila->dnota2p2</td>";
                    echo "<td style='text-align:center;'>$fila->dnota3p2</td>";
                    echo "<td style='text-align:center;'>$fila->drecuperacionp2</td>";
                    echo "<td style='text-align:center;'>$fila->dpromediop2</td>";
                    $aux= "<button type=\"button\" class=\"btn btn-info btn-sm btn-round\" ";
                    $aux.="onclick=\"asignar('".$fila->idAlumno."','".$fila->idMateria."','".$fila->idnotas."',
                    '".$fila->dnota1p2."','".$fila->dnota2p2."','".$fila->dnota3p2."',
                    '".$fila->drecuperacionp2."','".$fila->dpromediop2."','".$fila->nombre."','".$fila->apellido."',
                    '".$fila->nombreMat."')\";>";
                    $aux.="Asignar notas</button>";

            }
            if($periodoActivo == 3){

                    echo "<td style='text-align:center;'>$fila->dnota1p3</td>";
                    echo "<td style='text-align:center;'>$fila->dnota2p3</td>";
                    echo "<td style='text-align:center;'>$fila->dnota3p3</td>";
                    echo "<td style='text-align:center;'>$fila->drecuperacionp3</td>";
                    echo "<td style='text-align:center;'>$fila->dpromediop3</td>";
                    $aux= "<button type=\"button\" class=\"btn btn-info btn-sm btn-round\" ";
                    $aux.="onclick=\"asignar('".$fila->idAlumno."','".$fila->idMateria."','".$fila->idnotas."',
                    '".$fila->dnota1p3."','".$fila->dnota2p3."','".$fila->dnota3p3."',
                    '".$fila->drecuperacionp3."','".$fila->dpromediop3."','".$fila->nombre."','".$fila->apellido."',
                    '".$fila->nombreMat."')\";>";
                    $aux.="Asignar notas</button>";

            }
            if($periodoActivo == 4){

                    echo "<td style='text-align:center;'>$fila->dnota1p4</td>";
                    echo "<td style='text-align:center;'>$fila->dnota2p4</td>";
                    echo "<td style='text-align:center;'>$fila->dnota3p4</td>";
                    echo "<td style='text-align:center;'>$fila->drecuperacionp4</td>";
                    echo "<td style='text-align:center;'>$fila->dpromediop4</td>";
                    $aux= "<button type=\"button\" class=\"btn btn-info btn-sm btn-round\" ";
                    $aux.="onclick=\"asignar('".$fila->idAlumno."','".$fila->idMateria."','".$fila->idnotas."',
                    '".$fila->dnota1p4."','".$fila->dnota2p4."','".$fila->dnota3p4."',
                    '".$fila->drecuperacionp4."','".$fila->dpromediop4."','".$fila->nombre."','".$fila->apellido."',
                    '".$fila->nombreMat."')\";>";
                    $aux.="Asignar notas</button>";
            }


            
            
            echo "<td width='90' style='text-align:center;'>";
                echo $aux;
            echo "</td>";

        echo "</tr>";

    }//fin del while

}//fin del else
 
 