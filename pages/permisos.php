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
  <title>Asignar permisos | SICA</title>

  <!-- start: Css -->
  <link rel="stylesheet" type="text/css" href="../asset/css/bootstrap.min.css">

  <!-- plugins -->
  <link rel="stylesheet" type="text/css" href="../asset/css/plugins/font-awesome.min.css"/>
  <link rel="stylesheet" type="text/css" href="../asset/css/plugins/datatables.bootstrap.min.css"/>
  <link rel="stylesheet" type="text/css" href="../asset/css/plugins/animate.min.css"/>
  <link href="../asset/css/style.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="../asset/css/sweetalert2.css"/>
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
        function reporte(id){
        //  alert(id);
           window.open("../ayuda/permisot.pdf",'_blank');
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
                        <h3 class="animated fadeInLeft" class="col-md-2">Permisos Temporales</h3>
                        <p class="animated fadeInDown">
                          Tabla <span class="fa-angle-right fa"></span> Tabla de Datos
                        </p>
                    <span class="col-md-10"></span>
                    <div class="col-md-2">
                    <a class="btn btn-outline btn-default" >
                    <span onclick="reporte();" title="Ayuda"><i class="fa fa-search"></i><br>Ayuda</span>
                    </a>
                    </div>
                        
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
                         
                          <th>Permisos</th>

                        </tr>
                      </thead>
                      <tbody class="tabla_ajax">

                       <?php include('tablaPermisos.php') ?>

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
<div class="modal fade" id="modalPermiso">
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
            <form id="permisos">
                <input type="hidden" id="id" value="">
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
                  <button  style="margin-left:0px;" class="btn btn-info" type="button" id="guardar">
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

    $("#guardar").on('click', function(){

        var id = $("#id").val();
        var perIns = 0;
        var perEst = 0;

        if($('#perIns').prop('checked')){
          perIns = 1;
        }
        if($('#perEst').prop('checked')){
          perEst = 1;
        }

        swal({
            title: '¿Está seguro de realizar estos cambios?',
            text: "",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            cancelButtonText: 'Cancelar',
            confirmButtonText: 'Si, seguro'
        }).then((result) => {
            if (result.value) {

                  $.ajax({
                      type: 'post',
                      url: 'editarPermisos.php',
                      data: {id:id, perIns:perIns, perEst:perEst},
                      success: function(respuesta) {
                            
                
                          if(respuesta==1){
                            
                            $("#modalPermiso").modal('hide');
                            sweetGuardo("Se asignó correctamente");
                            $(".tabla_ajax").load("tablaPermisos.php"); 
                            $('#datatables-example').DataTable();
                              
                          }
                          if(respuesta==2){
                            
                            $("#modalito").modal('hide');
                            sweetError("Error del servidor: No se modificaron los datos");
                          }
                          
                          
                          
                      },
                      error: function(respuesta){
                        sweetError("Error en el servidor: "+respuesta); 
                      }
                  });//fin de ajax
     
            }
        })

        

      return false;


    });//fin del click
  });//fin del ready

  function editar(id, pinscripcion, pestadisticas){

        if(pinscripcion == 1){
          $('#perIns').prop('checked',true)
        }else{
          $('#perIns').prop('checked',false)
        }
        if(pestadisticas == 1){
          $('#perEst').prop('checked',true)
        }else{
          $('#perEst').prop('checked',false)
        }

        $("#id").val(id);
        $("#modalPermiso").modal();

  }


    
            //SWEET ALERTS
            function sweetConfirm(){
                    swal({
                      title: '¿Está seguro que desea continuar?',
                      text: "¡No sera posible revertir esta acción!",
                      type: 'warning',
                      showCancelButton: true,
                      confirmButtonColor: '#3085d6',
                      cancelButtonColor: '#d33',
                      confirmButtonText: 'Continuar',
                      cancelButtonText:'Cancelar',
                     }).then((result) => {
                         if (result.value) {
                                swal(
                                  '¡Exito!',
                                  'La accion ha sido completada.',
                                  'success'
                                )
                              }
                        })
                      }


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

                    function sweetWar(str){
                    swal({
                        type: 'warning',
                        title: 'Advertencia...',
                        text: ''+str,
                        footer: 'Revise que todos los campos esten completados.'
                     })
                    }
                    function sweetWar2(str){
                    swal({
                        type: 'warning',
                        title: 'Advertencia...',
                        text: ''+str,
                        footer: 'Elija correctamente los datos'
                     })
                    }
                    function sweetInfo(titulo,str){
                    swal({
                        type: 'info',
                        title: ''+titulo,
                        text: ''+str
                        
                     })
                    }

                  //SWEET ALERTS 
</script>
<!-- end: Javascript -->
</body>
</html>
