<!DOCTYPE HTML>

<html>
<?php
session_start();
$varsesion = $_SESSION['NombreADMIN'];
if ($varsesion == null || $varsesion = '') {
    $mensaje="No ha Iniciado Sesion.";
    echo '<script>
    alert("'.$mensaje.'");
    location.href="../index.php";
    </script>';
    die();
}
?>

<head>
    <title>SENASOFT</title>
    <meta charset="utf-8" />
    <link rel="shortcut icon" href="img/icono.png">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <link rel="stylesheet" href="assets/css/main.css" />
</head>

<body class="is-preload">

    <!-- Wrapper -->
    <div id="wrapper">

        <!-- Main -->
        <div id="main">
            <div class="inner">

                <!-- Header -->
                <header id="header">
                    <a href="../admin/index.php" class="logo"><strong>SENASOFT</strong>Sistema de recepci&oacute;n de historias clinicas</a>
                </header>

                <!-- Banner -->
                <section id="banner">
                    <div class="content">
                        <header>
                            <h1>SENASOFT<br />
                            </h1>
                            <p>Sistema de recepci&oacute;n de historias clinicas</p>
                        </header>

                    </div>
                    <span class="image object">
                        <img src="img/LogoGrande.png" style="width:300px; height:300px;" />
                    </span>
                </section>
            </div>
        </div>

        <!-- Sidebar -->
        <div id="sidebar">
            <div class="inner">

                <!-- Search -->
                <section id="search" class="alt">
                    <h3>Bienvenido, <?php echo $_SESSION['NombreADMIN']; ?></h3>
                </section>

                <!-- Menu -->
                <nav id="menu">
                    <header class="major">
                        <h2>Menu</h2>
                    </header>
                    <table width="100%" align="center">
                        <tr>
                            <ul>
                                <li class="nav-item">
                                    <a class="nav-link" href="../admin/pac/index.php">
                                        PACIENTE
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="../admin/his/index.php">
                                        HISTORIAL
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="../cerrar_session.php">
                                        Cerrar
                                    </a>
                                </li>
                            </ul>

                        </tr>
                    </table>
                </nav>


                <footer id="footer">
                    <p class="copyright" align="center">&copy; Todos los derechos reservados <?php echo date("Y"); ?> <br /></p>
                </footer>

            </div>
        </div>

    </div>

    <!-- Scripts -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/browser.min.js"></script>
    <script src="assets/js/breakpoints.min.js"></script>
    <script src="assets/js/util.js"></script>
    <script src="assets/js/main.js"></script>

</body>

</html>