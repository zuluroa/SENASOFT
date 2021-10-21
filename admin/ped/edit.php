<!DOCTYPE HTML>

<html>

<head>
    <title>VITALPLUS</title>
    <meta charset="utf-8" />
    <link rel="shortcut icon" href="../img/icono.png">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <link rel="stylesheet" href="../assets/css/main.css" />
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0-beta1/jquery.js"></script>
    <script>
        $(function() {
            // Clona la fila oculta que tiene los campos base, y la agrega al final de la tabla
            $("#adicional").on('click', function() {
                $("#tabla tbody tr:eq(0)").clone().removeClass('fila-fija').appendTo("#tabla").find('input').val('').end();
            });

            // Evento que selecciona la fila y la elimina 
            $(document).on("click", ".eliminar", function() {
                var parent = $(this).parents().get(0);
                $(parent).remove();
            });
        });
    </script>
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
                        <form class="ap" method="POST" action="update.php" enctype="multipart/form-data">
                            <h1>Actualizar Pedido</h1>
                            <input type="hidden" value="<?php echo $id; ?>" name="PEDid">
                            <div class="form-group">
                                <h3>Proveedor</h3>
                                <select name="PROVid" class="form-control">
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
                                <input name="PEDFecha" type="date" id="PEDFecha" placeholder="Fecha del Pedido" required="required" class="form-control" value="<?php echo $vPed[2]; ?>">
                                </br>
                            </div>
                            <div class="form-group">
                                <h3>N&uacute;mero de Pedido</h3>
                                <input name="PEDNumero" type="text" id="PEDNumero" placeholder="N&uacute;mero de Pedido" required="required" class="form-control" value="<?php echo $vPed[3]; ?>">
                                </br>
                            </div>
                          
                            <div class="btn-der">
                                <button id="adicional" name="adicional" type="button" class="btn btn-warning"> M&aacute;s + </button>
                                </br>
                                </br>
                            </div>
                            <div class="form-group">
                                <h3>PDF de la Factura</h3>
                                <input name="PEDPdf" type="file" id="PEDPdf" class="form-control">
                                </br>
                                <br>
                            </div>
                            <div class="form-group">
                                <input type="submit" name="insertar" value="Guardar" class="btn btn-primary" required="required" />
                            </div>
                            <div class="form-group">
                                <label></label>
                                <input name="PEDid" type="hidden" id="PEDid" value="<?php echo $id; ?>">
                            </div>
                        </form>
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