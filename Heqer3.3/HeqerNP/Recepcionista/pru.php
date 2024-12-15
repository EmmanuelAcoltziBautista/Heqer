<?php
//require('fpdf.php');
//require('fpdf_html.php');
require_once "./PDF/fpdf/html2pdf.php";
$pdf = new PDF_HTML();
$pdf->AddPage();
$pdf->SetFont('Arial', '', 12);

// Definir el contenido HTML
$html = '
<table border="1" cellpadding="4" cellspacing="0">
    <tr>
        <th>Nombre</th>
        <th>Edad</th>
        <th>Ciudad</th>
    </tr>
    <tr>
        <td>Juan</td>
        <td>28</td>
        <td>Madrid</td>
    </tr>
    <tr>
        <td>Maria</td>
        <td>32</td>
        <td>Barcelona</td>
    </tr>
</table>
';

$pdf->WriteHTML($html);
$pdf->Output();
?>
