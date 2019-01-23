<?php 

require "fpdf.php";

class myPDF extends FPDF{
    
    function header(){
        $id=$_REQUEST["id"];
        $idop=$_REQUEST["idop"];

                      include '../config/conexion.php';
                      $result2 = $conexion->query("select a.cnombre as nombre,a.capellido as apellido from talumno as a where a.eid_alumno=".$id);
                      if ($result2) {

                        while ($fila2 = $result2->fetch_object()) {
                            $alumno=$fila2->nombre." ".$fila2->apellido;

                            //  $op=$fila2->grado." anio ".$fila2->nombre." seccion ".$fila2->seccion;         
                           }
                      }else{
                               echo "Error";
                           }

        include '../config/conexion.php';
                      $result2 = $conexion->query("select op.eid_opcion as id, gr.cgrado as grado,ba.cnombe as nombre, se.cseccion as seccion from topciones as op, tbachilleratos as ba, tsecciones as se, tgrado as gr, ttipobachillerato as ti where op.efk_bto=ba.eid_bachillerato and op.efk_grado=gr.eid_grado and op.efk_seccion=se.eid_seccion and ti.eid_tipo=ba.efk_tipo and op.eid_opcion=".$idop);
                      if ($result2) {

                        while ($fila2 = $result2->fetch_object()) {
                         
                             $op=$fila2->grado." año ".$fila2->nombre." sección ".$fila2->seccion;
                        
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
        
        $this->Cell(195,5,utf8_decode("Comprobante de inscripción."),0,0,"C");
        $this->SetFont("Arial","",13);
        $this->Ln(20);
         $this->Cell(225,5,utf8_decode("El alumno ".$alumno." fue inscrito  exitosamente en la opción: "),0,0,"L");
        $this->Ln();
        date_default_timezone_set('America/El_Salvador');
        $date = date('d/m/Y', time());
        $hour = date('h:i:s a', time());
        $this->Cell(225,7,utf8_decode("".$op." el ".$date. " a las ".$hour),0,0,"L");
         $this->Ln();
         $this->Ln();
         $this->Ln();
        $this->Cell(225,9,utf8_decode("Docente:________________________                      Responsable:___________________"),0,0,"L");
      
    }
    function footer(){
        $this->SetY(-160);
        $this->SetFont("Arial","",8);
        $this->Cell(0,10,"Pagina".$this->PageNo()."/{nb}",0,0,"C");
        $this->SetX(-45);
        date_default_timezone_set('America/El_Salvador');
        $date = date('d/m/Y h:i:s a', time());
        $this->Cell(0,10,$date,0,0,"C");

    }
    
}
$pdf= new myPDF();

$pdf->AliasNbPages();
$pdf->AddPage('P','Letter',0);

$pdf->Output();
?>