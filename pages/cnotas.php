
<?php
//Codigo que muestra solo los errores exceptuando los notice.
error_reporting(E_ALL & ~E_NOTICE);
session_start();

include "../config/conexion.php" ; 

//datos para llenar los componentes del header de la tabla
$idPersonalDocente;
$idPersonalAdmin;
$nombre2;
$apellido2;
$nombreCompleto;
$idBach=array();
$nombreBach=array();
$idSeccion=array();
$seccion=array();
$idGrado=array();
$grado=array();

$datosBach=array();
$datosSeccion=array();
$datosGrado=array();
$idanioActivo;
$anioActivo;
$idP="0";

if($_SESSION["logueado"] == TRUE) {
  $nombre=$_SESSION["usuario"];
  $tipo  =$_SESSION["tipo"];
  $id  = $_SESSION["id"];

        $response = $conexion->query("SELECT * FROM tanio WHERE iestado=1");
        $vector=$response->fetch_row();

        $idanioActivo = $vector[0]; //id del año activo
        $anioActivo = $vector[1]; // año
        
        if($tipo == 0){ // si es un usuario tipo docente hara las siguientes consultas

              $consulta1="SELECT
              tusuarios.eid_usuario,
              tusuarios.cusuario,
              tpersonal.eid_personal,
              tpersonal.cnombre,
              tpersonal.capellido
              FROM
              tusuarios
              INNER JOIN tpersonal ON tusuarios.efk_personal = tpersonal.eid_personal
              WHERE
              tusuarios.eid_usuario = $id ";
              $resultado = $conexion->query($consulta1);
              
              $aux=$resultado->fetch_row();

              $idP=$idPersonalDocente=$aux[2];//se recupera eid_personal asociado al usuario logueado
              $nombre2=$aux[3];
              $apellido2=$aux[4];
              $idP=$idPersonalDocente;
              $nombreCompleto="$nombre2 $apellido2";
              
              //Obteniendo los datos para los combobox del header de la tabla

              $consulta2="SELECT
              tbachilleratos.cnombe as nombreBach,
              tbachilleratos.eid_bachillerato as idBach,
              tsecciones.cseccion as seccion,
              tgrado.cgrado as grado,
              tgrado.eid_grado as idGrado,
              tsecciones.eid_seccion as idSeccion,
              tmaterias.eid_materia as idMateria,
              tmaterias.cnombre as materia,
              tpersonal.cnombre as docente,
              tpersonal.capellido
              FROM
              tbachilleratos
              INNER JOIN topciones ON topciones.efk_bto = tbachilleratos.eid_bachillerato
              INNER JOIN tsecciones ON topciones.efk_seccion = tsecciones.eid_seccion
              INNER JOIN tgrado ON topciones.efk_grado = tgrado.eid_grado
              INNER JOIN tmaterias ON tmaterias.efk_idopcion = topciones.eid_opcion
              INNER JOIN tpersonal_materia ON tpersonal_materia.efk_idmateria = tmaterias.eid_materia
              INNER JOIN tpersonal ON tpersonal_materia.efk_idpersonal = tpersonal.eid_personal
              WHERE
              tpersonal.eid_personal = $idPersonalDocente ";
              $result = $conexion->query($consulta2);
              $cont = 0;
              while($fila = $result->fetch_object()){

                  $idBach[$cont]=$fila->idBach;
                  $nombreBach[$cont]=$fila->nombreBach;

                  $idSeccion[$cont]=$fila->idSeccion;
                  $seccion[$cont]=$fila->seccion;

                  $idGrado[$cont]=$fila->idGrado;
                  $grado[$cont]=$fila->grado;

                  $cont++;
              }

              $datosBach=array_combine($idBach, $nombreBach); //Crea array asociativo 
              $datosBach=array_unique($datosBach);            //Elimina duplicados
              
              $datosSeccion=array_combine($idSeccion, $seccion);  
              $datosSeccion=array_unique($datosSeccion);            

              $datosGrado=array_combine($idGrado, $grado); 
              $datosGrado=array_unique($datosGrado);  


        }else{// si es un usuario Administrador hara la siguientes consultas

              $consulta3="SELECT
              tusuarios.eid_usuario,
              tusuarios.cusuario,
              tpersonal.eid_personal,
              tpersonal.cnombre,
              tpersonal.capellido
              FROM
              tusuarios
              INNER JOIN tpersonal ON tusuarios.efk_personal = tpersonal.eid_personal
              WHERE
              tusuarios.eid_usuario = $id ";
              $resultado = $conexion->query($consulta3);
              
              $aux=$resultado->fetch_row();

              $idPersonalAdmin=$aux[2];//se recupera eid_personal asociado al usuario logueado
              $nombre2=$aux[3];
              $apellido2=$aux[4];

              $nombreCompleto="$nombre2 $apellido2";


              //Obteniendo los datos para los combobox del header de la tabla

              $consulta4="SELECT
              tbachilleratos.cnombe as nombreBach,
              tbachilleratos.eid_bachillerato as idBach,
              tsecciones.cseccion as seccion,
              tgrado.cgrado as grado,
              tgrado.eid_grado as idGrado,
              tsecciones.eid_seccion as idSeccion,
              tmaterias.eid_materia as idMateria,
              tmaterias.cnombre as materia,
              tpersonal.cnombre as docente,
              tpersonal.capellido
              FROM
              tbachilleratos
              INNER JOIN topciones ON topciones.efk_bto = tbachilleratos.eid_bachillerato
              INNER JOIN tsecciones ON topciones.efk_seccion = tsecciones.eid_seccion
              INNER JOIN tgrado ON topciones.efk_grado = tgrado.eid_grado
              INNER JOIN tmaterias ON tmaterias.efk_idopcion = topciones.eid_opcion
              INNER JOIN tpersonal_materia ON tpersonal_materia.efk_idmateria = tmaterias.eid_materia
              INNER JOIN tpersonal ON tpersonal_materia.efk_idpersonal = tpersonal.eid_personal";
              $result = $conexion->query($consulta4);
              $cont = 0;
              while($fila = $result->fetch_object()){

                  $idBach[$cont]=$fila->idBach;
                  $nombreBach[$cont]=$fila->nombreBach;

                  $idSeccion[$cont]=$fila->idSeccion;
                  $seccion[$cont]=$fila->seccion;

                  $idGrado[$cont]=$fila->idGrado;
                  $grado[$cont]=$fila->grado;

                  $cont++;
              }

              $datosBach=array_combine($idBach, $nombreBach); //Crea array asociativo 
              $datosBach=array_unique($datosBach);            //Elimina duplicados
              
              $datosSeccion=array_combine($idSeccion, $seccion);  
              $datosSeccion=array_unique($datosSeccion);            

              $datosGrado=array_combine($idGrado, $grado); 
              $datosGrado=array_unique($datosGrado); 


        }

          //obteniendo el periodo activo

          $periodoActivo;

          $consulta5="SELECT
          tperiodos.eid_periodo,
          tperiodos.enum,
          tperiodos.estado
          FROM
          tperiodos
          WHERE tperiodos.estado = 1 ";
          $respuesta = $conexion->query($consulta5);
          $registro=$respuesta->fetch_row();
          $periodoActivo = $registro[1];




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
  <title>Registro de Notas | SICA</title>

  <!-- start: Css -->
  <link rel="stylesheet" type="text/css" href="../asset/css/bootstrap.min.css">

  <!-- plugins -->
  <link rel="stylesheet" type="text/css" href="../asset/css/plugins/font-awesome.min.css"/>
  <link rel="stylesheet" type="text/css" href="../asset/css/plugins/datatables.bootstrap.min.css"/>
  <link rel="stylesheet" type="text/css" href="../asset/css/plugins/animate.min.css"/>
  <link rel="stylesheet" type="text/css" href="../asset/css/plugins/select2.min.css"/>
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
       function reporte2(id){
        //  alert(id);
           window.open("../ayuda/registron.pdf",'_blank');
        }

         
      </script>
</head>

<body id="mimin" class="dashboard">
<?php include "header.php";?>

      <div class="container-fluid mimin-wrapper">
  
          <!-- inicio: Menu Lateral izquierdo -->
          <?php
          if($tipo==1){
            include "menu.php";
          }else{
            include "menuD.php";
          } ?>                               
          <!-- final:  Menu Lateral izquierdo -->


            <!-- inicio: Contenido -->
            <div id="content">
                <!--inicio Header del contenido-->
               <div class="panel box-shadow-none content-header">
                  <div class="panel-body">
                    <div class="col-md-12">
                        <h3 class="animated fadeInLeft" class="col-md-2">Registro de Notas</h3>
                        <p class="animated fadeInDown">
                          Notas <span class="fa-angle-right fa"></span> Complejo Educativo Catolico "La Santa Familia"
                        </p>
                        <span class="col-md-10"></span>
                    <div class="col-md-2">
                    <a class="btn btn-outline btn-default" >
                    <span onclick="reporte2();" title="Ayuda"><i class="fa fa-search"></i><br>Ayuda</span>
                    </a>
                    </div>
                    </div>
                  </div>
              </div>
              <!--fin Header del contenido-->
              <div class="col-md-12 top-20 padding-0">
                <div class="col-md-12">
                  <div class="panel">
                  <div class="panel-heading col-md-12" > 

                        <?php

                            echo "<h5>"; 
                            
                              if($_SESSION["tipo"] == 0){
                                  echo "DOCENTE: $nombreCompleto";
                              }else{
                                  echo "ADMINISTRADOR: $nombreCompleto";
                              }
                            
                            echo "</h5>";
                        ?>

                  </div>
                    <div class="panel-heading col-md-12">
                            <!--Anio activo-->
                            <input id="idAnio" type="hidden" value="<?php echo $idanioActivo;?>">
                            <input id="idP" type="hidden" value="<?php echo $idP;?>">
                           <h5 class="col-md-2">Grado: <br>
                                  <select id="grado" class="form-control">  
                                    <option value="0" selected hidden>Seleccione</option>
                                    <?php
                                        foreach ($datosGrado as $id => $grado) {
                                          echo "<option value=".$id.">".$grado."</option>";
                                        }
                                    
                                    ?>
                                    
                                  </select>
                            </h5> 
                             <h5 class="col-md-3">Bachillerato: <br>
                                  <select id="bach" class="form-control"> 
                                  <option value="0" selected hidden>Seleccione</option> 
                                  <?php
                                        foreach ($datosBach as $idBach => $bach) {
                                          echo "<option value=".$idBach.">".$bach."</option>";
                                        }
                                    
                                    ?>
                                    
                                  </select>
                                </h5> 
                                <h5 class="col-md-2">Sección: <br>
                                    <select id="seccion" class="form-control">
                                    <option value="0" selected hidden>Seleccione</option>  
                                      <?php
                                          foreach ($datosSeccion as $idSec => $seccion) {
                                            echo "<option value=".$idSec.">".$seccion."</option>";
                                          }
                                      
                                      ?>
                                    </select>
                                </h5>
                                
                                <h5 class="col-md-4">Materia: <br>
                                
                                    <select id="materia" class="form-control mat">  
                                    <option value="0" selected hidden>Seleccione</option> 
                                      <?php include "comboMaterias.php"; ?>
                                    </select>
                                </h5>
                                
                               <div  class="col-md-1"id="botonFiltrar" > 
                                  
                                <a class="btn btn-outline btn-default">
                                      <i class="fa fa-search fa-lg"></i><br>Filtrar
                                    </a>
                                 
                                </div>
                                
                                                                                    
                    </div>
                    <div class="panel-body">
                      <hr class="col-md-12" style="visibility: hidden;">
                      <div class="responsive-table">
                      <table id="datatables-example" class="table table-striped table-bordered" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                          <td colspan=2 style="text-align:center;"><strong>NOMINA DE ALUMNOS</strong></td>
                          <td colspan=5 style="text-align:center;">
                            <strong>PERIODO ACTIVO: <?php echo $periodoActivo; ?>° PERIODO </strong>
                            <input id="periodo" type="hidden" value="<?php echo $periodoActivo; ?>">                          
                          </td> 
                                                  
                        </tr>
                        <tr>
                            <th width='10'>CODIGO</th>
                            <th>NOMBRE DEL ALUMNO</th>
                            <th>35%</th>
                            <th>35%</th>
                            <th>30%</th>
                            <th>Rec.</th>
                            <th>Prom.</th>
                            <th>Accion</th>  
                        </tr>
                      </thead>
                      <tbody class="tabla_ajax">
                          
                          <?php include "tablaNotas.php";?>
                            
                      </tbody>
                      
                    </table>
                  </div>
                  </div>
                </div>
              </div>  
              </div>
            </div>
          <!-- final: Contenido -->



          <!-- inicio: menu derecho del icono de la taza de cafe -->
            <div id="right-menu">
              <ul class="nav nav-tabs">
                <li class="active">
                 <a data-toggle="tab" href="#right-menu-user">
                  <span class="fa fa-comment-o fa-2x"></span>
                 </a>
                </li>
                <li>
                 <a data-toggle="tab" href="#right-menu-notif">
                  <span class="fa fa-bell-o fa-2x"></span>
                 </a>
                </li>
                <li>
                  <a data-toggle="tab" href="#right-menu-config">
                   <span class="fa fa-cog fa-2x"></span>
                  </a>
                 </li>
              </ul>

              <div class="tab-content">
                <div id="right-menu-user" class="tab-pane fade in active">
                  <div class="search col-md-12">
                    <input type="text" placeholder="search.."/>
                  </div>
                  <div class="user col-md-12">
                   <ul class="nav nav-list">
                    <li class="online">
                      <img src="asset/img/avatar.jpg" alt="user name">
                      <div class="name">
                        <h5><b>Bill Gates</b></h5>
                        <p>Hi there.?</p>
                      </div>
                      <div class="gadget">
                        <span class="fa  fa-mobile-phone fa-2x"></span> 
                      </div>
                      <div class="dot"></div>
                    </li>
                    <li class="away">
                      <img src="asset/img/avatar.jpg" alt="user name">
                      <div class="name">
                        <h5><b>Bill Gates</b></h5>
                        <p>Hi there.?</p>
                      </div>
                      <div class="gadget">
                        <span class="fa  fa-desktop"></span> 
                      </div>
                      <div class="dot"></div>
                    </li>
                    <li class="offline">
                      <img src="asset/img/avatar.jpg" alt="user name">
                      <div class="name">
                        <h5><b>Bill Gates</b></h5>
                        <p>Hi there.?</p>
                      </div>
                      <div class="dot"></div>
                    </li>
                    <li class="offline">
                      <img src="asset/img/avatar.jpg" alt="user name">
                      <div class="name">
                        <h5><b>Bill Gates</b></h5>
                        <p>Hi there.?</p>
                      </div>
                      <div class="dot"></div>
                    </li>
                    <li class="online">
                      <img src="asset/img/avatar.jpg" alt="user name">
                      <div class="name">
                        <h5><b>Bill Gates</b></h5>
                        <p>Hi there.?</p>
                      </div>
                      <div class="gadget">
                        <span class="fa  fa-mobile-phone fa-2x"></span> 
                      </div>
                      <div class="dot"></div>
                    </li>
                    <li class="offline">
                      <img src="asset/img/avatar.jpg" alt="user name">
                      <div class="name">
                        <h5><b>Bill Gates</b></h5>
                        <p>Hi there.?</p>
                      </div>
                      <div class="dot"></div>
                    </li>
                    <li class="online">
                      <img src="asset/img/avatar.jpg" alt="user name">
                      <div class="name">
                        <h5><b>Bill Gates</b></h5>
                        <p>Hi there.?</p>
                      </div>
                      <div class="gadget">
                        <span class="fa  fa-mobile-phone fa-2x"></span> 
                      </div>
                      <div class="dot"></div>
                    </li>
                    <li class="offline">
                      <img src="asset/img/avatar.jpg" alt="user name">
                      <div class="name">
                        <h5><b>Bill Gates</b></h5>
                        <p>Hi there.?</p>
                      </div>
                      <div class="dot"></div>
                    </li>
                    <li class="offline">
                      <img src="asset/img/avatar.jpg" alt="user name">
                      <div class="name">
                        <h5><b>Bill Gates</b></h5>
                        <p>Hi there.?</p>
                      </div>
                      <div class="dot"></div>
                    </li>
                    <li class="online">
                      <img src="asset/img/avatar.jpg" alt="user name">
                      <div class="name">
                        <h5><b>Bill Gates</b></h5>
                        <p>Hi there.?</p>
                      </div>
                      <div class="gadget">
                        <span class="fa  fa-mobile-phone fa-2x"></span> 
                      </div>
                      <div class="dot"></div>
                    </li>
                    <li class="online">
                      <img src="asset/img/avatar.jpg" alt="user name">
                      <div class="name">
                        <h5><b>Bill Gates</b></h5>
                        <p>Hi there.?</p>
                      </div>
                      <div class="gadget">
                        <span class="fa  fa-mobile-phone fa-2x"></span> 
                      </div>
                      <div class="dot"></div>
                    </li>

                  </ul>
                </div>
                <!-- Chatbox -->
                <div class="col-md-12 chatbox">
                  <div class="col-md-12">
                    <a href="#" class="close-chat">X</a><h4>Akihiko Avaron</h4>
                  </div>
                  <div class="chat-area">
                    <div class="chat-area-content">
                      <div class="msg_container_base">
                        <div class="row msg_container send">
                          <div class="col-md-9 col-xs-9 bubble">
                            <div class="messages msg_sent">
                              <p>that mongodb thing looks good, huh?
                                tiny master db, and huge document store</p>
                                <time datetime="2009-11-13T20:00">Timothy • 51 min</time>
                              </div>
                            </div>
                            <div class="col-md-3 col-xs-3 avatar">
                              <img src="asset/img/avatar.jpg" class=" img-responsive " alt="user name">
                            </div>
                          </div>

                          <div class="row msg_container receive">
                            <div class="col-md-3 col-xs-3 avatar">
                              <img src="asset/img/avatar.jpg" class=" img-responsive " alt="user name">
                            </div>
                            <div class="col-md-9 col-xs-9 bubble">
                              <div class="messages msg_receive">
                                <p>that mongodb thing looks good, huh?
                                  tiny master db, and huge document store</p>
                                  <time datetime="2009-11-13T20:00">Timothy • 51 min</time>
                                </div>
                              </div>
                            </div>

                            <div class="row msg_container send">
                              <div class="col-md-9 col-xs-9 bubble">
                                <div class="messages msg_sent">
                                  <p>that mongodb thing looks good, huh?
                                    tiny master db, and huge document store</p>
                                    <time datetime="2009-11-13T20:00">Timothy • 51 min</time>
                                  </div>
                                </div>
                                <div class="col-md-3 col-xs-3 avatar">
                                  <img src="asset/img/avatar.jpg" class=" img-responsive " alt="user name">
                                </div>
                              </div>

                              <div class="row msg_container receive">
                                <div class="col-md-3 col-xs-3 avatar">
                                  <img src="asset/img/avatar.jpg" class=" img-responsive " alt="user name">
                                </div>
                                <div class="col-md-9 col-xs-9 bubble">
                                  <div class="messages msg_receive">
                                    <p>that mongodb thing looks good, huh?
                                      tiny master db, and huge document store</p>
                                      <time datetime="2009-11-13T20:00">Timothy • 51 min</time>
                                    </div>
                                  </div>
                                </div>

                                <div class="row msg_container send">
                                  <div class="col-md-9 col-xs-9 bubble">
                                    <div class="messages msg_sent">
                                      <p>that mongodb thing looks good, huh?
                                        tiny master db, and huge document store</p>
                                        <time datetime="2009-11-13T20:00">Timothy • 51 min</time>
                                      </div>
                                    </div>
                                    <div class="col-md-3 col-xs-3 avatar">
                                      <img src="asset/img/avatar.jpg" class=" img-responsive " alt="user name">
                                    </div>
                                  </div>

                                  <div class="row msg_container receive">
                                    <div class="col-md-3 col-xs-3 avatar">
                                      <img src="asset/img/avatar.jpg" class=" img-responsive " alt="user name">
                                    </div>
                                    <div class="col-md-9 col-xs-9 bubble">
                                      <div class="messages msg_receive">
                                        <p>that mongodb thing looks good, huh?
                                          tiny master db, and huge document store</p>
                                          <time datetime="2009-11-13T20:00">Timothy • 51 min</time>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="chat-input">
                                <textarea placeholder="type your message here.."></textarea>
                              </div>
                              <div class="user-list">
                                <ul>
                                  <li class="online">
                                    <a href=""  data-toggle="tooltip" data-placement="left" title="Akihiko avaron">
                                      <div class="user-avatar"><img src="asset/img/avatar.jpg" alt="user name"></div>
                                      <div class="dot"></div>
                                    </a>
                                  </li>
                                  <li class="offline">
                                    <a href="" data-toggle="tooltip" data-placement="left" title="Akihiko avaron">
                                      <img src="asset/img/avatar.jpg" alt="user name">
                                      <div class="dot"></div>
                                    </a>
                                  </li>
                                  <li class="away">
                                    <a href="" data-toggle="tooltip" data-placement="left" title="Akihiko avaron">
                                      <img src="asset/img/avatar.jpg" alt="user name">
                                      <div class="dot"></div>
                                    </a>
                                  </li>
                                  <li class="online">
                                    <a href="" data-toggle="tooltip" data-placement="left" title="Akihiko avaron">
                                      <img src="asset/img/avatar.jpg" alt="user name">
                                      <div class="dot"></div>
                                    </a>
                                  </li>
                                  <li class="offline">
                                    <a href="" data-toggle="tooltip" data-placement="left" title="Akihiko avaron">
                                      <img src="asset/img/avatar.jpg" alt="user name">
                                      <div class="dot"></div>
                                    </a>
                                  </li>
                                  <li class="away">
                                    <a href="" data-toggle="tooltip" data-placement="left" title="Akihiko avaron">
                                      <img src="asset/img/avatar.jpg" alt="user name">
                                      <div class="dot"></div>
                                    </a>
                                  </li>
                                  <li class="offline">
                                    <a href="" data-toggle="tooltip" data-placement="left" title="Akihiko avaron">
                                      <img src="asset/img/avatar.jpg" alt="user name">
                                      <div class="dot"></div>
                                    </a>
                                  </li>
                                  <li class="offline">
                                    <a href="" data-toggle="tooltip" data-placement="left" title="Akihiko avaron">
                                      <img src="asset/img/avatar.jpg" alt="user name">
                                      <div class="dot"></div>
                                    </a>
                                  </li>
                                  <li class="away">
                                    <a href="" data-toggle="tooltip" data-placement="left" title="Akihiko avaron">
                                      <img src="asset/img/avatar.jpg" alt="user name">
                                      <div class="dot"></div>
                                    </a>
                                  </li>
                                  <li class="online">
                                    <a href="" data-toggle="tooltip" data-placement="left" title="Akihiko avaron">
                                      <img src="asset/img/avatar.jpg" alt="user name">
                                      <div class="dot"></div>
                                    </a>
                                  </li>
                                  <li class="away">
                                    <a href="" data-toggle="tooltip" data-placement="left" title="Akihiko avaron">
                                      <img src="asset/img/avatar.jpg" alt="user name">
                                      <div class="dot"></div>
                                    </a>
                                  </li>
                                  <li class="away">
                                    <a href="" data-toggle="tooltip" data-placement="left" title="Akihiko avaron">
                                      <img src="asset/img/avatar.jpg" alt="user name">
                                      <div class="dot"></div>
                                    </a>
                                  </li>
                                </ul>
                              </div>
                            </div>
                          </div>
                          <div id="right-menu-notif" class="tab-pane fade">

                            <ul class="mini-timeline">
                              <li class="mini-timeline-highlight">
                               <div class="mini-timeline-panel">
                                <h5 class="time">07:00</h5>
                                <p>Coding!!</p>
                              </div>
                            </li>

                            <li class="mini-timeline-highlight">
                             <div class="mini-timeline-panel">
                              <h5 class="time">09:00</h5>
                              <p>Playing The Games</p>
                            </div>
                          </li>
                          <li class="mini-timeline-highlight">
                           <div class="mini-timeline-panel">
                            <h5 class="time">12:00</h5>
                            <p>Meeting with <a href="#">Clients</a></p>
                          </div>
                        </li>
                        <li class="mini-timeline-highlight mini-timeline-warning">
                         <div class="mini-timeline-panel">
                          <h5 class="time">15:00</h5>
                          <p>Breakdown the Personal PC</p>
                        </div>
                      </li>
                      <li class="mini-timeline-highlight mini-timeline-info">
                       <div class="mini-timeline-panel">
                        <h5 class="time">15:00</h5>
                        <p>Checking Server!</p>
                      </div>
                    </li>
                    <li class="mini-timeline-highlight mini-timeline-success">
                      <div class="mini-timeline-panel">
                        <h5 class="time">16:01</h5>
                        <p>Hacking The public wifi</p>
                      </div>
                    </li>
                    <li class="mini-timeline-highlight mini-timeline-danger">
                      <div class="mini-timeline-panel">
                        <h5 class="time">21:00</h5>
                        <p>Sleep!</p>
                      </div>
                    </li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                  </ul>

                </div>
                <div id="right-menu-config" class="tab-pane fade">
                  <div class="col-md-12">
                    <div class="col-md-6 padding-0">
                      <h5>Notification</h5>
                    </div>
                    <div class="col-md-6">
                      <div class="mini-onoffswitch onoffswitch-info">
                        <input type="checkbox" name="onoffswitch2" class="onoffswitch-checkbox" id="myonoffswitch1" checked>
                        <label class="onoffswitch-label" for="myonoffswitch1"></label>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-12">
                    <div class="col-md-6 padding-0">
                      <h5>Custom Designer</h5>
                    </div>
                    <div class="col-md-6">
                      <div class="mini-onoffswitch onoffswitch-danger">
                        <input type="checkbox" name="onoffswitch2" class="onoffswitch-checkbox" id="myonoffswitch2" checked>
                        <label class="onoffswitch-label" for="myonoffswitch2"></label>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-12">
                    <div class="col-md-6 padding-0">
                      <h5>Autologin</h5>
                    </div>
                    <div class="col-md-6">
                      <div class="mini-onoffswitch onoffswitch-success">
                        <input type="checkbox" name="onoffswitch2" class="onoffswitch-checkbox" id="myonoffswitch3" checked>
                        <label class="onoffswitch-label" for="myonoffswitch3"></label>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-12">
                    <div class="col-md-6 padding-0">
                      <h5>Auto Hacking</h5>
                    </div>
                    <div class="col-md-6">
                      <div class="mini-onoffswitch onoffswitch-warning">
                        <input type="checkbox" name="onoffswitch2" class="onoffswitch-checkbox" id="myonoffswitch4" checked>
                        <label class="onoffswitch-label" for="myonoffswitch4"></label>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-12">
                    <div class="col-md-6 padding-0">
                      <h5>Auto locking</h5>
                    </div>
                    <div class="col-md-6">
                      <div class="mini-onoffswitch">
                        <input type="checkbox" name="onoffswitch2" class="onoffswitch-checkbox" id="myonoffswitch5" checked>
                        <label class="onoffswitch-label" for="myonoffswitch5"></label>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-12">
                    <div class="col-md-6 padding-0">
                      <h5>FireWall</h5>
                    </div>
                    <div class="col-md-6">
                      <div class="mini-onoffswitch">
                        <input type="checkbox" name="onoffswitch2" class="onoffswitch-checkbox" id="myonoffswitch6" checked>
                        <label class="onoffswitch-label" for="myonoffswitch6"></label>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-12">
                    <div class="col-md-6 padding-0">
                      <h5>CSRF Max</h5>
                    </div>
                    <div class="col-md-6">
                      <div class="mini-onoffswitch onoffswitch-warning">
                        <input type="checkbox" name="onoffswitch2" class="onoffswitch-checkbox" id="myonoffswitch7" checked>
                        <label class="onoffswitch-label" for="myonoffswitch7"></label>
                      </div>
                    </div>
                  </div>


                  <div class="col-md-12">
                    <div class="col-md-6 padding-0">
                      <h5>Man In The Middle</h5>
                    </div>
                    <div class="col-md-6">
                      <div class="mini-onoffswitch onoffswitch-danger">
                        <input type="checkbox" name="onoffswitch2" class="onoffswitch-checkbox" id="myonoffswitch8" checked>
                        <label class="onoffswitch-label" for="myonoffswitch8"></label>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-12">
                    <div class="col-md-6 padding-0">
                      <h5>Auto Repair</h5>
                    </div>
                    <div class="col-md-6">
                      <div class="mini-onoffswitch onoffswitch-success">
                        <input type="checkbox" name="onoffswitch2" class="onoffswitch-checkbox" id="myonoffswitch9" checked>
                        <label class="onoffswitch-label" for="myonoffswitch9"></label>
                      </div>
                    </div>
                  </div>

                  <div class="col-md-12">
                    <input type="button" value="More.." class="btnmore">
                  </div>

                </div>
              </div>
            </div>  
          <!-- final: menu derecho del icono de la taza de cafe-->
          
      </div>

      <!-- inicio: Menu laterla izquierdo para mobil -->
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
       <!-- fin: Menu laterla izquierdo para mobil -->

       <!--MODAL-->
       <div class="modal fade" id="modalito">
                                  <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title">Asignación de notas</h4>
                                      </div>
                                      <div class="modal-body col-md-12">
                                                <form id="asignarnotas" >
                                                <input type="hidden" id="idMateria" name="idMateria" value="">
                                                <input type="hidden" id="idAlumno" name="idAlumno" value="">
                                                <input type="hidden" id="idNotas" name="idNotas" value="">

                                                      <table class="table table-bordered">
                                                          <caption><strong><p id="titulo2"></p></strong></caption>
                                                          <thead>
                                                            <tr><th scope="col" colspan="6"><p id="titulo1"></p></th></tr>
                                                            <tr>
                                                              <th scope="col" width="140" >PERIODO</th>
                                                              <th scope="col" width="107">Nota 1: 35%</th>
                                                              <th scope="col" width="107">Nota 2: 35%</th>
                                                              <th scope="col" width="107">Nota 3: 30%</th>
                                                              <th scope="col" width="107">Recuperación</th>
                                                              <th scope="col" width="107">Promedio</th>
                                                              
                                                            </tr>
                                                          </thead>
                                                          <tbody>
                                                            <tr>
                                                              <th scope="row"><p id="periodoAc"></p></th>
                                                              <td> <input id="n1" type="text" style="width:80px; height:30px;" onkeypress="return NumCheck(event, this)"> </td>
                                                              <td><input id="n2" type="text" style="width:80px; height:30px;" onkeypress="return NumCheck(event, this)" ></td>
                                                              <td><input id="n3" type="text" style="width:80px; height:30px;" onkeypress="return NumCheck(event, this)"></td>
                                                              <td><input id="rec" type="text" style="width:80px; height:30px;" onkeypress="return NumCheck(event, this)"></td>
                                                              <td><input id="pro" type="text" style="width:80px; height:30px;" disabled></td>
                                                            </tr>
                                                            
                                                        
                          
                                                          </tbody>
                                                          <tfoot>
                                                            <td colspan="6"><p id="error"></p></td>
                                                          </tfoot>
                                                        </table>
                                                      
                                                      
                                                </form>
                                      </div>
                                      <br><br><br><br><br><br><br><br><br><br><br><br><br>
                                      
                                      <div class="modal-footer">
                                        <button id="cancelar" type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                        <button id="asignarNotas" type="button" class="btn btn-primary">Asignar notas</button>
                                      </div>
                                      
                                    </div><!-- /.modal-content -->
                                  </div><!-- /.modal-dialog -->
              </div><!-- /.modal -->
          <!--MODAL-->

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

    
      $("#seccion").on('change', function(){

          var grado   = $("#grado").val();
          var bach    = $("#bach").val();
          var seccion = $("#seccion").val();
          var idP = $("#idP").val();

          if(grado == 0){
            return false;
          }
          if(bach == 0){
            return false;
          }
          if(seccion == 0){
            return false;
          }

          $.ajax({
                  type: 'post',
                  url: 'obtenerOpcion.php',
                  data: {grado:grado, bach:bach, seccion:seccion},
                  success: function(respuesta) {
                      if(respuesta != 0){
                        $(".mat").load("comboMaterias.php?id="+respuesta+"&idP="+idP);
                      }else{
                        sweetError("Seleccione correctamente los campos");
                      }           
                                        
                  },
                  error: function(respuesta){
                    sweetError("Error en el servidor: "+respuesta); 
                  }
            });//fin de ajax*/


      });//cambio de combo seccion

      $("#grado").on('change', function(){

        var grado   = $("#grado").val();
        var bach    = $("#bach").val();
        var seccion = $("#seccion").val();
        var idP = $("#idP").val();
          
         if(grado == 0){
            return false;
          }
          if(bach == 0){
            return false;
          }
          if(seccion == 0){
            return false;
          }


        $.ajax({
                type: 'post',
                url: 'obtenerOpcion.php',
                data: {grado:grado, bach:bach, seccion:seccion},
                success: function(respuesta) {
                    if(respuesta != 0){
                      $(".mat").load("comboMaterias.php?id="+respuesta+"&idP="+idP);
                    }else{
                      sweetError("Seleccione correctamente los campos");
                    }           
                                      
                },
                error: function(respuesta){
                  sweetError("Error en el servidor: "+respuesta); 
                }
          });//fin de ajax*/


      });//cambio de combo grado

       $("#bach").on('change', function(){

        var grado   = $("#grado").val();
        var bach    = $("#bach").val();
        var seccion = $("#seccion").val();
        var idP = $("#idP").val();

          if(grado == 0){
            return false;
          }
          if(bach == 0){
            return false;
          }
          if(seccion == 0){
            return false;
          }
          
        $.ajax({
                type: 'post',
                url: 'obtenerOpcion.php',
                data: {grado:grado, bach:bach, seccion:seccion},
                success: function(respuesta) {
                    if(respuesta != 0){
                      $(".mat").load("comboMaterias.php?id="+respuesta+"&idP="+idP);
                    }else{
                      sweetError("Seleccione correctamente los campos");
                    }           
                                      
                },
                error: function(respuesta){
                  sweetError("Error en el servidor: "+respuesta); 
                }
          });//fin de ajax*/


      });//cambio de combo seccion

      $("#botonFiltrar").on("click", function(){

           var idMateria = $("#materia").val();
           var periodoAct = $("#periodo").val();
           var anio = $("#idAnio").val();
            
           if(idMateria == "n" || idMateria == "0"){
            sweetInfo("No hay materias cargadas", "verifique datos de opcion");
           }else{
              $(".tabla_ajax").load("tablaNotas.php?idMateria="+idMateria+"&periodo="+periodoAct+"&anio="+anio);
           }
           

      });

      $("#asignarNotas").on('click', function(){

          var idnotas=$("#idNotas").val();
          var idAlumno=$("#idAlumno").val();
          var idMateria=$("#materia").val();
          var nota1=$("#n1").val();
          var nota2=$("#n2").val();
          var nota3=$("#n3").val();
          var rec=$("#rec").val();
          var pro=$("#pro").val();
          var periodoAct = $("#periodo").val();
          var anio = $("#idAnio").val();

          if(nota1 == ""){
              return false;
          }
          if(nota2 == ""){
              return false;
          }
          if(nota3 == ""){
            return false;
          }


          swal({
                      title: '¿Está seguro que desea realizar estos cambios?',
                      text: "¡Se actualizaran las notas!",
                      type: 'warning',
                      showCancelButton: true,
                      confirmButtonColor: '#3085d6',
                      cancelButtonColor: '#d33',
                      confirmButtonText: 'Continuar',
                      cancelButtonText:'Cancelar',
                     }).then((result) => {
                         if (result.value) {
                                
                                $.ajax({
                                      type: 'post',
                                      url: 'asignarNotas.php',
                                      data: {idnotas:idnotas, idAlumno:idAlumno, idMateria:idMateria, nota1:nota1, nota2:nota2, nota3:nota3, rec:rec, pro:pro, periodoAct:periodoAct},
                                      success: function(respuesta) {
                                          if(respuesta != "0"){
                                            
                                            $("#idAlumno").val("");
                                            $("#idMateria").val("");
                                            $("#idNotas").val("");

                                            $("#n1").val("");
                                            $("#n2").val("");
                                            $("#n3").val("");
                                            $("#rec").val("");
                                            $("#pro").val("");
                                            
                                            $("#titulo1").text("");
                                            $("#titulo2").text("");

                                            $("#modalito").modal('hide');

                                          $(".tabla_ajax").load("tablaNotas.php?idMateria="+idMateria+"&periodo="+periodoAct+"&anio="+anio);
                                            sweetGuardo("Notas actualizadas correctamente");
                                          }else{
                                            sweetError("Error al actualizar las notas");
                                          }           
                                                            
                                      },
                                      error: function(respuesta){
                                        sweetError("Error en el servidor: "+respuesta); 
                                      }
                                });//fin de ajax*/  

                              }//fin de if sweet
                        })   

              

      });

      $("#cancelar").on('click', function(){

              $("#idAlumno").val("");
              $("#idMateria").val("");
              $("#idNotas").val("");
              $("#n1").val("");
              $("#n2").val("");
              $("#n3").val("");
              $("#rec").val("");
              $("#pro").val("");
              $("#error").text("");                          
              $("#titulo1").text("");
              $("#titulo2").text("");
      });

      $("#n1").keyup(function(){

              var valor1 = parseFloat($("#n1").val());
              var valor2 = parseFloat($("#n2").val());
              var valor3 = parseFloat($("#n3").val());
              var valor4 = parseFloat($("#rec").val());

              if(valor1 !="" || valor1 == 0 || valor1 == 0.00){

                  if((valor1 >= 0 || valor1 >= 0.00) && (valor1 <= 10 || valor1 <= 10.00) &&
                  (valor2 >= 0 || valor2 >= 0.00) && (valor2 <= 10 || valor2 <= 10.00) &&
                  (valor3 >= 0 || valor3 >= 0.00) && (valor3 <= 10 || valor3 <= 10.00) &&
                  (valor4 >= 0 || valor4 >= 0.00) && (valor4 <= 10 || valor4 <= 10.00)){

                        var promedio;
                        if(valor4>0 || valor4 > 0.00){
                            promedio=((valor1 + valor2 + valor3 + valor4)/4);
                            promedio= promedio.toFixed(2);
                            $("#pro").val(promedio);
                            $("#asignarNotas").prop("disabled",false);
                            $("#error").text("");
                        }else{
                            promedio=((valor1 + valor2 + valor3)/3);
                            promedio= promedio.toFixed(2);
                            $("#pro").val(promedio);
                            $("#asignarNotas").prop("disabled",false);
                            $("#error").text("");
                        }

                  }else{
                        //desactivar boton de modal y mostrar mensaje
                        $("#error").text("Formato no valido: rango de nota 0 - 10").css("color","red");
                        $("#asignarNotas").prop("disabled",true);
                  }
              }else{
                  //desactivar boton de modal
                  $("#error").text("Campo vacio: rango de nota 0 - 10").css("color","red");
                  $("#asignarNotas").prop("disabled",true);
              }
      });
      $("#n2").keyup(function(){

          var valor1 = parseFloat($("#n1").val());
          var valor2 = parseFloat($("#n2").val());
          var valor3 = parseFloat($("#n3").val());
          var valor4 = parseFloat($("#rec").val());

          if(valor2 !="" || valor2 == 0 || valor2 == 0.00){

              if((valor1 >= 0 || valor1 >= 0.00) && (valor1 <= 10 || valor1 <= 10.00) &&
              (valor2 >= 0 || valor2 >= 0.00) && (valor2 <= 10 || valor2 <= 10.00) &&
              (valor3 >= 0 || valor3 >= 0.00) && (valor3 <= 10 || valor3 <= 10.00) &&
              (valor4 >= 0 || valor4 >= 0.00) && (valor4 <= 10 || valor4 <= 10.00)){

                    var promedio;
                    if(valor4>0 || valor4 > 0.00){
                        promedio=((valor1 + valor2 + valor3 + valor4)/4);
                        promedio= promedio.toFixed(2);
                        $("#pro").val(promedio);
                        $("#asignarNotas").prop("disabled",false);
                        $("#error").text("");
                    }else{
                        promedio=((valor1 + valor2 + valor3)/3);
                        promedio= promedio.toFixed(2);
                        $("#pro").val(promedio);
                        $("#asignarNotas").prop("disabled",false);
                        $("#error").text("");
                    }

              }else{
                    //desactivar boton de modal y mostrar mensaje
                    $("#error").text("Formato no valido: rango de nota 0 - 10").css("color","red");
                    $("#asignarNotas").prop("disabled",true);
              }
          }else{
              //desactivar boton de modal
              $("#error").text("Campo vacio: rango de nota 0 - 10").css("color","red");
              $("#asignarNotas").prop("disabled",true);
          }
      });

      $("#n3").keyup(function(){

            var valor1 = parseFloat($("#n1").val());
            var valor2 = parseFloat($("#n2").val());
            var valor3 = parseFloat($("#n3").val());
            var valor4 = parseFloat($("#rec").val());

            if(valor3 !="" || valor3 == 0 || valor3 == 0.00){

                if((valor1 >= 0 || valor1 >= 0.00) && (valor1 <= 10 || valor1 <= 10.00) &&
                (valor2 >= 0 || valor2 >= 0.00) && (valor2 <= 10 || valor2 <= 10.00) &&
                (valor3 >= 0 || valor3 >= 0.00) && (valor3 <= 10 || valor3 <= 10.00) &&
                (valor4 >= 0 || valor4 >= 0.00) && (valor4 <= 10 || valor4 <= 10.00)){

                      var promedio;
                      if(valor4>0 || valor4 > 0.00){
                          promedio=((valor1 + valor2 + valor3 + valor4)/4);
                          promedio= promedio.toFixed(2);
                          $("#pro").val(promedio);
                          $("#asignarNotas").prop("disabled",false);
                          $("#error").text("");
                      }else{
                          promedio=((valor1 + valor2 + valor3)/3);
                          promedio= promedio.toFixed(2);
                          $("#pro").val(promedio);
                          $("#asignarNotas").prop("disabled",false);
                          $("#error").text("");
                      }

                }else{
                      //desactivar boton de modal y mostrar mensaje
                      $("#error").text("Formato no valido: rango de nota 0 - 10").css("color","red");
                      $("#asignarNotas").prop("disabled",true);
                }
            }else{
                //desactivar boton de modal
                $("#error").text("Campo vacio: rango de nota 0 - 10").css("color","red");
                $("#asignarNotas").prop("disabled",true);
            }
      });

      $("#rec").keyup(function(){

          var valor1 = parseFloat($("#n1").val());
          var valor2 = parseFloat($("#n2").val());
          var valor3 = parseFloat($("#n3").val());
          var valor4 = parseFloat($("#rec").val());

          if(valor4 !="" || valor4 == 0 || valor4 == 0.00){

              if((valor1 >= 0 || valor1 >= 0.00) && (valor1 <= 10 || valor1 <= 10.00) &&
              (valor2 >= 0 || valor2 >= 0.00) && (valor2 <= 10 || valor2 <= 10.00) &&
              (valor3 >= 0 || valor3 >= 0.00) && (valor3 <= 10 || valor3 <= 10.00) &&
              (valor4 >= 0 || valor4 >= 0.00) && (valor4 <= 10 || valor4 <= 10.00)){

                    var promedio;
                    if(valor4>0 || valor4 > 0.00){
                        promedio=((valor1 + valor2 + valor3 + valor4)/4);
                        promedio= promedio.toFixed(2);
                        $("#pro").val(promedio);
                        $("#asignarNotas").prop("disabled",false);
                        $("#error").text("");
                    }else{
                        promedio=((valor1 + valor2 + valor3)/3);
                        promedio= promedio.toFixed(2);
                        $("#pro").val(promedio);
                        $("#asignarNotas").prop("disabled",false);
                        $("#error").text("");
                    }

              }else{
                    //desactivar boton de modal y mostrar mensaje
                    $("#error").text("Formato no valido: rango de nota 0 - 10").css("color","red");
                    $("#asignarNotas").prop("disabled",true);
              }
          }else{
              //desactivar boton de modal
              $("#error").text("Campo vacio: rango de nota 0 - 10").css("color","red");
              $("#asignarNotas").prop("disabled",true);
          }
      });


  });//fin de ready

function asignar(idalumno,idmateria, idnotas, nota1, nota2, nota3, rec, prom, nombreAl,apellidoAl, nombreMat){

      var periodo= $("#periodo").val();
      var nombreCompleto= apellidoAl+", "+nombreAl;
      $("#idAlumno").val(idalumno);
      $("#idMateria").val(idmateria);
      $("#idNotas").val(idnotas);

      $("#n1").val(nota1);
      $("#n2").val(nota2);
      $("#n3").val(nota3);
      $("#rec").val(rec);
      $("#pro").val(prom);
      $("#periodoAc").text(periodo);
      $("#titulo1").text("MATERIA: "+nombreMat);
      $("#titulo2").text("ALUMNO: "+nombreCompleto);

      $("#modalito").modal();
}

//para validar input text con decimales
function NumCheck(e, field) {
  key = e.keyCode ? e.keyCode : e.which
  // backspace
  if (key == 8) return true
  // 0-9
  if (key > 47 && key < 58) {
    if (field.value == "") return true
    regexp = /.[0-9]{2}$/
    return !(regexp.test(field.value))
  }
  // .
  if (key == 46) {
    if (field.value == "") return false
    regexp = /^[0-9]+$/
    return regexp.test(field.value)
  }
  // other key| llamada: onkeypress="return NumCheck(event, this)"
  return false
 
}
/*var notas = document.getElementsByClassName("nota"); 

var onNotaInput = function (event) {
  var regexp = new RegExp("[^0-9]", "g");
  var value = event.target.value.replace(regexp, "");
  value = parseInt(value) / 10;
  if (value >= event.target.min && value <= event.target.max) {
    event.target.dataset.value = value;
  } else {
    value = parseFloat(event.target.dataset.value);
  }
  if (isNaN(value)) {
    value = 0;
  }

  event.target.value = value.toLocaleString(undefined, { minimumFractionDigits: 1 });
};

[].forEach.call(notas, function (nota) {
  nota.addEventListener("input", onNotaInput);
});*/
//para validar input text con decimales
  
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
