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

?>
<?php
include "../config/conexion.php";
$result = $conexion->query("select * from tanio where iestado=1 ");
if($result)
{
  while ($fila=$result->fetch_object()) {
    $anioActivo=$fila->eid_anio;
    $anio=$fila->canio;
  
  }
}
$result = $conexion->query("SELECT
talumno.eid_alumno
FROM
talumno ORDER BY eid_alumno asc");
if($result)
{
  while ($fila=$result->fetch_object()) {
    $ida=$fila->eid_alumno;
  
  }
}

 ?>
 <?php
include '../config/conexion.php';
//Query para generar codigo.

                 $resultc = $conexion->query("select eid_alumno as id from talumno order by eid_alumno ASC");
                     if ($resultc) {

                       while ($filac = $resultc->fetch_object()) {
                         $temp=$filac->id;
                        
                          }
                     }   
                     $codigo=sprintf("%04s",$temp+1);           
?>
<!DOCTYPE html>

<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Realizar Inscripción | SICA</title>

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
return 1;
      }
      function sweetGuardo(str){
          swal(
  ''+str,
  'Inscripcion SICA',
  'success'
)
        }
        function sweetError(str){
         swal({
  type: 'error',
  title: ''+str,
  text: 'inscripcion SICA',
  footer: 'Revise que todos los campos esten completados.'
})
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
       var cont = "<?php echo $anio;?>"; 
   
      if(document.getElementById("nombrea").value==""){
        sweetError("Cuidado.! El Nombre es obligatorio");
        return 0;
      }if(document.getElementById("apellidoa").value==""){
        sweetError("Cuidado.! El Apellido es obligatorio");
        return 0;
      }if(document.getElementById("sexo").checked==false && document.getElementById("sex").checked==false){
        sweetError("Cuidado.! Seleccione Sexo del Alumno");
        return 0;
      }if(document.getElementById("departamentoa").value=="Seleccione Departamento"){
        sweetError("Cuidado.! El Departamento es obligatorio");
        return 0;
      }if(document.getElementById("fecha").value==""){
        sweetError("Cuidado.! La fecha de nacimiento es obligatoria");
        return 0;
      }if(document.getElementById("direcciona").value==""){
        sweetError("Cuidado.! La direccion es obligatoria");
        return 0;
      }if(document.getElementById("llegadaa").value=="Medio de Transporte"){
        sweetError("Cuidado.! El medio de transporte es obligatorio");
        return 0;
      }if(document.getElementById("bachilleratoa").value=="Seleccione Opcion"){
        sweetError("Cuidado.! La opción de Bachillerato es Obligatoria");
        return 0;
      }if(document.getElementById("anteriora").value==""){
        sweetError("Cuidado.! El campo año anterior es obligatorio");
        return 0;
      }if(document.getElementById("anteriora").value>=cont || document.getElementById("anteriora").value<2000){
        sweetError("Cuidado.! ¿ Estas seguro del año anterior cursado?");
        return 0;
      }if(document.getElementById("distanciaa").value==""){
        sweetError("Cuidado.! La distancias es obligatoria");
        return 0;
      }if(document.getElementById("parvularia").checked==false && document.getElementById("parvulari").checked==false){
        sweetError("Cuidado.! ¿El alumno estudio parvularia?");
        return 0;
      }if(document.getElementById("trabajaa").checked==false && document.getElementById("trabaja").checked==false){
        sweetError("Cuidado.! ¿El alumno trabaja?");
        return 0;
      }if(document.getElementById("zonaa").checked==false && document.getElementById("zona").checked==false){
        sweetError("Cuidado.! ¿En que zona vive el alumno?");
        return 0;
      }if(document.getElementById("repitea").checked==false && document.getElementById("repite").checked==false){
        sweetError("Cuidado.! ¿Repite año? es obligatorio?");
        return 0;
      }else{
         //alert("nO ESTA VACIO");
         return 1;
      }
      if(document.getElementById("nombrep").checked==""){
        sweetError("Cuidado.! Nombre del padre es obligatorio");
        return 0;
      }else{
         //alert("nO ESTA VACIO");
         return 1;
      }
    }
    function verificarCamposObligatoriosResponsables(){
       
      if(document.getElementById("nombrep").value=="" && document.getElementById("nombrem").value==""){
        sweetError("Cuidado.! Es obligatorio el registro de almenos un encargado");
        return 0;
      }if(document.getElementById("duip").value=="" && document.getElementById("duim").value==""){
        sweetError("Cuidado.! Es necesario el registro del DUI de almenos un encargado");
        return 0;
      }
     if(document.getElementById("direccionp").value==""){
        sweetError("Cuidado.! La direccion es obligatoria");
        return 0;
      }if(document.getElementById("estadop").value=="Seleccione"){
        sweetError("Cuidado.! El estado civil de los padres es obligatorio");
        return 0;
      }if(document.getElementById("convivea").value=="Seleccione"){
        sweetError("Cuidado.! Campo de convive con.. es obligatorio");
        return 0;
      }if(document.getElementById("telefonocp").value=="" && document.getElementById("telefonotp").value=="" && document.getElementById("celularp").value=="" && document.getElementById("telefonocm").value=="" && document.getElementById("telefonotm").value=="" && document.getElementById("celularm").value==""){
        sweetError("Cuidado.! Para la inscripcion es necesario un numero de telefono");
        return 0;
      }if(document.getElementById("religionm").checked==false && document.getElementById("religion").checked==false){
        sweetError("Cuidado.! ¿La religion que profesa? es obligatorio?");
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

                         <h3 class="animated fadeInLeft">Realizar Inscripcion</h3>
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
  <input type="hidden" name="anio" value="<?php echo $anioActivo;?>"/>
  <input type="hidden" name="ida" value="<?php echo $ida+1;?>"/>
  <!-- fieldsets -->
  <fieldset>
    <h2 class="fs-title">Datos personales.</h2>
    <h3 class="fs-subtitle">Informacion personal del alumno.<br>Inscripcion SICA.</h3>
    <!-- Inicia col md 12 panel -->
    <div class="col-md-12 panel-body" style="padding-bottom:30px;">
      <!-- Inicia el col md 6 izquierda -->
    <div class="col-md-6">
    <div class="input-group " style="padding-bottom:20px;">
    <span class="input-group-addon"><i class="glyphicon glyphicon-barcode"></i></span>
     <input id="codigoa" type="text" class="form-control" name="codigoa" placeholder="Codigo." value="<?php echo $codigo; ?>" readonly>
     </div>
     <div class="input-group " style="padding-bottom:20px;">
    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
     <input id="nombrea" type="text" class="form-control" name="nombrea" placeholder="Nombre*" onkeypress="return sololetras(event)" required>
     </div>
     <div class="input-group " style="padding-bottom:25px;">
     <i  class="fa fa-briefcase"></i><span class="label label-default" style="width: 400px; font-size: 15px">Sexo</span>
     <label class="radio-inline" style="margin-right:34px;margin-left:80px; font-size: 15px"><input type="radio" name="sexo" value="0" id="sexo">Masculino</label>
     <label class="radio-inline" style="width: 0px; font-size: 15px;margin-left:0px"><input type="radio" name="sexo" value="1" id="sex">Femenino</label>
     </div>

      <div class="form-group form-animate-text" style="margin-top:5px !important;margin-bottom:30px !important;">
     <i class="glyphicon glyphicon-map-marker"></i><span class="label label-default" style="width: 100px; font-size: 15px">Nacio en: </span>
      <select id="departamentoa" class="select2 show-tick" style="width: 264px; font-size: 15px" name="departamentoa">
      <option value="Seleccione Departamento" selected hidden>Seleccione Departamento</option>
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
      <option value="Cuscatlan">Cuscatlán</option>
      </select>
      </div>
      <div class="input-group"style="padding-bottom:20px;">
      <span class="input-group-addon"><span class="glyphicon glyphicon-home"></span></span>
      <textarea rows="3" size="30" value="" class="form-control" placeholder="Dirección" id="direcciona" name="direcciona"></textarea>
      </div>
      <div class="form-group form-animate-text" style="margin-top:5px !important;margin-bottom:30px !important;">
     <i  class="fa fa-bus"></i><span class="label label-default" style="width: 100px; font-size: 15px">Llegada C.E.: </span>
      <select id="llegadaa"  class="select2 show-tick" style="width: 240px; font-size: 15px" name="llegadaa">
      <option value="Medio de Transporte" selected hidden>Medio de Transporte</option>
      <option value="Autobus">Autobus</option>
      <option value="A pie">A pie</option>
      <option value="Trans.Propio">Trans.Propio</option>
      <option value="Otro">Otro</option>
      </select>
      </div>
      <div class="form-group form-animate-text" style="margin-top:5px !important;margin-bottom:30px !important;">
     <i  class="glyphicon glyphicon-education"></i><span class="label label-default" style="width: 100px; font-size: 15px">Bachillerato: </span>
      <select id="bachilleratoa"  class="select2 show-tick" style="width: 242px; font-size: 15px" name="bachilleratoa">
      <option value="Seleccione Opcion" selected hidden>Seleccione Opcion</option>
      <?php  
      include "../config/conexion.php";
      $result = $conexion->query("SELECT topciones.eid_opcion,tgrado.cgrado,tbachilleratos.cnombe,tsecciones.cseccion,topciones.efk_seccion,topciones.eestado FROM topciones INNER JOIN tgrado ON topciones.efk_grado = tgrado.eid_grado INNER JOIN tbachilleratos ON topciones.efk_bto = tbachilleratos.eid_bachillerato INNER JOIN tsecciones ON topciones.efk_seccion = tsecciones.eid_seccion WHERE topciones.eestado=1 order by tbachilleratos.cnombe");
      if ($result) {
          while ($fila = $result->fetch_object()) {
           echo "<option value=".$fila->eid_opcion.">".$fila->cgrado."° ".$fila->cnombe." ".$fila->cseccion."</option>";
         }
      }
      ?>
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
     <div class="input-group " style="padding-bottom:25px;">
     <i  class="fa fa-briefcase"></i><span class="label label-default" style="width: 400px; font-size: 15px">Trabaja</span>
     <label class="radio-inline" style="margin-right:74px;margin-left:110px; font-size: 15px"><input type="radio" name="trabajaa" value="1" id="trabajaa">Si</label>
     <label class="radio-inline" style="width: 0px; font-size: 15px;margin-left:0px"><input type="radio" name="trabajaa" value="0" id="trabaja">No</label>
     </div>
    
    
      
 





    </div>
    <!-- Finaliza col md 6 -->
    <!-- Finaliza col md 6 (derecha) -->
     <div class="col-md-6">
     <div class="input-group " style="padding-bottom:20px;">
     <input id="niea" type="text" class="form-control" data-mask="0000000" name="niea" placeholder="NIE.">
     <span class="input-group-addon"><i class="glyphicon glyphicon-barcode"></i></span>
     </div>
     <div class="input-group " style="padding-bottom:25px;">
     <input id="apellidoa" type="text" class="form-control" name="apellidoa" placeholder="Apellido." onkeypress="return sololetras(event)">
     <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
     </div>

     <div class="input-group " style="padding-bottom:30px;">
     <i class="glyphicon glyphicon-map-marker"></i><span class="label label-default" style="width: 100px; font-size: 15px">Fecha de nacimiento: </span>
     <input id="fecha" type="date" class="form-control" name="fecha" min="1950-01-01" max="2005-12-31">
     <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
     </div>
     <br><br>
     <div class="input-group " style="padding-bottom:20px;">
     <input id="distanciaa" type="number" class="form-control" name="distanciaa" placeholder="Distancia en metros desde casa hasta el C.E." min="1" max="100000">
     <span class="input-group-addon"><i class="glyphicon glyphicon-road"></i></span>
     </div>
     </br>
     </br>
     </br>
     <div class="input-group " style="padding-bottom:25px;">
     <i  class="glyphicon glyphicon-tree-deciduous"></i><span class="label label-default" style="width: 20px; font-size: 15px">Zona donde vive</span>
     <label class="radio-inline" style="margin-right:55px;margin-left:42px; font-size: 15px"><input type="radio" name="zonaa" value="1" id="zonaa">Rural</label>
     <label class="radio-inline" style="width: 0px; font-size: 15px;margin-left:0px"><input type="radio" name="zonaa" value="0" id="zona">Urbana</label>
     </div>
     </br>
     <div class="input-group " style="padding-bottom:25px;">
     <i  class="fa fa-apple"></i><span class="label label-default" style="width: 100px; font-size: 15px">Estudio Parvularia</span>
     <label class="radio-inline" style="width: 100px; font-size: 15px"><input type="radio" name="parvularia" value="1" id="parvularia">Si</label>
     <label class="radio-inline" style="width: 100px; font-size: 15px"><input type="radio" name="parvularia" value="0" id="parvulari">No</label>
     </div>
     </br>
     <div class="input-group " style="padding-bottom:25px;">
     <i  class="fa fa-repeat"></i><span class="label label-default" style="width: 20px; font-size: 15px">Repite Grado</span>
     <label class="radio-inline" style="margin-right:78px;margin-left:68px; font-size: 15px"><input type="radio" name="repitea" value="1" id="repitea">Si</label>
     <label class="radio-inline" style="width: 0px; font-size: 15px;margin-left:0px"><input type="radio" name="repitea" value="0" id="repite">No</label>
     </div>
     
    <div class="input-group " style="padding-bottom:20px;">
    <span class="input-group-addon"><i class="fa fa-user-md"></i></span>
     <input id="alergiaa" type="text" class="form-control" name="alergiaa" placeholder="Es alergico a">
     </div>
    
     <div>
     <i  class="glyphicon glyphicon-asterisk"></i><span class="label label-default" style="width: 20px; font-size: 15px">Sacramentos</span>
     <label class="checkbox-inline"style="margin-right:20px;margin-left:10px;font-size: 15px"><input type="checkbox" value="1" name="bautismo">Bautismo</label>
     <label class="checkbox-inline"style="font-size: 15px"><input type="checkbox" value="1" name="confirmacion">Confirmacion</label>
     <label class="checkbox-inline"style="margin-right:20px;margin-left:67px;font-size: 15px"><input type="checkbox" value="1" name="comunion">Primera Comunión</label>
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
    <span class="input-group-addon"><i class="glyphicon glyphicon-barcode"></i></span>
     <input id="duip" type="text" data-mask="00000000-0"  class="form-control" name="duip" placeholder="DUI.">
     </div>
    <div class="input-group " style="padding-bottom:20px;">
    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
     <input id="nombrep" type="text" class="form-control" name="nombrep" placeholder="Nombre del padre." onkeypress="return sololetras(event)">
     </div>
     <div class="input-group"style="padding-bottom:20px;">
      <span class="input-group-addon"><span class="glyphicon glyphicon-home"></span></span>
      <textarea rows="1" size="10" value="" class="form-control" placeholder="Dirección" id="direccionp" name="direccionp"></textarea>
      </div>
    
     <div class="input-group " style="padding-bottom:20px;">
    <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
     <input id="telefonocp" type="text" data-mask="000000000000"  class="form-control" name="telefonocp" placeholder="Tel. de casa"  size="8" maxlength="8" onkeypress="return aceptNum(event)">
     </div>
     <div class="input-group " style="padding-bottom:20px;">
    <span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span>
     <input id="celularp" type="text" class="form-control" data-mask="00000000"  name="celularp" placeholder="Celular"  size="8" maxlength="8" onkeypress="return aceptNum(event)">
     </div>
     <div class="input-group " style="padding-bottom:20px;">
    <span class="input-group-addon"><i class="glyphicon glyphicon-briefcase"></i></span>
     <input id="lugarp" type="text" class="form-control" name="lugarp" placeholder="Lugar de Trabajo." >
     </div>

     <div class="input-group " style="padding-bottom:20px;">
    <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
     <input id="telefonotp" type="text" data-mask="20000000"  class="form-control" name="telefonotp" placeholder="Tel. de trabajo"  size="8" maxlength="8" onkeypress="return aceptNum(event)">
     </div>
    
     
     
     

      
     
      <div class="form-group form-animate-text" style="margin-top:5px !important;margin-bottom:30px !important;">
     <i  class="glyphicon glyphicon-heart"></i><span class="label label-default" style="width: 40px; font-size: 12px">Estado civil de los padres</span>
      <select id="estadop"  class="select2 show-tick" style="width: 190px; font-size: 13px" name="estadop">
      <option value="Seleccione" selected hidden>Seleccione</option>
      <option value="Matrimonio Religioso">Matrimonio Religioso</option>
      <option value="Civil">Civil</option>
      <option value="Acompañados">Acompañados</option>
      <option value="Separados">Separados</option>
      <option value="Viudo/a">Viudo/a</option>
      </select>
      </div>
      <div class="form-group form-animate-text" style="margin-top:5px !important;margin-bottom:30px !important;">
     <i  class="glyphicon glyphicon-heart"></i><span class="label label-default" style="width: 100px; font-size: 12px">Convive con: </span>
      <select id="convivea"  class="select2 show-tick" style="width: 260px; font-size: 13px" name="convivea">
      <option value="Seleccione" selected hidden>Seleccione</option>
      <option value="Mamá">Mamá</option>
      <option value="Papá">Papá</option>
      <option value="Mamá y Papá">Mamá y Papá</option>
      <option value="Otro">Otro</option>
      </select>
      </div>
      
       </div>
    <!-- Finaliza col md 6 -->
    
    <!-- Finaliza col md 6 (derecha) -->
     <div class="col-md-6">
     <h3 class="fs-subtitle" >* DATOS  DE LA MADRE (Responsable femenino).</h3>
     <div class="input-group " style="padding-bottom:20px;">
     <input id="duim" type="text" data-mask="00000000-0"  class="form-control" name="duim" placeholder="DUI">
     <span class="input-group-addon"><i class="glyphicon glyphicon-barcode"></i></span>
     </div>
     <div class="input-group " style="padding-bottom:20px;">
     <input id="nombrem" type="text" class="form-control" name="nombrem" placeholder="Nombre de la madre." onkeypress="return sololetras(event)">
     <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
     </div>
     <div class="input-group " style="padding-bottom:20px;">
     <input id="telefonocm" type="text" class="form-control" name="telefonocm" placeholder="Tel. de casa"  size="8" maxlength="8" onkeypress="return aceptNum(event)">
     <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
     </div>
     <div class="input-group " style="padding-bottom:20px;">
     <input id="celularm" type="text" class="form-control" name="celularm" placeholder="Celular"  size="8" maxlength="8" onkeypress="return aceptNum(event)">
     <span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span>
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
     <input id="telefonotm" type="text" class="form-control" name="telefonotm" placeholder="Tel. de trabajo" size="8" maxlength="8" onkeypress="return aceptNum(event)">
     <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
     </div>
    
    
     
     <div class="input-group " style="padding-bottom:20px;">
     <input id="miembrosm" type="number" class="form-control" name="miembrosm" placeholder="N° de miembros con los que vive en el hogar" size="2" maxlength="2" onkeypress="return aceptNum(event)" min="1" max="30">
     <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
     </div>
     </br>
     <div class="input-group " style="padding-bottom:25px;">
     <i  class="fa fa-asterisk"></i><span class="label label-default" style="width: 100px; font-size: 12px">Religión que profesan</span>
     <label class="radio-inline" style="width: 100px; font-size: 15px"><input type="radio" name="religiionm" value="1" id="religionm">Católica</label>
     <label class="radio-inline" style="width: 100px; font-size: 15px"><input type="radio" name="religiionm" value="0" id="religion">Otro</label>
     </div>
     </br>
    
     </br>
 </div>
    <!-- Finaliza col md 6 -->
    </div>
    <!-- Finaliza col md 12 panel body -->
    
    
    </br>
    <input type="button" name="previous" class="previous action-button" value="Anterior" />
    <input type="button" name="siguiente" class="nextr action-button" onclick="form1()" value="Siguiente" />
  </fieldset>
  <fieldset>
    <h2 class="fs-title">Terminos.</h2>
    <h3 class="fs-subtitle">Recordarle que al realizar la inscripción usted está aceptando todos los compromisos y lineamientos establecidos por la institucion, el incumplimiento de estos dará lugar a recomendar al final de año el cambio de ambiente escolar, evitando así posibles demandas.</h3>
    <!-- Inicia col md 12 panel -->
    
    <!-- Finaliza col md 12 panel body -->
    
    
    </br>
    <input type="button" name="previous" class="previous action-button" value="Anterior" />
    <input type="button" class="submit action-button" value="Guardar" />
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

$guardo  = $_REQUEST["guardo"];
if($guardo==1){
msg("Los datos fueron almacenados con exito");
}else if($guardo==2){
  msg("EL NIE ya existe");
}

function msg($texto)
{
    echo "<script type='text/javascript'>";
    echo "sweetGuardo('$texto');";
   // echo "document.location.href='listaempleado.php';";
    echo "</script>";
}
  
?>