<?php 
 
 include "../config/conexion.php" ; 
                            
$idMateria;
$periodoActivo;

if(empty($_REQUEST)){
   
}else{

    $idMateria=$_REQUEST["idMateria"];

    $consulta="SELECT
    talumno.eid_alumno as idAlumno,
    talumno.cnie as nie,
    talumno.cnombre as nombre,
    talumno.capellido as apellido,
    tmaterias.eid_materia,
    tmaterias.cnombre,
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

                echo "<td>$fila->codAlumno</td>";
                echo "<td>$fila->apellidoAlumno, $fila->nombreAlumno </td>";
                echo "<td style='text-align:center;'>$fila->nota1</td>";
                echo "<td style='text-align:center;'>$fila->nota2</td>";
                echo "<td style='text-align:center;'>$fila->nota3</td>";
                echo "<td style='text-align:center;'>$fila->recu</td>";
                echo "<td style='text-align:center;'>$fila->prom</td>";

                $aux= "<button type=\"button\" class=\"btn btn-info btn-sm btn-round\" ";
                $aux.="onclick=\"asignar()\";>";
                $aux.="Asignar notas</button>";
                 
                echo "<td width='90' style='text-align:center;'>";
                    echo $aux;
                echo "</td>";


        echo "</tr>";
    }

}
 
 