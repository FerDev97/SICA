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

  $result = $conexion->query("select eid_alumno, ccodigo ,cnie,cnombre,capellido, sexo,cdireccion,edepto,ffecha_nac, 
  cllegada, cbachillerato, canterior, cenfermedades, calergia, cdistancia, iparvularia, itrabaja, izona, irepite, ibautizo, icomunion, iconfirma,
  cnombrep, clugar_trabajop, cduip, ctelefonocp, ctelefonotp, ccelularp, cdireccionp, cestadocivilp, cconvive, cnombrem, clugar_trabajom,
  cprofesionm, cduim, ctelefonocm, ctelefonotm, ccelularm, cmiembros, creligion, anio from talumno where eid_alumno = ".$idAlumno);

  if ($result) {
    while ($fila = $result->fetch_object()) {
        $idAlumnoR        = $fila->eid_alumno;
        $codigoAR           = $fila->ccodigo;
        $nieR             = $fila->cnie;
        $nombreAR         = $fila->cnombre;
        $apellidoAR       = $fila->capellido;
        $sexoAR           = $fila->sexo;
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
  <link rel="stylesheet" type="text/css" href="../asset/css/sweetalert2.css"/>
  <!-- end: Css -->

  <link rel="shortcut icon" href="../asset/img/logomi.png">
  <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->


   <script type="text/javascript">

   function go(){
  document.msform.submit(); 
  }

      //SWEET ALERTS
  function sweetConfirm(){
                    swal({
                      title: '¿Está seguro que desea continuar?',
                      text: "¡Se actualizaran los datos!",
                      type: 'warning',
                      showCancelButton: true,
                      confirmButtonColor: '#3085d6',
                      cancelButtonColor: '#d33',
                      confirmButtonText: 'Continuar',
                      cancelButtonText:'Cancelar',
                     }).then((result) => {
                         if (result.value) {
                                go();
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
<form id="msform" name="msform" method="post" action="editDatosInscripcion.php">
<input type="hidden" id="idA" name="idA" value="<?php echo $idAlumno; ?>">
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
     <input id="codigoa" type="text" class="form-control" name="codigoa" value="<?php echo $codigoAR;?>" readonly>
     </div>
     <div class="input-group " style="padding-bottom:20px;">
    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
     <input id="nombrea" type="text" class="form-control" name="nombrea" placeholder="Nombre." onkeypress="return sololetras(event)" value="<?php echo $nombreAR;?>" >
     </div>

     <div class="input-group " style="padding-bottom:25px;">
     <i  class="fa fa-briefcase"></i><span class="label label-default" style="width: 400px; font-size: 15px">Sexo</span>
          
     <?php
          if($sexoAR == 1){
              echo "<label class='radio-inline' style='margin-right:34px;margin-left:80px; font-size: 15px'><input type='radio' name='sexo' value='0' id='sexo'>Masculino</label>";
              echo "<label class='radio-inline' style='width: 0px; font-size: 15px;margin-left:0px'><input type='radio' name='sexo' value='1' id='sexo' checked>Femenino</label>";
          }else{
            echo "<label class='radio-inline' style='margin-right:34px;margin-left:80px; font-size: 15px'><input type='radio' name='sexo' value='0' id='sexo' checked>Masculino</label>";
              echo "<label class='radio-inline' style='width: 0px; font-size: 15px;margin-left:0px'><input type='radio' name='sexo' value='1' id='sexo'>Femenino</label>";
          }
     
     ?>
     
     </div>

      <div class="form-group form-animate-text" style="margin-top:5px !important;margin-bottom:30px !important;">
     <i class="glyphicon glyphicon-map-marker"></i><span class="label label-default" style="width: 100px; font-size: 15px">Nacio en: </span>
      <select id="departamentoa" class="select2 show-tick" style="width: 264px; font-size: 15px" name="departamentoa">
      <?php
         $deptos = array('San Salvador', 'San Vicente', 'San Miguel', 'Santa Ana', 'Chalatenango',
          'Cabañas', 'Sonsonate', 'La Union', 'La Libertad', 'La Paz', 'Morzán', 'Usulutan', 'Santa Ana',
        'Ahuachapán', 'Cuscatlan');

         foreach ($deptos as $depto) {

          if($depto == $departR){
            echo "<option value=".$depto." selected >".$depto."</option>";
          }else{
           echo "<option value=".$depto.">".$depto."</option>";
          }
         }
      
      ?>
      
      
      </select>
      </div>

      <div class="input-group"style="padding-bottom:20px;">
      <span class="input-group-addon"><span class="glyphicon glyphicon-home"></span></span>
      <textarea rows="3" size="30"  class="form-control" placeholder="Dirección" id="direcciona" name="direcciona" ><?php echo $direccionAR;?></textarea>
      </div>

      <div class="form-group form-animate-text" style="margin-top:5px !important;margin-bottom:30px !important;">
     <i  class="fa fa-bus"></i><span class="label label-default" style="width: 100px; font-size: 15px">Llegada C.E.: </span>
      <select id="llegadaa"  class="select2 show-tick" style="width: 240px; font-size: 15px" name="llegadaa">
      <?php
         $medios = array('Autobus', 'A pie', 'Trans. Propio', 'Otro');

         foreach ($medios as $medio) {

          if($medio == $llegadaR){
            echo "<option value=".$medio." selected >".$medio."</option>";
          }else{
           echo "<option value=".$medio.">".$medio."</option>";
          }
         }
      
      ?>
      
      <!--<option value="">Medio de Transporte</option>
      <option value="Autobus">Autobus</option>
      <option value="A pie">A pie</option>
      <option value="Trans.Propio">Trans.Propio</option>
      <option value="Otro">Otro</option>-->
      </select>
      </div>

        <div class="form-group form-animate-text" style="margin-top:5px !important;margin-bottom:30px !important;">
     <i  class="glyphicon glyphicon-education"></i><span class="label label-default" style="width: 100px; font-size: 15px">Bachillerato: </span>
      <select id="bachilleratoa"  class="select2 show-tick" style="width: 242px; font-size: 15px" name="bachilleratoa">
  
      <?php  
      include "../config/conexion.php";
      $result = $conexion->query("SELECT tgrado.cgrado, tbachilleratos.cnombe, tsecciones.cseccion,tbachilleratos.eestado,topciones.eid_opcion FROM topciones INNER JOIN tbachilleratos ON topciones.efk_bto = tbachilleratos.eid_bachillerato INNER JOIN tgrado ON topciones.efk_grado = tgrado.eid_grado INNER JOIN tsecciones ON topciones.efk_seccion = tsecciones.eid_seccion WHERE tbachilleratos.eestado=1 order by tbachilleratos.cnombe");
      if ($result) {
          while ($fila = $result->fetch_object()){

            if($bachilleratoR == $fila->eid_opcion){
              echo "<option value=".$fila->eid_opcion." selected >".$fila->cgrado."° ".$fila->cnombe." ".$fila->cseccion."</option>";
            }else{
              //echo "<option value=".$fila->eid_opcion.">".$fila->cgrado."° ".$fila->cnombe." ".$fila->cseccion."</option>";
            }
          }
      }
      ?>
      </select>
      </div>

       <div class="input-group " style="padding-bottom:20px;">
    <span class="input-group-addon"><i class="glyphicon glyphicon-repeat"></i></span>
     <input id="anteriora" value="<?php echo $anteriorR;?>" type="text" class="form-control" name="anteriora" placeholder="En que año estudio el grado anterior">
     </div>

      <div class="input-group " style="padding-bottom:20px;">
    <span class="input-group-addon"><i class="fa fa-user-md"></i></span>
     <input id="enfermedadesa" value="<?php echo $enfermedadesR;?>" type="text" class="form-control" name="enfermedadesa" placeholder="Enfermedades que padece" onkeypress="return sololetras(event)">
     </div>

     <div class="input-group " style="padding-bottom:20px;">
    <span class="input-group-addon"><i class="fa fa-user-md"></i></span>
     <input id="alergiaa" value="<?php echo $alergiaR;?>" type="text" class="form-control" name="alergiaa" placeholder="Es alergico a">
     </div>
      
 





    </div>
    <!-- Finaliza col md 6 -->
    <!-- Finaliza col md 6 (derecha) -->
     <div class="col-md-6">
     <div class="input-group " style="padding-bottom:20px;">
     <input id="niea" value="<?php echo $nieR;?>" type="text" class="form-control" name="niea" placeholder="NIE.">
     <span class="input-group-addon"><i class="glyphicon glyphicon-barcode"></i></span>
     </div>
     <div class="input-group " style="padding-bottom:25px;">
     <input id="apellidoa" value="<?php echo $apellidoAR;?>" type="text" class="form-control" name="apellidoa" placeholder="Apellido." onkeypress="return sololetras(event)" >
     <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
     </div>

     <div class="input-group " style="padding-bottom:30px;">
     <input id="fecha" value="<?php echo $fechaNacR;?>" type="date" class="form-control" name="fecha" >
     <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
     </div>
     
     <div class="input-group " style="padding-bottom:20px;">
     <input id="distanciaa" value="<?php echo $distanciaR;?>" type="number" class="form-control" name="distanciaa" placeholder="Distancia en metros desde casa hasta el C.E.">
     <span class="input-group-addon"><i class="glyphicon glyphicon-road"></i></span>
     </div>
     </br>
     <div class="input-group " style="padding-bottom:25px;">
     <i  class="fa fa-apple"></i><span class="label label-default" style="width: 100px; font-size: 15px">Estudio Parvularia</span>
     <?php
          if($parvulariaR == 1){
              echo "<label class='radio-inline' style='width: 100px; font-size: 15px'><input type='radio' name='parvularia' value='1' id='parvularia' checked>Si</label>";
              echo "<label class='radio-inline' style='width: 100px; font-size: 15px'><input type='radio' name='parvularia' value='0' id='parvularia'>No</label>";
          }else{
            echo "<label class='radio-inline' style='width: 100px; font-size: 15px'><input type='radio' name='parvularia' value='1' id='parvularia'>Si</label>";
            echo "<label class='radio-inline' style='width: 100px; font-size: 15px'><input type='radio' name='parvularia' value='0' id='parvularia' checked>No</label>";
          }
     
     ?>
     </div>
     </br>
     <div class="input-group " style="padding-bottom:25px;">
     <i  class="fa fa-briefcase"></i><span class="label label-default" style="width: 400px; font-size: 15px">Trabaja</span>
     <?php
          if($trabajaR == 1){
              echo "<label class='radio-inline' style='margin-right:74px;margin-left:110px; font-size: 15px'><input type='radio' name='trabajaa' value='1' id='trabaja' checked >Si</label>";
              echo "<label class='radio-inline' style='width: 0px; font-size: 15px;margin-left:0px'><input type='radio' name='trabajaa' value='0' id='trabaja'>No</label>";
          }else{
            echo "<label class='radio-inline' style='margin-right:74px;margin-left:110px; font-size: 15px'><input type='radio' name='trabajaa' value='1' id='trabaja' >Si</label>";
              echo "<label class='radio-inline' style='width: 0px; font-size: 15px;margin-left:0px'><input type='radio' name='trabajaa' value='0' id='trabaja' checked >No</label>";
          }
     
     ?>

     </div>
     </br>
     <div class="input-group " style="padding-bottom:25px;">
     <i  class="glyphicon glyphicon-tree-deciduous"></i><span class="label label-default" style="width: 20px; font-size: 15px">Zona donde vive</span>
     <?php
          if($zonaR == 1){
              echo "<label class='radio-inline' style='margin-right:55px;margin-left:42px; font-size: 15px'><input type='radio' name='zonaa' value='1' id='zonaa' checked >Rural</label>";
              echo "<label class='radio-inline' style='width: 0px; font-size: 15px;margin-left:0px'><input type='radio' name='zonaa' value='0' id='zonaa'>Urbana</label>";
          }else{
            echo "<label class='radio-inline' style='margin-right:55px;margin-left:42px; font-size: 15px'><input type='radio' name='zonaa' value='1' id='zonaa'>Rural</label>";
            echo "<label class='radio-inline' style='width: 0px; font-size: 15px;margin-left:0px'><input type='radio' name='zonaa' value='0' id='zonaa' checked >Urbana</label>";
          }
     
     ?>

     </div>
     </br>
     <div class="input-group " style="padding-bottom:25px;">
     <i  class="fa fa-repeat"></i><span class="label label-default" style="width: 20px; font-size: 15px">Repite Grado</span>
     <?php
          if($repite == 1){
              echo "<label class='radio-inline' style='margin-right:78px;margin-left:68px; font-size: 15px'><input type='radio' name='repitea' value='1' id='repitea' checked >Si</label>";
              echo "<label class='radio-inline' style='width: 0px; font-size: 15px;margin-left:0px'><input type='radio' name='repitea' value='0' id='repitea'>No</label>";
          }else{
            echo "<label class='radio-inline' style='margin-right:78px;margin-left:68px; font-size: 15px'><input type='radio' name='repitea' value='1' id='repitea'>Si</label>";
              echo "<label class='radio-inline' style='width: 0px; font-size: 15px;margin-left:0px'><input type='radio' name='repitea' value='0' id='repitea' checked >No</label>";
          }
     
     ?>
     
     </div>
     </br>
     <div>
     <i  class="glyphicon glyphicon-asterisk"></i><span class="label label-default" style="width: 20px; font-size: 15px">Sacramentos</span>
     <?php

          if($bautizoR == 1){
            echo "<label class='checkbox-inline' style='margin-right:20px;margin-left:10px;font-size: 15px'><input type='checkbox' value='1' name='bautismo' id='bautismo' checked >Bautismo</label>";
          }else{
            echo "<label class='checkbox-inline' style='margin-right:20px;margin-left:10px;font-size: 15px'><input type='checkbox' value='1' name='bautismo' id='bautismo' >Bautismo</label>";
          }

          if($comunionR == 1){
              echo "<label  class='checkbox-inline' style='font-size: 15px'><input name='confirma' type='checkbox' value='1' checked='checked' />Confirmacion</label>";
          }else{
            echo "<label class='checkbox-inline' style='font-size: 15px'><input name='confirma' type='checkbox' value='1' />Confirmacion</label>";
          }

          if($confirmaR == 1){
            echo "<label class='checkbox-inline' style='margin-right:20px;margin-left:67px;font-size: 15px'><input name='comunion'  type='checkbox' value='1' checked='checked' />Primera Comunión</label>";
          }else{
            echo "<label class='checkbox-inline' style='margin-right:20px;margin-left:67px;font-size: 15px'><input name='comunion'  type='checkbox' value='1' /> Primera Comunión</label>";
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
     <input id="nombrep" type="text" class="form-control" name="nombrep" placeholder="Nombre del padre." onkeypress="return sololetras(event)" value="<?php echo $nombrePadreR; ?>">
     </div>
     <div class="input-group " style="padding-bottom:20px;">
    <span class="input-group-addon"><i class="glyphicon glyphicon-briefcase"></i></span>
     <input id="lugarp" type="text" class="form-control" name="lugarp" placeholder="Lugar de Trabajo." value="<?php echo $lugarTrabajoPR; ?>" >
     </div>
    <div class="input-group " style="padding-bottom:20px;">
    <span class="input-group-addon"><i class="glyphicon glyphicon-barcode"></i></span>
     <input id="duip" type="text" class="form-control" name="duip" placeholder="DUI." value="<?php echo $duiPadreR; ?>" >
     </div>
     <div class="input-group " style="padding-bottom:20px;">
    <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
     <input id="telefonocp" type="text" class="form-control" name="telefonocp" placeholder="Tel. de casa"  size="8" maxlength="8" onkeypress="return aceptNum(event)" value="<?php echo $telCasaPadre; ?>" >
     </div>
     <div class="input-group " style="padding-bottom:20px;">
    <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
     <input id="telefonotp" type="text" class="form-control" name="telefonotp" placeholder="Tel. de trabajo"  size="8" maxlength="8" onkeypress="return aceptNum(event)" value="<?php echo $telTrabPadre; ?>">
     </div>
     <div class="input-group " style="padding-bottom:20px;">
    <span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span>
     <input id="celularp" type="text" class="form-control" name="celularp" placeholder="Celular"  size="8" maxlength="8" onkeypress="return aceptNum(event)" value="<?php echo $celPadre; ?>" >
     </div>
     
     
     

      
      <div class="input-group"style="padding-bottom:20px;">
      <span class="input-group-addon"><span class="glyphicon glyphicon-home"></span></span>
      <textarea rows="3" size="30" value="" class="form-control" placeholder="Dirección" id="direccionp" name="direccionp" ><?php echo $direccionPadre; ?></textarea>
      </div>

      <div class="form-group form-animate-text" style="margin-top:5px !important;margin-bottom:30px !important;">
     <i  class="glyphicon glyphicon-heart"></i><span class="label label-default" style="width: 40px; font-size: 12px">Estado civil de los padres</span>
      <select id="estadop"  class="select2 show-tick" style="width: 190px; font-size: 13px" name="estadop">
      <?php
         $estados = array('Matrimonio Religioso', 'Acompañados', 'Separados', 'Viudo/a');

         foreach ($estados as $estado) {

          if($estado == $estadoCivil){
            echo "<option value=".$estado." selected >".$estado."</option>";
          }else{
           echo "<option value=".$estado.">".$estado."</option>";
          }
         }
      
      ?>
      
      <!--<option value="Matrimonio Religioso">Matrimonio Religioso</option>
      <option value="Civil">Civil</option>
      <option value="Acompañados">Acompañados</option>
      <option value="Separados">Separados</option>
      <option value="Viudo/a">Viudo/a</option>-->
      </select>
      </div>

      <div class="form-group form-animate-text" style="margin-top:5px !important;margin-bottom:30px !important;">
     <i  class="glyphicon glyphicon-heart"></i><span class="label label-default" style="width: 100px; font-size: 12px">Convive con: </span>
      <select id="convivea"  class="select2 show-tick" style="width: 260px; font-size: 13px" name="convivea">
      <?php
         $conviveDatos = array('Mamá', 'Papá', 'Mamá y Papá', 'Otro');

         foreach ($conviveDatos as $con) {

          if($con == $convive){
            echo "<option value=".$con." selected >".$con."</option>";
          }else{
           echo "<option value=".$con.">".$con."</option>";
          }
         }
      
      ?>
      
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
     <input id="nombrem" type="text" class="form-control" name="nombrem" placeholder="Nombre de la madre." onkeypress="return sololetras(event)" value="<?php echo $nombreMadreR; ?>" >
     <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
     </div>
     <div class="input-group " style="padding-bottom:20px;">
     <input id="lugarm" type="text" class="form-control" name="lugarm" placeholder="Lugar de Trabajo." value="<?php echo $lugarTrabajoMR; ?>" >
     <span class="input-group-addon"><i class="glyphicon glyphicon-briefcase"></i></span>
     </div>
     <div class="input-group " style="padding-bottom:20px;">
     <input id="oficiom" type="text" class="form-control" name="oficiom" placeholder="Profesión u oficio." onkeypress="return sololetras(event)" value="<?php echo $profesionM; ?>" >
     <span class="input-group-addon"><i class="glyphicon glyphicon-briefcase"></i></span>
     </div>
     <div class="input-group " style="padding-bottom:20px;">
     <input id="duim" type="text" class="form-control" name="duim" placeholder="DUI" value="<?php echo $duiMadre; ?>" >
     <span class="input-group-addon"><i class="glyphicon glyphicon-barcode"></i></span>
     </div>
     <div class="input-group " style="padding-bottom:20px;">
     <input id="telefonocm" type="text" class="form-control" name="telefonocm" placeholder="Tel. de casa"  size="8" maxlength="8" onkeypress="return aceptNum(event)" value="<?php echo $telCasaMadre ; ?>" >
     <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
     </div>
     <div class="input-group " style="padding-bottom:20px;">
     <input id="telefonotm" type="text" class="form-control" name="telefonotm" placeholder="Tel. de trabajo" size="8" maxlength="8" onkeypress="return aceptNum(event)" value="<?php echo $telTrabMadre; ?>" >
     <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
     </div>
     <div class="input-group " style="padding-bottom:20px;">
     <input id="celularm" type="text" class="form-control" name="celularm" placeholder="Celular"  size="8" maxlength="8" onkeypress="return aceptNum(event)" value="<?php echo $celMadre ; ?>" >
     <span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span>
     </div>
    
     
     <div class="input-group " style="padding-bottom:20px;">
     <input id="miembrosm" type="number" class="form-control" name="miembrosm" placeholder="N° de miembros con los que vive en el hogar" size="2" maxlength="2" onkeypress="return aceptNum(event)" value="<?php echo $miembrosFamilia; ?>" >
     <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
     </div>
     </br>
     <div class="input-group " style="padding-bottom:25px;">
     <i  class="fa fa-asterisk"></i><span class="label label-default" style="width: 100px; font-size: 12px">Religión que profesan</span>
     <?php

          if($religion == 1){
              echo "<label class='radio-inline' style='width: 100px; font-size: 15px'><input type='radio' name='religiionm' value='1' id='religionm' checked >Católica</label>";
              echo "<label class='radio-inline' style='width: 100px; font-size: 15px'><input type='radio' name='religiionm' value='0' id='religionm'>Otro</label>";
            }else{
              echo "<label class='radio-inline' style='width: 100px; font-size: 15px'><input type='radio' name='religiionm' value='1' id='religionm'>Católica</label>";
              echo "<label class='radio-inline' style='width: 100px; font-size: 15px'><input type='radio' name='religiionm' value='0' id='religionm' checked >Otro</label>";
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
    <input id="editar" type="button"  class=" submit action-button" value="Editar"  />
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
<script src="../asset/js/sweetalert2.js"></script>
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
<script src="../asset/js/wizard2.js"></script>



<!-- custom -->
<script src="../asset/js/main.js"></script>
<script type="text/javascript">
  $(document).ready(function(){

    $("#editar").on('click' function(){
          

     });








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

     




  });//fin del ready


    
        

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