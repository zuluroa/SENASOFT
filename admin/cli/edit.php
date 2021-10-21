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

                    <!-- Content -->
                    <?php
                    include("../../conexion.php");
                    $id = $_GET['CLIid'];
                    $con = "SELECT * FROM cliente where CLIid='" . $id . "'";
                    $act = mysqli_query($conexion, $con);
                    $datos = mysqli_num_rows($act);
                    if ($datos != 0) {
                        $vCli = mysqli_fetch_row($act);
                        ?>
                        <div class="container">
                            <form class="ap"  method="POST" action="update.php" enctype="multipart/form-data">
                                <h1>Actualizar Cliente</h1>
                                <input type="hidden" value="<?php echo $id; ?>" name="CLIid">
                                <div class="form-group">
                                    <h3>Nombre</h3>
                                    <input name="CLINombre" type="text" id="CLINombre" placeholder="Nombre del Cliente" class="form-control" required="required" class="form-control" value="<?php echo $vCli[2]; ?>">
                                    </br>
                                </div>
                                <div class="form-group">
                                    <h3>Nit o Cedula</h3>
                                    <input name="CLINit" type="text" id="CLINit" placeholder="Nit del Cliente" class="form-control" required="required" class="form-control" value="<?php echo $vCli[1]; ?>">
                                    </br>
                                </div>
                                <div class="form-group">
                                    <h3>Tel&eacute;fono</h3>
                                    <input name="CLITelefono" type="text" id="CLITelefono" placeholder="Tel&eacute;fono del Cliente" class="form-control" required="required" class="form-control" value="<?php echo $vCli[3]; ?>">
                                    </br>
                                </div>
                                <div class="form-group">
                                    <input type="submit" name="Submit" value="Guardar" class="btn btn-primary" required="required" />
                                </div>
                                <div class="form-group">
                                    <h3></h3>
                                    <input name="CLIid" type="hidden" id="CLIid" class="form-control" required="required" class="form-control" value="<?php echo $id; ?>">
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
