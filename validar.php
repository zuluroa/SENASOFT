<?php
require_once 'conexion.php';

$usuario = $_POST['usuario'];
$contraseña = $_POST['clave'];

session_start();

if ($usuario != "" && $contraseña != "") {
    if ($usuario = "admin@gmail.com" && $contraseña = "admin") {
      $_SESSION['NombreADMIN'] = "ADMINISTRADOR";
      echo '<script> location.href="admin/index.php"; </script>';
    } else {
      $mensaje = "Error al ingresar los datos.";
      echo '<script>
       alert("' . $mensaje . '");
       location.href="index.php";
	   </script>';
    }
} else {
  $mensaje = "Ingrese todos los datos.";
  echo '<script>
  alert("' . $mensaje . '");
  location.href="index.php";
</script>';
}
