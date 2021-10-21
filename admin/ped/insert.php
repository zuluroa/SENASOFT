<?php

include("../../conexion.php");

$PROVid = $_POST['PROVid'];
$PEDFecha = $_POST['PEDFecha'];
$PEDNumero = $_POST['PEDNumero'];
$PEDPdf = $_FILES['PEDPdf']['name'];
$PEDPdfg = $_FILES['PEDPdf']['tmp_name'];

$RSPed = mysqli_query($conexion, "SELECT MAX(PEDid) FROM pedido ");
$NumPed = mysqli_fetch_row($RSPed);

if ($PEDPdf != "") {
    chmod('archivos/', 0777);
    $PDF = "pdf_" . ($NumPed[0] + 1) . ".pdf";
    if (move_uploaded_file($_FILES['PEDPdf']['tmp_name'], "archivos/" . $PDF)) {
        $sql = "INSERT INTO pedido (PROVid,PEDFecha,PEDNumero,PEDPdf)
VALUES ('$PROVid','$PEDFecha','$PEDNumero','$PDF')";
        $resultado = $conexion->query($sql);
        $id_insert = $conexion->insert_id;
    }
} else {
    $sql = "INSERT INTO pedido (PROVid,PEDFecha,PEDNumero)
    VALUES ('$PROVid','$PEDFecha','$PEDNumero')";
    $resultado = $conexion->query($sql);
    $id_insert = $conexion->insert_id;
}

if (isset($_POST['insertar'])) {

    $items8 = $id_insert;
    $id = ($_POST['PROid']);
    //$items9 = ($vPro);
    $items10 = ($_POST['PROFechaVencimiento']);
    $items11 = ($_POST['PROCantidad']);



    while (true) {

        $PROid = current($id);
        $item10 = current($items10);
        $item11 = current($items11);

        $ID = (($PROid !== false) ? $PROid : ", &nbsp;");
        $FEC = (($item10 !== false) ? $item10 : ", &nbsp;");
        $CAN = (($item11 !== false) ? $item11 : ", &nbsp;");

        $RSPro = mysqli_query($conexion, "SELECT PROid,PROCantidad FROM producto WHERE PROCodigo='" . $ID . "'");
        $NumPro = mysqli_fetch_row($RSPro);
        $cantidad = $NumPro[1];
        $vPro = ($NumPro[0]);


        $valores1 = '("' . $id_insert . '","' . $vPro . '","' . $FEC . '","' . $CAN . '"),';

        $valoresQ1 = substr($valores1, 0, -1);

        $sql1 = "INSERT INTO detallepedido (PEDid,PROid,PROFechaVencimiento,PROCantidad) 
    VALUES $valoresQ1";
        $CAN = $cantidad + $CAN;
        $sqlE = "UPDATE producto SET PROCantidad = '" . $CAN . "' WHERE PROid='" . $vPro . "'";

        $sqlLis = $conexion->query($sqlE);
        $sqlLis = $conexion->query($sql1);

        echo $sql1;
        echo $sqlE;


        $PROid = next($id);
        $item10 = next($items10);
        $item11 = next($items11);



        if ($item10 === false &&  $item11 === false && $PROid === false) break;
    }
}

header("Location: index.php");
