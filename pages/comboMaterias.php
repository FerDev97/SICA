<?php
include "../config/conexion.php";

$id;

if(empty($_REQUEST)){
    echo "<option value='n'>No hay materias</option>";
}else{

    $id=$_REQUEST['id'];
    $idP=$_REQUEST['idP'];
    var_dump($idP);
    if($idP=="0" || $idP==0){

        $consulta1="SELECT
        tbachilleratos.cnombe as nombreBach,
        tbachilleratos.eid_bachillerato as idBach,
        tsecciones.cseccion as seccion,
        tgrado.cgrado as grado,
        tgrado.eid_grado as idGrado,
        tsecciones.eid_seccion as idSeccion,
        tmaterias.eid_materia as idMateria,
        tmaterias.cnombre as materia,
        tpersonal.cnombre as docente,
        tpersonal.capellido
        FROM
        tbachilleratos
        INNER JOIN topciones ON topciones.efk_bto = tbachilleratos.eid_bachillerato
        INNER JOIN tsecciones ON topciones.efk_seccion = tsecciones.eid_seccion
        INNER JOIN tgrado ON topciones.efk_grado = tgrado.eid_grado
        INNER JOIN tmaterias ON tmaterias.efk_idopcion = topciones.eid_opcion
        INNER JOIN tpersonal_materia ON tpersonal_materia.efk_idmateria = tmaterias.eid_materia
        INNER JOIN tpersonal ON tpersonal_materia.efk_idpersonal = tpersonal.eid_personal
        WHERE
         topciones.eid_opcion = $id";

        $resultado = $conexion->query($consulta1);

        while($fila = $resultado->fetch_object()){

            echo "<option value='$fila->idMateria'>$fila->materia</option>";
        }



    }else{



            $consulta1="SELECT
            tbachilleratos.cnombe as nombreBach,
            tbachilleratos.eid_bachillerato as idBach,
            tsecciones.cseccion as seccion,
            tgrado.cgrado as grado,
            tgrado.eid_grado as idGrado,
            tsecciones.eid_seccion as idSeccion,
            tmaterias.eid_materia as idMateria,
            tmaterias.cnombre as materia,
            tpersonal.cnombre as docente,
            tpersonal.capellido
            FROM
            tbachilleratos
            INNER JOIN topciones ON topciones.efk_bto = tbachilleratos.eid_bachillerato
            INNER JOIN tsecciones ON topciones.efk_seccion = tsecciones.eid_seccion
            INNER JOIN tgrado ON topciones.efk_grado = tgrado.eid_grado
            INNER JOIN tmaterias ON tmaterias.efk_idopcion = topciones.eid_opcion
            INNER JOIN tpersonal_materia ON tpersonal_materia.efk_idmateria = tmaterias.eid_materia
            INNER JOIN tpersonal ON tpersonal_materia.efk_idpersonal = tpersonal.eid_personal
            WHERE
            tpersonal.eid_personal = $idP AND topciones.eid_opcion = $id";

            $resultado = $conexion->query($consulta1);

            while($fila = $resultado->fetch_object()){

                echo "<option value='$fila->idMateria'>$fila->materia</option>";
            }
        }//fin del segundo else
    




}//fin del primer else

    

?>