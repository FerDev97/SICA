<?php
//Codigo que muestra solo los errores exceptuando los notice.
error_reporting(E_ALL & ~E_NOTICE);
session_start();
if($_SESSION["logueado"] == TRUE && $_SESSION["tipo"]==1) {
  $nombre=$_SESSION["usuario"];
  $tipo  =$_SESSION["tipo"];
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
  <title>Lista opciones Inactivas | SICA</title>

  <!-- start: Css -->
  <link rel="stylesheet" type="text/css" href="../asset/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="../asset/css/sweetalert2.css"/>

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

//SWEET ALERTS



        function sweetGuardo(str){
          swal(
  'Exito!',
  ''+str,
  'success'
)
        }
        function sweetError(str){
         swal({
  type: 'error',
  title: 'Error...',
  text: ''+str,
  footer: 'Revise que todos los campos esten completados.'
})
        }

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
          if (op==1) {
            sweetConfirm2(id);

          }else{
            sweetConfirm(id);

          }
        }
        function sweetConfirm(id){
        swal({
  title: '¿Está seguro que desea activar esta Opción de Bachillerato?',
  text: "¡No sera posible revertir esta acción!",
  type: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Continuar',
  cancelButtonText:'Cancelar',
}).then((result) => {
  if (result.value) {
    
     document.getElementById('bandera').value='activar';
            document.getElementById('baccion').value=id;
            document.turismo.submit();
  }
})
        }
        
         function sweetConfirm2(id){
        swal({
  title: '¿Está seguro que desea desactivar esta Opción de Bachillerato?',
  text: "¡No sera posible revertir esta acción!",
  type: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Continuar',
  cancelButtonText:'Cancelar',
}).then((result) => {
  if (result.value) {
    
    document.getElementById('bandera').value='desactivar';
            document.getElementById('baccion').value=id;
            document.turismo.submit();

  }
})
        }
        function reporte(){
          window.open("reporteOI.php",'_blank');
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
                        <h3 class="animated fadeInLeft">Lista de Opciones de Bachillerato Inactivas</h3>
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
                  <div class="panel-heading col-md-12">
                    
                         
                    <h3 class="col-md-4">Lista de Opciones Inactivas</h3> 
                     <span class="col-md-6"></span>
                     <div class="col-md-2">
                     <a class="btn btn-outline btn-default" >
                     <span onclick="reporte();" title="Opciones Inactivas"><i class="fa fa-print fa-lg"></i><br>Reporte </span>
                     </a>
                    </div>
                                                                           
                                                                        
           </div>
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
                      <?php include('tablaOpcComIna.php') ?>
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
                                        <h4 class="modal-title">Modificar Opcion</h4>
                                      </div>
                                      <div class="modal-body col-md-12">
                                          <form id="modificar" >
                                          <input type="hidden" id="id" name="id" value="">
                                                 
                                                        <br>
                            
                              
                                                        <div class="input-group " style="padding-bottom:10px;">
                                                          <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                                                          <select id="grado"  class="form-control" name="grado" onchange="verificar()">
                                                          
                                                              <?php include('combogrado.php')?>
                                                          </select>
                                                        </div>
                                                      
                                                          <br>
                                                          
                                                        <div class="input-group " style="padding-bottom:10px;">
                                                          <span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
                                                          <select id="opcion"  class="form-control" name="opcion" onchange="verificar()">
                                                          
                                                             <?php include('comboopcion.php')?>
                                                          </select>
                                                        </div>
                                                      
                                                
                                                        <br>
                                                        <div class="input-group " style="padding-bottom:10px;">
                                                          <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                                                          <select id="seccion"  class="form-control" name="seccion">
                                                        
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
<script src="../asset/js/sweetalert2.js"></script>



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
  $(document).ready(function(){
    $('#datatables-example').DataTable();

    $("#guardar").on('click',function(){
      var grado = $('#grado').val();
        var opcion = $('#opcion').val();
        var seccion = $('#seccion').val();
        var cupo = $('#cupo').val();

        if(grado == ""){
          sweetError("Grado incorrecto");
            return false;
        }
        if(opcion == ""){
            sweetError("No se selecciono una opcion");
            return false;
        }
        if(seccion == ""){
          sweetError("No se selcciono una seccion");
            return false;
        }
        if(cupo ==""||cupo<0||cupo>60){
          sweetError("Cupo incorrecto");
            return false;
        }
       
        var todo = $("#modificar").serialize();

        $.ajax({
            type: 'post',
            url: 'editarOpcion.php',
            data: todo,
            success: function(respuesta) {
             
                $("#grado option[value=0]").prop("selected",true);
                $("#opcion option[value=0]").prop("selected",true);
                $("#seccion option[value=0]").prop("selected",true);
                $("#cupo").val(0);
                $("#modalito").modal('hide');
                sweetGuardo(respuesta);
                $(".tabla_ajax").load("tablaOpcCom.php"); 
                //$('#datatables-example').DataTable();
            },
            error: function(respuesta){
              alert("Error en el servidor: "+respuesta); 
            }
        });//fin de ajax

      return false;
    });//fin del click
    
  });//fin del ready


function editar(id, grado, nombre, seccion, cupo){
 $("#grado option[value="+grado+"]").prop("selected", true);
 $("#opcion option[value="+nombre+"]").prop("selected", true);
 $("#seccion option[value="+seccion+"]").prop("selected", true);
$("#cupo").val(cupo);
//$("#dia2 option[value="+dia2+"]").prop("selected", true);
//$("#estado option[value="+estado+"]").prop("selected", true);
//$("#bloque").val(horas);
$("#id").val(id);
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
function msg($texto)
{
    echo "<script type='text/javascript'>";
    echo "alert('$texto');";
    echo "document.location.href='listaOpciones.php';";
    echo "</script>";
}

if ($bandera == "desactivar") {
  $consulta = "UPDATE topciones SET eestado = '0' WHERE eid_opcion = '".$baccion."'";
    $resultado = $conexion->query($consulta);
    if ($resultado) {
     msg("Dato Activado");
    } else {
        msg("No se desactivo el registro");
    }
}
if ($bandera == "activar") {
  $consulta = "UPDATE topciones SET eestado = '1' WHERE eid_opcion = '".$baccion."'";
    $resultado = $conexion->query($consulta);
    if ($resultado) {
    msg("Dato activado");
    } else {
      msg("No se activo el registro");
    }
}
if ($bandera == "desaparecer") {
    $consulta  = "DELETE FROM empleado where idempleado='" . $baccion . "'";
    $resultado = $conexion->query($consulta);
    if ($resultado) {
        msg("Exito");
    } else {
      sweetError("No se activo el registro");
    }
}
if ($bandera == 'enviar') {
    echo "<script type='text/javascript'>";
    echo "document.location.href='editempleado.php?id=" . $baccion . "';";
    echo "</script>";
    # code...
}


?>