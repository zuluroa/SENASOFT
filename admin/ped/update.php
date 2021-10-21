
<?php

include("../../conexion.php");

$PEDid = $_POST['PEDid'];
$PROVid = $_POST['PROVid'];
$PEDFecha = $_POST['PEDFecha'];
$PEDNumero = $_POST['PEDNumero'];
$PEDPdf = $_FILES['PEDPdf']['name'];
$PEDPdfg = $_FILES['PEDPdf']['tmp_name'];


if ($PEDPdf != "") {
    chmod('archivos/', 0777);
    $PDF = "pdf_" . ($PEDid) . ".pdf";
    if (move_uploaded_file($_FILES['PEDPdf']['tmp_name'], "archivos/" . $PDF)) {
        $sql = "UPDATE pedido SET PROVid = '" . $PROVid . "',PEDFecha = '" . $PEDFecha . "',PEDNumero = '" . $PEDNumero . "',
PEDPdf = '" . $PDF . "' WHERE PEDid =  '" . $_POST["PEDid"] . "'";
        $resultado = $conexion->query($sql);
        $id_insert = $conexion->insert_id;
    }
} else {
    $sql = "UPDATE pedido SET PROVid = '" . $PROVid . "',PEDFecha = '" . $PEDFecha . "',PEDNumero = '" . $PEDNumero . "' WHERE PEDid =  '" . $_POST["PEDid"] . "'";
    $resultado = $conexion->query($sql);
    $id_insert = $conexion->insert_id;
}

if (isset($_POST['insertar'])) {

    $items8 = $PEDid;
    $id = ($_POST['PROid']);
    $items9 = ($_POST['DETid']);
    //$items9 = ($vPro);
    $items10 = ($_POST['PROFechaVencimiento']);
    $items11 = ($_POST['PROCantidad']);
    $items12 = ($_POST['cantidad']);



    while (true) {


        $PROid = current($id);
        $item9 = current($items9);
        $item10 = current($items10);
        $item11 = current($items11);
        $item12 = current($items12);

        $ID = (($PROid !== false) ? $PROid : ", &nbsp;");
        $DETid = (($item9 !== false) ? $item9 : ", &nbsp;");
        $FEC = (($item10 !== false) ? $item10 : ", &nbsp;");
        $CAN = (($item11 !== false) ? $item11 : ", &nbsp;");
        $canProductos = (($item12 !== false) ? $item12 : ", &nbsp;");

echo " CANTIDAD DE PRODUCTOS:".$CAN;

        $RSPro = mysqli_query($conexion, "SELECT PROid,PROCantidad FROM producto WHERE PROCodigo='" . $ID . "'");
        $NumPro = mysqli_fetch_row($RSPro);
        $cantidad = $NumPro[1];
        $vPro = ($NumPro[0]);

        $RSDet = mysqli_query($conexion, "SELECT * FROM detallepedido WHERE DETid='" . $DETid . "'");
        $NumDet = mysqli_fetch_row($RSDet);

        $sql1 = "UPDATE detallepedido SET PROid = '" . $vPro . "',PROFechaVencimiento = '" . $FEC . "',PROCantidad = '" . $CAN. "' WHERE DETid='" . $DETid . "'";
        echo "DETALLE.".$NumDet[0]." Cantidad:".$NumDet[4];
        if($NumDet[4]>$CAN){
            $resta=$NumDet[4]-$CAN;
            $CAN=$cantidad-$resta;
        }else if($NumDet[4]==$CAN){
            $CAN = $cantidad;
        }else if($NumDet[4]<$CAN){
            $resta=$CAN-$NumDet[4];
            $CAN=$resta+$cantidad;
        }

        
        $sqlE = "UPDATE producto SET PROCantidad = '" . $CAN . "' WHERE PROid='" . $vPro . "'";

        $sqlLis = $conexion->query($sqlE);
        $sqlLis = $conexion->query($sql1);

        echo "EL 1: " . $sql1;
        echo "EL 2: " . $sqlE;


        $PROid = next($id);
        $item9 = next($items9);
        $item10 = next($items10);
        $item11 = next($items11);



        if ($item9 === false &&  $item10 === false &&  $item11 === false && $PROid === false) break;
    }
}
header("Location: index.php");
?>
