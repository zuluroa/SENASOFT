<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="icon" href="img/icono.png">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/main.css">
    <title>SENASOFT</title>
</head>

<body>
    <!-- FONDO -->
    <div class="fond-pink">
    </div>
    <div class="fond-blue">
    </div>

    <!-- LOGIN -->
    <header>
        <div class="container">
            <div class="container-flex">

                <!-- CAJA 1 -->
                <div class="caja1">
                    <div class="checked-flex">
                        <p>SENASOFT</p>
                    </div>
                    <div class="caja1-titulo">
                        <h1>Sistema de recepci&oacute;n de historias clinicas</h1>
                    </div>

                    <div class="selectForm">
                        <div class="select-i">
                            <i class="fas fa-chevron-right"></i>
                        </div>
                    </div>
                </div>

                <!-- CAJA 2 -->
                <div class="caja2">

                    <form action="validar.php" id="Form" method="POST">

                        <div class="form-flex">
                            <label for="email" class="texto">Correo Electronico</label>
                            <input type="text" id="usuario" name="usuario" placeholder="Correo@hotmail.com" required>

                            <!-- MENSAJE DE ERRO/VALIDACION -->
                            <div class="error">
                                <p>Tu Correo no es valido, debe tener<br> @hotmail, @outlook o @gmail</p>
                            </div>
                        </div>

                        <div class="form-flex">
                            <label for="contra" class="texto">Contraseña</label>
                            <input type="password" id="clave" name="clave" placeholder="Contraseña" required>
                        </div>

                        <input name="rol" type="radio" value="1" checked="checked">Administrador&nbsp;
                        </br>
                        <input type="submit" value="Iniciar Sesión" class="boton">
                    </form>
                </div>
            </div>
        </div>
    </header>


    <!-- URL JAVASCRIPT -->
    <script src="js/main.js"></script>
</body>

</html>