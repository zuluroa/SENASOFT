<?php

include("../../conexion.php");

$paciente_id = $_POST['paciente_id'];

$diligencia = $_POST['diligencia'];
$tachon = $_POST['tachon'];
$tinta = $_POST['tinta'];
$firma = $_POST['firma'];

$sqlCriterio = "INSERT INTO criterio (diligencia,tachon,tinta,firma)
    VALUES ('$diligencia','$tachon','$tinta','$firma')";
    $resultado = $conexion->query($sqlCriterio);
    $id_insert_criterio = $conexion->insert_id;

$pdf = $_FILES['pdf']['name'];
$pdfName = $_FILES['pdf']['tmp_name'];

$RSHis = mysqli_query($conexion, "SELECT id FROM historial ");
$NumHis = mysqli_fetch_row($RSHis);

if ($pdf != "") {
    chmod('archivos/', 0777);
    $PDF = "pdf_" . ($NumHis[0]) . ".pdf";
    if (move_uploaded_file($_FILES['pdf']['tmp_name'], "archivos/" . $PDF)) {
        $sqlHistorial = "INSERT INTO historial (paciente_id,criterio_id,fecha,pdf)
VALUES ('$paciente_id','$id_insert_criterio','$fecha','$PDF')";
        $resultado = $conexion->query($sqlHistorial);
        $id_insert = $conexion->insert_id;
    }
} else {
    $sqlHistorial = "INSERT INTO historial (paciente_id,criterio_id,fecha)
    VALUES ('$paciente_id','$criterio_id','$fecha')";
            $resultado = $conexion->query($sqlHistorial);
            $id_insert = $conexion->insert_id;
}

header("Location: index.php");
