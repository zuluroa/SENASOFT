<!DOCTYPE HTML>

<html>

<head>
    <title>SENASOFT</title>
    <meta charset="utf-8" />
    <link rel="shortcut icon" href="../img/icono.png">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <link rel="stylesheet" href="../assets/css/main.css" />
</head>

<body class="is-preload">
    <script type="text/javascript">
        function ConfirmDelete() {
            var respuesta = confirm("Estas Seguro de Eliminar la Pedido?");
            if (respuesta == true) {
                return true;
            } else {
                return false;
            }
        }
    </script>

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
                if (isset($_POST['buscar'])) {
                    $datos = $_POST['datos'];
                    $RSHis = mysqli_query($conexion, "SELECT * FROM historial INNER JOIN paciente ON historial.paciente_id = paciente.id WHERE paciente.numero_identificacion LIKE '%$datos%' OR paciente.nombre LIKE '%$datos%' ORDER BY historial.fecha DESC");
                    $NumHis = mysqli_num_rows($RSHis);
                } else {
                    $RSHis = mysqli_query($conexion, "SELECT * FROM historial ORDER BY fecha DESC");
                    $NumHis = mysqli_num_rows($RSHis);
                }

                ?>
                <div class="container">
                    <div class="btn-group">
                        <h1>Gestionar Historial</h1>
                        <div>
                            <a href="add.php" class="button big">Agregar</a></p>
                        </div>
                        <form class="ap" method="POST" action="#" enctype="multipart/form-data">
                            <div class="form-group">
                                <h3>BUSCAR POR:</h3>
                                <input name="datos" type="text" placeholder="NOMBRE O IDENTIFICACI&Oacute;N DEL PACIENTE" id="datos" class="form-control">
                            </div>
                            <div class="form-group">
                                <input type="submit" name="buscar" value="Buscar" class="btn btn-primary">
                                <br>
                            </div>
                        </form>
                    </div>
                    <table align="center" class="table table-hover">
                        <thead class="color">
                            <tr>
                                <td align="center">
                                    <h3>Mostrar</h3>
                                </td>
                                <td align="center">
                                    <h3>Eliminar</h3>
                                </td>
                                <td align="center">
                                    <h3>Paciente</h3>
                                </td>
                                <td align="center">
                                    <h3>Fecha de servicio</h3>
                                </td>
                            </tr>
                        </thead>
                        <?php
                        if ($NumHis != 0) {
                            while ($vHis = mysqli_fetch_row($RSHis)) {
                                $RSPac = mysqli_query($conexion, "SELECT * FROM paciente WHERE id = '" . $vHis[1] . "'");
                                $NumPac = mysqli_num_rows($RSPac);
                                if ($NumPac != 0) {
                                    $vPac = mysqli_fetch_row($RSPac);
                                }

                        ?>
                                <tbody>
                                    <tr>
                                        <td align="center" class="celd-centrar">
                                            <a href="show.php?id=<?php echo $vHis[0] ?>" class="button big">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                        </td>
                                        <td align="center">
                                            <a href="delete.php?id=<?php echo $vHis[0] ?>" class="button big" onclick=" return ConfirmDelete()">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </td>
                                        <td align="center">
                                            <div align="center"><?php echo $vPac[2] . " - " . $vPac[3] ?></div>
                                        </td>
                                        <td align="center">
                                            <div align="center"><?php echo $vHis[3] ?></div>
                                        </td>
                                    </tr>
                                </tbody>
                        <?php
                            }
                        }
                        ?>
                    </table>
                </div>
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