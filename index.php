<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="../css/sweetalert2.css">
    <title>Inicio de sesión</title>
</head>

<body class="grey lighten-2">

    <main>
        <div class="row">
            <div class="input-field col s12 center">
                <img src="/assets/img/usuario.jpg" width="200" class="circle" alt="">
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col s12">
                    <div class="card z-depth-5">
                        <div class="card-content">
                            <span class="card-title">
                                <center>Inicio de sesión</center>
                            </span>

                            <form action="login/index.php" method="post" autocomplete="off">
                                <div class="input-field">
                                    <i class="material-icons prefix"></i>
                                    <input type="text" name="usuario" id="usuario" title="Letras mayúsculas entre 8 y 15 caracteres" required pattern="[A-Z]{8,15}" autofocus>
                                    <label for="usuario">Usuario</label>
                                    <span class="helper-text" data-error="Formato no válido" data-success="Formato correcto"></span>
                                </div>

                                <div class="input-field">
                                    <i class="material-icons prefix"></i>
                                    <input type="password" name="contra" id="contra" title="Contraseña con números y letras entre 8 y 15 caracteres" required pattern="[A-Za-z0-9]{8,15}">
                                    <label for="contra">Contraseña</label>
                                    <span class="helper-text" data-error="Formato no válido" data-success="Formato correcto"></span>
                                </div>

                                <div class="input-field center">
                                    <button type="submit" class="btn waves-effect waves-light">Acceder</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
    <script src="../js/materialize.min.js"></script>
    <script src="../js/sweetalert2.js"></script>
</body>

</html>