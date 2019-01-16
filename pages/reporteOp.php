<?php 


require "fpdf.php";

class myPDF extends FPDF{
    
    function header(){
          $id=$_REQUEST["id"];
 

                      include '../config/conexion.php';
                      $result2 = $conexion->query("select op.eid_opcion as id, gr.cgrado as grado,ba.cnombe as nombre, se.cseccion as seccion from topciones as op, tbachilleratos as ba, tsecciones as se, tgrado as gr, ttipobachillerato as ti where op.efk_bto=ba.eid_bachillerato and op.efk_grado=gr.eid_grado and op.efk_seccion=se.eid_seccion and ti.eid_tipo=ba.efk_tipo and op.eid_opcion=".$id);
                      if ($result2) {

                        while ($fila2 = $result2->fetch_object()) {
                         
                             $op=$fila2->grado." anio ".$fila2->nombre." seccion ".$fila2->seccion;
                        
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
        $this->Cell(195,5,utf8_decode("Listado de alumnos en el sistema para: ".$op),0,0,"C");
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
        $this->Cell(30,10,"NIE",1,0,"C");
        $this->Cell(50,10,"Nombre",1,0,"C");
        $this->Cell(70,10,"Apellido",1,0,"C");
        $this->Cell(40,10,"Sexo",1,0,"C");
        
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
                      $result = $conexion->query("select a.cnie as nie,a.cnombre as nombre,a.capellido as apellido,a.sexo as sexo,a.cbachillerato as op FROM talumno as a WHERE  a.anio='".$anioActivo."' and a.cbachillerato=".$id);
                      if ($result) {
                          while ($fila = $result->fetch_object()) {                                          
                              
                              $this->Cell(30,8,$fila->nie,1,0,"C");
                              $this->Cell(50,8,$fila->nombre,1,0,"C"); 
                              $this->Cell(70,8,$fila->apellido,1,0,"C");
                              if($fila->sexo==0){
                                $this->Cell(40,8,"Masculino",1,0,"C");

                              }else{
                                $this->Cell(40,8,"Femenino",1,0,"C");

                              }                             
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