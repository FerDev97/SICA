<?php
//Codigo que muestra solo los errores exceptuando los notice.
error_reporting(E_ALL & ~E_NOTICE);
session_start();
if($_SESSION["logueado"] == TRUE && $_SESSION["tipo"]==1) {
  $nombre=$_SESSION["usuario"];
  $tipo  =$_SESSION["tipo"];
  $id  = $_REQUEST["id"];
}else {
  header("Location:inicio.php");
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
  <title>Lista Materias|SICA</title>

  <!-- start: Css -->
  <link rel="stylesheet" type="text/css" href="../asset/css/bootstrap.min.css">

  <!-- plugins -->
  <link rel="stylesheet" type="text/css" href="../asset/css/plugins/font-awesome.min.css"/>
  <link rel="stylesheet" type="text/css" href="../asset/css/plugins/datatables.bootstrap.min.css"/>
  <link rel="stylesheet" type="text/css" href="../asset/css/plugins/animate.min.css"/>
  <link rel="stylesheet" type="text/css" href="../asset/css/plugins/select2.min.css"/>
   <link rel="stylesheet" type="text/css" href="../asset/css/sweetalert2.css"/>
  <link href="../asset/css/style.css" rel="stylesheet">
  <!-- end: Css -->

  <link rel="shortcut icon" href="../asset/img/logomi.png">
  <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->
      <script> 
       //SWEET ALERTS
      function sweetConfirm(id,op){
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
    );
    document.getElementById('bandera').value='desactivar';
            document.getElementById('baccion').value=id;

            document.turismo.submit();
    
  }
})
        }
         function sweetConfirm2(id,op){
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
    );
     document.getElementById('bandera').value='activar';
            document.getElementById('baccion').value=id;
            document.turismo.submit();
    
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

       function modify(id)
        {
         
          document.location.href='editmateria.php?id='+id;
        }
      function confirmar(id,op)
        {
          if (op==1)
           {
            if (sweetConfirm(id,op)) 
            {
            
            }
          }else{
            if (sweetConfirm2(id,op)) {
           
          }else
            {
           
             }
          }


        }
        function reporte(){
          id=document.getElementById("op").value;
          window.open("reporteMateriasActivas.php?id="+id, '_blank');
        }
        function filtrar(){
          id=document.getElementById("op").value;
          $("#ide").val(id);
          document.form.submit();
        }
      
      </script>
</head>

<body id="mimin" class="dashboard">
<form id="turismo" name="turismo" action="" method="post">
<input type="hidden" name="bandera" id="bandera">
<input type="hidden" name="baccion" id="baccion">


</form>
<form id="form" name="form" action="" method="GET">
<div class="input-group " style="padding-bottom:20px;">
  <input id="ide" type="hidden" class="form-control" name="ide" placeholder="En que año estudio el grado anterior" value="<?php echo $idnota;?>">
  </div>
  </form>
      <!-- comienzo: Header -->
        <?php
        include "header.php";
        ?>
      <!-- fin: Header -->
      <div class="container-fluid mimin-wrapper">
          <!-- inicio: Menu Lateral izquierdo -->
          <?php include "menu.php";?>
          <!-- final:  Menu Lateral izquierdo -->
            <!-- inicio: Contenido -->
            <div id="content">
                <!--inicio Header del contenido-->
               <div class="panel box-shadow-none content-header">
                  <div class="panel-body">
                    <div class="col-md-12">
                        <h3 class="animated fadeInLeft">Listado de materias</h3>
                        <p class="animated fadeInDown">
                          Materias <span class="fa-angle-right fa"></span> Complejo Educativo "La Santa Familia"
                        </p>
                    </div>
                  </div>
              </div>
              <!--fin Header del contenido-->
              <div class="col-md-12 top-20 padding-0">
                <div class="col-md-12">
                  <div class="panel">
                    <div class="panel-heading col-md-12">
                    
                         
                             <h5 class="col-md-4">Filtrado por Opción: 
                                  <select id="op" name="op" class="select2-A" onchange="filtrar()">  
                                   <?php
                      include '../config/conexion.php';
                      $result = $conexion->query("select op.eid_opcion as id, gr.cgrado as grado,ba.cnombe as nombre, se.cseccion as seccion from topciones as op, tbachilleratos as ba, tsecciones as se, tgrado as gr, ttipobachillerato as ti where op.efk_bto=ba.eid_bachillerato and op.efk_grado=gr.eid_grado and op.efk_seccion=se.eid_seccion and ti.eid_tipo=ba.efk_tipo ");
                      if ($result) {
                        echo "<option value='".$fila->id."'>Seleccione</option>";
                        while ($fila = $result->fetch_object()) {
                          echo "<option value='".$fila->id."'>".$fila->grado." ° ".$fila->nombre." seccion ".$fila->seccion."</option>";
                         
                        
                           }
                      }
                       ?>
                                  </select>
                                </h5> 
                              
                                <span class="col-md-6"></span>

                                <div class="col-md-2">
                                  

                                  <a class="btn btn-outline btn-default" >
                                      <span onclick="reporte();"><i class="fa fa-print fa-lg"></i><br>Reporte </span>
                                    </a>
                                    
                                  
                               </div>
                                                                                    
                                                                                 
                    </div>
                    <div class="panel-body">
                      <hr class="col-md-12" style="visibility: hidden;">
                      <div class="responsive-table">
                      <table id="datatables-example" style="font-size:16px" class="table table-striped table-bordered" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                          <th>Codigo</th>
                          <th>Nombre</th>
                          <th>Docente</th>
                          <th>Estado</th>
                          <th>Acciones</th>                         
                        </tr>
                      </thead>
                      <tbody>
                     <?php
                      include "../config/conexion.php";
                      if(!isset($_GET['ide'])){
                        $result = $conexion->query("select m.eid_materia as id, m.cnombre as materia,m.estado as estado, p.cnombre as docente,p.capellido as apellido FROM tmaterias as m, tpersonal as p,tpersonal_materia as pm WHERE p.eid_personal=pm.efk_idpersonal and m.eid_materia=pm.efk_idmateria");
                      }if(isset($_GET['ide'])){
                        $ide=$_GET['ide'];
                        $result = $conexion->query("select m.ccodigo as codigo,. m.eid_materia as id, m.cnombre as materia,m.estado as estado,m.efk_idopcion as op,p.cnombre as docente, h.cdia as dia,h.chora as hora FROM tmaterias as m, tpersonal as p,tpersonal_materia as pm,thorarios as h WHERE p.eid_personal=pm.efk_idpersonal and m.eid_materia=pm.efk_idmateria and h.eid_horario=m.efk_idhorario and m.efk_idopcion=".$ide);
                      }

                     
                      if ($result) {
                          while ($fila = $result->fetch_object()) {
                            echo "<tr>";
                              echo "<td>
                              <div class='col-md-2' style='margin-top:1px'>
                                <button class='btn ripple-infinite btn-round btn-warning'  onclick='modify(" . $fila->id. ")';>
                               <div>
                                 <span>Editar</span>
                               </div>
                               </button>
                               </div>
                              </td>";
                             echo "<td>" . $fila->materia . "</td>";
                             echo "<td>" . $fila->docente . "   " . $fila->apellido . "</td>";
       
                               if ($fila->estado==1) {
                              echo "<td>Activo</td>";
                             
                             echo "<td style='text-align:center;'><button align='center' title='Desactivar' type='button' class='btn btn-default' onclick=confirmar(" . $fila->id . ",1);><i class='fa fa-remove'></i>
                                 </button></td>";
                           }else
                           {
                              echo "<td>Inactivo</td>";
                             
                              echo "<td style='text-align:center;'><button align='center' title='Activar' type='button' class='btn btn-default' onclick=confirmar(" . $fila->id . ",2);><i class='fa fa-check'></i>
                                </button></td>";
                          }
                           
        
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
          <!-- final: Contenido -->


   

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
<script src="../asset/js/plugins/select2.full.min.js"></script>


<!-- custom -->
<script src="../asset/js/main.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
    $('#datatables-example').DataTable();
  });

   $(".select2-A").select2({
      placeholder: "Seleccione bachillerato",
      allowClear: true
    });

</script>
<!-- end: Javascript -->
</body>
</html>
<?php

include "../config/conexion.php";

$bandera = $_REQUEST["bandera"];
$baccion = $_REQUEST["baccion"];

if ($bandera == "add") {
    $consulta  = "INSERT INTO cliente VALUES('null','" . $nombrecliente . "','" . $apellidocliente . "','" . $duicliente . "','" . $telefonocliente . "','" . $direccioncliente . "')";
    $resultado = $conexion->query($consulta);
    if ($resultado) {
        msg("Exito");
    } else {
        msg("No Exito");
    }
}
if ($bandera == "desactivar") {
  $consulta = "UPDATE tmaterias SET estado = '0' WHERE eid_materia = '".$baccion."'";
    $resultado = $conexion->query($consulta);
    if ($resultado) {
        // msg("Exito");
    } else {
        // msg("No Exito");
    }
}
if ($bandera == "activar") {
  $consulta = "UPDATE tmaterias SET estado = '1' WHERE eid_materia = '".$baccion."'";
    $resultado = $conexion->query($consulta);
    if ($resultado) {
        // msg("Exito");
    } else {
        // msg("No Exito");
    }
}

if ($bandera == "desaparecer") {
    $consulta  = "DELETE FROM tmaterias where eid_materia='" . $baccion . "'";
    $resultado = $conexion->query($consulta);
    if ($resultado) {
        msg("Exito");
    } else {
        msg("No Exito");
    }
}
if ($bandera == 'enviar') {
    echo "<script type='text/javascript'>";
    echo "document.location.href='editpersonal.php?id=" . $baccion . "';";
    echo "</script>";
    # code...
}
function msg($texto)
{
    echo "<script type='text/javascript'>";
    echo "alert('$texto');";
    echo "document.location.href='cmaterias.php';";
    echo "</script>";
}
function msgAdd($texto)
{
    echo "<script type='text/javascript'>";
    echo "sweetGuardo('$texto');";
    //echo "document.location.href='materias.php';";
    echo "</script>";
}
function msgError($texto)
{
    echo "<script type='text/javascript'>";
    echo "sweetError('$texto');";
    //echo "document.location.href='materias.php';";
    echo "</script>";
} 

  
?>