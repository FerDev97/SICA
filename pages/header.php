<?php
//Codigo que muestra solo los errores exceptuando los notice.
error_reporting(E_ALL & ~E_NOTICE);
session_start();

$nombre=$_REQUEST["nombre"];
$usuario=$_SESSION["usuario"];

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
              <b><!--<img src="../asset/img/logo.png" style="width:60px;height=60px">--></b>
                <a href="index.html" class="navbar-brand">
                </a>
              <ul class="nav navbar-nav navbar-right user-nav">
                <li class="user-name"><span><?php echo $_SESSION["usuario"]; ?> </span></li>
                  <li class="dropdown avatar-dropdown">
                   <img src="../asset/img/avatar.jpg" class="img-circle avatar" alt="user name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"/>
                   <ul class="dropdown-menu user-dropdown">
                     <li><a data-toggle="modal" href="#modalTipo"><span class="fa fa-user"></span> Mi Perfil</a></li>
                   
                     <li role="separator" class="divider"></li>
                     <li class="more">
                      <ul>
                      
                        
                        <li><a title="Cerrar sesion" href="logout.php"><span class="fa fa-power-off "></span></a></li>
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
               
                <?php
                
                   include "../config/conexion.php";
                   $result = $conexion->query("SELECT tpersonal.cnombre,capellido,tusuarios.cusuario,etipo FROM tusuarios INNER JOIN tpersonal ON tusuarios.efk_personal = tpersonal.eid_personal where cusuario='$usuario'");
                   if ($result) {
                     while ($fila = $result->fetch_object()) {
                      $apellido=$fila->capellido; 
                      $nom=$fila->cnombre;
                      $usua=$fila->cusuario;
                      $tipo=$fila->etipo;
                      }
                    }
                  ?>
                <h4 class="modal-title" id="myModalLabel">Perfil de Usuario</h4>
            </div>
            <!-- Modal Body -->
            <div class="modal-body">
                <p class="statusMsg"></p>
                  <!--aqui va el codigo-->
                  <form id="insertarT">
                  <center>
                  <i style="font-size:75px" class="fa fa-user"></i>
                  </center>
                  
                  <br><br>
                  <label style="margin-left:75px; font-size:15px">Usuario:</label>
                  <div class="input-group" style="margin-left:75px">
                  
                  <input id="tipom" type="text" style="width: 400px; font-size: 15px;" class="form-control" name="tipom" value="<?php echo $usua;?>" readonly>
                  </div>
                    <br>
                    <label style="margin-left:75px; font-size:15px">Nombres:</label>
                  <div class="input-group" style="margin-left:75px">
                  <input id="tipom" type="text" style="width: 400px; font-size: 15px;" class="form-control" name="tipom" value="<?php echo $nom;?>" readonly>
                  </div>
                  <br>
                  <label style="margin-left:75px; font-size:15px">Apellidos:</label>
                  <div class="input-group" style="margin-left:75px">
                  <input id="tipom" type="text" style="width: 400px; font-size: 15px;" class="form-control" name="tipom" value="<?php echo $apellido;?>" readonly>
                  </div>
                  <br>
                  <label style="margin-left:75px; font-size:15px">Tipo de Usuario:</label>
                  <?php
                  if($tipo==1){?>
                    <div class="input-group" style="margin-left:75px">
                    <input id="tipom" type="text" style="width: 400px; font-size: 15px;" class="form-control" name="tipom" value="Administrador" readonly>
                    </div>
                  <?php
                  }else if($tipo==0){
                  ?>
                  <div class="input-group" style="margin-left:75px">
                  <input id="tipom" type="text" style="width: 400px; font-size: 15px;" class="form-control" name="tipom" value="Docente" readonly>
                  </div>
                  <?php
                  }
                  ?>
                  <br>
                  
                  </form>
            </div>
            <!-- Modal Footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-warning" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
<?php
function mensajes($texto)
{
    echo "<script type='text/javascript'>";
    echo "alert('$texto');";
    echo "</script>";
}
?>