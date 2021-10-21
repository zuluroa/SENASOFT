<?php

include("../../conexion.php");

$id_tipoIndentificacion = $_POST['id_tipoIndentificacion'];
$numero_identificacion = $_POST['numero_identificacion'];
$nombre = $_POST['nombre'];
$telefono = $_POST['telefono'];
$firma = $_FILES['firma']['name'];
$firmaName = $_FILES['firma']['tmp_name'];

$RSPac = mysqli_query($conexion, "SELECT id FROM paciente");
$NumPac = mysqli_fetch_row($RSPac);

if ($firma != "") {
    chmod('archivos/', 0777);
    $PDF = "pdf_" . ($NumPac[0]) . ".pdf";
    if (move_uploaded_file($_FILES['firma']['tmp_name'], "archivos/" . $PDF)) {
        $sql = "INSERT INTO paciente (id_tipoIndentificacion,numero_identificacion,nombre,telefono,firma)
VALUES ('$id_tipoIndentificacion','$numero_identificacion','$nombre','$telefono','$PDF')";
        $resultado = $conexion->query($sql);
        $id_insert = $conexion->insert_id;
    }
} else {
    $sql = "INSERT INTO paciente (id_tipoIndentificacion,numero_identificacion,nombre,telefono)
VALUES ('$id_tipoIndentificacion','$numero_identificacion','$nombre','$telefono')";
    $resultado = $conexion->query($sql);
    $id_insert = $conexion->insert_id;
}

header("Location: index.php");
