<?php 

require "fpdf.php";

class myPDF extends FPDF{
    
    function header(){
          
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
        $this->Cell(195,5,utf8_decode("Reporte lista de personal inactivo."),0,0,"C");
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
        $this->Cell(23,10,"DUI",1,0,"C");
        $this->Cell(45,10,"Nombre",1,0,"C");
        $this->Cell(45,10,"Apellido",1,0,"C");
        $this->Cell(75,10,"Correo",1,0,"C");
        
        // $this->Cell(20,10,"Estado",1,0,"C");
        $this->Ln();
    }
 

    function viewTable(){
       
        $this->SetFont("Times","",11);
                         include '../config/conexion.php';
                      $result = $conexion->query("select cdui as dui, cnombre as nombre , capellido as apellido ,ccorreo as correo  from tpersonal where iestado='0'");
                      if ($result) {
                          while ($fila = $result->fetch_object()) {
                             
                            $this->Cell(23,8,$fila->dui,1,0,"L");
                            $this->Cell(45,8,$fila->nombre,1,0,"L");
                            $this->Cell(45,8,$fila->apellido,1,0,"L");
                            $this->Cell(75,8,$fila->correo,1,0,"L");

                              
                           
                              
                             
                            //    if ($fila->estado==1) {
                            //     $this->Cell(20,8,"Activa",1,0,"C");
                            //   }else{
                            //     $this->Cell(20,8,"Inactiva",1,0,"C");  
                            //   }
                              $this->Ln();
                            
                          }
                          $this->SetFont("Times","B",11);
                          

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