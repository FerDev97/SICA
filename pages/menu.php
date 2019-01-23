<?php
include "../config/conexion.php";
$result = $conexion->query("select * from tanio where iestado=1");
if($result)
{
  while ($fila=$result->fetch_object()) {
    $anioActivo=$fila->eid_anio;
    $clausurado=$fila->eclausura;
    $anio=$fila->canio;
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
<script>
function backup(){
  var op="Hola";
   $.ajax(
            {
                data:op,
                url:'myphp-backup.php',
                type:'post',
                beforeSend:function(){
                   let timerInterval
Swal({
  title: '¡Respaldando Base de datos!',
  html: 'Por favor espere <strong></strong>.',
  timer: 2000,
  onBeforeOpen: () => {
    Swal.showLoading()
    timerInterval = setInterval(() => {
      Swal.getContent().querySelector('strong')
        .textContent = Swal.getTimerLeft()
    }, 100)
  },
  onClose: () => {
    clearInterval(timerInterval)
  }
}).then((result) => {
  if (
    // Read more about handling dismissals
    result.dismiss === Swal.DismissReason.timer
  ) {
    console.log('I was closed by the timer')
  }
})
                },
                success:function(response) {
                    // alert(response);
                    sweetGuardo("Se hizo un respaldo de la BD exitosamente.");
                }
            }

        );
                         
}
</script>
            <div id="left-menu">
              <div class="sub-left-menu scroll">
                <ul class="nav nav-list">
                    <li><div class="left-bg"></div></li>
                    <li class="time">
                      <h1 class="animated fadeInLeft">21:00</h1>
                      <p class="animated fadeInRight">Sat,October 1st 2029</p>
                    </li>
                    <li class="ripple">
                  <a class="tree-toggle nav-header">
                    <span class="fa fa-users"></span> Administración
                    <span class="fa-angle-right fa right-arrow text-right"></span>
                  </a>
                  <ul class="nav nav-list tree">
                  <li><a href="fanio.php">Año Escolar Activo</a></li>
                  <?php 
                      if($clausurado==0){
                      ?>
                        <li><a href="permisos.php">Permisos Temporales</a></li>
                      <?php 
                      }
                      ?>
                   
                     <!-- <li><a href="cadministradores.php">Lista de administradores</a></li> -->
                   
              
                 </ul>
                </li>
                <li class="active ripple">
                <?php 
                      if($clausurado==0){
                      ?>
                        <a class="tree-toggle nav-header"><span class="fa fa-edit"></span> Inscripción 
                        <?php 
                      }else{
                      ?>
                      <a class="tree-toggle nav-header"><span class="fa fa-edit"></span> Inscripción <?php echo $anio;?>
                      <?php
                       }
                       ?>


                  
                    <span class="fa-angle-right fa right-arrow text-right"></span>
                  </a>
                  <ul class="nav nav-list tree">
                  <?php 
                      if($clausurado==0){
                      ?>
                         <li><a href="gestionarInscripcion.php">Gestionar proceso</a></li>
                      <?php 
                      }
                      ?>
                     
                      <?php 
                      if($clausurado==0&&$estadoins==1){
                      ?>
                      <li><a href="ingresoAlumno.php">Realizar inscripción</a></li>
                      <?php 
                      }
                      ?>
                      <li><a href="listaalumnos.php">Lista de Alumnos Inscritos</a></li>
                      <li><a href="busquedafamiliar.php">Búsqueda de Alumno por Familiar</a></li>
                      <?php 
                      if($clausurado==0){
                      ?>
                    
                      <li><a href="nomina.php">Emitir Nomina de alumnos</a></li>
                     
                      <li><a href="graficas.php">Estadisticas</a></li>
                      <?php 
                      }
                      ?>
                      
                  </ul>
                </li>
                <li class="ripple">
                      <a class="tree-toggle nav-header">
                      <?php 
                      if($clausurado==0){
                      ?>
                        <span class="fa fa-list-alt"></span> Control de Notas
                        <?php 
                      }else{
                      ?>
                      <span class="fa fa-list-alt"></span> Notas <?php echo $anio;?>
                      <?php
                       }
                       ?>
                        <span class="fa-angle-right fa right-arrow text-right"></span>
                      </a>
                      <ul class="nav nav-list tree">
                      <?php 
                      if($clausurado==0){
                      ?>
                      <li><a href="fperiodo.php">Gestión de Periodos</a></li>
                        <li><a href="cnotas.php">Registro de Notas</a></li>
                        <?php 
                      }?>
 <li><a href="notasParciales.php">Notas Parciales</a></li>
                  
                      <?php 
                      if($clausurado==0){
                      ?>
                       
                       
                        <?php 
                      }
                      ?>
                      
                     
                      
                      </ul>
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
                <?php 
                      if($clausurado==0){
                      ?>
                <li class="ripple">
                  <a class="tree-toggle nav-header">
                    <span class="fa fa-graduation-cap"></span> Opciones
                    <span class="fa-angle-right fa right-arrow text-right"></span>
                  </a>
                  <ul class="nav nav-list tree">
                 
                  <li><a href="fagregaropcion.php">Mantenimiento Opción</a></li>
                    <li><a href="fopciones.php">Gestionar Opciones</a></li>
                    <li><a href="listaOpciones.php">Opciones Activas</a></li>
                    <li><a href="listaOpcionesIna.php">Opciones Inactivas</a></li>
               
                  </ul>
                </li>
              
                <li class="ripple">
                  <a class="tree-toggle nav-header">
                    <span class="fa fa-book"></span> Materias
                    <span class="fa-angle-right fa right-arrow text-right"></span>
                  </a>
                 
                  <ul class="nav nav-list tree">
                 
                    <li><a href="materias.php">Agregar Nuevo</a></li>
                    <li><a href="cmaterias.php">Lista de materias</a></li>
                    <li class="ripple">
                          <a class="sub-tree-toggle nav-header">
                            <span class="fa fa-calendar"></span> Horarios
                            <span class="fa-angle-right fa right-arrow text-right"></span>
                          </a>
                          <ul class="nav nav-list sub-tree">
                            <li><a href="horarioGeneral.php">Agregar Horario</a></li>
                            <li><a href="listaHorarios.php">Lista de Horarios</a></li>    
                                 
                          </ul>
                    </li>
                  </ul>

                </li>
                
                <li class="ripple">
                  <a class="tree-toggle nav-header">
                    <span class="fa-users fa"></span> Personal
                    <span class="fa-angle-right fa right-arrow text-right"></span>
                  </a>
                  <ul class="nav nav-list tree">
                    <li><a href="fpersonal.php">Agregar Nuevo</a></li>
                    <li><a href="listapersonal.php">Personal Activo</a></li>
                    <li><a href="listapersonalinactivo.php">Personal Inactivo</a></li>
                    <li><a href="fcargo.php">Cargos</a></li>
                  </ul>

                </li>
               
                <li class="ripple">
                  <a class="tree-toggle nav-header">
                    <span class="fa-user fa"></span> Usuarios
                    <span class="fa-angle-right fa right-arrow text-right"></span>
                  </a>
                  <ul class="nav nav-list tree">
                    <li><a href="fusuario.php">Agregar Nuevo</a></li>
                    <li><a href="listaUsuariosActivos.php">Usuarios Activos</a></li>
                    <li><a href="listaUsuariosInactivos.php">Usuarios Inactivos</a></li>
                    
                  </ul>
                

                </li>
               
                
                     
                    <li class="ripple">
                      <a class="tree-toggle nav-header">
                        <span class="fa fa-lock "></span> Seguridad

                        <span class="fa-angle-right fa right-arrow text-right"></span>
                      </a>
                      <ul class="nav nav-list tree">
                        <li><a href="bitacora.php">Bitácora</a></li>
                        <li><a onclick="backup();">Backup</a></li>
                        <li><a href="restaurar.php">Restaurar</a></li>
                        
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
