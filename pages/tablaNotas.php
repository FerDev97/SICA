<?php 
 
 include "../config/conexion.php" ; 
                            
$idMateria;

if(empty($_REQUEST)){
   
}else{

    $idMateria=$_REQUEST["idMateria"];

    $consulta="SELECT
    talumno.eid_alumno as idAlumno,
    talumno.ccodigo as codAlumno,
    talumno.cnombre as nombreAlumno,
    talumno.capellido as apellidoAlumno,
    tmaterias.eid_materia,
    tmaterias.cnombre,
    tnotas.eid_notas as idNotas,
    tnotas.dnota1 as nota1,
    tnotas.dnota2 as nota2,
    tnotas.dnota3 as nota3,
    tnotas.drecuperacion as recu,
    tnotas.dpromedio as prom,
    tnotas.efk_idperiodo,
    tperiodos.eid_periodo as idperiodo,
    tperiodos.enum as periodo,
    tperiodos.estado as estadoPer
    FROM
    talum_mat_not
    INNER JOIN talumno ON talum_mat_not.efk_idalumno = talumno.eid_alumno
    INNER JOIN tmaterias ON talum_mat_not.efk_idmateria = tmaterias.eid_materia
    INNER JOIN tnotas ON talum_mat_not.efk_idnota = tnotas.eid_notas
    INNER JOIN tperiodos ON tnotas.efk_idperiodo = tperiodos.eid_periodo
    WHERE tmaterias.eid_materia = $idMateria AND tperiodos.estado = 1";

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
 
 