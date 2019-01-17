   <?php
    
   $op=$_REQUEST['id'];
                      include '../config/conexion.php';
    if ($op == 1) {
      $consulta1 = "UPDATE sica.estadoinscrip SET estado = '1' WHERE estadoinscrip.id_estadoinscrip = 0";
      $resultado = $conexion->query($consulta1);
      if($resultado){
        // echo "1";
      }else{
          echo "1";
      }
      
    }else{
        $consulta1 = "UPDATE sica.estadoinscrip SET estado = '0' WHERE estadoinscrip.id_estadoinscrip = 1";
      $resultado = $conexion->query($consulta1); 
      if($resultado){
        // echo "1";
      }else{
          echo "1";
      } 
     
    }
    ?>