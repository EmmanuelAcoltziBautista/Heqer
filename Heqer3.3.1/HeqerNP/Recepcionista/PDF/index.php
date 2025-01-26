<?php
 session_start();
//require_once './fpdf/fpdf.php';
require_once './fpdf/html2pdf.php';
/*
class PDF extends FPDF
{
// Page header
function Header()
{
    // Logo
   
    $pdf->Image('Header.png',0,0,210);
    // Arial bold 15
    $pdf->SetFont('Arial','B',15);
    // Move to the right
    $pdf->Cell(80);
    // Title
    $pdf->SetTextColor(255,255,255);
    $pdf->Cell(30,10,'Resultados de Analisis Clinico',0,0,'C');
    // Line break
    $pdf->Ln(20);
}
function Setter(){
 
$arri=$_SESSION["arr"];
$en=$_SESSION["en"];
$con=$_SESSION["con"];
    $pdf->Cell(30,10,'dsa'.$arri,0,0,'C');
    $pdf->Ln(20);
}
// Page footer
function Footer()
{
 
    // Position at 1.5 cm from bottom
    $pdf->SetX(500);
    $pdf->SetTextColor(255,255,255);
    $pdf->SetY(-15);
    // Arial italic 8
    $pdf->SetFont('Arial','I',8);
    // Page number
    
    $pdf->Image('footer.png',0,271,210);
    $pdf->Cell(0,10,'Page '.$pdf->PageNo().'/{nb}',0,0,'C');
    $pdf->SetLineWidth(1);
    // Title
   
}
}*/
//$img=$_SESSION["img"];
$arri=$_SESSION["arr"];
$en=$_SESSION["en"];
$con=$_SESSION["con"];
$footerEstudio=$_SESSION["footerEstudio"];
// Instanciation of inherited class
$pdf=new PDF_HTML();
//$pdf = new PDF();

//$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',15);
//$pdf->Cell(0,10,"",0,1,'R',0);
$pdf->Image('Header.png',0,0,210);
$pdf->SetFont('Arial','B',15);
    // Move to the right
    $pdf->Cell(80);
//Title
$pdf->SetTextColor(255,255,255);
$pdf->Cell(30,10,'Resultados de Analisis Clinico',0,0,'C');
$pdf->SetTextColor(0,0,0);
$pdf->Multicell(0, 10, "");
$pdf->Multicell(0, 10, "");
$pdf->Multicell(0, 10, "");

$pdf->SetFillColor(220,220,255);

$pdf->Cell(0,10,$arri,0,1,'R',1);

//$pdf->Multicell(0, 10, "".$arri);
$pdf->WriteHTML($en);
$pdf->Multicell(0, 10, "");

$pdf->WriteHTML($con);

$pdf->SetX(500);
$pdf->SetTextColor(0,0,0);
$pdf->SetY(-15);


// Arial italic 8
$pdf->SetFont('Arial','I',8);
// Page number
$pdf->Cell(0,-30,$footerEstudio);

$pdf->Image('footer.png',0,271,210);
$pdf->SetLineWidth(1);

$pdf->Output();
//exit;
?>