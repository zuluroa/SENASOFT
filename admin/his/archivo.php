<?php
include '../../conexion.php';
$RSPed = mysqli_query($conexion, "SELECT * FROM pedido WHERE PEDid='".$_GET['PEDid']."' ");
$NumPed = mysqli_fetch_array($RSPed);

    if ($NumPed['PEDPdf'] == "") {
?>
        <p>NO tiene archivos</p>
    <?php } else { ?>
        <iframe src="archivos/<?php echo $NumPed['PEDPdf']; ?>" width="100%" height="100%"></iframe>

<?php }

?>