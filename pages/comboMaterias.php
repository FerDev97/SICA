<?php
include "../config/conexion.php";

$id;

if(empty($_REQUEST)){
    echo "<option value='n'>No hay materias</option>";
}else{

    $id=$_REQUEST['id'];

    $consulta1="SELECT
    tmaterias.eid_materia as idmat,
    tmaterias.cnombre as nombre,
    topciones.eid_opcion
    FROM
    tmaterias
    INNER JOIN topciones ON tmaterias.efk_idopcion = topciones.eid_opcion
    WHERE topciones.eid_opcion = $id";

    $resultado = $conexion->query($consulta1);

    while($fila = $resultado->fetch_object()){

        echo "<option value='$fila->idmat'>$fila->nombre</option>";
    }
}


?>