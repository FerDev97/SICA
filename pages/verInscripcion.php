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

  include "../config/conexion.php";

  $result = $conexion->query("select eid_alumno,ccodigo ,cnie,cnombre,capellido,cdireccion,edepto,ffecha_nac, 
  cllegada, cbachillerato, canterior, cenfermedades, calergia, cdistancia, iparvularia, itrabaja, izona, irepite, ibautizo, icomunion, iconfirma,
  cnombrep, clugar_trabajop, cduip, ctelefonocp, ctelefonotp, ccelularp, cdireccionp, cestadocivilp, cconvive, cnombrem, clugar_trabajom,
  cprofesionm, cduim, ctelefonocm, ctelefonotm, ccelularm, cmiembros, creligion, anio from talumno where eid_alumno = ".$idAlumno);

  if ($result) {
    while ($fila = $result->fetch_object()) {
        $idAlumnoR        = $fila->eid_alumno;
        $codigoAR         = $fila->ccodigo;
        $nieR             = $fila->cnie;
        $nombreAR         = $fila->cnombre;
        $apellidoAR       = $fila->capellido;
        $direccionAR      = $fila->cdireccion;
        $departR          = $fila->edepto;
        $fechaNacR        = $fila->ffecha_nac;
        $llegadaR         = $fila->cllegada;
        $bachilleratoR    = $fila->cbachillerato;
        $anteriorR        = $fila->canterior;
        $enfermedadesR    = $fila->cenfermedades;
        $alergiaR         = $fila->calergia;
        $distanciaR       = $fila->cdistancia;
        $parvulariaR      = $fila->iparvularia;
        $trabajaR          = $fila->itrabaja;
        $zonaR              = $fila->izona;
        $repite            = $fila->irepite;
        $bautizoR          = $fila->ibautizo;
        $comunionR         = $fila->icomunion;
        $confirmaR         = $fila->iconfirma;
        $nombrePadreR      = $fila->cnombrep;
        $lugarTrabajoPR      = $fila->clugar_trabajop;
        $profesionM         =$fila->cprofesionm;
        $duiPadreR               =$fila->cduip;
        $telCasaPadre       =$fila->ctelefonocp;
        $telTrabPadre       =$fila->ctelefonotp;
        $celPadre           =$fila->ccelularp;
        $direccionPadre     =$fila->cdireccionp;
        $estadoCivil        =$fila->cestadocivilp;
        $convive            =$fila->cconvive;
        $nombreMadreR        =$fila->cnombrem;
        $lugarTrabajoMR     =$fila->clugar_trabajom;
        $duiMadre           =$fila->cduim;
        $telCasaMadre       =$fila->ctelefonocm;
        $telTrabMadre       =$fila->ctelefonotm;
        $celMadre           =$fila->ccelularm;
        $miembrosFamilia    =$fila->cmiembros;
        $religion           =$fila->creligion;
        $anioR              =$fila->anio;
    }
}

?>
<!DOCTYPE html>

<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Inscripcion</title>

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
return 0;

      }
       

     
      
      </script>
      <!-- FIN SCRIPTS DE SWEET ALERTS -->
      <!-- SCRIPTS DE VALIDACIONES PARA CAMPOS OBLIGATORIOS EN DATOS PERSONALES -->
    <script>
//Validaciones para registro del alumno
function go(){
  document.msform.submit(); 
}



    function verificarCamposObligatoriosPersonales(){
       //alert(document.getElementById("nombrea").value);
      if(document.getElementById("nombrea").value==""){
        //alert("Lo sentimos, este campo es obligatorio.");
        return 0;
      }else{
         //alert("nO ESTA VACIO");
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
            //alert("Complete los campos prueba");
            
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
<form id="msform" name="msform" method="post" action="inscribir.php">
  <!-- progressbar -->
  <center>
  <ul id="progressbar">
    <li class="active">Datos Personales</li>
    <li>Datos del responsable.</li>
    <li>Aceptacion de Terminos.</li>
  </ul>
  </center>

    <?php

 
    ?>      

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
     <input id="codigoa" type="text" class="form-control" name="codigoa" placeholder="Codigo." value="<?php echo $codigoAR;?>"disabled>
     </div>
     <div class="input-group " style="padding-bottom:20px;">
    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
     <input id="nombrea" type="text" class="form-control" name="nombrea" placeholder="Nombre." onkeypress="return sololetras(event)" value="<?php echo $nombreAR;?>" disabled>
     </div>

      <div class="form-group form-animate-text" style="margin-top:5px !important;margin-bottom:30px !important;">
     <i class="glyphicon glyphicon-map-marker"></i><span class="label label-default" style="width: 100px; font-size: 15px">Nacio en: </span>
      <select id="departamentoa" class="select2 show-tick" style="width: 264px; font-size: 15px" name="departamentoa" disabled>
      <option value="<?php echo $departR;?>"><?php echo $departR;?></option>
      <!---<option value="">Seleccione Departamento</option>
      <option value="San Salvador">San Salvador</option>
      <option value="San Vicente">San Vicente</option>
      <option value="San Miguel">San Miguel</option>
      <option value="Santa Ana">Santa Ana</option>
      <option value="Chalatenango">Chalatenango</option>
      <option value="Cabañas">Cabañas</option>
      <option value="Sonsonate">Sonsonate</option>
      <option value="La Union">La Union</option>
      <option value="La Libertad">La Libertad</option>
      <option value="La Paz">La Paz</option>
      <option value="Morzán">Morazán</option>
      <option value="Usulutan">Usulutan</option>
      <option value="Santa Ana">Santa Ana</option>
      <option value="Ahuachapán">Ahuachapán</option>
      <option value="Cuscatlan">Cuscatlán</option>--->
      </select>
      </div>
      <div class="input-group"style="padding-bottom:20px;">
      <span class="input-group-addon"><span class="glyphicon glyphicon-home"></span></span>
      <textarea rows="3" size="30"  class="form-control" placeholder="Dirección" id="direcciona" name="direcciona" disabled><?php echo $direccionAR;?></textarea>
      </div>
      <div class="form-group form-animate-text" style="margin-top:5px !important;margin-bottom:30px !important;">
     <i  class="fa fa-bus"></i><span class="label label-default" style="width: 100px; font-size: 15px">Llegada C.E.: </span>
      <select id="llegadaa"  class="select2 show-tick" style="width: 240px; font-size: 15px" name="llegadaa" disabled>
      <option value="<?php echo $llegadaR;?>"><?php echo $direccionAR;?></option>
      <!--<option value="">Medio de Transporte</option>
      <option value="Autobus">Autobus</option>
      <option value="A pie">A pie</option>
      <option value="Trans.Propio">Trans.Propio</option>
      <option value="Otro">Otro</option>-->
      </select>
      </div>
      <div class="form-group form-animate-text" style="margin-top:5px !important;margin-bottom:30px !important;">
     <i  class="glyphicon glyphicon-education"></i><span class="label label-default" style="width: 100px; font-size: 15px">Bachillerato: </span>
      <select id="bachilleratoa"  class="select2 show-tick" style="width: 242px; font-size: 15px" name="bachilleratoa" disabled>
      <option value="">Seleccione Opcion</option>
          <option value="">
      </select>
      </div>
      <div class="input-group " style="padding-bottom:20px;">
    <span class="input-group-addon"><i class="glyphicon glyphicon-repeat"></i></span>
     <input id="anteriora" value="<?php echo $anteriorR;?>" type="text" class="form-control" name="anteriora" placeholder="En que año estudio el grado anterior" disabled>
     </div>
     <div class="input-group " style="padding-bottom:20px;">
    <span class="input-group-addon"><i class="fa fa-user-md"></i></span>
     <input id="enfermedadesa" value="<?php echo $enfermedadesR;?>" type="text" class="form-control" name="enfermedadesa" placeholder="Enfermedades que padece" onkeypress="return sololetras(event)" disabled>
     </div>
     <div class="input-group " style="padding-bottom:20px;">
    <span class="input-group-addon"><i class="fa fa-user-md"></i></span>
     <input id="alergiaa" value="<?php echo $alergiaR;?>" type="text" class="form-control" name="alergiaa" placeholder="Es alergico a" disabled>
     </div>
      
 





    </div>
    <!-- Finaliza col md 6 -->
    <!-- Finaliza col md 6 (derecha) -->
     <div class="col-md-6">
     <div class="input-group " style="padding-bottom:20px;">
     <input id="niea" value="<?php echo $nieR;?>" type="text" class="form-control" name="niea" placeholder="NIE." disabled>
     <span class="input-group-addon"><i class="glyphicon glyphicon-barcode"></i></span>
     </div>
     <div class="input-group " style="padding-bottom:25px;">
     <input id="apellidoa" value="<?php echo $apellidoAR;?>" type="text" class="form-control" name="apellidoa" placeholder="Apellido." onkeypress="return sololetras(event)" disabled>
     <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
     </div>

     <div class="input-group " style="padding-bottom:30px;">
     <input id="fecha" value="<?php echo $fechaNacR;?>" type="date" class="form-control" name="fecha" disabled >
     <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
     </div>
     
     <div class="input-group " style="padding-bottom:20px;">
     <input id="distanciaa" value="<?php echo $distanciaR;?>" type="number" class="form-control" name="distanciaa" placeholder="Distancia en metros desde casa hasta el C.E." disabled>
     <span class="input-group-addon"><i class="glyphicon glyphicon-road"></i></span>
     </div>
     </br>
     <div class="input-group " style="padding-bottom:25px;">
     <i  class="fa fa-apple"></i><span class="label label-default" style="width: 100px; font-size: 15px">Estudio Parvularia</span>
     <?php
          if($parvulariaR == 1){
              echo "<label class='radio-inline' style='width: 100px; font-size: 15px'><input type='radio' name='parvularia' value='1' id='parvularia' checked disabled>Si</label>";
              echo "<label class='radio-inline' style='width: 100px; font-size: 15px'><input type='radio' name='parvularia' value='0' id='parvularia' disabled>No</label>";
          }else{
            echo "<label class='radio-inline' style='width: 100px; font-size: 15px'><input type='radio' name='parvularia' value='1' id='parvularia'disabled>Si</label>";
            echo "<label class='radio-inline' style='width: 100px; font-size: 15px'><input type='radio' name='parvularia' value='0' id='parvularia' checked disabled>No</label>";
          }
     
     ?>
     </div>
     </br>
     <div class="input-group " style="padding-bottom:25px;">
     <i  class="fa fa-briefcase"></i><span class="label label-default" style="width: 400px; font-size: 15px">Trabaja</span>
     <?php
          if($trabajaR == 1){
              echo "<label class='radio-inline' style='margin-right:74px;margin-left:110px; font-size: 15px'><input type='radio' name='trabajaa' value='1' id='trabaja' checked disabled>Si</label>";
              echo "<label class='radio-inline' style='width: 0px; font-size: 15px;margin-left:0px'><input type='radio' name='trabajaa' value='0' id='trabaja'disabled>No</label>";
          }else{
            echo "<label class='radio-inline' style='margin-right:74px;margin-left:110px; font-size: 15px'><input type='radio' name='trabajaa' value='1' id='trabaja' disabled>Si</label>";
              echo "<label class='radio-inline' style='width: 0px; font-size: 15px;margin-left:0px'><input type='radio' name='trabajaa' value='0' id='trabaja' checked disabled>No</label>";
          }
     
     ?>

     </div>
     </br>
     <div class="input-group " style="padding-bottom:25px;">
     <i  class="glyphicon glyphicon-tree-deciduous"></i><span class="label label-default" style="width: 20px; font-size: 15px">Zona donde vive</span>
     <?php
          if($trabajaR == 1){
              echo "<label class='radio-inline' style='margin-right:55px;margin-left:42px; font-size: 15px'><input type='radio' name='zonaa' value='1' id='zonaa' checked disabled>Rural</label>";
              echo "<label class='radio-inline' style='width: 0px; font-size: 15px;margin-left:0px'><input type='radio' name='zonaa' value='0' id='zonaa' disabled>Urbana</label>";
          }else{
            echo "<label class='radio-inline' style='margin-right:55px;margin-left:42px; font-size: 15px'><input type='radio' name='zonaa' value='1' id='zonaa' disabled>Rural</label>";
            echo "<label class='radio-inline' style='width: 0px; font-size: 15px;margin-left:0px'><input type='radio' name='zonaa' value='0' id='zonaa' checked disabled>Urbana</label>";
          }
     
     ?>

     </div>
     </br>
     <div class="input-group " style="padding-bottom:25px;">
     <i  class="fa fa-repeat"></i><span class="label label-default" style="width: 20px; font-size: 15px">Repite Grado</span>
     <?php
          if($repite == 1){
              echo "<label class='radio-inline' style='margin-right:78px;margin-left:68px; font-size: 15px'><input type='radio' name='repitea' value='1' id='repitea' checked disabled >Si</label>";
              echo "<label class='radio-inline' style='width: 0px; font-size: 15px;margin-left:0px'><input type='radio' name='repitea' value='0' id='repitea'disabled>No</label>";
          }else{
            echo "<label class='radio-inline' style='margin-right:78px;margin-left:68px; font-size: 15px'><input type='radio' name='repitea' value='1' id='repitea' disabled>Si</label>";
              echo "<label class='radio-inline' style='width: 0px; font-size: 15px;margin-left:0px'><input type='radio' name='repitea' value='0' id='repitea' checked disabled>No</label>";
          }
     
     ?>
     
     </div>
     </br>
     <div>
     <i  class="glyphicon glyphicon-asterisk"></i><span class="label label-default" style="width: 20px; font-size: 15px">Sacramentos</span>
     <?php

          if($bautizoR == 1){
            echo "<label class='checkbox-inline' style='margin-right:20px;margin-left:10px;font-size: 15px'><input type='checkbox' value='1' name='bautismo' checked disabled >Bautismo</label>";
          }else{
            echo "<label class='checkbox-inline' style='margin-right:20px;margin-left:10px;font-size: 15px'><input type='checkbox' value='1' name='bautismo'disabled>Bautismo</label>";
          }

          if($comunionR == 1){
              echo "<label class='checkbox-inline' style='font-size: 15px'><input type='checkbox' value='1' name='confirmacion' checked disabled>Confirmacion</label>";
          }else{
            echo "<label class='checkbox-inline' style='font-size: 15px'><input type='checkbox' value='1' name='confirmacion'disabled>Confirmacion</label>";
          }

          if($confirmaR == 1){
            echo "<label class='checkbox-inline' style='margin-right:20px;margin-left:67px;font-size: 15px'><input type='checkbox' value='1' name='comunion' checked disabled>Primera Comunión</label>";
          }else{
            echo "<label class='checkbox-inline' style='margin-right:20px;margin-left:67px;font-size: 15px'><input type='checkbox' value='1' name='comunion'disabled> Primera Comunión</label>";
          }

     
     ?>
     
     </div>
     </br>


     

      
 

    </div>
    <!-- Finaliza col md 6 -->
    </div>
    <!-- Finaliza col md 12 panel body -->
    
    <input type="button" name="siguiente" class="next action-button" onclick="form1()" value="Siguiente" />
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
     <input id="nombrep" type="text" class="form-control" name="nombrep" placeholder="Nombre del padre." onkeypress="return sololetras(event)" value="<?php echo $nombrePadreR; ?>" disabled>
     </div>
     <div class="input-group " style="padding-bottom:20px;">
    <span class="input-group-addon"><i class="glyphicon glyphicon-briefcase"></i></span>
     <input id="lugarp" type="text" class="form-control" name="lugarp" placeholder="Lugar de Trabajo." value="<?php echo $lugarTrabajoPR; ?>" disabled >
     </div>
    <div class="input-group " style="padding-bottom:20px;">
    <span class="input-group-addon"><i class="glyphicon glyphicon-barcode"></i></span>
     <input id="duip" type="text" class="form-control" name="duip" placeholder="DUI." value="<?php echo $duiPadreR; ?>" disabled>
     </div>
     <div class="input-group " style="padding-bottom:20px;">
    <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
     <input id="telefonocp" type="text" class="form-control" name="telefonocp" placeholder="Tel. de casa"  size="8" maxlength="8" onkeypress="return aceptNum(event)" value="<?php echo $telCasaPadre; ?>" disabled>
     </div>
     <div class="input-group " style="padding-bottom:20px;">
    <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
     <input id="telefonotp" type="text" class="form-control" name="telefonotp" placeholder="Tel. de trabajo"  size="8" maxlength="8" onkeypress="return aceptNum(event)" value="<?php echo $telTrabPadre; ?>" disabled>
     </div>
     <div class="input-group " style="padding-bottom:20px;">
    <span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span>
     <input id="celularp" type="text" class="form-control" name="celularp" placeholder="Celular"  size="8" maxlength="8" onkeypress="return aceptNum(event)" value="<?php echo $celPadre; ?>" disabled>
     </div>
     
     
     

      
      <div class="input-group"style="padding-bottom:20px;">
      <span class="input-group-addon"><span class="glyphicon glyphicon-home"></span></span>
      <textarea rows="3" size="30" value="" class="form-control" placeholder="Dirección" id="direccionp" name="direccionp" disabled><?php echo $direccionPadre; ?></textarea>
      </div>
      <div class="form-group form-animate-text" style="margin-top:5px !important;margin-bottom:30px !important;">
     <i  class="glyphicon glyphicon-heart"></i><span class="label label-default" style="width: 40px; font-size: 12px">Estado civil de los padres</span>
      <select id="estadop"  class="select2 show-tick" style="width: 190px; font-size: 13px" name="estadop" disabled>
      <option value="<?php echo $estadoCivil; ?>"><?php echo $estadoCivil; ?></option>
      <!--<option value="Matrimonio Religioso">Matrimonio Religioso</option>
      <option value="Civil">Civil</option>
      <option value="Acompañados">Acompañados</option>
      <option value="Separados">Separados</option>
      <option value="Viudo/a">Viudo/a</option>-->
      </select>
      </div>
      <div class="form-group form-animate-text" style="margin-top:5px !important;margin-bottom:30px !important;">
     <i  class="glyphicon glyphicon-heart"></i><span class="label label-default" style="width: 100px; font-size: 12px">Convive con: </span>
      <select id="convivea"  class="select2 show-tick" style="width: 260px; font-size: 13px" name="convivea" disabled>
      <option value="<?php echo $convive; ?>"><?php echo $convive; ?></option>
      <!--<option value="Mamá">Mamá</option>
      <option value="Papá">Papá</option>
      <option value="Mamá y Papá">Mamá y Papá</option>
      <option value="Otro">Otro</option>-->
      </select>
      </div>
      
       </div>
    <!-- Finaliza col md 6 -->
    
    <!-- Finaliza col md 6 (derecha) -->
     <div class="col-md-6">
     <h3 class="fs-subtitle" >* DATOS  DE LA MADRE (Responsable femenino).</h3>
     <div class="input-group " style="padding-bottom:20px;">
     <input id="nombrem" type="text" class="form-control" name="nombrem" placeholder="Nombre de la madre." onkeypress="return sololetras(event)" value="<?php echo $nombreMadreR; ?>" disabled>
     <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
     </div>
     <div class="input-group " style="padding-bottom:20px;">
     <input id="lugarm" type="text" class="form-control" name="lugarm" placeholder="Lugar de Trabajo." value="<?php echo $lugarTrabajoMR; ?>" disabled>
     <span class="input-group-addon"><i class="glyphicon glyphicon-briefcase"></i></span>
     </div>
     <div class="input-group " style="padding-bottom:20px;">
     <input id="oficiom" type="text" class="form-control" name="oficiom" placeholder="Profesión u oficio." onkeypress="return sololetras(event)" value="<?php echo $profesionM; ?>" disabled>
     <span class="input-group-addon"><i class="glyphicon glyphicon-briefcase"></i></span>
     </div>
     <div class="input-group " style="padding-bottom:20px;">
     <input id="duim" type="text" class="form-control" name="duim" placeholder="DUI" value="<?php echo $duiMadre; ?>" disabled>
     <span class="input-group-addon"><i class="glyphicon glyphicon-barcode"></i></span>
     </div>
     <div class="input-group " style="padding-bottom:20px;">
     <input id="telefonocm" type="text" class="form-control" name="telefonocm" placeholder="Tel. de casa"  size="8" maxlength="8" onkeypress="return aceptNum(event)" value="<?php echo $telCasaMadre ; ?>" disabled>
     <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
     </div>
     <div class="input-group " style="padding-bottom:20px;">
     <input id="telefonotm" type="text" class="form-control" name="telefonotm" placeholder="Tel. de trabajo" size="8" maxlength="8" onkeypress="return aceptNum(event)" value="<?php echo $telTrabMadre; ?>" disabled>
     <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
     </div>
     <div class="input-group " style="padding-bottom:20px;">
     <input id="celularm" type="text" class="form-control" name="celularm" placeholder="Celular"  size="8" maxlength="8" onkeypress="return aceptNum(event)" value="<?php echo $celMadre ; ?>" disabled>
     <span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span>
     </div>
    
     
     <div class="input-group " style="padding-bottom:20px;">
     <input id="miembrosm" type="number" class="form-control" name="miembrosm" placeholder="N° de miembros con los que vive en el hogar" size="2" maxlength="2" onkeypress="return aceptNum(event)" value="<?php echo $miembrosFamilia; ?>" disabled>
     <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
     </div>
     </br>
     <div class="input-group " style="padding-bottom:25px;">
     <i  class="fa fa-asterisk"></i><span class="label label-default" style="width: 100px; font-size: 12px">Religión que profesan</span>
     <?php

          if($religion == 1){
              echo "<label class='radio-inline' style='width: 100px; font-size: 15px'><input type='radio' name='religiionm' value='1' id='religionm' checked disabled>Católica</label>";
              echo "<label class='radio-inline' style='width: 100px; font-size: 15px'><input type='radio' name='religiionm' value='0' id='religionm' disabled>Otro</label>";
            }else{
              echo "<label class='radio-inline' style='width: 100px; font-size: 15px'><input type='radio' name='religiionm' value='1' id='religionm'disabled>Católica</label>";
              echo "<label class='radio-inline' style='width: 100px; font-size: 15px'><input type='radio' name='religiionm' value='0' id='religionm' checked disabled>Otro</label>";
          }
     
     ?>
     
     </div>
     </br>
    
     </br>
 </div>
    <!-- Finaliza col md 6 -->
    </div>
    <!-- Finaliza col md 12 panel body -->
    
    
    </br>
    <input type="button" name="previous" class="previous action-button" value="Anterior" />
    <input type="button" name="siguiente" class="next action-button" onclick="form1()" value="Siguiente" />
  </fieldset>
  <fieldset>
    <h2 class="fs-title">Terminos.</h2>
    <h3 class="fs-subtitle">Es obligatorio colocar un número de telefono fijo ya sea de casa o de trabajo;si cambia su número de telefónico por favor actualizarlo.</h3>
    <!-- Inicia col md 12 panel -->
    
    <!-- Finaliza col md 12 panel body -->
    
    
    </br>
    <input type="button" name="previous" class="previous action-button" value="Anterior" />
    <input type="button" class="submit action-button" value="Cerrar" disabled/>
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