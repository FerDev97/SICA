<!DOCTYPE html>
<?php
//Codigo que muestra solo los errores exceptuando los notice.
error_reporting(E_ALL & ~E_NOTICE);
$accion=$_REQUEST['accion'];
if($accion=="guardarG")
{
    guardarGrado();
}else if($accion=="guardarS")
{
    guardarSeccion();
}else if($accion=="guardarO")
{
    guardarOpcion();
}else if($accion=="guardarOpc")
{
    guardarOpcionCompleta();
}else if($accion=="guardarT")
{
    guardarTipo();
}

?>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Opciones</title>

  <!-- start: Css -->
  <link rel="stylesheet" type="text/css" href="../asset/css/bootstrap.min.css">
  <!-- plugins -->
  <link rel="stylesheet" type="text/css" href="../asset/css/plugins/datatables.bootstrap.min.css"/>
  <link rel="stylesheet" type="text/css" href="../asset/css/plugins/font-awesome.min.css"/>
  <link rel="stylesheet" type="text/css" href="../asset/css/plugins/animate.min.css"/>
  <link rel="stylesheet" type="text/css" href="../asset/css/plugins/nouislider.min.css"/>
  <link rel="stylesheet" type="text/css" href="../asset/css/plugins/select2.min.css"/>
  <link rel="stylesheet" type="text/css" href="../asset/css/plugins/ionrangeslider/ion.rangeSlider.css"/>
  <link rel="stylesheet" type="text/css" href="../asset/css/plugins/ionrangeslider/ion.rangeSlider.skinFlat.css"/>
  <link rel="stylesheet" type="text/css" href="../asset/css/plugins/bootstrap-material-datetimepicker.css"/>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
  <link href="../asset/css/style.css" rel="stylesheet">
  <!-- end: Css -->

  <link rel="shortcut icon" href="../asset/img/logomi.png">

      <script type="text/javascript">
        function verificar(){
          if(document.getElementById('opc').value=="Opcion" || document.getElementById('grado').value=="Grado" || document.getElementById('seccion').value=="Seccion" || document.getElementById('cupo').value==""){
            alert("Complete los campos");
          }else{
            //location.href="fopciones.php?accion=guardarOpc&opcion="+document.getElementById("opc").value+"&cupo="+document.getElementById("cupo").value+"&grado="+document.getElementById("grado").value+"&seccion="+document.getElementById("seccion").value;
            }
        }
        function guardarGrado(){
          if(document.getElementById('gradom').value=="" ){
            alert("Complete el campo para guardar");
          }else{ 
            location.href="fopciones.php?accion=guardarG&grado="+document.getElementById("gradom").value;
            }
        }
        function guardarSeccion(){
          if(document.getElementById('seccionm').value=="" ){
            alert("Complete el campo para guardar");
          }else{ 
            location.href="fopciones.php?accion=guardarS&seccion="+document.getElementById("seccionm").value;
            }
        }
        function guardarOpcion(){
          if(document.getElementById('codigoo').value=="" || document.getElementById('nombrem').value=="" || document.getElementById('descripcion').value==""){
            alert("Complete el campo para guardar");
          }else if(document.getElementById('tipob').value=="Tipo"){ 
            alert("Seleccion Tipo de Bachillerato");
            }else{
              location.href="fopciones.php?accion=guardarO&codigo="+document.getElementById("codigoo").value+"&nombre="+document.getElementById("nombrem").value+"&tipo="+document.getElementById("tipob").value+"&descripcion="+document.getElementById("descripcion").value;
            }
        }
        function guardarTipo(){
          if(document.getElementById('tipom').value==""){
            alert("Complete el campo para guardar");
          }else{
              location.href="fopciones.php?accion=guardarT&tipo="+document.getElementById("tipom").value;
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
                    <div class="col-md-12" >
                    <h3 class="animated fadeInLeft">Opciones</h3>
                        <p class="animated fadeInDown">
                          Opciones <span class="fa-angle-right fa"></span>Datos de la Opcion.
                        </p>
                    </div>
                  </div>
                </div>
                <div class="form-element">
                <form id="insertar">
                <input type="hidden" name="bandera" id="bandera">
                <div class="col-md-12">
                  <div class="col-md-12 panel panel-info">
                    <div class="col-md-12 panel-heading">
                      <!--<h4>Informaci&oacute;n Materia</h4>-->
                    <h4>Formulario Opci&oacute;nes de Bachillerato</h4>
                    </div>
                    <div class="col-md-12 panel-body" style="padding-bottom:30px;">
                      <div class="col-md-12">
                      <form class="cmxform" id="formcliente" method="post" action="">
                      <div class="col-md-12">
                          </br>
                           </br>
                           <div class="input-group">
                           <span class="input-group-addon"><i class="glyphicon glyphicon-barcode"></i></span>
                           <input id="codigo" type="text" style="width: 300px; font-size: 15px" class="form-control" name="codigo" placeholder="Codigo" readonly>
                           </div>
                           </br>
                           </br>
                           <div class="form-group form-animate-text" style="margin-top:5px !important;margin-bottom:30px !important;">
                             <i  class="fa fa-clipboard"></i><span class="label label-default" style="width: 100px; font-size: 15px; margin-right:13px">Grado: </span>
                              <select id="grado" class="select2 show-tick" style="width: 350px; font-size: 15px" name="grado">
                              <option value="">Grado</option>
                          <?php
                           include "../config/conexion.php";
                           $result = $conexion->query("select * from tgrado order by eid_grado");
                           if ($result) {
                               while ($fila = $result->fetch_object()) {
                                echo "<option value=".$fila->eid_grado.">".$fila->cgrado."</option>";
                              }
                           }
                           ?>   
                              </select>
                              <button title="Agrega Nuevo Grado el Sistema" style="margin-left:19px; size:40px;" class="btn btn-info" type="button" data-toggle="modal" data-target="#modalGrado">+</button>
                              </div>
                           <div class="form-group form-animate-text" style="margin-top:5px !important;margin-bottom:30px !important;">
                             <i  class="fa fa-book"></i><span class="label label-default" style="width: 100px; font-size: 15px; margin-right:13px">Opcion </span>
                              <select  id="opc" class="select2 show-tick" style="width: 350px; font-size: 15px" name="opc">
                              <option value="opcion">Opcion</option>
                              <?php
                           include "../config/conexion.php";
                           $result = $conexion->query("select * from tbachilleratos order by eid_bachillerato");
                           if ($result) {
                               while ($fila = $result->fetch_object()) {
                                echo "<option value=".$fila->eid_bachillerato.">".$fila->cnombe."</option>";
                              }
                           }
                           ?> 
                              </select>
                              <button title="Agrega Nueva Opcionel al Sistema" style="margin-left:19px;" class="btn btn-info" type="button" data-toggle="modal" data-target="#modalForm">+</button>
                              </div>
                           

                             <div class="form-group form-animate-text" style="margin-top:5px !important;margin-bottom:30px !important;">
                             <i  class="fa fa-users"></i><span class="label label-default" style="width: 100px; font-size: 15px">Seccion:</span>
                              <select id="seccion" class="select2 show-tick" style="width: 350px; font-size: 15px" name="seccion">
                              <option value="">Seccion</option>
                              <?php
                           include "../config/conexion.php";
                           $result = $conexion->query("select * from tsecciones order by eid_seccion");
                           if ($result) {
                               while ($fila = $result->fetch_object()) {
                                echo "<option value=".$fila->eid_seccion.">".$fila->cseccion."</option>";
                              }
                           }
                           ?>   
                              </select>
                              <button   style="margin-left:16px; border-radius: 50px 20px" class="btn btn-info" type="button" data-toggle="modal" data-target="#modalSeccion">+</button>
                              </br>
                              </br>
                              </br>
                              <div class="input-group col-md-6">
                              <span class="input-group-addon"><i class="class=fas fa-list-ol"></i></span>
                               <input id="cupo" type="number" class="form-control" name="cupo" placeholder="Cupo Maximo">
                           </div>
                           
                          </div> 
                          <div class="col-md-12">
                              <div class="col-md-4">
                              <br><b></b>
                             
                              <input type="button" id="guardar" name="guardar" class="next action-button btn btn-info btn-sm btn-round" style="font-size:20px;" value="Guardar" />
                          </div>
                          <div>
                            <br><b></b>
                              <input type="button" name="next" class="next action-button btn btn-danger btn-sm btn-round" style="font-size:20px;" value="Cancelar" />
                              </div>
                              <div class="col-md-6">
                  <div class="col-md-6">
                  <div class="panel1">
                    <div class="panel-heading"><h3>Lista De Opciones</h3></div>
                    <div class="panel-body">
                      <div class="responsive-table">
                      <table id="datatables-example" class="table table-striped table-bordered" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                        
                          <th>Editar</th>
                          <th>Codigo</th>
                          <th>Opcion</th>
                          <th>Tipo</th>
                          <th>Alta/Baja</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
include "../config/conexion.php";
$result = $conexion->query("select * from tbachilleratos order by eid_bachillerato");
if ($result) {
    while ($fila = $result->fetch_object()) {
        echo "<tr>";
        echo "<td>
          <div class='col-md-2' style='margin-top:1px'>
            <button class='btn ripple-infinite btn-round btn-warning' onclick='modify(" . $fila->eid_bachillerato . ")';>
            <div>
              <span>Editar</span>
            </div>
            </button>
            </div>
        </td>";
        //echo "<tr>";
        //echo "<td><img src='img/modificar.png' style='width:30px; height:30px' onclick=modify(".$fila->idasignatura.",'".$fila->codigo."','".$fila->nombre."');></td>";
        //echo "<td><img src='img/eliminar.png' style='width:30px; height:30px' onclick=elyminar(".$fila->idasignatura.",'".$fila->nombre."');></td>";
        echo "<td>" . $fila->ccodigo . "</td>";
        echo "<td>" . $fila->cnombe . "</td>";
        echo "<td>" . $fila->cdescripcion . "</td>";

        echo "<td>
          <div class='col-md-2' style='margin-top:1px'>
            <button class='btn ripple-infinite btn-round btn-success' onclick='confirmar(" . $fila->idcatalogo . ")'>
            <div>
              <span>Alta</span>
            </div>
            </button>
            </div>
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
                        
                      </div>
                          </div>
                          </form>
                      </div>
                      
                      </div>
                      
                    
                      
                    </div> 
                  </div>
                  
                </div>
                
              </div>
              
<!-- end: content -->
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
                  <input id="gradom" type="number" style="width: 400px; font-size: 15px" class="form-control" name="gradom" placeholder="Nuevo Grado" >
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
                           include "../config/conexion.php";
                           $result = $conexion->query("select * from ttipobachillerato order by eid_tipo");
                           if ($result) {
                               while ($fila = $result->fetch_object()) {
                                echo "<option value=".$fila->eid_tipo.">".$fila->ctipo."</option>";
                              }
                           }
                           ?>  
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
                  <tbody>
                  <?php
                  include "../config/conexion.php";
                  $result = $conexion->query("SELECT ttipobachillerato.ctipo, ccodigo,cnombe FROM ttipobachillerato INNER JOIN tbachilleratos ON tbachilleratos.efk_tipo = ttipobachillerato.eid_tipo ORDER BY eid_bachillerato");
                  if ($result) {
                    while ($fila = $result->fetch_object()) {
                    echo "<tr>";
                    echo "<td>" . $fila->ccodigo . "</td>";
                    echo "<td>" . $fila->cnombe . "</td>";
                    echo "<td>" . $fila->ctipo . "</td>";
                    echo "</tr>";
      }
      }
      ?>
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
                  
                  <div class="input-group" style="margin-left:75px">
                  <span class="input-group-addon"><i class="fa fa-book"></i></span>
                  <input id="tipom" type="text" style="width: 400px; font-size: 15px;" class="form-control" name="tipom" placeholder="Nuevo tipo de Bachillerato" >
                  </div>
                  <br>
                   <center>
                   <div class="input-group">
                  <button title="Agrega Nueva Opcionel al Sistema" style="margin-left:0px;" class="btn btn-info" type="button" onclick="guardarTipo()">
                  Guardar</button>
                  </div>
                  </center>
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
        <?php 
        include "menuMovil.php";
        ?>
       <!-- end: Mobile -->

<!-- start: Javascript -->
<script src="../asset/js/jquery.min.js"></script>
<script src="../asset/js/jquery.ui.min.js"></script>
<script src="../asset/js/bootstrap.min.js"></script>


<!-- plugins -->
<script src="../asset/js/plugins/moment.min.js"></script>
<script src="../asset/js/plugins/jquery.knob.js"></script>
<script src="../asset/js/plugins/ion.rangeSlider.min.js"></script>
<script src="../asset/js/plugins/bootstrap-material-datetimepicker.js"></script>
<script src="../asset/js/plugins/jquery.nicescroll.js"></script>
<script src="../asset/js/plugins/jquery.mask.min.js"></script>
<script src="../asset/js/plugins/select2.full.min.js"></script>
<script src="../asset/js/plugins/nouislider.min.js"></script>
<script src="../asset/js/plugins/jquery.validate.min.js"></script>
<script src="../asset/js/main.js"></script>
<script type="text/javascript">
 
  $(document).ready(function(){
    
    //$('#datatables-example').DataTable();
     
     $('#guardar').on('click',function(){
        var opcion = $('#opc').val();
        var grado = $('#grado').val();
        var seccion = $('#seccion').val();
        var cupo = $('#cupo').val();

        if(opcion == "opcion"){
            alert("Selecciones una opcion opo");
            return false;
        }
        var todo = $("#insertar").serialize();

        $.ajax({
            type: 'post',
            url: '../pages/agregarOPcion.php?accion=guardarOpc',
            data: todo,
            success: function(respuesta) {
                alert(respuesta); 
                
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
            alert("Por favor llene correctamente los datos");
            return false;
        }
        var todo = $("#insertarG").serialize();

        $.ajax({
            type: 'post',
            url: '../pages/agregarOPcion.php?accion=guardarGrado',
            data: todo,
            success: function(respuesta) {
                alert(respuesta); 
                
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
            alert("Ingrese Tipo de bachillerato");
            return false;
        }else if(codigo==""||nombre==""||descripcion==""){
            alert("Complete los campos");
            return false;
        }
        var todo = $("#insertarB").serialize();

        $.ajax({
            type: 'post',
            url: '../pages/agregarOPcion.php?accion=guardarBto',
            data: todo,
            success: function(respuesta) {
                alert(respuesta); 
                
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
            alert("Por favor llene correctamente los datos");
            return false;
        }
        var todo = $("#insertarS").serialize();

        $.ajax({
            type: 'post',
            url: '../pages/agregarOPcion.php?accion=guardarSeccion',
            data: todo,
            success: function(respuesta) {
                alert(respuesta); 
                
            },
            error: function(respuesta){
              alert("Error en el servidor: "+respuesta); 
            }
        });

      return false;
        

     });//fin del click
    });//fin del ready

</script>
<!-- end: Javascript -->


<!-- custom -->


</body>
</html>
<?php

include "../config/conexion.php";

$bandera = $_REQUEST["bandera"];
$baccion = $_REQUEST["baccion"];
$grado   = $_REQUEST["grado"];


function guardarGrado()
{
  include "../config/conexion.php";
  $grado   = $_REQUEST["grado"];
      $consulta  = "INSERT INTO tgrado VALUES('null','" . $grado . "')";
      $resultado = $conexion->query($consulta);
      if ($resultado) {
          msgOpc("Exito grado");
      } else {
          msgOpc("No se Guardo el Dato");
      }
}
function guardarSeccion()
{
  include "../config/conexion.php";
  $seccion   = $_REQUEST["seccion"];
      $consulta  = "INSERT INTO tsecciones VALUES('null','" . $seccion . "')";
      $resultado = $conexion->query($consulta);
      if ($resultado) {
          msgOpc("Seccion Guardada con Exito");
      } else {
          msgOpc("No Se guardo el dato");
      }
}
function guardarTipo()
{
  include "../config/conexion.php";
  $tipo   = $_REQUEST["tipo"];
      $consulta  = "INSERT INTO ttipobachillerato VALUES('null','" . $tipo . "')";
      $resultado = $conexion->query($consulta);
      if ($resultado) {
          msgTipo("Tipo Guardado con Exito");
      } else {
          msgTipo("No Se guardo el dato");
      }
}
function guardarOpcion()
{
  include "../config/conexion.php";
  $codigo   = $_REQUEST["codigo"];
  $nombre   = $_REQUEST["nombre"];
  $tipo   = $_REQUEST["tipo"];
  $descripcion   = $_REQUEST["descripcion"];
      $consulta  = "INSERT INTO tbachilleratos VALUES('null','" . $codigo . "','" .$nombre. "','" .$descripcion. "','" .$tipo. "')";
      $resultado = $conexion->query($consulta);
      if ($resultado) {
          msgOpc("Opcion Guardada con Exito");
      } else {
          msgOpc("No Se guardo el dato");
      }
}
function guardarOpcionCompleta()
{
  include "../config/conexion.php";
  $cupo   = $_REQUEST["cupo"];
  $opcion   = $_REQUEST["opcion"];
  $grado   = $_REQUEST["grado"];
  $seccion  = $_REQUEST["seccion"];
      $consulta  = "INSERT INTO topciones VALUES('null','" . $cupo . "','" .$opcion. "','" .$grado. "','" .$seccion. "')";
      $resultado = $conexion->query($consulta);
      if ($resultado) {
          msgOpc("Opcion Guardada con Exito");
      } else {
          msgOpc("No Se guardo el dato");
      }
}

function msgOpc($texto)
{
    echo "<script type='text/javascript'>";
    echo "alert('$texto');";
    echo "document.location.href='fopciones.php';";
    echo "</script>";
}
function msgTipo($texto)
{
    echo "<script type='text/javascript'>";
    echo "alert('$texto');";
    echo "document.location.href='fopciones.php';";
    echo "</script>";
}


function mensajes($texto)
{
    echo "<script type='text/javascript'>";
    echo "alert('$texto');";
    echo "</script>";
}
?>