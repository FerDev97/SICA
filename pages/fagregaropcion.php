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
<?php

$id  = $_REQUEST["id"];
$aux = " ";

include "../config/conexion.php";
$result = $conexion->query("select * from tcargos where eid_cargos=" . $id);
if ($result) {
    while ($fila = $result->fetch_object()) {
        $idcargosR   = $fila->eid_cargo;
        $nombreR     = $fila->ccargo;
       
    }
    $aux = "modificar";
}
//Query para generar codigo.

                 $resultc = $conexion->query("select eid_bachillerato as id from tbachilleratos");
                     if ($resultc) {

                       while ($filac = $resultc->fetch_object()) {
                         $temp=$filac->id;
                        
                          }
                     }   
                     $codigo=sprintf("%03s",$temp+1);           

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="description" content="Miminium Admin Template v.1">
  <meta name="author" content="Isna Nur Azis">
  <meta name="keyword" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Mantenimiento Opciones | SICA</title>
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

      function verificar(){
          if( document.getElementById('nombre').value=="" ){
            alert("Complete los campos");
          }else{
            if (document.getElementById("aux").value=="modificar") {
              alert('Va a modificar.');
           
            document.getElementById('bandera').value="modificar";
            document.turismo.submit();
            }else
            {
              document.getElementById('bandera').value="add";
              document.turismo.submit();
            }
            }
        }
      

        function modify(id)
        {
          document.getElementById('nombre').value="";
         document.location.href='fcargo.php?id='+id;
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
        function reporte2(id){
        //  alert(id);
           window.open("../ayuda/fopcion.pdf",'_blank');
        }
       

      </script>
</head>

<body id="mimin" class="dashboard">
      <?php include "header.php"?>

      <div class="container-fluid mimin-wrapper">

<?php include "menu.php";?>
            <div id="content">
               <div class="panel box-shadow-none content-header">
                  <div class="panel-body">
                    <div class="col-md-12">
                        <h3 class="animated fadeInLeft" class="col-md-2">Mantenimiento Opción</h3>
                        <p class="animated fadeInDown">
                          SICA <span class="fa-angle-right fa"></span> Datos de Opción.
                        </p>
                        <span class="col-md-10"></span>
                    <div class="col-md-2">
                    <a class="btn btn-outline btn-default" >
                    <span onclick="reporte2();" title="Ayuda"><i class="fa fa-search"></i><br>Ayuda</span>
                    </a>
                    </div>
                    </div>
                  </div>
              </div>
              <form id="insertar" name="turismo" action="" method="post">
              <input type="hidden" name="bandera" id="bandera">
              <input type="hidden" name="baccion" id="baccion" value="<?php echo $idcatalogoR; ?>" >
              <input type="hidden" name="aux" id="aux" value="<?php echo $aux; ?>">
              <input type="hidden" name="r" id="r" value="">
              <div class="col-md-12">
                  <div class="col-md-5 panel panel-info">
                    <div class="col-md-12 panel-heading">
                      <h4>Formulario de Opción</h4>
                    </div>

                    <div class="col-md-12 panel-body" style="padding-bottom:30px;">
                      <div class="col-md-12">
                        <form class="cmxform" id="insertar" method="post" action="">

                          <div class="col-md-12">
                          <div class="input-group">
                              <span class="input-group-addon"><i class="glyphicon glyphicon-barcode"></i></span>
                                  <input style="width:250px;" id="codigoo" type="text" class="form-control" name="codigoo" placeholder="Codigo" readonly>
                                  
                              </div>  
                              <br>
                              <div class="input-group">
                              <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                              <input id="nombrem" type="text" class="form-control" name="nombrem" placeholder="Nombre de Opción">
                              </div>
                              <br>
                              <div class="input-group">
                              <div class="form-group form-animate-text" style="margin-top:5px !important;margin-bottom:30px !important;">
                             <i  class="fa fa-users"></i><span class="label label-default" style="width: 50px; font-size: 12px">Tipo Bachillerato:</span>
                              <select id="tipob" class="select2 show-tick ajaxtipo" style="width: 200px; font-size: 15px" name="tipob">
                              <option value="tipo" selcted hidden>Tipo</option>

                                <?php
                                  include('combotipo.php')?>

                              </select>
                              <button   style="margin-left:16px;" class="btn btn-info" type="button" data-toggle="modal" data-dismiss="modalForm" data-target="#modalTipoo">Nuevo Tipo</button>
                                <br><br>
                                </div>
                                </div>
                                <div class="input-group"style="padding-bottom:0px;">
                                    <span class="input-group-addon"><span class="glyphicon glyphicon-book"></span></span>
                                    <textarea style="width: 500px" rows="3" size="100" value="" class="form-control" name="descripcion" placeholder="Descripción" id="descripcion"></textarea>
                                </div> 
                        </div>
                               <div class="col-md-12">
                                <div class="col-md-3"></div>

                              <div class="col-md-3">
                              <br><b></b>
                              <input title="Agrega Nueva Opcionel al Sistema" type="button" name="guardar" id="guardar" class="next action-button btn btn-info btn-sm btn-round" style="font-size:20px;" value="Guardar" />
                              </div>
                          <div>
                            <br><b></b>
                          
                              <input type="reset" name="next" class="next action-button btn btn-danger btn-sm btn-round" style="font-size:20px;" onclick="limpiar()" value="Cancelar" />
                              </div>
                              
                              
                        </div>
                        </div>
                      </form>

                    </div>
                  </div>
                  


                <div class="col-md-7">
                  <div class="col-md-12">
                  <div class="panel">
                  <div class="panel-heading"><h3>Lista de Opciones de Bachillerato</h3></div>
                    <div class="panel-body">
                      <div class="responsive-table">
                      <table id="datatables-example" class="table table-striped table-bordered" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                          <th>Codigo</th>
                          <th>Nombre</th>
                          <th>Tipo</th>
                          <th>Estado</th>
                          <th>Alta/Baja</th>
                          <th>Editar</th>
                        </tr>
                      </thead>
                      <tbody class="tabla_ajax">
                      <?php include('tablaOpciones.php') ?>
                      </tbody>
                        </table>

                      </div>
                  </div>
                </div>
              </div>
              </div>


                </form>
              </div>

              </div>
              </div>
              </div>
            </div>
          <!-- end: content -->
           </div>
              
                
              </div>

              </form>
            </div>
          <!-- end: content -->


          <!-- end: right menu -->

      </div>
      <!-- Modal de Tipo bachillerato-->
 <div class="modal fade" id="modalTipoo" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">×</span>
                    <span class="sr-only">Close</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Forumulario de Tipo de Bachillerato</h4>
            </div>
            <!-- Modal Body -->
            <div class="modal-body">
                <p class="statusMsg"></p>
                  <!--aqui va el codigo-->
                  <form id="insertarTi">
                  <div class="input-group" style="margin-left:75px">
                  <span class="input-group-addon"><i class="fa fa-book"></i></span>
                  <input id="tipomo" type="text" style="width: 400px; font-size: 15px;" class="form-control" name="tipomo" placeholder="Nuevo tipo de Bachillerato" >
                  </div>
                  <br>
                   <center>
                   <div class="input-group">
                  <button title="Agrega Nueva Opcionel al Sistema" id="guardarT" name="guardarT" style="margin-left:0px;" class="btn btn-info" type="button" >
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

  <!-- Fin Modal de Tipo Bachillerato --> 
  <!--MODAL-->
  <div class="modal fade" id="modalito">
                                  <div class="modal-dialog">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title">Modificar Opcion</h4>
                                      </div>
                                      
                                          <form id="modificarOpc">
                                          <input type="hidden" name="id" id="id">
                                          <div class="modal-body col-md-6">
                                          <input id="codigo" type="text" style="width: 300px; font-size: 15px" class="form-control" name="codigo" placeholder="Codigo" readonly>
                                          </div>
                            
                            <div class="input-group">
                            <div class="modal-body col-md-6">
                           <input id="nombre" type="text" style="width: 300px; font-size: 15px" class="form-control" name="nombre" placeholder="Nombre de Opcion">
                            </div> </div>
                            <br>
                            <div class="modal-body col-md-6">
                            <div class="form-group form-animate-text" style="margin-top:5px !important;margin-bottom:30px !important;">
                             <i  class="fa fa-users"></i><span class="label label-default" style="width: 50px; font-size: 15px">Tipo Bachillerato:</span>
                              <select id="tipo" class="select2 show-tick" style="width: 290px; font-size: 15px" name="tipo">
                              <option value="tipo">Tipo</option>
                              <?php
                                  include('combotipo.php')?> 
                              </select>    
                           <br>
                        </div>
                        </div>
                        <div class="input-group">
                        <div class="modal-body col-md-8">
                          <textarea style="width: 400px" rows="3" size="80" value="" class="form-control" name="descrip" placeholder="Descripcion" id="descrip"></textarea>
                     </div>
                     </div>
                      
                        
                    <br>         
                                        <br>
                                        <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                        <button id="guardarB" type="button" class="btn btn-primary">Guardar Cambios</button>
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
  $('#guardar').on('click',function(){
        var codigo = $('#codigoo').val();
        var nombre = $('#nombrem').val();
        var descripcion = $('#descripcion').val();
        var tipo = $('#tipob').val();
        if(codigo==""||nombre==""||descripcion==""){
          sweetError("Complete los campos");
            return false;
        }else if(tipo == "tipo"){
          sweetError("Ingrese Tipo de bachillerato");
            return false;
        }
        var todo = $("#insertar").serialize();

        $.ajax({
            type: 'post',
            url: '../pages/agregarOPcion.php?accion=guardarBto',
            data: todo,
            success: function(respuesta) {
             sweetGuardo(respuesta);
                $(".tabla_ajax").load("tablaOpciones.php"); 
                
            },
            error: function(respuesta){
              alert("Error en el servidor: "+respuesta); 
            }
        });

      return false;
        

     });//fin del click
    });//fin del ready
    $(document).ready(function () {
                $("#nombrem").keyup(function () {
                 
                    var value = $(this).val();
                    $cod = value.substr(0, 3).toUpperCase();
                    if (value != "") {
                        var numero = Math.floor(Math.random() * (999 - 100)) + 100;
                        $codigo = $cod + numero;
                        $("#codigoo").val($codigo);
                    } else {
                        $("#codigoo").val("");
                    }

                });
            });
 //Ajax para Guardar Tipo
 $(document).ready(function(){
  $('#guardarT').on('click',function(){
        var grado = $('#tipomo').val();
        if(grado ==""){
          sweetError("Por favor.. llene correctamente los datos");
            return false;
        }
        var todo = $("#insertarTi").serialize();

        $.ajax({
            type: 'post',
            url: '../pages/agregarOPcion.php?accion=guardarTipo',
            data: todo,
            success: function(respuesta) {
                sweetGuardo(respuesta);
                $("#tipob").load("combotipo.php");
                $("#modalTipo").modal('hide');
                
                
            },
            error: function(respuesta){
              alert("Error en el servidor: "+respuesta); 
            }
        });

      return false;
        

     });//fin del click
    });//fin del ready
function editar(id, codigo, nombre, descripcion, tipo){
  $("#tipo option[value="+tipo+"]").prop("selected", true);
  $("#codigo").val(codigo);
  $("#nombre").val(nombre);
  $("#descrip").val(descripcion);
 
//$("#dia2 option[value="+dia2+"]").prop("selected", true);
//$("#estado option[value="+estado+"]").prop("selected", true);
//$("#bloque").val(horas);
$("#id").val(id);
$("#modalito").modal();

}
$(document).ready(function(){
    $('#datatables-example').DataTable();

    $("#guardarB").on('click',function(){
      
        var nombre = $('#nombre').val();
        var tipo = $('#tipo').val();
        var descrip = $('#descrip').val();

        if(nombre == ""){
            sweetError("Complete el campo nombre");
            return false;
        }
        if(tipo == ""){
            sweetError("No selecciono un tipo");
            return false;
        }
        if(descrip == ""){
            sweetError("Agregue una descripcion");
            return false;
        }
      
       
        var todo = $("#modificarOpc").serialize();

        $.ajax({
            type: 'post',
            url: 'editarBto.php',
            data: todo,
            success: function(respuesta) {
             
               // $("#tipo option[value=0]").prop("selected",true);
               // $("#descrip").val(0);
               // $("#nombre").val(0);
               // $("#codigo").val(0);
                $("#modalito").modal('hide');
                sweetGuardo(respuesta);
                $(".tabla_ajax").load("tablaOpciones.php"); 
             
            },
            error: function(respuesta){
              alert("Error en el servidor: "+respuesta); 
            }
        });//fin de ajax
      return false;
    });//fin del click
  });//fin del ready



</script>
<!-- end: Javascript -->
</body>
</html>
<?php
function msg($texto)
{
    echo "<script type='text/javascript'>";
    echo "alert('$texto');";
    echo "document.location.href='fagregaropcion.php';";
    echo "</script>";
}
function msgConf($texto)
{
    echo "<script type='text/javascript'>";
    echo "sweetConfirm('$texto');";
    echo "document.location.href='fagregaropcion.php';";
    echo "</script>";
}
function msgGuar($texto)
{
    echo "<script type='text/javascript'>";
    echo "sweetGuardo('$texto');";
    echo "document.location.href='fagregaropcion.php';";
    echo "</script>";
}
function msgError($texto)
{
    echo "<script type='text/javascript'>";
    echo "sweetError('$texto');";
    echo "</script>";
}


include "../config/conexion.php";
$bandera      = $_REQUEST["bandera"];
$baccion      = $_REQUEST["baccion"];

if ($bandera == "desactivar") {
 
         $result1 = $conexion->query("SELECT * FROM tmaterias where efk_idopcion=".$baccion);
        if ($result1->num_rows == 0) {
        $consulta = "UPDATE tbachilleratos SET eestado = '0' WHERE eid_bachillerato = '".$baccion."'";
            $resultado = $conexion->query($consulta);
            if ($resultado) {
               msgGuar("Registro desactivado");
            } else {
              msgError("No se desactivo el registro");
            }
  }else{
    msgError("Imposible desactivar el registro porque ya tiene materias asignadas");
  }

  
}else if ($bandera == "activar") {
  $consulta = "UPDATE tbachilleratos SET eestado = '1' WHERE eid_bachillerato = '".$baccion."'";
    $resultado = $conexion->query($consulta);
    if ($resultado) {
      msgGuar("Registro Activado");
    } else {
      msgError("No se activo el registro");
    }
}





?>