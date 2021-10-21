<!DOCTYPE HTML>

<html>
<?php
/*
session_start();
$varsesion = $_SESSION['NombreADMIN'];
if ($varsesion == null || $varsesion = '') {
    echo 'No ha Iniciado Sesion';
    die();
}*/
?>

<head>
    <title>VITALPLUS</title>
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
                    <a href="../admin/index.php" class="logo"><strong>VITALPLUS</strong> Sistema de Inventarios</a>
                </header>

                <!-- Banner -->
                <section id="banner">
                    <div class="content">
                        <header>
                            <h1>VITALPLUS<br />
                            </h1>
                            <p>Sistema de Inventarios</p>
                        </header>

                    </div>
                    <span class="image object">
                        <img src="img/LogoGrande.png" style="width:300px; height:300px;" />
                    </span>
                </section>

                <!-- Section 
                <section>
                    <header class="major">
                        <h2>Beneficios</h2>
                    </header>
                    <div class="features">
                        <article>
                            <span class="icon fa-gem"></span>
                            <div class="content">
                                <h3>Contexto Real</h3>
                                <p>Inmersión del aprendiz en contexto real simulando el uso de sistemas de información de unidad de correspondecia.</p>
                            </div>
                        </article>
                        <article>
                            <span class="icon solid fa-paper-plane"></span>
                            <div class="content">
                                <h3>Accesibilidad</h3>
                                <p>Accesibilidad al uso de la herramienta en dispositivos con conexión a internet.</p>
                            </div>
                        </article>
                        <article>
                            <span class="icon solid fa-rocket"></span>
                            <div class="content">
                                <h3>Experiencia Guiada</h3>
                                <p>Experiencia de usuario guiada para facilitar el manejo del simulador.</p>
                            </div>
                        </article>
                        <article>
                            <span class="icon solid fa-signal"></span>
                            <div class="content">
                                <h3>Uso de correspondecia</h3>
                                <p>Trazabilidad y transparencia en los procesos de la unidad de correspondencia.</p>
                            </div>
                        </article>
                    </div>
                </section>
-->
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
                                <a class="nav-link" href="../admin/ped/index.php">
                                    pedido
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
                    <p class="copyright" align="center">&copy; Todos los derechos reservados ORANGECODE <?php echo date("Y"); ?> <br /></p>
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