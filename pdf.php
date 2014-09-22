<?php
require('fpdf/fpdf.php');

class PDF extends FPDF
{
// Page header
function Header()
{
    // Logo
//    $this->Image('logo.png',10,6,30);
    // Arial bold 15
    $this->SetFont('Arial','B',15);
    // Move to the right
    $this->Cell(80);
    // Title
    $this->Cell(30,10,'Title',1,0,'C');
    // Line break
    $this->Ln(20);
}

// Page footer
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Page number
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}

// Instanciation of inherited class
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);
for($i=1;$i<=40;$i++)
    $pdf->Cell(0,10,'Printing line number '.$i,0,1);

$pdf->AddPage();
$pdf->SetFont('Arial','',16);
$pdf->Ln(1);
$pdf->MultiCell(0,6,'Hello World!The following example comes with the PDFlib distribution for PHP 5. It uses the new exception handling and object encapsulation features available in PHP 5. It creates the file hello.pdf with one page. It defines some document info field contents, loads the Helvetica-Bold font and outputs the text "Hello world! (says PHP)". The following example comes with the PDFlib distribution for PHP 5. It uses the new exception handling and object encapsulation features available in PHP 5. It creates the file hello.pdf with one page. It defines some document info field contents, loads the Helvetica-Bold font and outputs the text "Hello world! (says PHP)". The following example comes with the PDFlib distribution for PHP 5. It uses the new exception handling and object encapsulation features available in PHP 5. It creates the file hello.pdf with one page. It defines some document info field contents, loads the Helvetica-Bold font and outputs the text "Hello world! (says PHP)". The following example comes with the PDFlib distribution for PHP 5. It uses the new exception handling and object encapsulation features available in PHP 5. It creates the file hello.pdf with one page. It defines some document info field contents, loads the Helvetica-Bold font and outputs the text "Hello world! (says PHP)". The following example comes with the PDFlib distribution for PHP 5. It uses the new exception handling and object encapsulation features available in PHP 5. It creates the file hello.pdf with one page. It defines some document info field contents, loads the Helvetica-Bold font and outputs the text "Hello world! (says PHP)". The following example comes with the PDFlib distribution for PHP 5. It uses the new exception handling and object encapsulation features available in PHP 5. It creates the file hello.pdf with one page. It defines some document info field contents, loads the Helvetica-Bold font and outputs the text "Hello world! (says PHP)". The following example comes with the PDFlib distribution for PHP 5. It uses the new exception handling and object encapsulation features available in PHP 5. It creates the file hello.pdf with one page. It defines some document info field contents, loads the Helvetica-Bold font and outputs the text "Hello world! (says PHP)". The following example comes with the PDFlib distribution for PHP 5. It uses the new exception handling and object encapsulation features available in PHP 5. It creates the file hello.pdf with one page. It defines some document info field contents, loads the Helvetica-Bold font and outputs the text "Hello world! (says PHP)". The following example comes with the PDFlib distribution for PHP 5. It uses the new exception handling and object encapsulation features available in PHP 5. It creates the file hello.pdf with one page. It defines some document info field contents, loads the Helvetica-Bold font and outputs the text "Hello world! (says PHP)". The following example comes with the PDFlib distribution for PHP 5. It uses the new exception handling and object encapsulation features available in PHP 5. It creates the file hello.pdf with one page. It defines some document info field contents, loads the Helvetica-Bold font and outputs the text "Hello world! (says PHP)". The following example comes with the PDFlib distribution for PHP 5. It uses the new exception handling and object encapsulation features available in PHP 5. It creates the file hello.pdf with one page. It defines some document info field contents, loads the Helvetica-Bold font and outputs the text "Hello world! (says PHP)". ',0,2);
$pdf->Ln(40);
$pdf->Cell(0,10,'Hello World!',0,0,C);
$pdf->Output();
?>
