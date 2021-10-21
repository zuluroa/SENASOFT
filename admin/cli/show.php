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
                    include("../conexion.php");
                    $id = $_GET['CLIid'];
                    $con = "SELECT * FROM cliente where CLIid='" . $id . "'";
                    $act = mysqli_query($conexion, $con);
                    $datos = mysqli_num_rows($act);
                    if ($datos != 0) {
                        $vCli = mysqli_fetch_row($act);
                        ?>
                        <div class="container">
                            <form class="ap"  method="POST" enctype="multipart/form-data">
                                <h1>Mostrar Cliente</h1>
                                <input type="hidden" value="<?php echo $id; ?>" name="CLIid">
                                <div class="form-group">
                                    <h3>Nombre</h3>
                                    <input name="CLINombre" disabled type="text" id="CLINombre" placeholder="Nombre del Cliente" class="form-control" required="required" class="form-control" value="<?php echo $vCli[1]; ?>">
                                    </br>
                                </div>
                                <div class="form-group">
                                    <h3>Nit</h3>
                                    <input name="CLINit" disabled type="text" id="CLINit" placeholder="Nit del Cliente" class="form-control" required="required" class="form-control" value="<?php echo $vCli[2]; ?>">
                                    </br>
                                </div>
                                <div class="form-group">
                                    <h3>Direcci&oacute;n</h3>
                                    <input name="CLIDireccion" disabled type="text" id="CLIDireccion" placeholder="Nombre del Cliente" class="form-control" required="required" class="form-control" value="<?php echo $vCli[3]; ?>">
                                    </br>
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
