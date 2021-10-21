
<?php

include("../../conexion.php");

$CLINombre = $_POST['CLINombre'];
$CLINit = $_POST['CLINit'];
$CLITelefono = $_POST['CLITelefono'];


$sql = "UPDATE cliente SET CLINombre = '" . $CLINombre . "',CLINit = '" . $CLINit . "',CLITelefono = '" . $CLITelefono . "' WHERE CLIid =  '" . $_POST["CLIid"] . "'";
$resultado = $conexion->query($sql);
$id_insert = $conexion->insert_id;

header("Location: index.php");
?>
