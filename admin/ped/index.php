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
      <script type="text/javascript">
                    function ConfirmDelete(){
                        var respuesta = confirm("Estas Seguro de Eliminar la Pedido?");
                        if(respuesta==true){
                            return true;
                        }else{
                            return false;
                        }
                    }

                    </script>

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
                $RSPed = mysqli_query($conexion, "SELECT * FROM pedido ORDER BY PEDid DESC");
                $NumPed = mysqli_num_rows($RSPed);
                ?>
                <div class="container">
                    <div class="btn-group">
                        <h1>Gestionar Pedidos</h1>
                        <div>
                            <a href="add.php" class="button big">Agregar</a></p>
                        </div>
                    </div>
                    <table align="center" class="table table-hover">
                        <thead class="color">
                            <tr>
                                <td align="center">
                                    <h3>Mostrar</h3>
                                </td>
                                <td align="center">
                                    <h3>Eliminar</h3>
                                </td>
                                <td align="center">
                                    <h3>Actualizar </h3>
                                </td>
                                <td align="center">
                                    <h3>Proveedor</h3>
                                </td>
                                <td align="center">
                                    <h3>Fecha</h3>
                                </td>
                                <td align="center">
                                    <h3>N&uacute;mero</h3>
                                </td>
                                <td align="center">
                                    <h3>PDF</h3>
                                </td>
                            </tr>
                        </thead>
                        <?php
                        if ($NumPed != 0) {
                            while ($vPed = mysqli_fetch_row($RSPed)) {
                                $RSPro = mysqli_query($conexion, "SELECT * FROM proveedor WHERE PROVid = '" . $vPed[1] . "'");
                                $NumPro = mysqli_num_rows($RSPro);
                                if ($NumPro != 0) {
                                    $vPro = mysqli_fetch_row($RSPro);
                                }
                               
                        ?>
                                <tbody>
                                    <tr>
                                        <td align="center" class="celd-centrar">
                                            <a href="show.php?PEDid=<?php echo $vPed[0] ?>" class="button big">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                        </td>
                                        <td align="center">
                                            <a href="delete.php?PEDid=<?php echo $vPed[0] ?>" class="button big"  onclick=" return ConfirmDelete()">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </td>
                                        <td align="center">
                                            <a href="edit.php?PEDid=<?php echo $vPed[0] ?>" class="button big">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                        </td>
                                        <td align="center">
                                            <div align="center"><?php echo $vPro[1] ?></div>
                                        </td>
                                        <td align="center">
                                            <div align="center"><?php echo $vPed[2] ?></div>
                                        </td>
                                        <td align="center">
                                            <div align="center"><?php echo $vPed[3] ?></div>
                                        </td>
                                        <td align="center">
                                        <?php
                                         if($vPed[4]==null){
                                            echo "NO HAY PDF";
                                        }else{
                                            ?>
                                            <a href="archivo.php?PEDid=<?php echo $vPed[0]; ?>" class="button big">
                                                <i class="fas fa-file-pdf"></i>
                                            </a>
                                            <?php
                                        }
                                            ?>
                                        </td>
                                    </tr>
                                </tbody>
                        <?php
                            }
                        }
                        ?>
                    </table>
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