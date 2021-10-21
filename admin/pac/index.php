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
                    $RSPac = mysqli_query($conexion, "SELECT * FROM paciente ORDER BY id DESC");
                    $NumPac = mysqli_num_rows($RSPac);
                    ?>
                    <div class="container">
                        <div class="btn-group">
                            <h1>Gestionar Pacientes</h1>
                            <div>
                                <a href="add.php" class="button big">Agregar</a></p>
                            </div>
                        </div>
                        <table class="table table-hover">
                            <thead class="color">
                                <tr>
                                    <td align="center">
                                        <h3>Mostrar</h3>
                                    </td>
                                    <td align="center">
                                        <h3>Eliminar</h3>
                                    </td>
                                    <td align="center">
                                        <h3>Cedula</h3>
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
                            if ($NumPac != 0) {
                                while ($vPac = mysqli_fetch_row($RSPac)) {
                            ?>
                                    <tbody>
                                        <tr>
                                            <td align="center">
                                                <a href="show.php?id=<?php echo $vPac[0] ?>" class="button big">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                            </td>
                                            <td align="center">
                                                <a href="delete.php?id=<?php echo $vPac[0] ?>" class="button big">
                                                    <i class="fas fa-trash"></i>
                                                </a>
                                            </td>
                                            <td align="center">
                                                <div><?php echo $vPac[2] ?></div>
                                            </td>
                                            <td align="center">
                                                <div><?php echo $vPac[3] ?></div>
                                            </td>
                                            <td align="center">
                                                <div><?php echo $vPac[4] ?></div>
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