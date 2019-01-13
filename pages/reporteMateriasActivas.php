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
        $this->Cell(195,5,utf8_decode("Listado de materias activas en el sistema para: ".$op),0,0,"C");
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
        $this->Cell(12,10,"Codigo",1,0,"C");
        $this->Cell(45,10,"Nombre",1,0,"C");
        $this->Cell(60,10,"Docente",1,0,"C");
        $this->Cell(40,10,"Dia",1,0,"C");
        $this->Cell(40,10,"Hora",1,0,"C");
        // $this->Cell(20,10,"Estado",1,0,"C");
        $this->Ln();
    }
 

    function viewTable(){
        $id=$_REQUEST["id"];
 
        $this->SetFont("Times","",11);
                         include '../config/conexion.php';
                      $result = $conexion->query("select m.ccodigo as codigo,. m.eid_materia as id, m.cnombre as materia,m.estado as estado,m.efk_idopcion as op,p.cnombre as docente, h.cdia as dia,h.chora as hora FROM tmaterias as m, tpersonal as p,tpersonal_materia as pm,thorarios as h WHERE p.eid_personal=pm.efk_idpersonal and m.eid_materia=pm.efk_idmateria and h.eid_horario=m.efk_idhorario and m.efk_idopcion=".$id);
                      if ($result) {
                          while ($fila = $result->fetch_object()) {                                          
                              
                              $this->Cell(12,8,$fila->codigo,1,0,"C");
                              $this->Cell(45,8,$fila->materia,1,0,"C"); 
                              $this->Cell(60,8,$fila->docente,1,0,"C");                            
                              $this->Cell(40,8,$fila->dia,1,0,"C");
                              $this->Cell(40,8,$fila->hora,1,0,"C");
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