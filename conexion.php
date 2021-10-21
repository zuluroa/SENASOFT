<?php
$conexion = mysqli_connect('localhost', 'root', '', 'sena_soft') or die("No se pudo establecer conexion con la base de datos");
setlocale(LC_ALL, 'es_CO', 'Spanish_Colombia', 'Spanish');
date_default_timezone_set('America/Bogota');
?>

<?php  header('Content-Type: text/html; charset=ISO-8859-1'); ?>
