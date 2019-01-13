   <?php
$select="<select id='docente'   class='select2 show-tick' style='width: 568px; font-size: 15px' name='docente'>";
$select=$select."<option value=''>Seleccione Docente</option>";
                            
                      include '../config/conexion.php';
                      $result = $conexion->query("select p.eid_personal as id, p.cnombre as nombre, p.capellido as apellido from tpersonal as p, tcargos as c where p.efk_idcargo=c.eid_cargo and c.ccargo='Docente' and p.iestado='1'");
                      if ($result) {

                        while ($fila = $result->fetch_object()) {
                          $select=$select."<option value='".$fila->id."'>".$fila->nombre."</option>";
                         
                           }
                      }
                      $select=$select."</select>";
                      echo $select;
                       ?>
                                       
                              
                              