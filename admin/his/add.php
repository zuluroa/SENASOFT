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
                include("../../conexion.php");
                $NumPac = 0;
                ?>

                <!-- Content -->
                <div class="container">
                    <h1>Registrar nuevo historial</h1>
                    <form class="ap" method="POST" action="add.php" enctype="multipart/form-data">
                        <div class="form-group">
                            <h3>PACIENTE</h3>
                            <input name="numero_identificacion" type="text" id="numero_identificacion" placeholder="N&uacute;mero identificaci&oacute;n" required="required" class="form-control">
                            <div class="form-group">
                                <br>
                                <input type="submit" name="buscar" value="Buscar" class="btn btn-primary">
                            </div>
                            <?php
                            if (isset($_POST['buscar'])) {
                                $Identificacion = $_POST['numero_identificacion'];
                                $RSPac = mysqli_query($conexion, "SELECT * FROM paciente where numero_identificacion LIKE '%" . $Identificacion . "%'");
                                $NumPac = mysqli_num_rows($RSPac);
                            }
                            ?>
                            </select>
                            <br>
                        </div>
                    </form>
                    <form class="ap" method="post" action="insert.php" enctype="multipart/form-data">
                        <?php
                        if ($NumPac != 0) {
                            $vPac = mysqli_fetch_row($RSPac);
                            $RSTip = mysqli_query($conexion, "SELECT * FROM tipo_identificacion where id = '" . $vPac[1] . "'");
                            $vTip = mysqli_fetch_row($RSTip);
                        ?>
                            <div class="form-group">
                                <h3>Fecha de la historia clinica</h3>
                                <input name="fecha " type="date" id="fecha "  class="form-control">
                                </br>
                            </div>
                            <input type="hidden" value="<?php echo $vPac[0]; ?>" name="paciente_id">
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
                                <h3>Firma del paciente</h3>
                                <iframe src="../pac/archivos/<?php echo $vPac[5]; ?>" width="100%" height="275px"></iframe>
                            </div>
                            <br></br>
                            <div class="form-group">
                                <h3>LA HISTORIA CLINICA ESTA DILIGENCIADA COMPLETAMENTE</h3>
                                <select name="diligencia" class="form-control">
                                    <option value="1">CUMPLE</option>
                                    <option value="0">NO CUMPLE</option>
                                </select>
                                <br>
                            </div>
                            <div class="form-group">
                                <h3>LA HISTORIA NO TIENE TACHONES NI ENMENDADURAS</h3>
                                <select name="tachon" class="form-control">
                                    <option value="1">CUMPLE</option>
                                    <option value="0">NO CUMPLE</option>
                                </select>
                                <br>
                            </div>
                            <div class="form-group">
                                <h3>LA HISTORIA CLINICA ESTA DILIGENCIADA CON TINTA NEGRA</h3>
                                <select name="tinta" class="form-control">
                                    <option value="1">CUMPLE</option>
                                    <option value="0">NO CUMPLE</option>
                                </select>
                                <br>
                            </div>
                            <div class="form-group">
                                <h3>LA FIRMA CORRESPONDE A LA PERSONA REGISTRADA</h3>
                                <select name="firma" class="form-control">
                                    <option value="1">CUMPLE</option>
                                    <option value="0">NO CUMPLE</option>
                                </select>
                                <br>
                            </div>
                            <div class="form-group">
                                <h3>PDF de la historia clinica</h3>
                                <input name="pdf" type="file" id="pdf" class="form-control" accept="application/pdf" />
                                </br>
                                <br>
                            </div>
                            <div class="form-group">
                                <input type="submit" name="insertar" value="Guardar" class="btn btn-primary" required="required" />
                            </div>
                            <br>
                        <?php
                        } else {
                            echo "NO EXISTE ESTE USUARIO, INTENTA NUEVAMENTE.";
                        }
                        ?>
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