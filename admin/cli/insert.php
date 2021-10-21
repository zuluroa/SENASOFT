<?php

include("../../conexion.php");

$CLINombre = $_POST['CLINombre'];
$CLINit = $_POST['CLINit'];
$CLITelefono = $_POST['CLITelefono'];

$sql = "INSERT INTO cliente (CLINombre, CLINit,CLITelefono)
VALUES ('$CLINombre','$CLINit','$CLITelefono')";
$resultado = $conexion->query($sql);
$id_insert = $conexion->insert_id;

header("Location: index.php");
?>
