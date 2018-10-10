<?php
//Codigo que muestra solo los errores exceptuando los notice.
error_reporting(E_ALL & ~E_NOTICE);
session_start();
if($_SESSION["logueado"] == TRUE && $_SESSION["tipo"]==1) {
$nombre=$_SESSION["usuario"];
$tipo  = $_REQUEST["tipo"];
$id  = $_REQUEST["id"];

?>
<!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="utf-8">
  <meta name="description" content="Miminium Admin Template v.1">
  <meta name="author" content="Isna Nur Azis">
  <meta name="keyword" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Lista de usuarios | SICA</title>

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
                        <h3 class="animated fadeInLeft">Lista de usuarios</h3>
                        <p class="animated fadeInDown">
                          Usuarios activos <span class="fa-angle-right fa"></span> Complejo Educativo Catolico "La Santa Familia"
                        </p>
                    </div>
                  </div>
              </div>
                           

              <div class="col-md-12 top-20 padding-0"> <!--Div ajax-->
                <div class="col-md-12">
                  <div class="panel">
                    <div class="panel-heading"><h3>Usuarios Activos</h3></div>
                    <div class="panel-body">

                      <div class="responsive-table">
                      <table id="datatables-example" style="font-size:16px" class="table table-striped table-bordered" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                          <th>Nombre de usuario</th>
                          
                          <th>Tipo de usuario</th> 
                          <th>DUI</th>
                          <th>Nombre</th>
                          <th>Apellido</th>            
                          <th>Acciones</th>  
                                                 
                      </tr>
                      </thead>
                      <tbody class="tabla_ajax">
                        
                        <?php include('tablaUsuariosAc.php') ?>

                      </tbody>
                        </table>
                      </div>
                  </div>
                </div>
              </div>
              </div>
              
            </div>

          <!-- end: content -->
          <!--MODAL-->
               <div class="modal fade" id="modalito">
                                  <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title">Modificar usuario</h4>
                                      </div>
                                      <div class="modal-body col-md-12">
                                                <form id="modificar" >
                                                <input type="hidden" id="id" name="id" value="">
                                                  <div class="col-md-2">
                                                       <!--contenedor lateral-->      
                                                          
                                                  </div>
                                                  <div class="col-md-8">
                                                        <br>

                                                        <div class="input-group " style="padding-bottom:25px;">
                                                                
                                                                <label class="radio-inline" style="margin-right:78px;margin-left:68px; font-size: 15px"><input type="radio" id="radio1" name="opcion" value="1" checked="cheked" style="width: 15px; height:15px;">Usuario y tipo</label>
                                                                <label class="radio-inline" style="font-size: 15px;"><input type="radio" id="radio2" name="opcion" value="2" style="width: 15px; height:15px;">Cambiar contraseña</label>
                                                        </div>
                            
                                                    
                                                    <div id="div">
                                                        <div class="input-group " style="padding-bottom:10px;">
                                                          <span class="input-group-addon"><i class="fa fa-suitcase"></i></span>
                                                          <select id="tipo"  class="form-control" name="tipo">
                                                            
                                                            <option value="1">Administrador</option>
                                                            <option value="0">Docente</option>
                                                          </select>
                                                          
                                                        </div>
                                                        <br>
                                                        <div class="input-group " style="padding-bottom:10px;">
                                                          
                                                          
                                                            <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                                            <input id="usuario" type="text" class="form-control"  name="usuario" placeholder="Usuario" maxlength='8' minlength="4" onkeypress="return check(event)" autocomplete="off">
                                                          
                                                        </div>
                                                        <p id="mensaje1"></p>
                                                        <br>
                                                      </div><!--Fin de div1-->
                                                      
                                                      
                                                      <div id="div2" style="display:none;">
                                                        <div class="input-group " style="padding-bottom:10px;">
                                                         
                                                            <span class="input-group-addon"><i class="fa fa-key"></i></span>
                                                            <input id="contrasena" type="password" class="form-control" name="contrasena1" placeholder="Ingrese la nueva contraseña" maxlength='8' minlength="4" onkeypress="return check(event)">
                                                        </div>
                                                        <p id="mensaje2"></p>
                                                        <br>
                                                        <div class="input-group " style="padding-bottom:10px;">
                                                        <span class="input-group-addon"><i class="fa fa-key"></i></span>
                                                            <input id="contrasena2" type="password" class="form-control" name="contrasena2" placeholder="Repita contraseña" maxlength='8' minlength="4" onkeypress="return check(event)">
                                                      </div>
                                                      <p id="mensaje3"></p><br>
                                                      </div>
                                                      </div><!--Finde div2-->
                                                      </form>
                                                      <div class="col-md-2">
                                                          <!--contenedor lateral-->      
                                                          
                                                      </div>
                                          
                                      </div>
                                        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
                                      
                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                        <button id="guardar" type="button" class="btn btn-primary">Guardar Cambios</button>
                                      </div>
                                      
                                    </div><!-- /.modal-content -->
                                  </div><!-- /.modal-dialog -->
              </div><!-- /.modal -->
          <!--MODAL-->

          <!-- end: right menu -->

      </div>

      <!-- start: Mobile -->
      <div id="mimin-mobile" class="reverse">
        <div class="mimin-mobile-menu-list">
            <div class="col-md-12 sub-mimin-mobile-menu-list animated fadeInLeft">
                <ul class="nav nav-list">
                    <li class="active ripple">
                      <a class="tree-toggle nav-header">
                        <span class="fa-home fa"></span>Dashboard
                        <span class="fa-angle-right fa right-arrow text-right"></span>
                      </a>
                      <ul class="nav nav-list tree">
                          <li><a href="dashboard-v1.html">Dashboard v.1</a></li>
                          <li><a href="dashboard-v2.html">Dashboard v.2</a></li>
                      </ul>
                    </li>
                    <li class="ripple">
                      <a class="tree-toggle nav-header">
                        <span class="fa-diamond fa"></span>Layout
                        <span class="fa-angle-right fa right-arrow text-right"></span>
                      </a>
                      <ul class="nav nav-list tree">
                        <li><a href="topnav.html">Top Navigation</a></li>
                        <li><a href="boxed.html">Boxed</a></li>
                      </ul>
                    </li>
                    <li class="ripple">
                      <a class="tree-toggle nav-header">
                        <span class="fa-area-chart fa"></span>Charts
                        <span class="fa-angle-right fa right-arrow text-right"></span>
                      </a>
                      <ul class="nav nav-list tree">
                        <li><a href="chartjs.html">ChartJs</a></li>
                        <li><a href="morris.html">Morris</a></li>
                        <li><a href="flot.html">Flot</a></li>
                        <li><a href="sparkline.html">SparkLine</a></li>
                      </ul>
                    </li>
                    <li class="ripple">
                      <a class="tree-toggle nav-header">
                        <span class="fa fa-pencil-square"></span>Ui Elements
                        <span class="fa-angle-right fa right-arrow text-right"></span>
                      </a>
                      <ul class="nav nav-list tree">
                        <li><a href="color.html">Color</a></li>
                        <li><a href="weather.html">Weather</a></li>
                        <li><a href="typography.html">Typography</a></li>
                        <li><a href="icons.html">Icons</a></li>
                        <li><a href="buttons.html">Buttons</a></li>
                        <li><a href="media.html">Media</a></li>
                        <li><a href="panels.html">Panels & Tabs</a></li>
                        <li><a href="notifications.html">Notifications & Tooltip</a></li>
                        <li><a href="badges.html">Badges & Label</a></li>
                        <li><a href="progress.html">Progress</a></li>
                        <li><a href="sliders.html">Sliders</a></li>
                        <li><a href="timeline.html">Timeline</a></li>
                        <li><a href="modal.html">Modals</a></li>
                      </ul>
                    </li>
                    <li class="ripple">
                      <a class="tree-toggle nav-header">
                       <span class="fa fa-check-square-o"></span>Forms
                       <span class="fa-angle-right fa right-arrow text-right"></span>
                      </a>
                      <ul class="nav nav-list tree">
                        <li><a href="formelement.html">Form Element</a></li>
                        <li><a href="#">Wizard</a></li>
                        <li><a href="#">File Upload</a></li>
                        <li><a href="#">Text Editor</a></li>
                      </ul>
                    </li>
                    <li class="ripple">
                      <a class="tree-toggle nav-header">
                        <span class="fa fa-table"></span>Tables
                        <span class="fa-angle-right fa right-arrow text-right"></span>
                      </a>
                      <ul class="nav nav-list tree">
                        <li><a href="datatables.html">Data Tables</a></li>
                        <li><a href="handsontable.html">handsontable</a></li>
                        <li><a href="tablestatic.html">Static</a></li>
                      </ul>
                    </li>
                    <li class="ripple">
                      <a href="calendar.html">
                         <span class="fa fa-calendar-o"></span>Calendar
                      </a>
                    </li>
                    <li class="ripple">
                      <a class="tree-toggle nav-header">
                        <span class="fa fa-envelope-o"></span>Mail
                        <span class="fa-angle-right fa right-arrow text-right"></span>
                      </a>
                      <ul class="nav nav-list tree">
                        <li><a href="mail-box.html">Inbox</a></li>
                        <li><a href="compose-mail.html">Compose Mail</a></li>
                        <li><a href="view-mail.html">View Mail</a></li>
                      </ul>
                    </li>
                    <li class="ripple">
                      <a class="tree-toggle nav-header">
                        <span class="fa fa-file-code-o"></span>Pages
                        <span class="fa-angle-right fa right-arrow text-right"></span>
                      </a>
                      <ul class="nav nav-list tree">
                        <li><a href="forgotpass.html">Forgot Password</a></li>
                        <li><a href="login.html">SignIn</a></li>
                        <li><a href="reg.html">SignUp</a></li>
                        <li><a href="article-v1.html">Article v1</a></li>
                        <li><a href="search-v1.html">Search Result v1</a></li>
                        <li><a href="productgrid.html">Product Grid</a></li>
                        <li><a href="profile-v1.html">Profile v1</a></li>
                        <li><a href="invoice-v1.html">Invoice v1</a></li>
                      </ul>
                    </li>
                     <li class="ripple"><a class="tree-toggle nav-header"><span class="fa "></span> MultiLevel  <span class="fa-angle-right fa right-arrow text-right"></span> </a>
                      <ul class="nav nav-list tree">
                        <li><a href="view-mail.html">Level 1</a></li>
                        <li><a href="view-mail.html">Level 1</a></li>
                        <li class="ripple">
                          <a class="sub-tree-toggle nav-header">
                            <span class="fa fa-envelope-o"></span> Level 1
                            <span class="fa-angle-right fa right-arrow text-right"></span>
                          </a>
                          <ul class="nav nav-list sub-tree">
                            <li><a href="mail-box.html">Level 2</a></li>
                            <li><a href="compose-mail.html">Level 2</a></li>
                            <li><a href="view-mail.html">Level 2</a></li>
                          </ul>
                        </li>
                      </ul>
                    </li>
                    <li><a href="credits.html">Credits</a></li>
                  </ul>
            </div>
        </div>
      </div>
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

    $("#guardar").on('click',function(){

        var id = $('#id').val();
        var nombre = $('#usuario').val();
        var contra = $('#contrasena').val();
        var contra = $('#contrasena2').val();
        var tipo = $('#tipo').val();


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

                  var todo = $("#modificar").serialize();

                  $.ajax({
                      type: 'post',
                      url: 'editarUsuariosAc.php',
                      data: todo,
                      success: function(respuesta) {

                          if(respuesta==3){
                            sweetWar2("Estos datos ya existen");
                          }
                          if(respuesta==1){
                            
                            $("#modalito").modal('hide');
                            sweetGuardo("Se modificó correctamente");
                            $(".tabla_ajax").load("tablaUsuariosAc.php"); 
                            $('#datatables-example').DataTable();
                              contra1 = "NO OK";
                              contra2 = "NO OK";
                              user = "OK";
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

        var contra1 = "NO OK";
        var contra2 = "NO OK";
        var user = "OK";

       $('#contrasena2').keyup(function(){
          
          var contrasena2 = $('#contrasena2').val();
          var contrasena = $('#contrasena').val();


          if(contrasena.length >= 4 && contrasena2 != ""){
            $("#guardar").prop("disabled",true);
              contra1="NO OK";
              contra2="NO OK";
            if(contrasena2 == contrasena){
             $("#guardar").prop("disabled",false);
             $("#mensaje3").text("Las contraseñas coinciden!").css("color","green");
                if(user != "OK"){
                  $("#guardar").prop("disabled",true);
                  
                }
             contra2 = "OK";
             contra1 = "OK";
             }else{
              $("#guardar").prop("disabled",true);
              $("#mensaje3").text("Las contraseñas no coinciden").css("color","red");
             }
          }
          if(contrasena.length < 4){
            $("#guardar").prop("disabled",true);
            $("#mensaje2").text("Minimo 4 caracteres").css("color","red");
            contra1="NO OK";
            contra2="NO OK";
          }          
          
    });
    $('#contrasena').keyup(function(){
          
          var contrasena2 = $('#contrasena2').val();
          var contrasena = $('#contrasena').val();

        
          if(contrasena.length >= 4 && contrasena2 == ""){
            $("#guardar").prop("disabled",true);
            $("#mensaje2").text(" ");
              contra1="NO OK";
              contra2="NO OK";
            if(contrasena2 == contrasena){
             $("#guardar").prop("disabled",false);
             $("#mensaje2").text(" ");
             $("#mensaje3").text("Las contraseñas coinciden!").css("color","green");
                if(user != "OK"){
                  $("#guardar").prop("disabled",true);
                }
              contra1="OK";
              contra2="OK";
             }else{
              $("#guardar").prop("disabled",true);
              $("#mensaje2").text("");
              $("#mensaje3").text("Las contraseñas no coinciden").css("color","red");
              contra1="NO OK";
              contra2="NO OK";
             }
          }
          if(contrasena.length >= 4 && contrasena2 != ""){
            $("#guardar").prop("disabled",true);
            $("#mensaje2").text(" ");
            if(contrasena2 == contrasena){
             $("#guardar").prop("disabled",false);
             $("#mensaje2").text(" ");
             $("#mensaje3").text("Las contraseñas coinciden!").css("color","green");
             if(user != "OK"){
              $("#guardar").prop("disabled",true);
             }
             contra1="OK";
             contra2="OK";
             }else{
              $("#guardar").prop("disabled",true);
              $("#mensaje2").text("");
              $("#mensaje3").text("Las contraseñas no coinciden").css("color","red");
              contra1="NO OK";
              contra2="NO OK";
             }
          }
          if(contrasena.length < 4){
            $("#guardar").prop("disabled",true);
            $("#mensaje3").text("");
            $("#mensaje2").text("Minimo 4 caracteres").css("color","red");
            if(contrasena.length < 4 && contrasena2 !=""){
                if(contrasena != contrasena2){
                  $("#mensaje3").text("Las contraseñas no coinciden").css("color","red"); 
                }
            }
            contra1="NO OK";
            contra2="NO OK";
          }
    });
    $("#usuario").keyup(function(){

          var usuario = $("#usuario").val();

          var opcion = $('input:radio[name=opcion]:checked').val();
          if(opcion == 1){
              
              if(usuario.length < 4){
              $("#guardar").prop("disabled",true);
              $("#mensaje1").text("Minimo 4 caracteres").css("color","red"); 
              user = "NO OK";  
            }else{
              user = "OK";
              $("#mensaje1").text("");
              $("#guardar").prop("disabled",false);
            }

          }else{
                  if(usuario.length < 4){
                  $("#guardar").prop("disabled",true);
                  $("#mensaje1").text("Minimo 4 caracteres").css("color","red"); 
                  user = "NO OK";  
                }else{
                  user = "OK";
                  $("#mensaje1").text("");
                  if(contra1 == "OK" && contra2 == "OK"){
                    $("#guardar").prop("disabled",false); 
                  }else{
                    $("#guardar").prop("disabled",true);
                  }
                } 
          }
         
    });

    $('input[type=radio][name=opcion]').on('change',function(){
          
          var opcion = $('input:radio[name=opcion]:checked').val();
          if(opcion == 1){
              $("#div2").hide();
              $("#div1").show();
              $("#guardar").prop("disabled",false);
          }else{
              $("#div2").show();
              $("#div1").hide();
              $("#guardar").prop("disabled",true);
              $('#contrasena').val("");
              $('#contrasena2').val("");
              $("#mensaje2").text("Debe contener entre 4 y 8 caracteres, puede utilizar números y letras").css("color","grey");
              $("#mensaje3").text("");
          }

    });
    
  });//fin del ready

  function editar(id, nombre, contra, tipo){

    
      $('#id').val("");//limpio el formulario del modal
      $('#usuario').val("");
      $('#tipo').val("");
      $('#contrasena').val("");
      $('#contrasena2').val("");
      //inicializo los mensajes
      $("#mensaje1").text("Debe contener entre 4 y 8 caracteres, puede utilizar números y letras").css("color","grey");
      $("#mensaje2").text("Debe contener entre 4 y 8 caracteres, puede utilizar números y letras").css("color","grey");
      $("#mensaje3").text("");

       $("#radio1").prop('checked', true);
       $("#radio2").prop('checked', false);
       $("#div2").hide();
      
      $('#id').val(id);
      $('#usuario').val(nombre);//paso parametros
      $('#tipo').val(tipo);
      $("#modalito").modal();
      $("#guardar").prop("disabled",false);

      
    }
//SOLO NUMEROS Y LETRAS
function check(e) {
    tecla = (document.all) ? e.keyCode : e.which;

    //Tecla de retroceso para borrar, siempre la permite
    if (tecla == 8) {
        return true;
    }

    // Patron de entrada, en este caso solo acepta numeros y letras
    patron = /[A-Za-z0-9]/;
    tecla_final = String.fromCharCode(tecla);
    return patron.test(tecla_final);
}
//FIN SOLO NUMEROS Y LETRAS

  

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
<?php
} else {
  header("Location: index.php");
  }
  
?>