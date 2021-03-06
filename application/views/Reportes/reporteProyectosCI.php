<?php
require 'application/libraries/fpdf/fpdf.php';
require 'application/config/database.php';

$cicloR = mysqli_escape_string($mysqli, $_POST['cicloR']);

$sql = "SELECT * FROM VW_REPORTE_GENERAL WHERE ID_CICLO = $cicloR;";
$resultado = $mysqli->query($sql);
$nameC = $mysqli->query($sql);

$pdf = new FPDF("P", "mm", "letter");
$pdf->AddPage();
$pdf->SetFont("Times", "B", 14);
$pdf->Image("assets/img/logo-reporte.jpg", 10, 10, 25);
$pdf->Cell(195, 6, "UNIVERSIDAD SALVADORE".utf8_decode('Ñ')."A ALBERTO MASFERRER", 0, 1, "C");
$pdf->Cell(195, 6, "REPORTE DE PROYECTOS", 0, 1, "C");

while ($fila = $nameC->fetch_assoc())
{
    $pdf->Cell(195, 6, strtoupper(utf8_decode($fila['COD_CICLO'])), 0, 1, "C");
}
$pdf->Image("assets/img/CDA.png", 190, 10, 12, 20);
$pdf->Ln(15);

$i = 0;
while ($fila = $resultado->fetch_assoc())
{
    $i++;
    $pdf->SetFont("Times", "BU", 12);
    $pdf->Cell(50, 5, utf8_decode(strtoupper($i.'. '.$fila['NOMBRE_TIPO_INVESTIGACION'])), 0, 1, "L");
    $pdf->SetFont("Times", "B", 12);
    $pdf->Cell(50, 5, utf8_decode(strtoupper("facultad de ".$fila['NOMBRE_FACULTAD'])), 0, 1, "L");
    $pdf->SetFont("Times", "B", 12);
    $pdf->Cell(50, 5, utf8_decode("Coordinación:"), 0, 1, "L");
    $pdf->SetFont("Times", "", 12);
    $pdf->Cell(50, 5, utf8_decode($fila['NOMBRE_COORDINACION']), 0, 1, "L");
    $pdf->SetFont("Times", "B", 12);
    $pdf->Cell(50, 5, utf8_decode("Asignatura:"), 0, 1, "L");
    $pdf->SetFont("Times", "", 12);  
    $pdf->Cell(50, 5, utf8_decode($fila['NOMBRE_ASIGNATURA']), 0, 1, "L");
    $pdf->SetFont("Times", "B", 12);
    $pdf->Cell(50, 5,"Docente: ", 0, 1, "L");
    $pdf->SetFont("Times", "", 12);
    $pdf->Cell(50, 5, utf8_decode($fila['DOCENTE']), 0, 1, "L");
    $pdf->SetFont("Times", "", 14);
    $pdf->SetTextColor(9, 79, 139);
    $pdf->MultiCell(190, 5, utf8_decode('"'.$fila['NOMBRE_PROYECTO'].'"'), 0, "L", false);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->SetFont("Times", "B", 12);
    $pdf->Cell(50, 5,"Integrantes del grupo: ", 0, 1, "L");
    $pdf->SetFont("Times", "", 12);
    $pdf->MultiCell(190, 5, utf8_decode($fila['ALUMNO']), 0, "L", false);
    $pdf->SetFont("Times", "B", 12);
    $pdf->Cell(50, 5, utf8_decode("Ciclo:"), 0, 1, "L");
    $pdf->SetFont("Times", "", 12);
    $pdf->Cell(50, 5, utf8_decode($fila['COD_CICLO']), 0, 1, "L");
    $pdf->SetFont("Times", "B", 12);
    $pdf->Cell(50, 5, utf8_decode("Estado:"), 0, 1, "L");
    $pdf->SetFont("Times", "", 12);
    $pdf->Cell(50, 5, utf8_decode($fila['ESTADO_PROYECTO']), 0, 1, "L");  
    $pdf->Ln(5);
}
// Posición: a 1,5 cm del final
$pdf->SetY(-30);
// Arial italic 8
$pdf->SetFont('Arial', 'I', 8);
$pdf->Cell(30, 5, "Fecha: ". date("d/m/Y"), 0, 0, "C");
// Número de página 
// $pdf->Cell(0, 5, utf8_decode('Página ').$pdf->PageNo().' de {nb}', 0, 0, 'C');
$pdf->AliasNbPages();
$pdf->Output();
?>