<?php
 session_start();
require_once './fpdf/fpdf.php';
//require_once './fpdf/html2pdf.php';

class PDF extends FPDF
{
// Page header
function Header()
{
    // Logo
   
    $this->Image('Header.png',0,0,210);
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Move to the right
    $this->Cell(80);
    // Title
    $this->SetTextColor(255,255,255);
    $this->Cell(30,10,'Resultados de Analisis Clinico',0,0,'C');
    // Line break
    $this->Ln(20);
}
function Setter(){
 
$arri=$_SESSION["arr"];
$en=$_SESSION["en"];
$con=$_SESSION["con"];
    $this->Cell(30,10,'dsa'.$arri,0,0,'C');
    $this->Ln(20);
}
// Page footer
function Footer()
{
 
    // Position at 1.5 cm from bottom
    $this->SetX(500);
    $this->SetTextColor(255,255,255);
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Page number
    
    $this->Image('footer.png',0,271,210);
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
    $this->SetLineWidth(1);
    // Title
   
}
}
$arri=$_SESSION["arr"];
$en=$_SESSION["en"];
$con=$_SESSION["con"];

// Instanciation of inherited class
//$pdf=new PDF_HTML()
$pdf = new PDF();

$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',15);
$pdf->Cell(0,10,"",0,1,'R',0);
$pdf->SetFillColor(220,220,255);

$pdf->Cell(0,10,$arri,0,1,'R',1);
/*$pdf->WriteHTML($en);
$pdf->WriteHTML($con);*/

//$pdf->Multicell(0, 10, "".$arri);
$pdf->Multicell(0, 10, $en,0,"L");
$pdf->Multicell(0, 10, "");

$pdf->Multicell(0, 10, "".$con);

//$pdf = new PDF_HTML();
/*$pdf->AddPage();
$pdf->SetFont('Arial','',12);
$pdf->WriteHTML("<b>dsa</b>");
*/
$pdf->Output();
//exit;
?>