<?php
require_once 'conexion.php';

$usuario = $_POST['usuario'];
$contraseña = $_POST['clave'];
$rol = $_POST['rol'];

session_start();

if ($usuario != "" && $contraseña != "") {


  if ($rol == '1') {
    $verAdmin = "SELECT * FROM usuario WHERE USUUsuario='$usuario' AND USUContra='$contraseña' AND USUTipo='1'";
    $act = mysqli_query($conexion, $verAdmin);
    $datos = mysqli_num_rows($act);
    if ($datos != 0) {
      $vAdmin = mysqli_fetch_row($act);
      $_SESSION['adminID'] = $vAdmin[0];
      $_SESSION['NombreADMIN'] = $vAdmin[2];

      echo '<script> location.href="admin/index.php"; </script>';
    } else {
      $mensaje = "Error al ingresar los datos.";
      echo '<script>
       alert("' . $mensaje . '");
       location.href="index.php";
	   </script>';
    }
  } else if ($rol == '2') {

    $verUsu = "SELECT * FROM usuario WHERE USUUsuario='$usuario' AND USUContra='$contraseña' AND USUTipo='2'";
    $act = mysqli_query($conexion, $verUsu);
    $datos = mysqli_num_rows($act);
    if ($datos != 0) {
      $vUsu = mysqli_fetch_row($act);
      $_SESSION['UsuID'] = $vUsu[0];
      $_SESSION['NombreUSU'] = $vUsu[2];
      echo '<script> location.href="usuario/index.php"; </script>';
    } else {
      $mensaje = "Error al ingresar los datos.";
      echo '<script>
       alert("' . $mensaje . '");
       location.href="index.php";
	   </script>';
    }
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
