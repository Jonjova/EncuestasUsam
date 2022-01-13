<?php
require 'application/libraries/fpdf/fpdf.php';
require 'application/config/database.php';

if (!empty($_POST)) {

$asignaturaR = mysqli_escape_string($mysqli, $_POST['asignaturaR']);

$sql = "SELECT * FROM vw_reporteAsignatura  where id_asignatura = $asignaturaR";
$resultado = $mysqli->query($sql);

$pdf = new FPDF("L", "mm", "letter");
$pdf->AddPage();
$pdf->SetFont("Arial", "B", 12);
$pdf->Image("assets/img/logo-reporte.jpg", 10, 10, 25);
$pdf->Cell(260, 6, "UNIVERSIDAD SALVADORE".utf8_decode('Ñ')."A ALBERTO MASFERRER", 0, 1, "C");
$pdf->Cell(260, 6, "REPORTE DE PROYECTOS ASIGNATURA", 0, 1, "C");
$pdf->Image("assets/img/CDA.png", 255, 10, 12, 20);
$pdf->Ln(10);

// Colores, ancho de línea y fuente en negrita
    
$pdf->SetFont("Arial", "B", 10);
$pdf->Cell(25, 5, "ID", 1, 0, "C");
$pdf->Cell(100, 5, "Nombre del Proyecto", 1, 0, "C");
$pdf->Cell(50, 5, "Asignatura", 1, 0, "C");
$pdf->Cell(50, 5, utf8_decode("Fecha de Asignación"), 1, 0, "C");
$pdf->Cell(30, 5, "Ciclo", 1, 1, "C");


$pdf->SetFillColor(224,235,255);
$pdf->SetTextColor(0);

$pdf->SetFont("Arial", "", 10);

while ($fila = $resultado->fetch_assoc()) {
    $pdf->Cell(25, 5, $fila['id_proyecto'], 1, 0, "C");
    $pdf->Cell(100, 5, utf8_decode($fila['nombre_proyecto']), 1, 0, "C");
    $pdf->Cell(50, 5, utf8_decode($fila['nombre_asignatura']), 1, 0, "C");
    $pdf->Cell(50, 5, $fila['fecha_asignacion'], 1, 0, "C");
    $pdf->Cell(30, 5, $fila['cod_ciclo'], 1, 1, "C");
}



 // Posición: a 1,5 cm del final
 $pdf->SetY(-30);
 // Arial italic 8
 $pdf->SetFont('Arial','I',8);
 $pdf->Cell(30, 5, "Fecha: ". date("d/m/Y"), 0, 0, "C");
 // Número de página 
 //$pdf->Cell(0,5,utf8_decode('Página ').$pdf->PageNo().' de {nb}',0,0,'C');


 $pdf->AliasNbPages();

 $pdf->Output();

 }
?>