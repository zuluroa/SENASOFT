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
                $RSHis = mysqli_query($conexion, "SELECT * FROM historial ORDER BY id DESC");
                $NumHis = mysqli_num_rows($RSHis);
                ?>
                <div class="container">
                    <div class="btn-group">
                        <h1>Gestionar Historial</h1>
                        <div>
                            <a href="add.php" class="button big">Agregar</a></p>
                        </div>
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
                                    <h3>Proveedor</h3>
                                </td>
                                <td align="center">
                                    <h3>Paciente</h3>
                                </td>
                                <td align="center">
                                    <h3>Fecha</h3>
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
                                            <a href="show.php?PEDid=<?php echo $vPed[0] ?>" class="button big">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                        </td>
                                        <td align="center">
                                            <a href="delete.php?PEDid=<?php echo $vPed[0] ?>" class="button big" onclick=" return ConfirmDelete()">
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