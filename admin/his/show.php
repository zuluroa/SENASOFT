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
                $id = $_GET['id'];
                $con = "SELECT * FROM historial where id='" . $id . "'";
                $act = mysqli_query($conexion, $con);
                $datos = mysqli_num_rows($act);
                if ($datos != 0) {
                    $vHis = mysqli_fetch_row($act);
                    $RSPac = mysqli_query($conexion, "SELECT * FROM paciente where id ='" . $vHis[1] . "'");
                    $vPac = mysqli_fetch_row($RSPac);
                    $RSTip = mysqli_query($conexion, "SELECT * FROM tipo_identificacion where id = '" . $vPac[1] . "'");
                    $vTip = mysqli_fetch_row($RSTip);
                    $RSCri = mysqli_query($conexion, "SELECT * FROM criterio where id ='" . $vHis[2] . "'");
                    $vCri = mysqli_fetch_row($RSCri);
                    if ($vCri[1] == 1) {
                        $vCri[1] = "CUMPLE";
                    } else {
                        $vCri[1] = "NO CUMPLE";
                    }
                    if ($vCri[2] == 1) {
                        $vCri[2] = "CUMPLE";
                    } else {
                        $vCri[2] = "NO CUMPLE";
                    }
                    if ($vCri[3] == 1) {
                        $vCri[3] = "CUMPLE";
                    } else {
                        $vCri[3] = "NO CUMPLE";
                    }
                    if ($vCri[4] == 1) {
                        $vCri[4] = "CUMPLE";
                    } else {
                        $vCri[4] = "NO CUMPLE";
                    }
                ?>
                    <div class="container">
                        <form class="ap" method="POST" enctype="multipart/form-data">
                            <h1>Mostrar Historial</h1>
                            <input type="hidden" value="<?php echo $id; ?>" name="PEDid">
                            <div class="form-group">
                                <h3>Fecha de la historia clinica</h3>
                                <input name="fecha " type="date" id="fecha " disabled class="form-control" value="<?php echo $vHis[3]; ?>">
                                </br>
                            </div>
                            <div class="form-group">
                                <h3>Tipo de identificación</h3>
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
                            <div class="col-xs-12">
                                <label>Firma del paciente</label>
                                <iframe src="../pac/archivos/<?php echo $vPac[5]; ?>" width="100%" height="100%"></iframe>
                            </div>
                            <br></br>
                            <div class="form-group">
                                <h3>LA HISTORIA CLINICA ESTA DILIGENCIADA COMPLETAMENTE</h3>
                                <input name="diligencia " type="text" id="diligencia " disabled class="form-control" value="<?php echo $vCri[1]; ?>">
                                </br>
                            </div>
                            <div class="form-group">
                                <h3>LA HISTORIA NO TIENE TACHONES NI ENMENDADURAS</h3>
                                <input name="tachon " type="text" id="tachon " disabled class="form-control" value="<?php echo $vCri[2]; ?>">
                                </br>
                            </div>
                            <div class="form-group">
                                <h3>LA HISTORIA CLINICA ESTA DILIGENCIADA CON TINTA NEGRA</h3>
                                <input name="tinta " type="text" id="tinta " disabled class="form-control" value="<?php echo $vCri[3]; ?>">
                                </br>
                            </div>
                            <div class="form-group">
                                <h3>LA FIRMA CORRESPONDE A LA PERSONA REGISTRADA</h3>
                                <input name="firma " type="text" id="firma " disabled class="form-control" value="<?php echo $vCri[4]; ?>">
                                </br>
                            </div>
                            <div class="form-group">
                                <h3>Foto o PDF de la historia clinica</h3>
                                <iframe src="archivos/<?php echo $vHis[4]; ?>" width="100%" height="100%"></iframe>
                                </br>
                                <br>
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