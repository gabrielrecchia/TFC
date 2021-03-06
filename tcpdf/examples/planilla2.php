<?php

require_once('../config/lang/eng.php');
require_once('../tcpdf.php');

// extend TCPF with custom functions
class MYPDF extends TCPDF {

    // Load table data from file
    public function LoadData($file) {
        // Read file lines
        $lines = file($file);
        $data = array();
        foreach ($lines as $line) {
            $data[] = explode(';', chop($line));
        }
        return $data;
    }

    // Colored table
    public function ColoredTable($data) {
        //Seteo colores
        $this->SetFillColor(255, 255, 255);
        $this->SetLineWidth(0.3);
        $this->SetFont('', 'B');
        
        
        // Equipo
        $this->Cell(80, 7, 'Equipo: Dragones', 0, 0, '', 1);
        $this->Cell(80, 7, 'Arquero:', 0, 0, '', 1);
        $this->Ln();
        $this->Cell(80, 7, 'Delegado: Dragones', 0, 0, '', 1);
        $this->Cell(80, 7, 'Goles en contra:', 0, 0, '', 1);
        $this->Ln();
        $this->Ln();
        
        
        // Jugadores
        $this->Cell(80, 7, 'Jugadores', 1, 0, 'C', 1);
        $this->Cell(10, 7, 'Num', 1, 0, 'C', 1);
        $this->Cell(10, 7, 'G', 1, 0, 'C', 1);
        $this->Cell(10, 7, 'TA', 1, 0, 'C', 1);
        $this->Cell(10, 7, 'TR', 1, 0, 'C', 1);
        $this->Ln();
        $this->SetFont('');
        // Data Jugadores
        $i = 0;
        foreach ($data as $row) {
            $this->Cell(80, 6, $row[0], 'LRB', 0, 'L', false);
            $this->Cell(10, 6, '', 'LRB', 0, 'L', false);
            $this->Cell(10, 6, '', 'LRB', 0, 'L', false);
            $this->Cell(10, 6, '', 'LRB', 0, 'R', false);
            $this->Cell(10, 6, '', 'LRB', 0, 'R', false);
            
            if($i==0){
                $this->Cell(38, 6, 'Monto abonado:', '', 0, 'R', false);
            }
            if($i==2){
                $this->Cell(20, 6, 'Firma:', '', 0, 'R', false);
            }
            
            $this->Ln();
            $i++;
        }
        
        $this->Ln();
//        $this->Ln();
    }

}

// create new PDF document
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
//$pdf->SetCreator(PDF_CREATOR);
//$pdf->SetAuthor('Nicola Asuni');
//$pdf->SetTitle('TCPDF Example 011');
//$pdf->SetSubject('TCPDF Tutorial');
//$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data
$pdf->SetHeaderData('', '', 'Torneo: Torneo C', 'Partido: Dragones vs Dragons'.'     Fecha: 12/12/2013');

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', 20));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
//$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

//set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
//$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

//set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

//set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

//set some language-dependent strings
$pdf->setLanguageArray($l);

// ---------------------------------------------------------
// set font
$pdf->SetFont('helvetica', '', 12);

// add a page
$pdf->AddPage();

//Column titles

//Data loading
$data = $pdf->LoadData('../cache/table_data_demo.txt');

// Cargar Equipo 1
$pdf->ColoredTable($data);

// Cargar Equipo 2
$pdf->ColoredTable($data);

// ---------------------------------------------------------
//Close and output PDF document
$pdf->Output('example_011.pdf', 'I');

//============================================================+
// END OF FILE                                                
//============================================================+
