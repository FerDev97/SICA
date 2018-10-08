<?php
//Codigo que muestra solo los errores exceptuando los notice.
error_reporting(E_ALL & ~E_NOTICE);
session_start();

$nombre=$_REQUEST["nombre"];

?>
<!-- start: Header -->
        <nav class="navbar navbar-default header navbar-fixed-top">
          <div class="col-md-12 nav-wrapper">
            <div class="navbar-header" style="width:100%;">
              <div class="opener-left-menu is-open">
                <span class="top"></span>
                <span class="middle"></span>
                <span class="bottom"></span>
              </div>
              <b><img src="../asset/img/logo.png" style="width:60px;height=60px"></b>
                <a href="index.html" class="navbar-brand">
                </a>
              <ul class="nav navbar-nav navbar-right user-nav">
                <li class="user-name"><span><?php echo $_SESSION["usuario"]; ?> </span></li>
                  <li class="dropdown avatar-dropdown">
                   <img src="../asset/img/avatar.jpg" class="img-circle avatar" alt="user name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"/>
                   <ul class="dropdown-menu user-dropdown">
                     <li><a data-toggle="modal" href="#modalTipo"><span class="fa fa-user"></span> Mi Perfil</a></li>
                     <li><a href="#"><span class="fa fa-book"></span> Acerca de</a></li>
                     <li role="separator" class="divider"></li>
                     <li class="more">
                      <ul>
                      
                        <li><a href=""><span class="fa fa-cogs"></span></a></li>
                        <li><a href=""><span class="fa fa-lock"></span></a></li>
                        <li><a href="logout.php"><span class="fa fa-power-off "></span></a></li>
                      </ul>
                    </li>
                  </ul>
                </li>
              </ul>
            </div>
          </div>
        </nav>
      <!-- end: Header -->
 <!-- Modal de Tipo bachillerato-->
 <div class="modal fade" id="modalTipo" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">×</span>
                    <span class="sr-only">Close</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Perfil de Usuario:<?php $nombre ?></h4>
            </div>
            <!-- Modal Body -->
            <div class="modal-body">
                <p class="statusMsg"></p>
                  <!--aqui va el codigo-->
                  <form id="insertarT">
                  <div class="input-group" style="margin-left:75px">
                  <span class="input-group-addon"><i class="fa fa-book"></i></span>
                  <input id="tipom" type="text" style="width: 400px; font-size: 15px;" class="form-control" name="tipom" placeholder="Nuevo tipo de Bachillerato" >
                  </div>
                  <br>
                   <center>
                   <div class="input-group">
                  <button title="Agrega Nueva Opcionel al Sistema" id="guardarT" name="guardarT" style="margin-left:0px;" class="btn btn-info" type="button" >
                  Guardar</button>
                  </div>
                  </center>
                  </form>
            </div>
            <!-- Modal Footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-warning" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
