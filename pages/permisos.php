<?php
//Codigo que muestra solo los errores exceptuando los notice.
error_reporting(E_ALL & ~E_NOTICE);
session_start();
if($_SESSION["logueado"] == TRUE && $_SESSION["tipo"]==1) {
  $nombre=$_SESSION["usuario"];
  $tipo  = $_REQUEST["tipo"];
  $id  = $_REQUEST["id"];
}else {
  header("Location:inicio.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="utf-8">
  <meta name="description" content="Miminium Admin Template v.1">
  <meta name="author" content="Isna Nur Azis">
  <meta name="keyword" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Permiso</title>

  <!-- start: Css -->
  <link rel="stylesheet" type="text/css" href="../asset/css/bootstrap.min.css">

  <!-- plugins -->
  <link rel="stylesheet" type="text/css" href="../asset/css/plugins/font-awesome.min.css"/>
  <link rel="stylesheet" type="text/css" href="../asset/css/plugins/datatables.bootstrap.min.css"/>
  <link rel="stylesheet" type="text/css" href="../asset/css/plugins/animate.min.css"/>
  <link href="../asset/css/style.css" rel="stylesheet">
  <!-- end: Css -->

  <link rel="shortcut icon" href="../asset/img/logomi.png">
  <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->
      <script type="text/javascript">
        function modify(id)
        {
          //alert("entra");
          document.getElementById('bandera').value='enviar';
          document.getElementById('baccion').value=id;
         document.turismo.submit();
        }
        function confirmar(id,op)
        {
          if (op==1) {
            if (confirm("!!Advertencia!! Desea Desactivar Este Registro?")) {
            document.getElementById('bandera').value='desactivar';
            document.getElementById('baccion').value=id;

            document.turismo.submit();
          }else
          {
            alert("No entra");
          }
          }else{
            if (confirm("!!Advertencia!! Desea Activar Este Registro?")) {
            document.getElementById('bandera').value='activar';
            document.getElementById('baccion').value=id;
            document.turismo.submit();
          }else
          {
            alert("No entra");
          }
          }


        }
        function guardar(){
          if(document.getElementById('perIns').checked&&document.getElementById('perEst').checked){
            document.permiso.submit();
          }else{
            alert("Complete los campos");
          }
        }
         function confirmar1(id)
        {
          if (confirm("!!Advertencia!! Desea Eliminar Este Registro?")) {
            document.getElementById('bandera').value='desaparecer';
            document.getElementById('baccion').value=id;
            
            document.turismo.submit();
          }else
          {
            alert("No entra");
          }

        }

      </script>
</head>

<body id="mimin" class="dashboard">
      <?php include "header.php"?>

      <div class="container-fluid mimin-wrapper">

<?php include "menu.php";?>


            <!-- start: Content -->
            <div id="content">
               <div class="panel box-shadow-none content-header">
                  <div class="panel-body">
                    <div class="col-md-12">
                        <h3 class="animated fadeInLeft">Permisos Temporales</h3>
                        <p class="animated fadeInDown">
                          Tabla <span class="fa-angle-right fa"></span> Tabla de Datos
                        </p>
                    </div>
                  </div>
              </div>
              <form id="turismo" name="turismo" action="" method="post">
              <input type="hidden" name="bandera" id="bandera">
              <input type="hidden" name="baccion" id="baccion">

              <div class="col-md-12 top-20 padding-0">
                <div class="col-md-12">
                  <div class="panel">
                    <div class="panel-heading"><h3>Lista de usuarios activos</h3></div>
                    <div class="panel-body">
                      <div class="responsive-table">
                      <table id="datatables-example" style="font-size:16px" class="table table-striped table-bordered" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                         <!-- <th>Modificar</th>-->
                          <th>Usuario</th>
                          <th>Nombres</th>
                          <th>Apellidos</th>
                          <th>Cargo</th>
                          <th>Estado</th>
                          <th>Permiso</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
include "../config/conexion.php";
$result = $conexion->query("SELECT tpersonal.cnombre,capellido,iestado,tcargos.ccargo,tusuarios.cusuario,eid_usuario FROM tpersonal INNER JOIN tusuarios ON tusuarios.efk_personal = tpersonal.eid_personal INNER JOIN tcargos ON tpersonal.efk_idcargo = tcargos.eid_cargo where etipo ='0' ORDER BY eid_usuario");
if ($result) {
    while ($fila = $result->fetch_object()) {
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
                echo "<td style='text-align:center;'>       
                <button align='center' type='button' class='btn btn-info btn-sm btn-round' data-toggle='modal' data-target='#modalPermiso'><i class='fa fa-eye'></i>
                </button>
                </td>";
           
             echo "</tr>";
            }
        }
?>
                      </tbody>
                        </table>
                      </div>
                  </div>
                </div>
              </div>
              </div>
              </form>
            </div>
          <!-- end: content -->


          <!-- end: right menu -->

      </div>
<!-- Modal de Grado-->
<div class="modal fade" id="modalPermiso" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">×</span>
                    <span class="sr-only">Cerrar</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Permisos Disponibles</h4>
            </div>
            <!-- Modal Body -->
            <div class="modal-body">
            <form name="permiso" method="post">
                <p class="statusMsg"></p>
                  <!--aqui va el codigo-->
                  <center>
                  <div class="form-check">
                    <input style="width:25px; height:25px;" type="checkbox" class="form-check-input" name="perIns" id="perIns">
                    <label style="font-size:23px;" class="form-check-label" for="exampleCheck1">Permiso Temporal para Inscripcion</label>
                  </div>
                 <br>
                  <div class="form-check">
                  <input style="width:25px; height:25px; background: blue;" type="checkbox" class="form-check-input" name="perEst" id="perEst">
                  <label style="font-size:23px;" class="form-check-label" for="exampleCheck1">Permiso Temporal para Estadisticas</label>
                  </div>
                  <br>
                  </center>
                 
                   <center>
                   <div class="input-group">
                  <button title="Agrega Nuevo Grado al Sistema" style="margin-left:0px;" class="btn btn-info" type="button" id="guardarG" name="guardarG" onclick="guardar();" data-dismiss="modal">
                  Guardar</button>
                  </div>
                  </center>
                 </form>
            </div>
            <!-- Modal Footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-warning" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

  <!-- Fin Modal de Grado -->
      <!-- start: Mobile -->
     
   
       <!-- end: Mobile -->

<!-- start: Javascript -->
<script src="../asset/js/jquery.min.js"></script>
<script src="../asset/js/jquery.ui.min.js"></script>
<script src="../asset/js/bootstrap.min.js"></script>



<!-- plugins -->
<script src="../asset/js/plugins/moment.min.js"></script>
<script src="../asset/js/plugins/jquery.datatables.min.js"></script>
<script src="../asset/js/plugins/datatables.bootstrap.min.js"></script>
<script src="../asset/js/plugins/jquery.nicescroll.js"></script>


<!-- custom -->
<script src="../asset/js/main.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
    $('#datatables-example').DataTable();
  });
</script>
<!-- end: Javascript -->
</body>
</html>
<?php

include "../config/conexion.php";

$bandera = $_REQUEST["bandera"];
$baccion = $_REQUEST["baccion"];

if ($bandera == "add") {
    $consulta  = "INSERT INTO cliente VALUES('null','" . $nombrecliente . "','" . $apellidocliente . "','" . $duicliente . "','" . $telefonocliente . "','" . $direccioncliente . "')";
    $resultado = $conexion->query($consulta);
    if ($resultado) {
        msg("Exito");
    } else {
        msg("No Exito");
    }
}
if ($bandera == "desactivar") {
  $consulta = "UPDATE tpersonal SET iestado = '0' WHERE eid_personal = '".$baccion."'";
    $resultado = $conexion->query($consulta);
    if ($resultado) {
        msg("Exito");
    } else {
        msg("No Exito");
    }
}
if ($bandera == "activar") {
  $consulta = "UPDATE tpersonal SET iestado = '1' WHERE eid_personal = '".$baccion."'";
    $resultado = $conexion->query($consulta);
    if ($resultado) {
        msg("Exito");
    } else {
        msg("No Exito");
    }
}

if ($bandera == "desaparecer") {
    $consulta  = "DELETE FROM tpersonal where eid_personal='" . $baccion . "'";
    $resultado = $conexion->query($consulta);
    if ($resultado) {
        msg("Exito");
    } else {
        msg("No Exito");
    }
}
if ($bandera == 'enviar') {
    echo "<script type='text/javascript'>";
    echo "document.location.href='editpersonal.php?id=" . $baccion . "';";
    echo "</script>";
    # code...
}
function msg($texto)
{
    echo "<script type='text/javascript'>";
    echo "alert('$texto');";
    echo "document.location.href='listapersonal.php';";
    echo "</script>";
}

?>