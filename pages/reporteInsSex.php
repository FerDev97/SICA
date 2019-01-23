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
        $this->Cell(195,5,utf8_decode("Reporte estadistico de alumnos por sexo "),0,0,"C");
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
        $this->Cell(97,10,"Sexo",1,0,"C");
        $this->Cell(97,10,"Cantidad",1,0,"C");
        
        // $this->Cell(20,10,"Estado",1,0,"C");
        $this->Ln();
    }
 

    function viewTable(){
       $total=0;
        $this->SetFont("Times","",11);
                         include '../config/conexion.php';
                      $result = $conexion->query("select sexo, count(sexo) as total from talumno group by sexo having count(sexo)>1");
                      if ($result) {
                          while ($fila = $result->fetch_object()) {
                              if($fila->sexo==0){
                                $this->Cell(97,8,"Masculino",1,0,"C");

                              }else{
                                $this->Cell(97,8,"Femenino",1,0,"C");

                              } 
                              $this->Cell(97,8,$fila->total,1,0,"C");
                            $total=$total+$fila->total;
                              
                             
                            //    if ($fila->estado==1) {
                            //     $this->Cell(20,8,"Activa",1,0,"C");
                            //   }else{
                            //     $this->Cell(20,8,"Inactiva",1,0,"C");  
                            //   }
                              $this->Ln();
                            
                          }
                          $this->SetFont("Times","B",11);
                          $this->Cell(97,8,"Total",1,0,"C");
                          $this->Cell(97,8,$total,1,0,"C");

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