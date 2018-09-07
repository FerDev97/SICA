
<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="utf-8">
  <meta name="description" content="Miminium Admin Template v.1">
  <meta name="author" content="Isna Nur Azis">
  <meta name="keyword" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SICA-Opciones</title>

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
         
          document.getElementById('bandera').value='enviar';
          document.getElementById('baccion').value=id;
         document.turismo.submit();
        }
         function confirmar(id)
        {
          //alert("entra");
          if (confirm("!!Advertencia!! Desea Eliminar Este Registro?")) {
            document.getElementById('bandera').value='desaparecer';
            document.getElementById('baccion').value=id;
            alert(id);
            document.turismo.submit();
          }else
          {
           // alert("No entra");
          }

        }
        function confirmarAct(id,op)
        {
          //alert("entra");
          
          if (op==1) {
            if (confirm("!!Advertencia!! Desea Desactivar Este Registro?")) {
            document.getElementById('bandera').value='desactivar';
            document.getElementById('baccion').value=id;

            document.turismo.submit();
          }else
          {
            //("No entra");
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
                        <h3 class="animated fadeInLeft">Lista de Opciones de Bachillerato</h3>
                        <p class="animated fadeInDown">
                          tablas <span class="fa-angle-right fa"></span>Tabla
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
                    <div class="panel-heading"><h3>Lista</h3></div>
                    <div class="panel-body">
                      <div class="responsive-table">
                      <table id="datatables-example" style="font-size:16px" class="table table-striped table-bordered" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                          
                          <th>Codigo</th>
                          <th>Grado</th>
                          <th>Nombre</th>
                          <th>Tipo</th>
                          <th>Seccion</th>
                          <th>Estado</th>
                          <th>Alta/Baja</th>
                          <th>Editar</th>
                          
                        </tr>
                      </thead>
                      <tbody class="tabla_ajax">

                      <?php include('tablaOpcCom.php') ?>
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
      <!--MODAL-->
      <div class="modal fade" id="modalito">
                                  <div class="modal-dialog">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title">Modificar horario</h4>
                                      </div>
                                      <div class="modal-body col-md-12">
                                          <form id="modificar" >
                                          <input type="hidden" id="id" name="id" value="">
                                                 
                                                        <br>
                            
                              
                                                        <div class="input-group " style="padding-bottom:10px;">
                                                          <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                                                          <select id="grado"  class="form-control" name="diaUno" onchange="verificar()">
                                                          <option value="grado">Grado</option>
                                                              <?php include('combogrado.php')?>
                                                          </select>
                                                        </div>
                                                      
                                                          <br>
                                                          
                                                        <div class="input-group " style="padding-bottom:10px;">
                                                          <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
                                                          <select id="opc"  class="form-control" name="bloque" >
                                                          <option value="opcion">Opcion</option>
                                                             <?php include('comboopcion.php')?>
                                                          </select>
                                                        </div>
                                                      
                                                
                                                        <br>
                                                        <div class="input-group " style="padding-bottom:10px;">
                                                          <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                                                          <select id="seccion"  class="form-control" name="diaDos">
                                                          <option value="seccion">Seccion</option>
                                                              <?php include('comboseccion.php')?>
                                                          </select>
                                                      </div>
                                                    
                                                      
                                                      <br>
                                                      <div class="input-group col-md-6">
                                                      <span class="input-group-addon"><i class="class=fas fa-list-ol"></i></span>
                                                        <input id="cupo" type="number" class="form-control mask-cupo" name="cupo" placeholder="Cupo Maximo" min="1" max="50">
                                                                                </div>
                                                  
                                          
                                      </div>
                                        <br><br><br><br><br><br><br><br><br><br>
                                      
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                        <button id="guardar" type="button" class="btn btn-primary">Guardar Cambios</button>
                                      </div>
                                      </form>
                                    </div><!-- /.modal-content -->
                                  </div><!-- /.modal-dialog -->
              </div><!-- /.modal -->
          <!--MODAL-->

      <!-- start: Mobile -->
      
      <button id="mimin-mobile-menu-opener" class="animated rubberBand btn btn-circle btn-danger">
        <span class="fa fa-bars"></span>
      </button>
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


function editar(id, grado, nombre, seccion, cupo){
  $("#grado option[value="+grado+"]").prop("selected", true);
  $("#opc option[value="+nombre+"]").prop("selected", true);
  $("#seccion option[value="+seccion+"]").prop("selected", true);
//$("#dia1 option[value="+dia1+"]").prop("selected", true);
//$("#dia2 option[value="+dia2+"]").prop("selected", true);
//$("#estado option[value="+estado+"]").prop("selected", true);
//$("#bloque").val(horas);
//$("#id").val(id);
$("#modalito").modal();

}

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
  $consulta = "UPDATE topciones SET eestado = '0' WHERE eid_opcion = '".$baccion."'";
    $resultado = $conexion->query($consulta);
    if ($resultado) {
        msg("Exito");
    } else {
        msg("No Exito");
    }
}
if ($bandera == "activar") {
  $consulta = "UPDATE topciones SET eestado = '1' WHERE eid_opcion = '".$baccion."'";
    $resultado = $conexion->query($consulta);
    if ($resultado) {
        msg("Exito");
    } else {
        msg("No Exito");
    }
}
if ($bandera == "desaparecer") {
    $consulta  = "DELETE FROM empleado where idempleado='" . $baccion . "'";
    $resultado = $conexion->query($consulta);
    if ($resultado) {
        msg("Exito");
    } else {
        msg("No Exito");
    }
}
if ($bandera == 'enviar') {
    echo "<script type='text/javascript'>";
    echo "document.location.href='editempleado.php?id=" . $baccion . "';";
    echo "</script>";
    # code...
}
function msg($texto)
{
    echo "<script type='text/javascript'>";
    echo "alert('$texto');";
    echo "document.location.href='listaOpciones.php';";
    echo "</script>";
}
?>