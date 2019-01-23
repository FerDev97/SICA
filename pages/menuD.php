<?php
include "../config/conexion.php";
$result = $conexion->query("select * from tanio where iestado=1");
if($result)
{
  while ($fila=$result->fetch_object()) {
    $anioActivo=$fila->eid_anio;
    $clausurado=$fila->eclausura;
  }
}
$result2 = $conexion->query("select * from estadoinscrip where estado=1");
if($result2)
{
  while ($fila1=$result2->fetch_object()) {
    $estadoins=$fila1->estado;
  }
}
 ?>
<!-- start:Left Menu -->
<div id="left-menu">
              <div class="sub-left-menu scroll">
                <ul class="nav nav-list">
                    <li><div class="left-bg"></div></li>
                    <li class="time">
                      <h1 class="animated fadeInLeft">21:00</h1>
                      <p class="animated fadeInRight">Sat,October 1st 2029</p>
                    </li>
                
                  
              
                <!--<li class="ripple">
                  <a class="tree-toggle nav-header">
                    <span class="fa-user fa"></span> Docentes
                    <span class="fa-angle-right fa right-arrow text-right"></span>
                  </a>
                  <ul class="nav nav-list tree">
                    <li><a href="fdocentes.php">Agregar Nuevo</a></li>
                    <li><a href="fdocentes.php">Lista de docentes</a></li>
                  </ul>

                </li>-->
               
                     <li class="ripple">
                      <a class="tree-toggle nav-header">
                        <span class="fa fa-list-alt"></span> Control de Notas
                        <span class="fa-angle-right fa right-arrow text-right"></span>
                      </a>
                      <ul class="nav nav-list tree">
                      <?php 
                      if($clausurado==0){
                      ?>
                        <li><a href="cnotas.php">Registro de Notas</a></li>
                        <li><a href="notasParciales.php">Notas Parciales</a></li>
                  
                        <?php 
                      }
                      ?>
            
   
                      </ul>
                    </li>
                    <?php if($_SESSION["permisoI"]==1){ ?>
                     
                    <li class="active ripple">
                  <a class="tree-toggle nav-header"><span class="fa fa-edit"></span> Inscripción
                    <span class="fa-angle-right fa right-arrow text-right"></span>
                  </a>
                  
                  <ul class="nav nav-list tree">
                  <?php 
                      if($clausurado==0&&$estadoins==1){
                      ?>
                      <li><a href="ingresoAlumno.php">Realizar inscripción</a></li>
                      <?php 
                      }
                      ?>
                        <li><a href="listaalumnos.php">Lista de Alumnos Inscritos</a></li>
                      <li><a href="busquedafamiliar.php">Búsqueda de Alumno por Familiar</a></li>
               
                      <li><a href="nomina.php">Emitir Nomina de alumnos</a></li>
                     
                      
                  </ul>
                </li>
                <?php
                }
                ?>
                <?php if($_SESSION["permisoE"]==1){ ?>
                <li class="ripple">
                  <a class="tree-toggle nav-header">
                
                    <span class="fa-book fa "></span> Estadísticas
                    <span class="fa-angle-right fa right-arrow text-right"></span>
                  </a>
                  <ul class="nav nav-list tree">
                    <li><a href="graficas.php">Estadísticas Generales</a></li>
             
                    
                  </ul>

                </li>
                <?php
                }
                ?>
                    <!-- <li class="ripple">
                      <a class="tree-toggle nav-header">
                        <span class="fa-diamond fa"></span> Combos
                        <span class="fa-angle-right fa right-arrow text-right"></span>
                      </a>
                      <ul class="nav nav-list tree">
                        <li><a href="combos.php">Nuevo</a></li>
                        <li><a href="listacombos.php">Modificar/Eliminar</a></li>
                      </ul>
                    </li> -->
                    <!-- <li class="ripple"><a class="tree-toggle nav-header">
                    <span class="fa fa-pencil-square"></span> Ui Elements  <span class="fa-angle-right fa right-arrow text-right"></span> </a>
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
                    <li class="ripple"><a class="tree-toggle nav-header"><span class="fa fa-check-square-o"></span> Forms  <span class="fa-angle-right fa right-arrow text-right"></span> </a>
                      <ul class="nav nav-list tree">
                        <li><a href="formelement.html">Form Element</a></li>
                        <li><a href="#">Wizard</a></li>
                        <li><a href="#">File Upload</a></li>
                        <li><a href="#">Text Editor</a></li>
                      </ul>
                    </li>
                    <li class="ripple"><a class="tree-toggle nav-header"><span class="fa fa-table"></span> Tables  <span class="fa-angle-right fa right-arrow text-right"></span> </a>
                      <ul class="nav nav-list tree">
                        <li><a href="datatables.html">Data Tables</a></li>
                        <li><a href="handsontable.html">handsontable</a></li>
                        <li><a href="tablestatic.html">Static</a></li>
                      </ul>
                    </li>
                    <li class="ripple"><a href="calendar.html"><span class="fa fa-calendar-o"></span>Calendar</a></li>
                    <li class="ripple"><a class="tree-toggle nav-header"><span class="fa fa-envelope-o"></span> Mail <span class="fa-angle-right fa right-arrow text-right"></span> </a>
                      <ul class="nav nav-list tree">
                        <li><a href="mail-box.html">Inbox</a></li>
                        <li><a href="compose-mail.html">Compose Mail</a></li>
                        <li><a href="view-mail.html">View Mail</a></li>
                      </ul>
                    </li>
                    <li class="ripple"><a class="tree-toggle nav-header"><span class="fa fa-file-code-o"></span> Pages  <span class="fa-angle-right fa right-arrow text-right"></span> </a>
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
                    </li> -->
                     <!-- <li class="ripple"><a class="tree-toggle nav-header"><span class="fa "></span> MultiLevel  <span class="fa-angle-right fa right-arrow text-right"></span> </a>
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
                    <li><a href="credits.html">Credits</a></li> -->
                  </ul>
                </div>
            </div>
          <!-- end: Left Menu -->
