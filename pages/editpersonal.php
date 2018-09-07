<?php
$hoy = getdate();
$anioMayor=$hoy['year']-18;
$anioMenor=$hoy['year']-61;
$mes=sprintf("%02s",$hoy['mon']);
$dia=sprintf("%02s",$hoy['mday']);

$fechamax=$anioMayor."-".$mes."-".$dia;
$fechamin=$anioMenor."-".$mes."-".$dia;

?>

<?php
$id = $_REQUEST["id"];
include "../config/conexion.php";
$result = $conexion->query("select * from tpersonal where eid_personal=" . $id);
if ($result) {
    while ($fila = $result->fetch_object()) {
        $idpersonalR       = $fila->eid_personal;
        $duipersonalR   = $fila->cdui;
        $nombrepersonalR   = $fila->cnombre;
        $apellidopersonalR = $fila->capellido;
        $telefonopersonalR = $fila->ctelefono;
        $correopersonalR   = $fila->ccorreo;
        $direccionpersonalR = $fila->cdireccion;
        $fechanacimientopersonalR  = $fila->ffechanacimiento;
        $estadopersonalR   = $fila->iestado;
        $isexopersonalR    = $fila->isexo;
        $cargopersonalR    = $fila->efk_idcargo;

    }
}

?>

<!DOCTYPE html>
<?php
//Codigo que muestra solo los errores exceptuando los notice.
error_reporting(E_ALL & ~E_NOTICE);
?>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Personal</title>

  <!-- start: Css -->
  <link rel="stylesheet" type="text/css" href="../asset/css/bootstrap.min.css">


  <!-- plugins -->
  <link rel="stylesheet" type="text/css" href="../asset/css/plugins/font-awesome.min.css"/>
  <link rel="stylesheet" type="text/css" href="../asset/css/plugins/animate.min.css"/>
  <link rel="stylesheet" type="text/css" href="../asset/css/plugins/nouislider.min.css"/>
  <link rel="stylesheet" type="text/css" href="../asset/css/plugins/select2.min.css"/>
  <link rel="stylesheet" type="text/css" href="../asset/css/plugins/ionrangeslider/ion.rangeSlider.css"/>
  <link rel="stylesheet" type="text/css" href="../asset/css/plugins/ionrangeslider/ion.rangeSlider.skinFlat.css"/>
  <link rel="stylesheet" type="text/css" href="../asset/css/plugins/bootstrap-material-datetimepicker.css"/>
  <link rel="stylesheet" type="text/css" href="../asset/css/sweetalert2.css"/>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
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

      //SWEET ALERTS
       //Validacion Correo Electronico
       function validateMail(Correo)
      {
        //Creamos un objeto 
        object=document.getElementById(Correo);
        valueForm=object.value;
        // Patron para el correo
        var patron=/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/;
        if(valueForm.search(patron)==0)
        {
          //Mail correcto
          object.style.color="#000";
          return;
          }
          //Mail incorrecto
          object.style.color="#f00";
          }
      // Fin Validacion Correo Electronico

      //Validacion Telefono
      var nav4 = window.Event ? true : false;
      function aceptNum(evt){
        var key = nav4 ? evt.which : evt.keyCode;
        return (key <= 13 || (key>= 48 && key <= 57));
      }
      //Fin Validacion Telefono

      //Validacion Solo letras
      function sololetras(e) {
        key=e.keyCode || e.which;
 
        teclado=String.fromCharCode(key).toLowerCase();
 
        letras="qwertyuiopasdfghjklñzxcvbnm ";
 
        especiales="8-37-38-46-164";
 
        teclado_especial=false;
 
        for(var i in especiales){
            if(key==especiales[i]){
                teclado_especial=true;
                break;
            }
        }
 
        if(letras.indexOf(teclado)==-1 && !teclado_especial){
            return false;
        }
    }
     //Validacion Solo letras
    
        function verificar(){
        var rb=document.getElementsByName('estado');
				var banderaRb=true;
			for (var i =0; i < rb.length; i++) {
				if(rb[i].checked)
				{
					banderaRb=false;
					break;
				}

			}
      var rb1=document.getElementsByName('sexo');
				var banderaRb1=true;
			for (var i =0; i < rb1.length; i++) {
				if(rb1[i].checked)
				{
					banderaRb1=false;
					break;
				}

			}
          if(document.getElementById('dui').value=="" ||
            document.getElementById('nombre').value=="" ||
            document.getElementById('apellido').value=="" ||
            document.getElementById('direccion').value=="" ||
            document.getElementById('fechanacimiento').value=="" ||document.getElementById('fechanacimiento').value==""
            ||document.getElementById('correo').value==""||document.getElementById('telefono').value==""
            ||document.getElementById('cargo').value=="" || banderaRb || banderaRb1){
            sweetError("Complete los campos prueba");
          }else{
            
            document.getElementById("bandera").value="add";
            document.turismo.submit();
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

                         <h3 class="animated fadeInLeft">Editar Informaci&oacute;n Personal</h3>
                        <p class="animated fadeInDown">
                          Personal <span class="fa-angle-right fa"></span>Datos del Personal.
                        </p>
                    </div>
                  </div>
                </div>
                <div class="form-element">
                
                <form id="turismo" name="turismo" action="" method="post">
                <input type="hidden" name="bandera" id="bandera">
                <input type="hidden" name="baccion" id="baccion" value="<?php echo $idpersonalR; ?>">
                <div class="col-md-12">
                  <div class="col-md-12 panel panel-info">
                    <div class="col-md-12 panel-heading">
                      <h4>Formulario Personal.</h4>
                    </div>

                    <div class="col-md-12 panel-body" style="padding-bottom:30px;">
                      <div class="col-md-12">
                        <form class="cmxform" id="formcliente" method="post" action="">

                          <div class="col-md-6">
                          <div class="input-group">
                              <span class="input-group-addon"><i class="glyphicon glyphicon-barcode"></i></span>
                                  <input id="dui" type="text" class="form-text mask-dui" name="dui" placeholder="DUI" value="<?php echo $duipersonalR; ?>" readonly="readonly" style="width: 530px;" >
                              </div> 
                              <br>
                              <br> 
                            <div class="input-group">
                              <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                  <input id="nombre" type="text" class="form-control" name="nombre" placeholder="Nombre" value="<?php echo $nombrepersonalR; ?>" onkeypress="return sololetras(event)">
                              </div>  
                              <br>
                              <br>
                              <div class="input-group">
                              <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                  <input id="apellido" type="text" class="form-control" name="apellido" placeholder="Apellido" value="<?php echo $apellidopersonalR; ?>" onkeypress="return sololetras(event)">
                              </div>
                              <br> 
                              <div class="input-group"style="padding-bottom:20px;">
      <span class="input-group-addon"><span class="glyphicon glyphicon-home"></span></span>
      <textarea rows="3" size="30"  class="form-control" placeholder="Dirección" id="direccion" name="direccion" ><?php echo $direccionpersonalR; ?></textarea>
      </div>
                              
                              <label>Fecha de nacimiento:</label>
                              <div class="input-group">
                              <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                                  <input id="fechanacimiento" type="date" class="form-control" name="fechanacimiento" value="<?php echo $fechanacimientopersonalR; ?>" min="<?php echo $fechamin; ?>" max="<?php echo $fechamax; ?>" >
                              </div> 
                              <div class="form-group">
                              <div class='input-group date' id='datetimepicker1'>
                              </div>
                              </div>
                              

                            <!-- Div del span -->
                          </div>
                          <div class="col-md-6">                       
                          
                              <div class="input-group">
                                  <input id="correo" type="text" class="form-control" name="correo" placeholder="Correo Electronico" value="<?php echo $correopersonalR; ?>" size='30' maxlength='100' onKeyUp="javascript:validateMail('correo')">
                                  <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                              </div>   
                              <br><br>                      
                              <div class="input-group">
                              
                                  <input id="telefono" type="text" class="form-control" name="telefono" placeholder="Telefono" value="<?php echo $telefonopersonalR; ?>" size="8" maxlength="8" onkeypress="return aceptNum(event)">
                                  <span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span>

                              </div> 
                              <br>
                              <br>
                              <div class="form-group form-animate-text" style="margin-top:5px !important;margin-bottom:30px !important;">
     <i  class="fa fa-suitcase"></i><span class="label label-default" style="width: 100px; font-size: 15px">Cargo</span>
      <select id="cargo"   class="select2 show-tick" style="width: 400px; font-size: 15px" name="cargo" >
      <option value="">Seleccione Cargo</option>
      <?php
                      include '../config/conexion.php';

                      $result = $conexion->query("select eid_cargo as id,ccargo as nombre FROM tcargos");
                      if ($result) {

                        while ($fila = $result->fetch_object()) {
                          if ($fila->id == $cargopersonalR ) {
                            echo '<option value="' . $fila->id. '" selected>' . $fila->nombre . '</opcion>';
                        
                           }else {
                            echo '<option value="' . $fila->id . '">' . $fila->nombre . '</opcion>';
                        }
                      }
                    }else {
                      echo '<option value="">Error en la BD</opcion>';
                  }
                       ?>
                       </select>
                              
      <button align='center' type='button' style="margin-right:20px;margin-left:22px; font-size: 15px" class='btn btn-default' onclick=confirmar(" . $proveedor . ",1);><i class='fa fa-plus'></i></button>
      </div>
      
      <br>
      <div class="input-group " style="padding-bottom:25px;">
     <i  class="fa fa-check-circle"></i><span class="label label-default" style="width: 20px; font-size: 15px">Estado</span>
     <?php
    if($estadopersonalR==1){
     echo' <label class="radio-inline" style="margin-right:78px;margin-left:68px; font-size: 15px"><input type="radio" id="activo" name="estado" value="1" checked>Activo</label>';
     echo'<label class="radio-inline" style="width: 0px; font-size: 15px;margin-left:0px"><input type="radio" id="inactivo" name="estado" value="2">Inactivo</label>';
    }else{
      echo' <label class="radio-inline" style="margin-right:78px;margin-left:68px; font-size: 15px"><input type="radio" id="activo" name="estado" value="1" >Activo</label>';
      echo'<label class="radio-inline" style="width: 0px; font-size: 15px;margin-left:0px"><input type="radio" id="inactivo" name="estado" value="2" checked>Inactivo</label>';

    }
      ?>

     
     </div>
     <br>
     <br>
      <div class="input-group " style="padding-bottom:25px;">
      <i  class="fa fa-child"></i><span class="label label-default" style="width: 20px; font-size: 15px">Sexo</span>
      <?php 
      if($isexopersonalR==1){
    echo'<label class="radio-inline" style="margin-right:54px;margin-left:80px; font-size: 15px"><input type="radio" id="femenino" name="sexo" value="1" checked>Femenino</label>';
    echo'<label class="radio-inline" style="width: 0px; font-size: 15px;margin-left:0px"><input type="radio" id="masculino" name="sexo" value="2">Masculino</label>';
}else{
  echo'<label class="radio-inline" style="margin-right:54px;margin-left:80px; font-size: 15px"><input type="radio" id="femenino" name="sexo" value="1"> Femenino</label>';
    echo'<label class="radio-inline" style="width: 0px; font-size: 15px;margin-left:0px"><input type="radio" id="masculino" name="sexo" value="2" checked>Masculino</label>';

}

      ?>
     
     
     </div>
     
                              
                             
                              
                          </div>
                          

                                                    <div class="col-md-12">
                                                    <div class="col-md-3"></div>
                              <div class="col-md-3">
                              <br><b></b>
                              <!-- <button class="btn-flip btn btn-gradient btn-primary" onclick="verificar()">
                                <div class="flip">
                                  <div class="side">
                                    Guardar <span class="fa fa-trash"></span>
                                  </div>
                                  <div class="side back">
                                    continuar?
                                  </div>
                                </div>
                                <span class="icon"></span>
                              </button> -->
                              <input type="button" name="next" onclick="verificar()" class="next action-button btn btn-info btn-sm btn-round" style="font-size:20px;" value="Guardar" />
                              
                              
                          </div>
                          <div>
                            <br><b></b>
                          <!-- <button class="btn-flip btn btn-gradient btn-danger" onclick="verificar()">
                                <div class="flip">
                                  <div class="side">
                                    Cancelar <span class="fa fa-trash"></span>
                                  </div>
                                  <div class="side back">
                                    continuar?
                                  </div>
                                </div>
                                <span class="icon"></span>
                              </button> -->
                              <input type="button" name="next" class="next action-button btn btn-danger btn-sm btn-round" style="font-size:20px;" value="Cancelar" />
                              </div>
                        </div>
                        </div>
                      </form>

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
<script src="../asset/js/plugins/jquery.knob.js"></script>
<script src="../asset/js/plugins/ion.rangeSlider.min.js"></script>
<script src="../asset/js/plugins/bootstrap-material-datetimepicker.js"></script>
<script src="../asset/js/plugins/jquery.nicescroll.js"></script>
<script src="../asset/js/plugins/jquery.mask.min.js"></script>
<script src="../asset/js/plugins/select2.full.min.js"></script>
<script src="../asset/js/plugins/nouislider.min.js"></script>
<script src="../asset/js/plugins/jquery.validate.min.js"></script>


<!-- custom -->
<script src="../asset/js/main.js"></script>
<script type="text/javascript">
  $(document).ready(function(){

    $("#formcliente").validate({
      errorElement: "em",
      errorPlacement: function(error, element) {
        $(element.parent("div").addClass("form-animate-error"));
        error.appendTo(element.parent("div"));
      },
      success: function(label) {
        $(label.parent("div").removeClass("form-animate-error"));
      },
      rules: {
        nombrecliente: "required",
        apellidocliente: "required",
        duicliente: "required",
        telefonocliente: "required",
        direccioncliente: "required"
      },
      messages: {
        nombrecliente: "Digita tu nombre",
        apellidocliente: "Digita tu apellido",
        duicliente: "Digita tu DUI",
        telefonocliente: "Digita tu numero telefonico",
        direccioncliente: "Digita tu direcci&oacuten"
      }
    });

    // propose username by combining first- and lastname
    $("#username").focus(function() {
      var firstname = $("#firstname").val();
      var lastname = $("#lastname").val();
      if (firstname && lastname && !this.value) {
        this.value = firstname + "." + lastname;
      }
    });


    $('.mask-dui').mask('00000000-0');
    $('.mask-codigo').mask('AA000');
    $('.mask-time').mask('00:00:00');
    $('.mask-date_time').mask('00/00/0000 00:00:00');
    $('.mask-cep').mask('00000-000');
    $('.mask-telefono').mask('0000-0000');
    $('.mask-nit').mask('0000-000000-000-0');
    $('.mask-phone_with_ddd').mask('(00) 0000-0000');
    $('.mask-phone_us').mask('(000) 000-0000');
    $('.mask-mixed').mask('AAA 000-S0S');
    $('.mask-cpf').mask('000.000.000-00', {reverse: true});
    $('.mask-money').mask('000.000.000.000.000,00', {reverse: true});
    $('.mask-money2').mask("#.##0,00", {reverse: true});
    $('.mask-ip_address').mask('0ZZ.0ZZ.0ZZ.0ZZ', {
      translation: {
        'Z': {
          pattern: /[0-9]/, optional: true
        }
      }
    });
    $('.mask-ip_address').mask('099.099.099.099');
    $('.mask-percent').mask('##0,00%', {reverse: true});
    $('.mask-clear-if-not-match').mask("00/00/0000", {clearIfNotMatch: true});
    $('.mask-placeholder').mask("00/00/0000", {placeholder: "__/__/____"});
    $('.mask-fallback').mask("00r00r0000", {
      translation: {
        'r': {
          pattern: /[\/]/,
          fallback: '/'
        },
        placeholder: "__/__/____"
      }
    });
    $('.mask-selectonfocus').mask("00/00/0000", {selectOnFocus: true});

    var options =  {onKeyPress: function(cep, e, field, options){
      var masks = ['00000-000', '0-00-00-00'];
      mask = (cep.length>7) ? masks[1] : masks[0];
      $('.mask-crazy_cep').mask(mask, options);
    }};

    $('.mask-crazy_cep').mask('00000-000', options);


    var options2 =  {
      onComplete: function(cep) {
        alert('CEP Completed!:' + cep);
      },
      onKeyPress: function(cep, event, currentField, options){
        console.log('An key was pressed!:', cep, ' event: ', event,
          'currentField: ', currentField, ' options: ', options);
      },
      onChange: function(cep){
        console.log('cep changed! ', cep);
      },
      onInvalid: function(val, e, f, invalid, options){
        var error = invalid[0];
        console.log ("Digit: ", error.v, " is invalid for the position: ", error.p, ". We expect something like: ", error.e);
      }
    };

    $('.mask-cep_with_callback').mask('00000-000', options2);

    var SPMaskBehavior = function (val) {
      return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
    },
    spOptions = {
      onKeyPress: function(val, e, field, options) {
        field.mask(SPMaskBehavior.apply({}, arguments), options);
      }
    };

    $('.mask-sp_celphones').mask(SPMaskBehavior, spOptions);



    var slider = document.getElementById('noui-slider');
    noUiSlider.create(slider, {
      start: [20, 80],
      connect: true,
      range: {
        'min': 0,
        'max': 100
      }
    });

    var slider = document.getElementById('noui-range');
    noUiSlider.create(slider, {
                        start: [ 20, 80 ], // Handle start position
                        step: 10, // Slider moves in increments of '10'
                        margin: 20, // Handles must be more than '20' apart
                        connect: true, // Display a colored bar between the handles
                        direction: 'rtl', // Put '0' at the bottom of the slider
                        orientation: 'vertical', // Orient the slider vertically
                        behaviour: 'tap-drag', // Move handle on tap, bar is draggable
                        range: { // Slider can select '0' to '100'
                        'min': 0,
                        'max': 100
                      },
                        pips: { // Show a scale with the slider
                          mode: 'steps',
                          density: 2
                        }
                      });



    $(".select2-A").select2({
      placeholder: "Select a state",
      allowClear: true
    });

    $(".select2-B").select2({
      tags: true
    });

    $("#range1").ionRangeSlider({
      type: "double",
      grid: true,
      min: -1000,
      max: 1000,
      from: -500,
      to: 500
    });

    $('.dateAnimate').bootstrapMaterialDatePicker({ weekStart : 0, time: false,animation:true});
    $('.date').bootstrapMaterialDatePicker({ weekStart : 0, time: false});
    $('.time').bootstrapMaterialDatePicker({ date: false,format:'HH:mm',animation:true});
    $('.datetime').bootstrapMaterialDatePicker({ format : 'dddd DD MMMM YYYY - HH:mm',animation:true});
    $('.date-fr').bootstrapMaterialDatePicker({ format : 'DD/MM/YYYY HH:mm', lang : 'fr', weekStart : 1, cancelText : 'ANNULER'});
    $('.min-date').bootstrapMaterialDatePicker({ format : 'DD/MM/YYYY HH:mm', minDate : new Date() });


    $(".dial").knob({
      height:80
    });

    $('.dial1').trigger(
     'configure',
     {
       "min":10,
       "width":80,
       "max":80,
       "fgColor":"#FF6656",
       "skin":"tron"
     }
     );

    $('.dial2').trigger(
     'configure',
     {

       "width":80,
       "fgColor":"#FF6656",
       "skin":"tron",
       "cursor":true
     }
     );

    $('.dial3').trigger(
     'configure',
     {

       "width":80,
       "fgColor":"#27C24C",
     }
     );
  });
</script>
<!-- end: Javascript -->
</body>
</html>
<?php

include "../config/conexion.php";

$bandera           = $_REQUEST["bandera"];
$baccion  = $_REQUEST["baccion"];
$dui    = $_REQUEST["dui"];
$nombre  = $_REQUEST["nombre"];
$apellido  = $_REQUEST["apellido"];
$direccion      = $_REQUEST["direccion"];
$fechanacimiento       = $_REQUEST["fechanacimiento"];
$correo     = $_REQUEST["correo"];
$telefono = $_REQUEST["telefono"];
$cargo     = $_REQUEST["cargo"];
$estado     = $_REQUEST["estado"];
$sexo     = $_REQUEST["sexo"];

if ($bandera == "add") {
    $consulta  = "UPDATE tpersonal set cdui='" . $dui . "',cnombre='" . $nombre . "',capellido='" . $apellido . "',ctelefono='" . $telefono . "',ccorreo='" . $correo . "',cdireccion='" . $direccion . "',ffechanacimiento='" . $fechanacimiento. "',iestado='" . $estado . "',isexo='" . $sexo . "',efk_idcargo='" . $cargo . "' where eid_personal='" . $baccion . "'";
    $resultado = $conexion->query($consulta);
    
   
    
    if ($resultado) {
      msgAdd("Modificacion personal exitosa");
    } else {
      msgError("Error al modificar los datos");
    }
}

function msg($texto)
{
    echo "<script type='text/javascript'>";
    echo "alert('$texto');";
    echo "document.location.href='listapersonal.php';";
    echo "</script>";
}
function msgAdd($texto)
{
    echo "<script type='text/javascript'>";
    echo "sweetGuardo('$texto');";
    echo "document.location.href='listapersonal.php';";
    
    echo "</script>";
}
function msgError($texto)
{
    echo "<script type='text/javascript'>";
    echo "sweetError('$texto');";
    
    echo "</script>";
}
?>