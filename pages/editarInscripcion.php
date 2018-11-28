<?php
//Codigo que muestra solo los errores exceptuando los notice.
error_reporting(E_ALL & ~E_NOTICE);
session_start();
if($_SESSION["logueado"] == TRUE && $_SESSION["tipo"]==1 || $_SESSION["permisoI"]==1) {
  $nombre=$_SESSION["usuario"];
  $perIns= $_SESSION["permisoI"];
  $tipo  =$_SESSION["tipo"];
  $id  = $_REQUEST["id"];
}else {
  header("Location:inicio.php");
}

    $idAlumno = $_REQUEST["idA"];
?>
<!DOCTYPE html>

<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Editar inscripcion</title>

  <!-- start: Css -->
  <link rel="stylesheet" type="text/css" href="../asset/css/bootstrap.min.css">

  <!-- plugins -->
  <link rel="stylesheet" type="text/css" href="../asset/css/sweetalert2.css"/>
  <link rel="stylesheet" type="text/css" href="../asset/css/plugins/font-awesome.min.css"/>
  <link rel="stylesheet" type="text/css" href="../asset/css/plugins/animate.min.css"/>
  <link rel="stylesheet" type="text/css" href="../asset/css/plugins/nouislider.min.css"/>
  <link rel="stylesheet" type="text/css" href="../asset/css/plugins/select2.min.css"/>
  <link rel="stylesheet" type="text/css" href="../asset/css/plugins/ionrangeslider/ion.rangeSlider.css"/>
  <link rel="stylesheet" type="text/css" href="../asset/css/plugins/ionrangeslider/ion.rangeSlider.skinFlat.css"/>
  <link rel="stylesheet" type="text/css" href="../asset/css/plugins/bootstrap-material-datetimepicker.css"/>
  <link rel="stylesheet" type="text/css" href="../asset/css/wizard.css"/>
  <link href="../asset/css/style.css" rel="stylesheet">
  <!-- end: Css -->

  <link rel="shortcut icon" href="../asset/img/logomi.png">
  <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->


      <!-- SCRIPTS DE SWEET ALERTS -->
      <script>
      function DatosIncompletos(){
        swal({
  title: '<strong>HTML <u>example</u></strong>',
  type: 'info',
  html:
    'You can use <b>bold text</b>, ' +
    '<a href="//github.com">links</a> ' +
    'and other HTML tags',
  showCloseButton: true,
  showCancelButton: true,
  focusConfirm: false,
  confirmButtonText:
    '<i class="fa fa-thumbs-up"></i> Great!',
  confirmButtonAriaLabel: 'Thumbs up, great!',
  cancelButtonText:
    '<i class="fa fa-thumbs-down"></i>',
  cancelButtonAriaLabel: 'Thumbs down',
})

      }
      
      </script>
      <!-- FIN SCRIPTS DE SWEET ALERTS -->
      <!-- SCRIPTS DE VALIDACIONES PARA CAMPOS OBLIGATORIOS EN DATOS PERSONALES -->
    <script>
    function verificarCamposObligatoriosPersonales(){
       alert(document.getElementById("nombrea").value);
      if(document.getElementById("nombrea").value==""){
        alert("Lo sentimos, este campo es obligatorio.");
        return 0;
      }else{
         alert("nO ESTA VACIO");
         return 1;
      }
    }
    </script>
      <!-- fin SCRIPTS DE VALIDACIONES PARA CAMPOS OBLIGATORIOS EN DATOS PERSONALES -->
      <script type="text/javascript">
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
    //Validacion Telefono
    var nav4 = window.Event ? true : false;
      function aceptNum(evt){
        var key = nav4 ? evt.which : evt.keyCode;
        return (key <= 13 || (key>= 48 && key <= 57));
      }
      //Fin Validacion Telefono
     //Validacion Solo letras
        function verificar(){
          if(document.getElementById('nombreempleado').value=="" ||
            document.getElementById('apellidoempleado').value=="" ||
            document.getElementById('duiempleado').value=="" ||
            document.getElementById('nitempleado').value=="" ||
            document.getElementById('cargoempleado').value==""){
            alert("Complete los campos prueba");
            
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
      <?php
          if($perIns==1){
            include "menuD.php";
           
          }else{
            include "menu.php";
          } ?>
         


          <!-- start: Content -->
            <div id="content">
            <div class="panel box-shadow-none content-header">
                  <div class="panel-body">
                    <div class="col-md-12" >

                         <h3 class="animated fadeInLeft">Inscripcion</h3>
                        <p class="animated fadeInDown">
                          Ficha de inscripcion.
                        </p>
                    </div>
                  </div>
                </div>
               <!-- multistep form -->
<form id="msform">
  <!-- progressbar -->
  <ul id="progressbar">
    <li class="active">Datos Personales</li>
    <li>Datos del responsable.</li>
    <li>Información adicional.</li>
  </ul>
  <!-- fieldsets -->
  <fieldset>
    <h2 class="fs-title">Datos personales.</h2>
    <h3 class="fs-subtitle">Informacion personal del alumno.<br>Los campos con un (*) son obligatorios.</h3>
    <!-- Inicia col md 12 panel -->
    <div class="col-md-12 panel-body" style="padding-bottom:30px;">
      <!-- Inicia el col md 6 izquierda -->
    <div class="col-md-6">
    <div class="input-group " style="padding-bottom:20px;">
    <span class="input-group-addon"><i class="glyphicon glyphicon-barcode"></i></span>
     <input id="codigoa" type="text" class="form-control" name="codigoa" placeholder="Codigo.">
     </div>
     <div class="input-group " style="padding-bottom:20px;">
    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
     <input id="nombrea" type="text" class="form-control" name="nombrea" placeholder="Nombre." onkeypress="return sololetras(event)">
     </div>

      <div class="form-group form-animate-text" style="margin-top:5px !important;margin-bottom:30px !important;">
     <i class="glyphicon glyphicon-map-marker"></i><span class="label label-default" style="width: 100px; font-size: 15px">Nacio en: </span>
      <select id="departamentoa"  id="iddia" class="select2 show-tick" style="width: 264px; font-size: 15px" name="departamentoa">
      <option value="">Seleccione Departamento</option>
      <option value="">San Salvador</option>
      <option value="">San Vicente</option>
      <option value="">San Miguel</option>
      <option value="">Santa Ana</option>
      <option value="">Chalatenango</option>
      <option value="">Cabañas</option>
      <option value="">Sonsonate</option>
      <option value="">La Union</option>
      <option value="">La Libertad</option>
      <option value="">La Paz</option>
      <option value="">Morazán</option>
      <option value="">Usulutan</option>
      <option value="">Santa Ana</option>
      <option value="">Ahuachapán</option>
      <option value="">Cuscatlán</option>
      </select>
      </div>
      <div class="input-group"style="padding-bottom:20px;">
      <span class="input-group-addon"><span class="glyphicon glyphicon-home"></span></span>
      <textarea rows="3" size="30" value="" class="form-control" placeholder="Dirección" id="direcciona" name="direcciona"></textarea>
      </div>
      <div class="form-group form-animate-text" style="margin-top:5px !important;margin-bottom:30px !important;">
     <i  class="fa fa-bus"></i><span class="label label-default" style="width: 100px; font-size: 15px">Llegada C.E.: </span>
      <select id="llegadaa"  class="select2 show-tick" style="width: 240px; font-size: 15px" name="llegadaa">
      <option value="">Medio de Transporte</option>
      <option value="">Autobus</option>
      <option value="">A pie</option>
      <option value="">Trans.Propio</option>
      <option value="">Otro</option>
      </select>
      </div>
      <div class="form-group form-animate-text" style="margin-top:5px !important;margin-bottom:30px !important;">
     <i  class="glyphicon glyphicon-education"></i><span class="label label-default" style="width: 100px; font-size: 15px">Bachillerato: </span>
      <select id="bachilleratoa"  class="select2 show-tick" style="width: 242px; font-size: 15px" name="bchilleratoa">
      <option value="">Seleccione Opcion</option>
      <option value="">1° Año Bachillerato General</option>
      <option value="">2° Año Bachillerato General</option>
      <option value="">1° Año Bachillerato Contador</option>
      <option value="">2° Año Bachillerato Contador</option>
      <option value="">3° Año Bachillerato Contador</option>
      </select>
      </div>
      <div class="input-group " style="padding-bottom:20px;">
    <span class="input-group-addon"><i class="glyphicon glyphicon-repeat"></i></span>
     <input id="anteriora" type="text" class="form-control" name="anteriora" placeholder="En que año estudio el grado anterior">
     </div>
     <div class="input-group " style="padding-bottom:20px;">
    <span class="input-group-addon"><i class="fa fa-user-md"></i></span>
     <input id="enfermedadesa" type="text" class="form-control" name="enfermedadesa" placeholder="Enfermedades que padece" onkeypress="return sololetras(event)">
     </div>
     <div class="input-group " style="padding-bottom:20px;">
    <span class="input-group-addon"><i class="fa fa-user-md"></i></span>
     <input id="alergiaa" type="text" class="form-control" name="alergiaa" placeholder="Es alergico a">
     </div>
      
 





    </div>
    <!-- Finaliza col md 6 -->
    <!-- Finaliza col md 6 (derecha) -->
     <div class="col-md-6">
     <div class="input-group " style="padding-bottom:20px;">
     <input id="niea" type="text" class="form-control" name="niea" placeholder="NIE.">
     <span class="input-group-addon"><i class="glyphicon glyphicon-barcode"></i></span>
     </div>
     <div class="input-group " style="padding-bottom:25px;">
     <input id="apellidoa" type="text" class="form-control" name="apellidoa" placeholder="Apellido." onkeypress="return sololetras(event)">
     <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
     </div>

     <div class="input-group " style="padding-bottom:30px;">
     <input id="fecha" type="date" class="form-control" name="fecha" >
     <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
     </div>
     
     <div class="input-group " style="padding-bottom:20px;">
     <input id="distanciaa" type="text" class="form-control" name="distanciaa" placeholder="Distancia en metros desde casa hasta el C.E.">
     <span class="input-group-addon"><i class="glyphicon glyphicon-road"></i></span>
     </div>
     </br>
     <div class="input-group " style="padding-bottom:25px;">
     <i  class="fa fa-apple"></i><span class="label label-default" style="width: 100px; font-size: 15px">Estudio Parvularia</span>
     <label class="radio-inline" style="width: 100px; font-size: 15px"><input type="radio" name="parvularia" id="parvularia">Si</label>
     <label class="radio-inline" style="width: 100px; font-size: 15px"><input type="radio" name="parvularia" id="parvularia">No</label>
     </div>
     </br>
     <div class="input-group " style="padding-bottom:25px;">
     <i  class="fa fa-briefcase"></i><span class="label label-default" style="width: 400px; font-size: 15px">Trabaja</span>
     <label class="radio-inline" style="margin-right:74px;margin-left:110px; font-size: 15px"><input type="radio" name="trabajaa" id="trabaja">Si</label>
     <label class="radio-inline" style="width: 0px; font-size: 15px;margin-left:0px"><input type="radio" name="trabajaa" id="trabaja">No</label>
     </div>
     </br>
     <div class="input-group " style="padding-bottom:25px;">
     <i  class="glyphicon glyphicon-tree-deciduous"></i><span class="label label-default" style="width: 20px; font-size: 15px">Zona donde vive</span>
     <label class="radio-inline" style="margin-right:55px;margin-left:42px; font-size: 15px"><input type="radio" name="zonaa" id="zonaa">Rural</label>
     <label class="radio-inline" style="width: 0px; font-size: 15px;margin-left:0px"><input type="radio" name="zonaa"id="zonaa">Urbana</label>
     </div>
     </br>
     <div class="input-group " style="padding-bottom:25px;">
     <i  class="fa fa-repeat"></i><span class="label label-default" style="width: 20px; font-size: 15px">Repite Grado</span>
     <label class="radio-inline" style="margin-right:78px;margin-left:68px; font-size: 15px"><input type="radio" name="repitea" id="repitea">Si</label>
     <label class="radio-inline" style="width: 0px; font-size: 15px;margin-left:0px"><input type="radio" name="repitea" id="repitea">No</label>
     </div>
     </br>
     <div>
     <i  class="glyphicon glyphicon-asterisk"></i><span class="label label-default" style="width: 20px; font-size: 15px">Sacramentos</span>
     <label class="checkbox-inline"style="margin-right:20px;margin-left:10px;font-size: 15px"><input type="checkbox" value="">Bautismo</label>
     <label class="checkbox-inline"style="font-size: 15px"><input type="checkbox" value="">Confirmacion</label>
     <label class="checkbox-inline"style="margin-right:20px;margin-left:67px;font-size: 15px"><input type="checkbox" value="">Primera Comunión</label>
     </div>
     </br>


     

      
 

    </div>
    <!-- Finaliza col md 6 -->
    </div>
    <!-- Finaliza col md 12 panel body -->
    
    <input type="button" name="siguiente" class="next action-button btn btn-info btn-sm btn-round" onclick="form1()" value="Siguiente" />
    <!-- <button type="button" class="btn btn-info btn-sm btn-round">Ver detalle</button> -->
  </fieldset>
  <fieldset>
    <h2 class="fs-title">DATOS PERSONALES DE LOS PADRE DE FAMILIA O RESPONSABLE.</h2>
    <h3 class="fs-subtitle">Es obligatorio colocar un número de telefono fijo ya sea de casa o de trabajo;si cambia su número de telefónico por favor actualizarlo.</h3>
    <!-- Inicia col md 12 panel -->
    <div class="col-md-12 panel-body" style="padding-bottom:30px;">
      <!-- Inicia el col md 6 izquierda -->
    
    <div class="col-md-6">
    <h3 class="fs-subtitle" >* DATOS  DEL PADRE (Responsable masculino).</h3>
    <div class="input-group " style="padding-bottom:20px;">
    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
     <input id="nombrep" type="text" class="form-control" name="nombrep" placeholder="Nombre del padre." onkeypress="return sololetras(event)">
     </div>
     <div class="input-group " style="padding-bottom:20px;">
    <span class="input-group-addon"><i class="glyphicon glyphicon-briefcase"></i></span>
     <input id="lugarp" type="text" class="form-control" name="lugarp" placeholder="Lugar de Trabajo." >
     </div>
    <div class="input-group " style="padding-bottom:20px;">
    <span class="input-group-addon"><i class="glyphicon glyphicon-barcode"></i></span>
     <input id="duip" type="text" class="form-control" name="duip" placeholder="DUI.">
     </div>
     <div class="input-group " style="padding-bottom:20px;">
    <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
     <input id="telefonocp" type="text" class="form-control" name="telefonocp" placeholder="Tel. de casa"  size="8" maxlength="8" onkeypress="return aceptNum(event)">
     </div>
     <div class="input-group " style="padding-bottom:20px;">
    <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
     <input id="telefonotp" type="text" class="form-control" name="telefonotp" placeholder="Tel. de trabajo"  size="8" maxlength="8" onkeypress="return aceptNum(event)">
     </div>
     <div class="input-group " style="padding-bottom:20px;">
    <span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span>
     <input id="celularp" type="text" class="form-control" name="celularp" placeholder="Celular"  size="8" maxlength="8" onkeypress="return aceptNum(event)">
     </div>
     
     
     

      
      <div class="input-group"style="padding-bottom:20px;">
      <span class="input-group-addon"><span class="glyphicon glyphicon-home"></span></span>
      <textarea rows="3" size="30" value="" class="form-control" placeholder="Dirección" id="direccionp" name="direccionp"></textarea>
      </div>
      <div class="form-group form-animate-text" style="margin-top:5px !important;margin-bottom:30px !important;">
     <i  class="glyphicon glyphicon-heart"></i><span class="label label-default" style="width: 40px; font-size: 12px">Estado civil de los padres</span>
      <select id="estadop"  class="select2 show-tick" style="width: 190px; font-size: 13px" name="estadop">
      <option value="">Matrimonio Religioso</option>
      <option value="">Civil</option>
      <option value="">Acompañados</option>
      <option value="">Separados</option>
      <option value="">Viudo/a</option>
      </select>
      </div>
      <div class="form-group form-animate-text" style="margin-top:5px !important;margin-bottom:30px !important;">
     <i  class="glyphicon glyphicon-heart"></i><span class="label label-default" style="width: 100px; font-size: 12px">Convive con: </span>
      <select id="convivea"  class="select2 show-tick" style="width: 260px; font-size: 13px" name="convivea">
      <option value="">Mamá</option>
      <option value="">Papá</option>
      <option value="">Mamá y Papá</option>
      <option value="">Otro</option>
      </select>
      </div>
      
       </div>
    <!-- Finaliza col md 6 -->
    
    <!-- Finaliza col md 6 (derecha) -->
     <div class="col-md-6">
     <h3 class="fs-subtitle" >* DATOS  DE LA MADRE (Responsable femenino).</h3>
     <div class="input-group " style="padding-bottom:20px;">
     <input id="nombrem" type="text" class="form-control" name="nombrem" placeholder="Nombre de la madre." onkeypress="return sololetras(event)">
     <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
     </div>
     <div class="input-group " style="padding-bottom:20px;">
     <input id="lugarm" type="text" class="form-control" name="lugarm" placeholder="Lugar de Trabajo.">
     <span class="input-group-addon"><i class="glyphicon glyphicon-briefcase"></i></span>
     </div>
     <div class="input-group " style="padding-bottom:20px;">
     <input id="oficiom" type="text" class="form-control" name="oficiom" placeholder="Profesión u oficio." onkeypress="return sololetras(event)">
     <span class="input-group-addon"><i class="glyphicon glyphicon-briefcase"></i></span>
     </div>
     <div class="input-group " style="padding-bottom:20px;">
     <input id="duim" type="text" class="form-control" name="duim" placeholder="DUI">
     <span class="input-group-addon"><i class="glyphicon glyphicon-barcode"></i></span>
     </div>
     <div class="input-group " style="padding-bottom:20px;">
     <input id="telefonocm" type="text" class="form-control" name="telefonocm" placeholder="Tel. de casa"  size="8" maxlength="8" onkeypress="return aceptNum(event)">
     <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
     </div>
     <div class="input-group " style="padding-bottom:20px;">
     <input id="telefonotm" type="text" class="form-control" name="telefonotm" placeholder="Tel. de trabajo" size="8" maxlength="8" onkeypress="return aceptNum(event)">
     <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
     </div>
     <div class="input-group " style="padding-bottom:20px;">
     <input id="celularm" type="text" class="form-control" name="celularm" placeholder="Celular"  size="8" maxlength="8" onkeypress="return aceptNum(event)">
     <span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span>
     </div>
    
     
     <div class="input-group " style="padding-bottom:20px;">
     <input id="miembrosm" type="text" class="form-control" name="miembrosm" placeholder="N° de miembros con los que vive en el hogar" size="2" maxlength="2" onkeypress="return aceptNum(event)">
     <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
     </div>
     </br>
     <div class="input-group " style="padding-bottom:25px;">
     <i  class="fa fa-asterisk"></i><span class="label label-default" style="width: 100px; font-size: 12px">Religión que profesan</span>
     <label class="radio-inline" style="width: 100px; font-size: 15px"><input type="radio" name="religiionm" id="religionm">Católica</label>
     <label class="radio-inline" style="width: 100px; font-size: 15px"><input type="radio" name="religionm" id="religionm">Otra</label>
     </div>
     </br>
    
     </br>
 </div>
    <!-- Finaliza col md 6 -->
    </div>
    <!-- Finaliza col md 12 panel body -->
    
    
    </br>
    <input type="button" name="previous" class="previous action-button" value="Anterior" />
    <input type="button" name="next" class="next action-button" value="Siguiente" />
  </fieldset>
  
  <fieldset>
    <h2 class="fs-title">DETALLES</h2>
    <h3 class="fs-subtitle" >Hermanos/as que estudien en el centro educativo.</h3>
     <!-- Inicia el col md 6 izquierda -->
    
     <div class="col-md-6">
    
    <div class="input-group " style="padding-bottom:20px;">
    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
     <input id="nombreh1" type="text" class="form-control" name="nombreh1" placeholder="Nombre" onkeypress="return sololetras(event)">
     </div>
     <div class="input-group " style="padding-bottom:20px;">
    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
     <input id="nombreh2" type="text" class="form-control" name="nombreh2" placeholder="Nombre" onkeypress="return sololetras(event)">
     </div>
     <div class="input-group " style="padding-bottom:20px;">
    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
     <input id="nombreh3" type="text" class="form-control" name="nombreh3" placeholder="Nombre" onkeypress="return sololetras(event)">
     </div>
     </div>
    <!-- Finaliza col md 6 -->
    
    <!-- Finaliza col md 6 (derecha) -->
     <div class="col-md-6">
     
     <div class="input-group " style="padding-bottom:20px;">
     <input id="gradoh1" type="text" class="form-control" name="gradoh1" placeholder="Grado">
     <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
     </div>
     <div class="input-group " style="padding-bottom:20px;">
     <input id="gradoh2" type="text" class="form-control" name="gradoh2" placeholder="Grado">
     <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
     </div>
     <div class="input-group " style="padding-bottom:20px;">
     <input id="gradoh3" type="text" class="form-control" name="gradoh3 " placeholder="Grado">
     <span class="input-group-addon"><i class="glyphicon glyphicon-pencil"></i></span>
     </div>
     
     
     
     
     </br>
    
     </br>
 </div>
    <!-- Finaliza col md 6 -->
    
    
    
    
    </br>
    <input type="button" name="previous" class="previous action-button" value="Anterior" />
    <input type="submit" name="submit" class="submit action-button" value="Guardar" />
  </fieldset>
</form> 
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
<script src="../asset/js/wizard.js"></script>
<script src="../asset/js/sweetalert2.js"></script>


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
$nombreempleado    = $_REQUEST["nombreempleado"];
$apellidoempleado  = $_REQUEST["apellidoempleado"];
$duiempleado       = $_REQUEST["duiempleado"];
$nitempleado       = $_REQUEST["nitempleado"];
$cargoempleado     = $_REQUEST["cargoempleado"];
$idagenciaempleado = $_REQUEST["idagenciaempleado"];

if ($bandera == "add") {
    $consulta  = "INSERT INTO empleado VALUES('null','" . $nombreempleado . "','" . $apellidoempleado . "','" . $duiempleado . "','" . $nitempleado . "','" . $cargoempleado . "','" . $idagenciaempleado . "')";
    $resultado = $conexion->query($consulta);
    if ($resultado) {
        msg("Exito");
    } else {
        msg("No Exito");
    }
}

function msg($texto)
{
    echo "<script type='text/javascript'>";
    echo "alert('$texto');";
    echo "document.location.href='listaempleado.php';";
    echo "</script>";
}

  

?>