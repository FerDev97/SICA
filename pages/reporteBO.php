<?php 

require "fpdf.php";

class myPDF extends FPDF{
    
    function header(){
        $id=$_REQUEST["id"];
        $this->Image("../asset/img/logo.png",33,7,30);
        $this->Image("../asset/img/fondo.png",230,6,23);
        $this->SetFont("Arial","B",14);
        $this->SetX(35);
        $this->Cell(215,5,utf8_decode("COMPLEJO EDUCATIVO CATÓLICO"),0,0,"C");
        $this->Ln();
        $this->SetX(35);
        $this->Cell(215,6,'"LA SANTA FAMILIA"',0,0,"C");
        $this->Ln();
        $this->SetX(35);
        $this->SetFont("Times","",12);
        $this->Cell(215,10,"Departamento de San Vicente, Ciudad de San Vicente, 8va Avenida Norte,",0,0,"C");
        $this->Ln(5);
        $this->SetX(35);
        $this->Cell(215,10, "primera calle oriente, Barrio San Francisco.",0,0,"C");
        $this->Ln(5);
        $this->SetX(35);
        $this->Cell(215,10,utf8_decode("Teléfono: 2393-0232"),0,0,"C");
        $this->Ln(5);
        $this->SetX(35);
        $this->Cell(215,10,utf8_decode("Correo electrónico: cec.la_santafamilia@hotmail.com"),0,0,"C");
        $this->Ln();
        $this->SetX(35);
        $this->SetFont("Arial","B",13);
         include '../config/conexion.php';
                      $result = $conexion->query("SELECT * FROM talumno where eid_alumno=".$id);
                      if ($result) {
                          while ($fila = $result->fetch_object()) {
                              $alumno=$fila->cnombre." ".$fila->capellido;
                          }
                        }

        $this->Cell(215,5,utf8_decode("Boleta de notas de bachillerato para el alumno: ".$alumno),0,0,"C");
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
        $this->Cell(54,10,"Materias",1,0,"C");
        $this->Cell(46,10,"Periodo 1",1,0,"C");
        $this->Cell(46,10,"Periodo 2",1,0,"C");
        $this->Cell(46,10,"Periodo 3",1,0,"C");
        $this->Cell(46,10,"Periodo 4",1,0,"C");
        $this->Cell(15,10,"PROM",1,0,"C");
        
        // $this->Cell(20,10,"Estado",1,0,"C");
        $this->Ln();
    }
 

    function viewTable(){
       
        $this->SetFont("Times","B",11);
         $this->Cell(54,10,"",1,0,"C");
         $this->Cell(9,10,"N1",1,0,"C");
         $this->Cell(9,10,"N2",1,0,"C");
         $this->Cell(9,10,"N3",1,0,"C");
         $this->Cell(9,10,"R",1,0,"C");
         $this->Cell(10,10,"P",1,0,"C");
         $this->Cell(9,10,"N1",1,0,"C");
         $this->Cell(9,10,"N2",1,0,"C");
         $this->Cell(9,10,"N3",1,0,"C");
         $this->Cell(9,10,"R",1,0,"C");
         $this->Cell(10,10,"P",1,0,"C");
         $this->Cell(9,10,"N1",1,0,"C");
         $this->Cell(9,10,"N2",1,0,"C");
         $this->Cell(9,10,"N3",1,0,"C");
         $this->Cell(9,10,"R",1,0,"C");
         $this->Cell(10,10,"P",1,0,"C");
         $this->Cell(9,10,"N1",1,0,"C");
         $this->Cell(9,10,"N2",1,0,"C");
         $this->Cell(9,10,"N3",1,0,"C");
         $this->Cell(9,10,"R",1,0,"C");
         $this->Cell(10,10,"P",1,0,"C");         
         $this->Cell(15,10,"PF",1,0,"C");
         $this->Ln();
         $this->SetFont("Times","",11);
        //  CODIGO PARA GENERAL LAS DUPLAS DINAMICAS
         $id=$_REQUEST["id"];
         include '../config/conexion.php';
                      $result = $conexion->query("SELECT * FROM talumno where eid_alumno=".$id);
                      if ($result) {
                          while ($fila = $result->fetch_object()) {
                              $idop=$fila->cbachillerato;
                          }
                        }
                        // Obtenemos las materias que tiene esa opción:
                        $result = $conexion->query("SELECT * FROM tmaterias where efk_idopcion=".$idop);
                      if ($result) {
                          while ($fila = $result->fetch_object()) {
                              $materia=$fila->cnombre;
                              $idmateria=$fila->eid_materia;
                              $this->Cell(54,10,$materia,1,0,"C");
                              
                              // Obtenemos las materias que tiene esa opción:
                        $result2 = $conexion->query("SELECT * FROM talum_mat_not where efk_idalumno=".$id." and efk_idmateria=".$idmateria);
                       if ($result2) {
                          while ($fila2 = $result2->fetch_object()) {
                            // $this->Cell(12,10,$fila2->efk_idnota,1,0,"C");


                            // Ahora que se tiene los id de las notas de ese alumno recorreremos esa tabla
                             $result3 = $conexion->query("SELECT * FROM tnotas where eid_notas=".$fila2->efk_idnota);
                             if ($result3) {
                                while ($fila3 = $result3->fetch_object()) {
                                    $this->Cell(9,10,$fila3->dnota1p1,1,0,"C");
                                    $this->Cell(9,10,$fila3->dnota2p1,1,0,"C");
                                    $this->Cell(9,10,$fila3->dnota3p1,1,0,"C");
                                    $this->Cell(9,10,$fila3->drecuperacionp1,1,0,"C");
                                    $this->Cell(10,10,$fila3->dpromediop1,1,0,"C");
                                    $this->Cell(9,10,$fila3->dnota1p2,1,0,"C");
                                    $this->Cell(9,10,$fila3->dnota2p2,1,0,"C");
                                    $this->Cell(9,10,$fila3->dnota3p2,1,0,"C");
                                    $this->Cell(9,10,$fila3->drecuperacionp2,1,0,"C");
                                    $this->Cell(10,10,$fila3->dpromediop2,1,0,"C");
                                    $this->Cell(9,10,$fila3->dnota1p3,1,0,"C");
                                    $this->Cell(9,10,$fila3->dnota2p3,1,0,"C");
                                    $this->Cell(9,10,$fila3->dnota3p3,1,0,"C");
                                    $this->Cell(9,10,$fila3->drecuperacionp3,1,0,"C");
                                    $this->Cell(10,10,$fila3->dpromediop3,1,0,"C");
                                    $this->Cell(9,10,$fila3->dnota1p4,1,0,"C");
                                    $this->Cell(9,10,$fila3->dnota2p4,1,0,"C");
                                    $this->Cell(9,10,$fila3->dnota3p4,1,0,"C");
                                    $this->Cell(9,10,$fila3->drecuperacionp4,1,0,"C");
                                    $this->Cell(10,10,$fila3->dpromediop4,1,0,"C");

                                    $promedio=(($fila3->dpromediop1 + $fila3->dpromediop2 + $fila3->dpromediop3 + $fila3->dpromediop4)/4);
        $promedio=round($promedio * 100) / 100;
                                    $this->Cell(15,10,$promedio,1,0,"C");
                                }
                              }
                          }
                        }





                              $this->Ln();
                          }
                        }

       
        
       
    }
}
$pdf= new myPDF();

$pdf->AliasNbPages();
$pdf->AddPage('L','Letter',0);
$pdf->headerTable();
$pdf->viewTable();
$pdf->Output();
?>