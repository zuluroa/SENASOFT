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
                include("../../conexion.php");
                include '../header.php';
                $RSTip = mysqli_query($conexion, "SELECT * FROM tipo_identificacion");
                $NumTip = mysqli_num_rows($RSTip);
                ?>

                <!-- Content -->

                <div class="container">
                    <form class="ap" method="post" action="insert.php" enctype="multipart/form-data">
                        <h1>Registrar Paciente</h1>
                        <div class="form-group">
                            <h3>Tipo de identificaci&oacute;n</h3>
                            <select name="id_tipoIndentificacion" class="form-control">
                                <option>SELECCIONA UNA OPCI&Oacute;N</option>
                                <?php
                                if ($NumTip != 0) {
                                    while ($vTip = mysqli_fetch_row($RSTip)) {
                                ?>
                                        <option value="<?php echo $vTip[0]; ?>"><?php echo $vTip[1]; ?></option>
                                <?php
                                    }
                                }
                                ?>
                            </select>
                            </br>
                        </div>
                        <div class="form-group">
                            <h3>N&uacute;mero de identificaci&oacute;n</h3>
                            <input name="numero_identificacion" type="text" id="Numero_identificacion" placeholder="Numero de identificacion" required class="form-control">
                            </br>
                        </div>
                        <div class="form-group">
                            <h3>Nombre del paciente</h3>
                            <input name="nombre" type="text" id="nombre" placeholder="Nombre del paciente" required class="form-control">
                            </br>
                        </div>
                        <div class="form-group">
                            <h3>Tel&eacute;fono del paciente</h3>
                            <input name="telefono" type="text" id="telefono" placeholder="Telefono del paciente" required class="form-control">
                            </br>
                        </div>
                        <div class="form-group">
                            <h3>Firma del paciente</h3>
                            <input id="firma" name="firma"  type="file"><br>
                            <iframe id="img" alt="Imagen" width="100%" height="100%"></iframe>
                            <br></br>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="insertar" value="Guardar" class="btn btn-primary" required="required" />
                        </div>
                        <br></br>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>
        function init() {
            var inputFile = document.getElementById('firma');
            inputFile.addEventListener('change', mostrarImagen, false);
        }

        function mostrarImagen(event) {
            var file = event.target.files[0];
            var reader = new FileReader();
            reader.onload = function(event) {
                var img = document.getElementById('img');
                img.src = event.target.result;
            }
            reader.readAsDataURL(file);
        }

        window.addEventListener('load', init, false);
    </script>

</body>

</html>