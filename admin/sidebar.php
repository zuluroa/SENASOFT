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
                        <li>
                            <a href="../usu/index.php">
                                Usuario
                            </a>
                        </li>
                        <li>
                            <a href="../ent/index.php">
                                Entidad
                            </a>
                        </li>
                        <li>
                            <a href="../cli/index.php">
                                Cliente
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../prov/index.php">
                                proveedor
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../emp/index.php">
                                empaque
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../pro/index.php">
                                producto
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../ped/index.php">
                                pedido
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../ven/index.php">
                                Venta
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
            <p class="copyright" align="center">&copy; Todos los derechos reservados ORANGECODE <?php echo date("Y"); ?> <br /></p>
        </footer>

    </div>
</div>