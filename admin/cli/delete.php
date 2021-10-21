<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
        <title>Cliente</title>
    </head>
    <?php
    include("../../conexion.php");
    $conexion->query("DELETE FROM cliente WHERE CLIid = '" . $_GET['CLIid'] . "'");
    ?>
    <body>
    </body>
</html>
<script language="javascript">
    alert("Datos Eliminados");
    location = "index.php";
</script>
