<!DOCTYPE HTML>

<html>

<head>
    <title>VITALPLUS</title>
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
                <section>
                    <!-- Content -->
                    <?php
                    include("../../conexion.php");
                    $RSCli = mysqli_query($conexion, "SELECT * FROM cliente");
                    $NumCli = mysqli_num_rows($RSCli);
                    ?>
                    <div class="container">
                        <div class="btn-group">
                            <h1>Gestionar Cliente</h1>
                            <div>
                                <a href="add.php" class="button big">Agregar</a></p>
                            </div>
                        </div>
                        <table class="table table-hover">
                            <thead class="color">
                                <tr>
                                    <td align="center">
                                        <h3>Eliminar</h3>
                                    </td>
                                    <td align="center">
                                        <h3>Actualizar</h3>
                                    </td>
                                    <td align="center">
                                        <h3> Nit o Cedula </h3>
                                    </td>
                                    <td align="center">
                                        <h3>Nombre</h3>
                                    </td>
                                    <td align="center">
                                        <h3>Tel&eacute;fono</h3>
                                    </td>
                                </tr>
                            </thead>
                            <?php
                            if ($NumCli != 0) {
                                while ($vCli = mysqli_fetch_row($RSCli)) {
                            ?>
                                    <tbody>
                                        <tr>

                                            <td align="center">
                                                <a href="delete.php?CLIid=<?php echo $vCli[0] ?>" class="button big">

                                                    <i class="fas fa-trash"></i>

                                                </a>
                                            </td>
                                            <td align="center">
                                                <a href="edit.php?CLIid=<?php echo $vCli[0] ?>" class="button big">

                                                    <i class="fas fa-edit"></i>

                                                </a>
                                            </td>
                                            <td align="center">
                                                <div><?php echo $vCli[1] ?></div>
                                            </td>
                                            <td align="center">
                                                <div><?php echo $vCli[2] ?></div>
                                            </td>
                                            <td align="center">
                                                <div><?php echo $vCli[3] ?></div>
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
        </section>
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