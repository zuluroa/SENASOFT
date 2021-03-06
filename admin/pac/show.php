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
                <?php
                include("../../conexion.php");
                $id = $_GET['id'];
                $con = "SELECT * FROM paciente where id='" . $id . "'";
                $act = mysqli_query($conexion, $con);
                $datos = mysqli_num_rows($act);
                if ($datos != 0) {
                    $vPac = mysqli_fetch_row($act);
                    $RSTip = mysqli_query($conexion, "SELECT * FROM tipo_identificacion where id = '" . $vPac[1] . "'");
                    $vTip = mysqli_fetch_row($RSTip);
                ?>
                    <div class="container">
                    <h1>Mostrar Paciente</h1>
                        <form  id="formdividido" method="POST" enctype="multipart/form-data" overflow="hidden">
                           
                            <div class="form-group">
                                <h3>Tipo de identificaci&oacute;n</h3>
                                <input name="id_tipoIndentificacion " type="text" id="id_tipoIndentificacion " disabled class="form-control" value="<?php echo $vTip[1]; ?>">
                                </br>
                            </div>
                            <div class="form-group">
                                <h3>N&uacute;mero de identificaci&oacute;n</h3>
                                <input name="numero_identificacion " type="text" id="numero_identificacion " disabled class="form-control" value="<?php echo $vPac[2]; ?>">
                                </br>
                            </div>
                            <div class="form-group">
                                <h3>Nombre del paciente</h3>
                                <input name="nombre " type="text" id="nombre " disabled class="form-control" value="<?php echo $vPac[3]; ?>">
                                </br>
                            </div>
                            <div class="form-group">
                                <h3>Tel&eacute;fono del paciente</h3>
                                <input name="telefono " type="text" id="telefono " disabled class="form-control" value="<?php echo $vPac[4]; ?>">
                                </br>
                            </div>
                          
                            <br></br>
                        </form>
                        <div  id="imagendividido">
                                <h3>Firma del paciente</h3>
                                <iframe src="archivos/<?php echo $vPac[5]; ?>" width="100%" height="400px"></iframe>
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