<!DOCTYPE html>
<?php
//Codigo que muestra solo los errores exceptuando los notice.
error_reporting(E_ALL & ~E_NOTICE);
 include '../config/conexion.php';
                      
?>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Turismo</title>

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
        function verificar(){
          if(document.getElementById('codigom').value=="" ||
            document.getElementById('nombrem').value=="" ||
            document.getElementById('descripcionm').value=="" ||
            document.getElementById('horario').value=="" ||
            document.getElementById('docente').value==""||
            document.getElementById('opcion').value==""){
            alert("Complete los campos prueba");
            
          }else{
            alert(document.getElementById("lastindex"));
            document.getElementById("bandera").value="add";
            document.turismo.submit();
          }

        }
        function prueba(text) {
          alert("Funcioan prro"+text)
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

                         <h3 class="animated fadeInLeft">Materias</h3>
                        <p class="animated fadeInDown">
                          Materia <span class="fa-angle-right fa"></span>Datos de la materia.
                        </p>
                    </div>
                  </div>
                </div>
                <div class="form-element">
                
                <form id="turismo" name="turismo" action="" method="post">
                <input type="hidden" name="bandera" id="bandera">
                <input type="hidden" name="lastindex" id="lastindex" value="<?php echo ".$last." ?>">
                
                <div class="col-md-12">
                  <div class="col-md-12 panel panel-info">
                    <div class="col-md-12 panel-heading">
                      <h4>Informaci&oacute;n Materia</h4>
                      
                    </div>

                    <div class="col-md-12 panel-body" style="padding-bottom:30px;">
                      <div class="col-md-12">
                        <form class="cmxform" id="formcliente" method="post" action="">

                          <div class="col-md-6">
                          </br>
                           </br>
                        
                           <div class="input-group">
                           <span class="input-group-addon"><i class="glyphicon glyphicon-barcode"></i></span>
                           <input id="codigom" type="text" class="form-control" name="codigom" placeholder="Codigo">
                           </div>
                           </br>
                           </br>
                           <div class="input-group">
                           <span class="input-group-addon"><i class="glyphicon glyphicon-book"></i></span>
                           <input id="nombrem" type="text" class="form-control" name="nombrem" placeholder="Nombre">
                           </div>
                           </br>
                           </br>
                           <div class="input-group">
                           <span class="input-group-addon"><span class="glyphicon glyphicon-align-justify"></span></span>
                           <textarea rows="3" size="30" value="" id="descripcionm" name="descripcionm" class="form-control" placeholder="Descripción"></textarea> 
                           </div>
                           
                           </div>
                           
                            <div class="col-md-6">
                            <div class="form-group form-animate-text" style="margin-top:36px !important;margin-bottom:30px !important;">
                            <span class="label label-default" style="width: 500px; font-size: 20px">Horario <i class="glyphicon glyphicon-dashboard"></i></span>
                            
                            
                              <select id="horario"   class="select2 show-tick" style="width: 455px; font-size: 15px" name="horario">
                              <option value="">Seleccione Horario</option>
                               <?php
                      include '../config/conexion.php';
                      $result = $conexion->query("select eid_horario as id, cdia as dias, chora as bloque from thorarios");
                      if ($result) {

                        while ($fila = $result->fetch_object()) {
                  
                             echo "<option value='".$fila->id."'>".$fila->dias." ".$fila->bloque."</option>";
                          
                            
                         
                         
                        
                           }
                      }
                       ?>
                              
                              </select>
                            
                            </div>
                                            
                            <div class="form-group form-animate-text" style="margin-top:38px !important;margin-bottom:38px !important;">
                              <select id="docente"   class="select2 show-tick" style="width: 568px; font-size: 15px" name="docente">
                              <option value="">Seleccione Docente</option>
                               <?php
                      include '../config/conexion.php';
                      $result = $conexion->query("select p.eid_personal as id, p.cnombre as nombre, p.capellido as apellido from tpersonal as p, tcargos as c where p.efk_idcargo=c.eid_cargo and c.ccargo='Docente' and iestado='1'");
                      if ($result) {

                        while ($fila = $result->fetch_object()) {
                          echo "<option value='".$fila->id."'>".$fila->nombre."</option>";
                         
                           }
                      }
                       ?>
                                       
                              </select>
                            </div>
                           <div class="form-group form-animate-text" style="margin-top:38px !important;margin-bottom:38px !important;">
                              <select id="opcion"   class="select2 show-tick" style="width: 568px; font-size: 15px" name="opcion">
                              <option value="">Seleccione Opcion</option>
                               <?php
                      include '../config/conexion.php';
                      $result = $conexion->query("select op.eid_opcion as id, gr.cgrado as grado,ba.cnombe as nombre, se.cseccion as seccion from topciones as op, tbachilleratos as ba, tsecciones as se, tgrado as gr, ttipobachillerato as ti where op.efk_bto=ba.eid_bachillerato and op.efk_grado=gr.eid_grado and op.efk_seccion=se.eid_seccion and ti.eid_tipo=ba.efk_tipo ");
                      if ($result) {

                        while ($fila = $result->fetch_object()) {
                          echo "<option value='".$fila->id."'>".$fila->grado." anio ".$fila->nombre." seccion ".$fila->seccion."</option>";
                         
                        
                           }
                      }
                       ?>
                                       
                              </select>
                            </div>
                          </div>
                          <div class="col-md-12">
                            <div class="col-md-3">
                            </div>
                              <div class="col-md-3">
                             
                              <br><br>
                               <input type="button" name="next" class="next action-button btn btn-info btn-sm btn-round" style="font-size:20px;" value="Guardar" onclick="verificar();"/>                          </div>
                          <div class="col-md-3">
                          <br><br>
                              <input type="button" name="next" class="next action-button btn btn-danger btn-sm btn-round" style="font-size:20px;" value="Cancelar" />
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



<!-- custom -->
<script src="../asset/js/main.js"></script>
<script>$(document).ready(function() {
    $('.js-example-basic-single').select2();
});</script>
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

$bandera  = $_REQUEST["bandera"];
$codigom    = $_REQUEST["codigom"];
$nombrem  = $_REQUEST["nombrem"];
$descripcionm       = $_REQUEST["descripcionm"];
$horario       = $_REQUEST["horario"];
$docente = $_REQUEST["docente"];
$opcion = $_REQUEST["opcion"];

if ($bandera == "add") {
   msg("Entra a a gregar");
    $consulta  = "INSERT INTO tmaterias VALUES('null','" . $codigom . "','" . $nombrem . "','" . $descripcionm . "','" . $opcion . "','" . $horario . "','1')";
    $resultado = $conexion->query($consulta);
    if ($resultado) {
        //Bloque para agarrar el ID de la ultima materia ingresada.
        $result = $conexion->query("select MAX(eid_materia) as max from tmaterias");
                      if ($result) {

                        while ($fila = $result->fetch_object()) {
                          $last=$fila->max;
                         
                        
                           }
                      }
        //Finde bloque.
        msg("Agrego materia.");
        //Query para agregar a la tabla de muchos a muchos.
        $consulta2  = "INSERT INTO tpersonal_materia VALUES('null','" . $docente . "','" . $last . "')";
        $resultado2 = $conexion->query($consulta2);
       if ($resultado2) {
    
        msg("Agrego pm.");
        //Query para agregar a la tabla de muchos a muchos.
        
         } else {
        echo("Error pm:".mysqli_error($conexion));
          }
    } else {
        echo("Error materia:".mysqli_error($conexion));
    }
}

function msg($texto)
{
    echo "<script type='text/javascript'>";
    echo "prueba('$texto');";
    //echo "document.location.href='materias.php';";
    echo "</script>";
}
?>