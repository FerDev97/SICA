<?php 


require "fpdf.php";

class myPDF extends FPDF{
    
    function header(){
          $id=$_REQUEST["id"];
 

                      include '../config/conexion.php';
                      $result2 = $conexion->query("SELECT
                      tpersonal.cnombre,
                      tusuarios.cusuario,
                      tusuarios.eid_usuario,
                      tpersonal.capellido
                      FROM
                      tusuarios
                      INNER JOIN tpersonal ON tusuarios.efk_personal = tpersonal.eid_personal where tusuarios.eid_usuario=".$id);
                      if ($result2) {

                        while ($fila2 = $result2->fetch_object()) {
                         
                             $op=$fila2->cusuario." - ".$fila2->cnombre." ".$fila2->capellido."";
                        
                           }
                      }else{
                               echo "Error";
                           }
        $this->Image("../asset/img/logo.png",5,7,30);
        $this->Image("../asset/img/fondo.png",180,6,23);
        $this->SetFont("Arial","B",14);
        $this->Cell(195,5,utf8_decode("COMPLEJO EDUCATIVO CATÓLICO"),0,0,"C");
        $this->Ln();
        $this->Cell(195,6,'"LA SANTA FAMILIA"',0,0,"C");
        $this->Ln();
        $this->SetFont("Times","",12);
        $this->Cell(195,10,"Departamento de San Vicente, Ciudad de San Vicente, 8va Avenida Norte,",0,0,"C");
        $this->Ln(5);
        $this->Cell(195,10, "primera calle oriente, Barrio San Francisco.",0,0,"C");
        $this->Ln(5);
        $this->Cell(195,10,utf8_decode("Teléfono: 2393-0232"),0,0,"C");
        $this->Ln(5);
        $this->Cell(195,10,utf8_decode("Correo electrónico: cec.la_santafamilia@hotmail.com"),0,0,"C");
        $this->Ln();
        $this->SetFont("Arial","B",13);
        $this->Cell(195,5,utf8_decode("Bitacora de Usuario: ".$op),0,0,"C");
        $this->Ln();
    }
    function footer(){
        $this->SetY(-15);
        $this->SetFont("Arial","",8);
        $this->Cell(0,10,"Pagina".$this->PageNo()."/{nb}",0,0,"C");
        $this->SetX(-45);
        date_default_timezone_set('America/El_Salvador');
        $date = date('d/m/Y h:i:s a', time());
        $this->Cell(0,10,$date,0,0,"C");

    }
    function headerTable(){
        $this->Ln();
        $this->SetFont("Times","B",11);
        $this->Cell(20,10,"Usuario",1,0,"C");
        $this->Cell(35,10,"Nombre",1,0,"C");
        $this->Cell(35,10,"Apellido",1,0,"C");
        $this->Cell(25,10,"Fecha",1,0,"C");
        $this->Cell(75,10,"Descripcion",1,0,"C");
        
        // $this->Cell(20,10,"Estado",1,0,"C");
        $this->Ln();
    }
 

    function viewTable(){
        include "../config/conexion.php";
$result = $conexion->query("select * from tanio where iestado=1");
if($result)
{
  while ($fila=$result->fetch_object()) {
    $anioActivo=$fila->eid_anio;
    $clausurado=$fila->eclausura;
  }
}
        $id=$_REQUEST["id"];
 
        $this->SetFont("Times","",11);
                         include '../config/conexion.php';
                         if($id==""){
                            $result = $conexion->query("SELECT tbitacora.efk_idusuario,dtfecha,cdescripcion,tpersonal.cnombre,capellido,tusuarios.cusuario FROM tbitacora INNER JOIN tusuarios ON tbitacora.efk_idusuario = tusuarios.eid_usuario INNER JOIN tpersonal ON tusuarios.efk_personal = tpersonal.eid_personal Order by eid_bitacora");
                         }else{
                            $result = $conexion->query("SELECT tbitacora.efk_idusuario,dtfecha,cdescripcion,tpersonal.cnombre,capellido,tusuarios.cusuario FROM tbitacora INNER JOIN tusuarios ON tbitacora.efk_idusuario = tusuarios.eid_usuario INNER JOIN tpersonal ON tusuarios.efk_personal = tpersonal.eid_personal where tusuarios.eid_usuario='".$id."' Order by eid_bitacora");
                         }
                    
                      if ($result) {
                          while ($fila = $result->fetch_object()) {                                          
                              
                              $this->Cell(20,8,$fila->cusuario,1,0,"C");
                              $this->Cell(35,8,$fila->cnombre,1,0,"C"); 
                              $this->Cell(35,8,$fila->capellido,1,0,"C");
                              $newf=date('d/m/Y', strtotime($fila->dtfecha));
                              $this->Cell(25,8,$newf,1,0,"C");
                                $this->Cell(75,8,$fila->cdescripcion,1,0,"C");

                          

                                                          
                              //$this->Cell(40,8,$fila->sexo,1,0,"C");
                             
                            //    if ($fila->estado==1) {
                            //     $this->Cell(20,8,"Activa",1,0,"C");
                            //   }else{
                            //     $this->Cell(20,8,"Inactiva",1,0,"C");  
                            //   }
                              $this->Ln();
                            
                          }
                       }
                    
       
        
       
    }
}
$pdf= new myPDF();

$pdf->AliasNbPages();
$pdf->AddPage('P','Letter',0);
$pdf->headerTable();
$pdf->viewTable();
$pdf->Output();
?>