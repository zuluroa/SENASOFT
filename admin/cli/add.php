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

                    <!-- Content -->

                    <div class="container">
                        <form class="ap" method="post" action="insert.php" enctype="multipart/form-data">
                            <h1>Registrar Cliente</h1>
                            <div class="form-group">
                                <h3>Nombre</h3>
                                <input name="CLINombre" type="text" id="CLINombre" placeholder="Nombre del Cliente" class="form-control" required="required"
                                       class="form-control">
                                </br>
                            </div>
                            <div class="form-group">
                                <h3>Nit o Cedula</h3>
                                <input name="CLINit" type="text" id="CLINit" placeholder="Nit del Cliente" class="form-control" required="required"
                                       class="form-control">
                                </br>
                            </div>
                            <div class="form-group">
                                <h3>Tel&eacute;fono</h3>
                                <input name="CLITelefono" type="text" id="CLITelefono" placeholder="Tel&eacute;fono del Cliente" class="form-control" required="required"
                                       class="form-control">
                                </br>
                            </div>
                            <div class="form-group">
                                <input type="submit" name="Submit" value="Guardar" class="btn btn-primary" required="required" />
                            </div>
                        </form>
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