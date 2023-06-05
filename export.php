<?php
require('fpdf/fpdf.php'); // Include the FPDF library

// Create a new PDF instance
$pdf = new FPDF();

// Add a new page
$pdf->AddPage();

$pdf->SetFont('Arial','B',16);
$pdf->Cell(180,7,'SEKOLAH MENENGAH KEJURUAN CODING',0,1,'C');
$pdf->SetFont('Arial','B',12);
$pdf->Cell(180,7,'DAFTAR SISWA SEKOLAH MENENGAH KEJURUAN CODING',0,1,'C');

// Memberikan space kebawah agar tidak terlalu rapat
$pdf->Cell(10,7,'',0,1);



// Set font style for the header row
$pdf->SetFont('Arial', 'B', 12);

// Set the table header
$pdf->Cell(10, 50, 'No', 1, 0, 'C');
$pdf->Cell(40, 50, 'Foto', 1, 0, 'C');
$pdf->Cell(25, 50, 'Nama', 1, 0, 'C');
$pdf->Cell(30, 50, 'Alamat', 1, 0, 'C');
$pdf->Cell(40, 50, 'Jenis Kelamin', 1, 0, 'C');
$pdf->Cell(20, 50, 'Agama', 1, 0, 'C');
$pdf->Cell(30, 50, 'Sekolah Asal', 1, 0, 'C');
$pdf->Ln();

// Set font style for the table content
$pdf->SetFont('Arial', '', 12);

include("config.php");

$sql = "SELECT * FROM calon_siswa";
$query = mysqli_query($db, $sql);

$counter = 1;

while ($siswa = mysqli_fetch_array($query)) {
    // Output each row of data
    $pdf->Cell(10, 50, $counter, 1, 0, 'C');
    $pdf->Cell(40, 50, '', 1, 0, 'C'); // Empty cell for foto
    $pdf->Image('uploads/' . $siswa['foto'], $pdf->GetX() - 35, $pdf->GetY() + 5, 30, 40);
    $pdf->Cell(25, 50, $siswa['nama'], 1, 0, 'C');
    $pdf->Cell(30, 50, $siswa['alamat'], 1, 0, 'C');
    $pdf->Cell(40, 50, $siswa['jenis_kelamin'], 1, 0, 'C');
    $pdf->Cell(20, 50, $siswa['agama'], 1, 0, 'C');
    $pdf->Cell(30, 50, $siswa['sekolah_asal'], 1, 0, 'C');
    $pdf->Ln();

    $counter++;
}

// Output the PDF
$pdf->Output();
?>
