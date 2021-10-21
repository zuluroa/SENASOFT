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
            <table width="100%">
                <tr>
                    <ul>
                    <li class="nav-item">
                            <a class="nav-link" href="../pac/index.php">
                                PACIENTE
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../his/index.php">
                                HISTORIAL
                            </a>
                        </li>
             
                        <li class="nav-item">
                            <a class="nav-link" href="../../cerrar_session.php">
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