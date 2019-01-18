   <?php
    session_start();
   $op=$_REQUEST['id'];
                      include '../config/conexion.php';
    if ($op == 1) {
      $consulta1 = "UPDATE sica.estadoinscrip SET estado = '1' WHERE estadoinscrip.id_estadoinscrip = 0";
      $resultado = $conexion->query($consulta1);
      if($resultado){
        include "IB.php";
IB:: insertar($_SESSION["id"],"Aperturó periodo de inscripcion");
        // echo "1";
      }else{
          echo "1";
      }
      
    }else{
        $consulta1 = "UPDATE sica.estadoinscrip SET estado = '0' WHERE estadoinscrip.id_estadoinscrip = 1";
      $resultado = $conexion->query($consulta1); 
      if($resultado){
        // echo "1";
        include "IB.php";
        IB:: insertar($_SESSION["id"],"Cerró periodo de inscripcion");
      }else{
          echo "1";
      } 
     
    }
    ?>