<?php
//Codigo que muestra solo los errores exceptuando los notice.
error_reporting(E_ALL & ~E_NOTICE);
session_start();
if($_SESSION["logueado"] == TRUE && $_SESSION["tipo"]==1) {
$nombre=$_SESSION["usuario"];
$tipo  = $_REQUEST["tipo"];
$id  = $_REQUEST["id"];

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
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="description" content="Miminium Admin Template v.1">
  <meta name="author" content="Isna Nur Azis">
  <meta name="keyword" content="">
  <meta name="viewport" content="width=devi
  ce-width, initial-scale=1">
  <title>SICA-Opciones</title>
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
         function confirmar(id)
        {
          if (confirm("!!Advertencia!! Desea Eliminar Este Registro?")) {
            document.getElementById('bandera').value='desaparecer';
            document.getElementById('baccion').value=id;
            alert(id);
            document.turismo.submit();
          }else
          {
            alert("Error al borrar.");
          }
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
                        <h3 class="animated fadeInLeft">Gestionar Opciones</h3>
                        <p class="animated fadeInDown">
                          SICA <span class="fa-angle-right fa"></span> Datos del Opcion de Bachillerato.
                        </p>
                    </div>
                  </div>
              </div>
              <form id="insertar" name="turismo" action="" method="post">
              <input type="hidden" name="bandera" id="bandera">
              <input type="hidden" name="baccion" id="baccion" value="<?php echo $idcatalogoR; ?>" >
              <input type="hidden" name="aux" id="aux" value="<?php echo $aux; ?>">
              <input type="hidden" name="r" id="r" value="">
              <div class="col-md-12">
                  <div class="col-md-6 panel panel-info">
                    <div class="col-md-12 panel-heading">
                      <h4>Formulario De Nueva Opcion de Bachillerato</h4>
                    </div>

                    <div class="col-md-12 panel-body" style="padding-bottom:30px;">
                      <div class="col-md-12">
                        <form class="cmxform" id="insertar" method="post" action="">

                          <div class="col-md-12">
                          <!--<div class="input-group">
                           <span class="input-group-addon"><i class="glyphicon glyphicon-barcode"></i></span>
                           <input id="codigo" type="text" style="width: 300px; font-size: 15px" class="form-control" name="codigo" placeholder="Codigo" readonly>
                           </div>-->
                           </br>
                           </br>
                           <div class="form-group form-animate-text" style="margin-top:5px !important;margin-bottom:30px !important;">
                             <i  class="fa fa-clipboard"></i><span class="label label-default" style="width: 100px; font-size: 15px; margin-right:13px">Grado: </span>
                              <select id="grado" class="select2 show-tick" style="width: 350px; font-size: 15px" name="gradom">
                              <option value="grado">Grado</option>
                               <?php include('combogrado.php')?>
                              </select>
                              <button title="Agrega Nuevo Grado el Sistema" style="margin-left:19px; size:40px;" class="btn btn-info" type="button" data-toggle="modal" data-target="#modalGrado">+</button>
                              </div>
                            
                              <div class="form-group form-animate-text" style="margin-top:5px !important;margin-bottom:30px !important;">
                             <i  class="fa fa-book"></i><span class="label label-default" style="width: 100px; font-size: 15px; margin-right:13px">Opcion </span>
                              <select  id="opc" class="select2 show-tick" style="width: 350px; font-size: 15px" name="opc" onchange="verificar()">
                              <option value="opcion">Opcion</option>
                              <?php include('comboopcion.php')?>
                              </select>
                              <button title="Agrega Nueva Opcionel al Sistema" style="margin-left:19px;" class="btn btn-info" type="button" data-toggle="modal" data-target="#modalForm">+</button>
                              </div>
                              <div class="form-group form-animate-text" style="margin-top:5px !important;margin-bottom:30px !important;">
                             <i  class="fa fa-users"></i><span class="label label-default" style="width: 100px; font-size: 15px">Seccion:</span>
                              <select id="seccion" class="select2 show-tick" style="width: 350px; font-size: 15px" name="seccion">
                              <option value="seccion">Seccion</option>
                              <?php include('comboseccion.php')?>
                              </select>
                              <button   style="margin-left:16px; border-radius: 50px 20px" class="btn btn-info" type="button" data-toggle="modal" data-target="#modalSeccion">+</button>
                              </br>
                              </br>
                              </br>
                              <div class="input-group col-md-6">
                              <span class="input-group-addon"><i class="class=fas fa-list-ol"></i></span>
                               <input id="cupo" type="number" class="form-control mask-cupo" name="cupo" placeholder="Cupo Maximo" min="1" max="50">
                           </div>
                           
                          </div> 
                        </div>
                               <div class="col-md-12">
                                <div class="col-md-3"></div>

                              <div class="col-md-3">
                              <br><b></b>
                              <input type="button" id="guardar" name="guardar" class="next action-button btn btn-info btn-sm btn-round" style="font-size:20px;" value="Guardar" />
                              </div>
                          <div>
                            <br><b></b>
                          
                            <input type="reset" name="next" class="next action-button btn btn-danger btn-sm btn-round" style="font-size:20px;" value="Cancelar" />
                              </div>

                              
                        </div>
                        </div>
                      </form>

                    </div>
                  </div>
                  


                <div class="col-md-6">
                  <div class="col-md-12">
                  <div class="panel">
                  <div class="panel-heading"><h3>Lista de Opciones de Bachillerato Activas</h3></div>
                    <div class="panel-body">
                      <div class="responsive-table">
                      <table id="datatables-example" class="table table-striped table-bordered" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                          
                          <th>Codigo</th>
                          <th>Opcion</th>
                          <th>Tipo</th>
                          <th>Descripcion</th>
                         
                        </tr>
                      </thead>
                      <tbody>
                      <?php
include "../config/conexion.php";
$result = $conexion->query("select * from tbachilleratos where eestado='1' order by eid_bachillerato");
if ($result) {
    while ($fila = $result->fetch_object()) {
        echo "<tr>";
        
        //echo "<tr>";
        //echo "<td><img src='img/modificar.png' style='width:30px; height:30px' onclick=modify(".$fila->idasignatura.",'".$fila->codigo."','".$fila->nombre."');></td>";
        //echo "<td><img src='img/eliminar.png' style='width:30px; height:30px' onclick=elyminar(".$fila->idasignatura.",'".$fila->nombre."');></td>";
        echo "<td>" . $fila->ccodigo . "</td>";
        echo "<td>" . $fila->cnombe . "</td>";
        if(eestado=='1'){
          echo "<td>Activo</td>";
        }else{
          echo "<td>Inactivo</td>";
        }
        echo "<td>" . $fila->cdescripcion . "</td>";
        

        

        
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
<!--Modales-->

          <!-- end: right menu -->

      </div>
<!-- Modal de Grado-->
<div class="modal fade" id="modalGrado" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">×</span>
                    <span class="sr-only">Close</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Forumulario de Nuevo Grado</h4>
            </div>
            <!-- Modal Body -->
            <div class="modal-body">
                <p class="statusMsg"></p>
                  <!--aqui va el codigo-->
                  <div class="input-group">
                  <span class="input-group-addon"><i class="fa fa-clipboard"></i></span>
                  <form id="insertarG">
                  <input id="gradom" type="number" style="width: 400px; font-size: 15px" class="form-control" name="gradom" placeholder="Nuevo Grado" min="1" max="3">
                  </div>
                  <br>
                   <center>
                   <div class="input-group">
                  <button title="Agrega Nuevo Grado al Sistema" style="margin-left:0px;" class="btn btn-info" type="button" id="guardarG" name="guardarG" data-dismiss="modal">
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
   <!-- Modal de Secciones-->
 <div class="modal fade" id="modalSeccion" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">×</span>
                    <span class="sr-only">Close</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Forumulario de Seccion</h4>
            </div>
            <!-- Modal Body -->
            <div class="modal-body">
                <p class="statusMsg"></p>
                  <!--aqui va el codigo-->
                  
                  <div class="input-group" style="margin-left:75px">
                  <span class="input-group-addon"><i class="fa fa-users"></i></span>
                  <form id="insertarS">
                  <input id="seccionm" type="text" style="width: 400px; font-size: 15px;" class="form-control" name="seccionm" placeholder="Nueva Seccion" >
                  </div>
                  <br>
                   <center>
                   <div class="input-group">
                  <button title="Agrega Nueva Opcionel al Sistema" data-dismiss="modal" style="margin-left:0px;" class="btn btn-info" type="button" id="guardarS" name="guardarS" >
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

  <!-- Fin Modal de Secciones -->
  


<!-- Modal de opciones-->
    <div class="modal fade" id="modalForm" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">×</span>
                    <span class="sr-only">Close</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Forumulario de Nueva Opcion de Bachillerato</h4>
            </div>
            <!-- Modal Body -->
            <div class="modal-body">
                <p class="statusMsg"></p>
                  <!--aqui va el codigo-->
                  <div class="input-group">
                           <span class="input-group-addon"><i class="glyphicon glyphicon-barcode"></i></span>
                           <form id="insertarB">
                           <input id="codigoo" type="text" style="width: 300px; font-size: 15px" class="form-control" name="codigoo" placeholder="Codigo">
                            </div>
                            <br>
                            <div class="input-group">
                           <span class="input-group-addon"><i class="glyphicon glyphicon-book"></i></span>
                           <input id="nombrem" type="text" style="width: 300px; font-size: 15px" class="form-control" name="nombrem" placeholder="Nombre de Opcion">
                            </div>
                            <br>
                            <div class="form-group form-animate-text" style="margin-top:5px !important;margin-bottom:30px !important;">
                             <i  class="fa fa-users"></i><span class="label label-default" style="width: 50px; font-size: 15px">Tipo Bachillerato:</span>
                              <select id="tipob" class="select2 show-tick" style="width: 230px; font-size: 15px" name="tipob">
                              <option value="tipo">Tipo</option>
                              <?php
                                  include('combotipo.php')?> 
                              </select>
                              <button   style="margin-left:16px;" class="btn btn-info" type="button" data-toggle="modal" data-dismiss="modalForm" data-target="#modalTipo">Nuevo Tipo</button>
                    <br><br>
                        </div>
                     <div class="input-group"style="padding-bottom:0px;">
                          <span class="input-group-addon"><span class="glyphicon glyphicon-book"></span></span>
                          <textarea style="width: 500px" rows="3" size="100" value="" class="form-control" name="descripcion" placeholder="Descripcion" id="descripcion"></textarea>
                    </div> 
                    <br>         
                    <center>
                   <div class="input-group">
                  <button title="Agrega Nueva Opcionel al Sistema"  style="margin-left:0px;" class="btn btn-info" type="button" id="guardarB" name="guardarB">
                  Guardar</button>

                  <button style="margin-left:15px" type="button" class="btn" data-dismiss="modal">Cerrar</button>
                  </div>
                  </center>
                  </form>
                  <br>
                  <center><h4>Registro</h4></center>
                  
                  <div class="modal-body">
                <p class="statusMsg"></p>
                  <table id="datatables-example" class="table table-striped table-bordered" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                    
                      <th>Codigo</th>
                      <th>Nombre</th>
                      <th>Tipo</th>
                    </tr>
                  </thead>
                  <tbody id="tablaopc">
                  <?php
                                  include('tablaModalOpc.php')?> 
      </tbody>
        </table>
            </div>



            </div>
            <!-- Modal Footer -->
            <div class="modal-footer">
                
            </div>
        </div>
    </div>
</div>

  <!-- Fin Modal de opciones -->
   <!-- Modal de Tipo bachillerato-->
 <div class="modal fade" id="modalTipo" role="dialog">
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
                  <form id="insertarT">
                  <div class="input-group" style="margin-left:75px">
                  <span class="input-group-addon"><i class="fa fa-book"></i></span>
                  <input id="tipom" type="text" style="width: 400px; font-size: 15px;" class="form-control" name="tipom" placeholder="Nuevo tipo de Bachillerato" >
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
<script src="../asset/js/sweetalert2.js"></script>

<!-- custom -->
<script src="../asset/js/main.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
    $('#datatables-example').DataTable();
  });
  $(document).ready(function(){
    
    //$('#datatables-example').DataTable();
     
     $('#guardar').on('click',function(){
        var opcion = $('#opc').val();
        var grado = $('#grado').val();
        var seccion = $('#seccion').val();
        var cupo = $('#cupo').val();

        if(opcion == "opcion"||grado=="grado"||seccion=="seccion"){
            sweetError("Por favor llene el formulario. Todos los campos son obligatorios");
         
            return false;
        }else if(cupo < 1||cupo>60){
            sweetError("El cupo es erroneo cupo maximo 60 alumnos");
        
            return false;
        }
        var todo = $("#insertar").serialize();

        $.ajax({
            type: 'post',
            url: '../pages/agregarOPcion.php?accion=guardarOpc',
            data: todo,
            success: function(respuesta) {
                sweetGuardo(respuesta);
             
            },
            error: function(respuesta){
              alert("Error en el servidor: "+respuesta); 
            }
        });

      return false;
        

     });//fin del click
  });//fin del ready
  //Ajax para Guardar grado
  $(document).ready(function(){
  $('#guardarG').on('click',function(){
        var grado = $('#gradom').val();
        if(grado == ""){
            sweetError("Por favor llene correctamente los datos");
            
            return false;
        }else if(grado<1||grado>3){
            sweetError("El formato de grados en bachillerato es de 1° a 3°");
         
            return false;
        }
        var todo = $("#insertarG").serialize();

        $.ajax({
            type: 'post',
            url: '../pages/agregarOPcion.php?accion=guardarGrado',
            data: todo,
            success: function(respuesta) {
                sweetGuardo(respuesta); 
                $("#grado").load("combogrado.php");
                $("#modalGrado").modal('hide');
                
            },
            error: function(respuesta){
              alert("Error en el servidor: "+respuesta); 
            }
        });

      return false;
        

     });//fin del click
    });//fin del ready
    //Ajax para Guardar Tipo
  $(document).ready(function(){
  $('#guardarT').on('click',function(){
        var grado = $('#tipom').val();
       

        if(grado == ""){
            sweetError("Por favor llene correctamente los datos");
            return false;
        }
        var todo = $("#insertarT").serialize();

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
    //Ajax para Guardar Bachillerato
  $(document).ready(function(){
  $('#guardarB').on('click',function(){
        var codigo = $('#codigoo').val();
        var nombre = $('#nombrem').val();
        var descripcion = $('#descripcion').val();
        var tipo = $('#tipob').val();
        if(tipo == "tipo"){
            sweetError("Ingrese Tipo de bachillerato");
           
            return false;
        }else if(codigo==""||nombre==""||descripcion==""){
            sweetError("Por favor.! Complete los campos");
            return false;
        }
        var todo = $("#insertarB").serialize();

        $.ajax({
            type: 'post',
            url: '../pages/agregarOPcion.php?accion=guardarBto',
            data: todo,
            success: function(respuesta) {
                sweetGuardo(respuesta);
                $("#opc").load("comboopcion.php"); 
                $("#tablaopc").load("tablaModalOpc.php");
                
            },
            error: function(respuesta){
              alert("Error en el servidor: "+respuesta); 
            }
        });

      return false;
        

     });//fin del click
    });//fin del ready
    //Ajax para Guardar Seccion
  $(document).ready(function(){
  $('#guardarS').on('click',function(){
        var seccion = $('#seccionm').val();
       

        if(seccion == ""){
            sweetError("Por favor llene correctamente los datos");
            return false;
        }
        var todo = $("#insertarS").serialize();

        $.ajax({
            type: 'post',
            url: '../pages/agregarOPcion.php?accion=guardarSeccion',
            data: todo,
            success: function(respuesta) {
                sweetGuardo(respuesta);
                $("#seccion").load("comboseccion.php"); 
                $("#modalSeccion").modal('hide');
                
            },
            error: function(respuesta){
              alert("Error en el servidor: "+respuesta); 
            }
        });

      return false;
        

     });//fin del click
    });//fin del ready
//Mascaras
$(document).ready(function(){
  $('.mask-cupo').mask('00');
});



</script>
<!-- end: Javascript -->
</body>
</html>
<?php
} else {
  header("Location: index.php");
  }
  
?>
