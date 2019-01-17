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
        $this->Cell(195,5,utf8_decode("Reporte de opciones de bachillerato activas "),0,0,"C");
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
        $this->Cell(40,10,"Codigo",1,0,"C");
        $this->Cell(20,10,"Grado",1,0,"C");
        $this->Cell(65,10,"Nombre",1,0,"C");
        $this->Cell(50,10,"Tipo",1,0,"C");
        $this->Cell(20,10,"Seccion",1,0,"C");
        
        // $this->Cell(20,10,"Estado",1,0,"C");
        $this->Ln();
    }
 

    function viewTable(){
       $total=0;
        $this->SetFont("Times","",11);
                         include '../config/conexion.php';
                      $result = $conexion->query("SELECT
                      tgrado.cgrado,
                      tbachilleratos.cnombe,ccodigo,
                      tsecciones.cseccion,
                      ttipobachillerato.ctipo,
                      topciones.eestado,eid_opcion
                      FROM
                      topciones
                      INNER JOIN tgrado ON topciones.efk_grado = tgrado.eid_grado
                      INNER JOIN tbachilleratos ON topciones.efk_bto = tbachilleratos.eid_bachillerato
                      INNER JOIN tsecciones ON topciones.efk_seccion = tsecciones.eid_seccion
                      INNER JOIN ttipobachillerato ON tbachilleratos.efk_tipo = ttipobachillerato.eid_tipo where topciones.eestado='1' and tbachilleratos.eestado='1' ORDER BY eid_grado");
                      if ($result) {
                          while ($fila = $result->fetch_object()) {
                              
                            $this->Cell(40,8,$fila->ccodigo,1,0,"L");
                            $this->Cell(20,8,$fila->cgrado,1,0,"L");
                            $this->Cell(65,8,$fila->cnombe,1,0,"L");
                            $this->Cell(50,8,$fila->ctipo ,1,0,"L");
                            $this->Cell(20,8,$fila->cseccion ,1,0,"L");


                              
                                

                              
                              
                              
                             
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