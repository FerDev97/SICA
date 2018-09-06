<?php
//Codigo que muestra solo los errores exceptuando los notice.
error_reporting(E_ALL & ~E_NOTICE);
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
        function limpiar(){
          if( document.setElementById('nombre').value=="" ){
            alert("Complete los campos");
          }else{
            if (document.setElementById("aux").value=="modificar") {
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
                        <h3 class="animated fadeInLeft">Opcion</h3>
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
                  <div class="col-md-5 panel panel-info">
                    <div class="col-md-12 panel-heading">
                      <h4>Formulario De Nueva Opcion</h4>
                    </div>

                    <div class="col-md-12 panel-body" style="padding-bottom:30px;">
                      <div class="col-md-12">
                        <form class="cmxform" id="insertar" method="post" action="">

                          <div class="col-md-12">
                          <div class="input-group">
                              <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                  <input style="width:250px;" id="codigoo" type="text" class="form-control" name="codigoo" placeholder="Codigo">
                                  
                              </div>  
                              <br>
                              <div class="input-group">
                              <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                              <input id="nombrem" type="text" class="form-control" name="nombrem" placeholder="Nombre de Opcion">
                              </div>
                              <br>
                              <div class="input-group">
                              <div class="form-group form-animate-text" style="margin-top:5px !important;margin-bottom:30px !important;">
                             <i  class="fa fa-users"></i><span class="label label-default" style="width: 50px; font-size: 12px">Tipo Bachillerato:</span>
                              <select id="tipob" class="select2 show-tick" style="width: 200px; font-size: 15px" name="tipob">
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
                                </div>
                                <div class="input-group"style="padding-bottom:0px;">
                                    <span class="input-group-addon"><span class="glyphicon glyphicon-book"></span></span>
                                    <textarea style="width: 500px" rows="3" size="100" value="" class="form-control" name="descripcion" placeholder="Descripcion" id="descripcion"></textarea>
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
  $(document).ready(function(){
  $('#guardar').on('click',function(){
        var codigo = $('#codigoo').val();
        var nombre = $('#nombrem').val();
        var descripcion = $('#descripcion').val();
        var tipo = $('#tipob').val();
        if(codigo==""||nombre==""||descripcion==""){
            alert("Complete los campos");
            return false;
        }else if(tipo == "tipo"){
            alert("Ingrese Tipo de bachillerato");
            return false;
        }
        var todo = $("#insertar").serialize();

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

 //Ajax para Guardar Tipo
 $(document).ready(function(){
  $('#guardarT').on('click',function(){
        var grado = $('#tipom').val();
       

        if(grado == ""){
            alert("Por favor llene correctamente los datos");
            return false;
        }
        var todo = $("#insertarT").serialize();

        $.ajax({
            type: 'post',
            url: '../pages/agregarOPcion.php?accion=guardarTipo',
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
</body>
</html>
<?php

include "../config/conexion.php";

$bandera      = $_REQUEST["bandera"];
$baccion      = $_REQUEST["baccion"];
$nivelcuenta  = $_REQUEST["nivelcuenta"];
$nombrecuenta = $_REQUEST["nombrecuenta"];
$codigocuenta = $_REQUEST["codigocuenta"];
$tipocuenta   = $_REQUEST["tipocuenta"];
$saldocuenta  = $_REQUEST["saldocuenta"];
$r            = $_REQUEST["r"];
if ($bandera == "add") {
    $consulta  = "INSERT INTO catalogo VALUES('null','" . $codigocuenta . "','" . $nombrecuenta . "','" . $tipocuenta . "','" . $saldocuenta . "','" . $r . "','" . $nivelcuenta . "')";
    $resultado = $conexion->query($consulta);
    if ($resultado) {
      echo "<script type='text/javascript'>";
      echo "alert('Exito');";
      echo "document.location.href='cuenta.php';";
      echo "</script>";
    } else {
       
    }
}
if ($bandera == "desaparecer") {
    $consulta  = "DELETE FROM catalogo where idcatalogo='" . $baccion . "'";
    $resultado = $conexion->query($consulta);
    if ($resultado) {
        msg("Exito");
    } else {
        msg("No Exito");
    }
}
if ($bandera == "modificar") {
    $consulta  = "UPDATE catalogo set codigocuenta='" . $codigocuenta . "',nombrecuenta='" . $nombrecuenta . "',tipocuenta='" . $tipocuenta . "',saldo='" . $saldocuenta . "',r='" . $r . "',nivel='" . $nivel . "' where idcatalogo='" . $baccion . "'";
    $resultado = $conexion->query($consulta);
    if ($resultado) {
      echo "<script type='text/javascript'>";
      echo "alert('$texto');";
      echo "document.location.href='cuenta.php';";
      echo "</script>";
    } else {
        msg("No Exito");
    }
}
if ($bandera == 'enviar') {
    echo "<script type='text/javascript'>";
    echo "document.location.href='cuenta.php?id=" . $baccion . "';";
    echo "</script>";
    # code...
}
function msg($texto)
{
    echo "<script type='text/javascript'>";
    echo "alert('$texto');";
  //  echo "document.location.href='cuenta.php';";
    echo "</script>";
}

?>
