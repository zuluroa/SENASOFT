
<!-- Header -->
<?php
session_start();
$varsesion = $_SESSION['NombreADMIN'];
if($varsesion == null || $varsesion =''){
    $mensaje="No ha Iniciado Sesion.";
    echo '<script>
    alert("'.$mensaje.'");
    location.href="../index.php";
    </script>';
die();
}
?>
<header id="header">
    <a href="../index.php" class="logo"><strong>SENASOFT</strong> Sistema de recepci&oacute;n de historias clinicas</a>
</header>
