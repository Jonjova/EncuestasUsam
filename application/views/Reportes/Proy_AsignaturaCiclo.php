<?php
require 'application/libraries/fpdf/fpdf.php';
require 'application/config/database.php';

$asignaturaR = mysqli_escape_string($mysqli, $_POST['asignaturaR']);
$cicloRe = mysqli_escape_string($mysqli, $_POST['cicloR']);

// Cuando se seleccione la asignatura sin un ciclo en específico
if (!empty($_POST['asignaturaR']) && empty($_POST['cicloR']))
{
    $sqlName = "SELECT DISTINCT NOMBRE_ASIGNATURA FROM VW_REPORTE_GENERAL WHERE ID_ASIGNATURA = $asignaturaR;";
    $sql = "SELECT * FROM VW_REPORTE_GENERAL WHERE ID_ASIGNATURA = $asignaturaR;";
    $resultadoName = $mysqli->query($sqlName);
    $resultado = $mysqli->query($sql);

    $pdf = new FPDF("P", "mm", "letter");
    $pdf->AddPage();
    $pdf->SetFont("Times", "B", 14);
    $pdf->Image("assets/img/logo-reporte.jpg", 10, 10, 25);
    $pdf->Cell(195, 6, "UNIVERSIDAD SALVADORE".utf8_decode('Ñ')."A ALBERTO MASFERRER", 0, 1, "C");
    $pdf->Cell(195, 6, "REPORTE DE PROYECTOS POR ASIGNATURA", 0, 1, "C");
    while ($fila = $resultadoName->fetch_assoc())
    {
        $pdf->Ln(5);
        $pdf->SetFont("Times", "B", 18);
        $pdf->Cell(195, 6, utf8_decode($fila['NOMBRE_ASIGNATURA']), 0, 1, "C");
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
        $pdf->SetFont("Times", "", 14);
        $pdf->SetTextColor(9, 79, 139);
        $pdf->Cell(50, 5, utf8_decode('"'.$fila['NOMBRE_PROYECTO'].'"'), 0, 1, "L");
        $pdf->SetTextColor(0, 0, 0);
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
        $pdf->SetFont("Times", "B", 12);
        $pdf->Cell(50, 5,"Integrantes del grupo: ", 0, 1, "L");
        $pdf->SetFont("Times", "", 12);
        $pdf->Cell(50, 5, utf8_decode($fila['ALUMNO']), 0, 1, "L");
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
    $pdf->SetFont('Arial','I',8);
    $pdf->Cell(30, 5, "Fecha: ". date("d/m/Y"), 0, 0, "C");
    // Número de página 
    // $pdf->Cell(0, 5, utf8_decode('Página ').$pdf->PageNo().' de {nb}', 0, 0, 'C');
    $pdf->AliasNbPages();
    $pdf->Output();
}

// Cuando se seleccione el ciclo sin una asignatura en específico
else if (empty($_POST['asignaturaR']) && !empty($_POST['cicloR']))
{
    $sqlName = "SELECT DISTINCT COD_CICLO FROM VW_REPORTE_GENERAL WHERE ID_CICLO = $cicloRe;";
    $sql = "SELECT * FROM VW_REPORTE_GENERAL WHERE ID_CICLO = $cicloRe;";
    $resultadoName = $mysqli->query($sqlName);
    $resultado = $mysqli->query($sql);

    $pdf = new FPDF("P", "mm", "letter");
    $pdf->AddPage();
    $pdf->SetFont("Times", "B", 14);
    $pdf->Image("assets/img/logo-reporte.jpg", 10, 10, 25);
    $pdf->Cell(195, 6, "UNIVERSIDAD SALVADORE".utf8_decode('Ñ')."A ALBERTO MASFERRER", 0, 1, "C");
    $pdf->Cell(195, 6, "REPORTE DE PROYECTOS POR CICLO", 0, 1, "C");
    while ($fila = $resultadoName->fetch_assoc())
    {
        $pdf->Ln(5);
        $pdf->SetFont("Times", "B", 16);
        $pdf->Cell(195, 6, utf8_decode($fila['COD_CICLO']), 0, 1, "C");
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
        $pdf->SetFont("Times", "", 14);
        $pdf->SetTextColor(9, 79, 139);
        $pdf->Cell(50, 5, utf8_decode('"'.$fila['NOMBRE_PROYECTO'].'"'), 0, 1, "L");
        $pdf->SetTextColor(0, 0, 0);
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
        $pdf->SetFont("Times", "B", 12);
        $pdf->Cell(50, 5,"Integrantes del grupo: ", 0, 1, "L");
        $pdf->SetFont("Times", "", 12);
        $pdf->Cell(50, 5, utf8_decode($fila['ALUMNO']), 0, 1, "L");
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
    $pdf->SetFont('Arial', 'I' ,8);
    $pdf->Cell(30, 5, "Fecha: ". date("d/m/Y"), 0, 0, "C");
    // Número de página 
    // $pdf->Cell(0, 5, utf8_decode('Página ').$pdf->PageNo().' de {nb}', 0, 0, 'C');
    $pdf->AliasNbPages();
    $pdf->Output();
}

// Cuando se seleccione la asignatura y un ciclo en específico
else if (!empty($_POST['asignaturaR']) && !empty($_POST['cicloR']))
{
    $sqlName = "SELECT DISTINCT COD_CICLO, NOMBRE_ASIGNATURA FROM VW_REPORTE_GENERAL WHERE ID_CICLO = $cicloRe;";
    $sql = "SELECT * FROM VW_REPORTE_GENERAL WHERE ID_ASIGNATURA = $asignaturaR AND ID_CICLO = $cicloRe;";
    $resultadoName = $mysqli->query($sqlName);
    $resultado = $mysqli->query($sql);

    $resp = mysqli_num_rows($resultado);

    if ($resp > 0)
    {
        $pdf = new FPDF("P", "mm", "letter");
        $pdf->AddPage();
        $pdf->SetFont("Times", "B", 14);
        $pdf->Image("assets/img/logo-reporte.jpg", 10, 10, 25);
        $pdf->Cell(195, 6, "UNIVERSIDAD SALVADORE".utf8_decode('Ñ')."A ALBERTO MASFERRER", 0, 1, "C");
        $pdf->Cell(195, 6, "REPORTE DE PROYECTOS POR ASIGNATURA Y CICLO", 0, 1, "C");
        while ($fila = $resultadoName->fetch_assoc())
        {
            $pdf->Ln(5);
            $pdf->SetFont("Times", "B", 16);
            $pdf->Cell(195, 6, utf8_decode($fila['NOMBRE_ASIGNATURA']).", ".utf8_decode($fila['COD_CICLO']), 0, 1, "C");
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
            $pdf->SetFont("Times", "", 14);
            $pdf->SetTextColor(9, 79, 139);
            $pdf->Cell(50, 5, utf8_decode('"'.$fila['NOMBRE_PROYECTO'].'"'), 0, 1, "L");
            $pdf->SetTextColor(0, 0, 0);
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
            $pdf->SetFont("Times", "B", 12);
            $pdf->Cell(50, 5,"Integrantes del grupo: ", 0, 1, "L");
            $pdf->SetFont("Times", "", 12);
            $pdf->Cell(50, 5, utf8_decode($fila['ALUMNO']), 0, 1, "L");
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
    }
    else
    {
        //echo "!No hay datos!";
        $this->session->set_flashdata('msjerror', '!No hay datos!');
        redirect('/Proyectos/');
    }
}
else
{
   // echo "!No ha seleccionado una asignatura!";
    $this->session->set_flashdata('msjerror', '!Seleccione una asignatura!');
    redirect('/Proyectos/');
}
?>