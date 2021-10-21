<!DOCTYPE HTML>

<html>

<head>
    <title>KAWAL</title>
    <meta charset="utf-8" />
    <link rel="shortcut icon" href="../img/icono.png">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <link rel="stylesheet" href="../assets/css/main.css" />
</head>

<body class="is-preload">

    <!-- Wrapper -->
    <div id="wrapper">

        <!-- Main -->
        <div id="main">
            <div class="inner">

                <!-- Header -->
                <?php
                include '../header.php';
                ?>

                <!-- Content -->
                <?php
                include("../../conexion.php");
                $id = $_GET['PEDid'];
                $RSProv = mysqli_query($conexion, "SELECT * FROM proveedor");
                $NumProv = mysqli_num_rows($RSProv);
                $clasificacion = "SELECT * FROM detallepedido where PEDid ='" . $id . "' order by PEDid";
                $queryClasificacion = $conexion->query($clasificacion);
                $con = "SELECT * FROM pedido where PEDid='" . $id . "'";
                $act = mysqli_query($conexion, $con);
                $datos = mysqli_num_rows($act);
                if ($datos != 0) {
                    $vPed = mysqli_fetch_row($act);
                ?>
                    <div class="container">
                        <form class="ap" method="POST" enctype="multipart/form-data">
                            <h1>Mostrar Pedido</h1>
                            <input type="hidden" value="<?php echo $id; ?>" name="PEDid">
                            <div class="form-group">
                                <h3>Proveedor</h3>
                                <select name="PROVid" disabled class="form-control">
                                    <?php
                                    if ($NumProv != 0) {
                                        while ($vProv = mysqli_fetch_row($RSProv)) {
                                    ?>
                                            <option value="<?php echo $vProv[0]; ?>" <?php
                                                                                        if ($vProv[0] == $vPed[1]) {
                                                                                            echo "selected";
                                                                                        }
                                                                                        ?>><?php echo $vProv[1]; ?></option>
                                    <?php
                                        }
                                    }
                                    ?>
                                </select>
                                </br>
                            </div>
                            <div class="form-group">
                                <h3>Fecha del Pedido</h3>
                                <input name="PEDFecha" type="date" disabled id="PEDFecha" placeholder="Fecha del Pedido" required="required" class="form-control" value="<?php echo $vPed[2]; ?>">
                                </br>
                            </div>
                            <div class="form-group">
                                <h3>N&uacute;mero de Pedido</h3>
                                <input name="PEDNumero" type="text" disabled id="PEDNumero" placeholder="N&uacute;mero de Pedido" required="required" class="form-control" value="<?php echo $vPed[3]; ?>">
                                </br>
                            </div>
                            <div class="form-group">
                                <h3>Detalles de los Productos</h3>
                                <table class="table bg-info" id="tabla">
                                    <td align="center">
                                        <h3>C&oacute;digo y Nombre del Producto</h3>
                                    </td>
                                    <td align="center">
                                        <h3>Fecha de Vencimiento</h3>
                                    </td>
                                    <td align="center">
                                        <h3>Cantidad </h3>
                                    </td>
                                    <?php
                                    while ($registroClasificacion  = $queryClasificacion->fetch_array(MYSQLI_BOTH)) {
                                        $RSPro = mysqli_query($conexion, "SELECT * FROM producto WHERE PROid = '" . $registroClasificacion['PROid'] . "'");
                                        $NumPro = mysqli_num_rows($RSPro);
                                        if ($NumPro != 0) {
                                            $vPro = mysqli_fetch_row($RSPro);
                                        }
                                    ?>
                                        <tr class="fila-fija"  align="center">
                                            <input type="hidden" value="<?php echo $registroClasificacion['DETid']; ?>" name="DETid[]">
                                            <input type="hidden" value="<?php echo $registroClasificacion['PEDid']; ?>" name="PEDid[]">
                                            <input type="hidden" value="<?php echo $registroClasificacion['PROCantidad']; ?>" name="cantidad[]">
                                            <td><input disabled type="text" class="form-control" value="<?php echo $vPro[2]."_".$vPro[3]; ?>" name="PROid[]"></td>
                                            <td><input disabled type="date" required class="form-control" name="PROFechaVencimiento[]" placeholder="Clasificaci&oacute;n" value="<?php echo $registroClasificacion['PROFechaVencimiento']; ?>"></td>
                                            <td><input disabled type="text" required class="form-control" name="PROCantidad[]" placeholder="Segmento" value="<?php echo $registroClasificacion['PROCantidad']; ?>"></td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </table>
                            </div>                      
                        </form>
                        <div class="pdf">
                        <img src="img/LogoGrande.png" style="width:400px; height:400px;" />
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>

        <!-- Sidebar -->
        <?php
        include '../sidebar.php';
        ?>

    </div>

    <!-- Scripts -->
    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/js/browser.min.js"></script>
    <script src="../assets/js/breakpoints.min.js"></script>
    <script src="../assets/js/util.js"></script>
    <script src="../assets/js/main.js"></script>

</body>

</html>