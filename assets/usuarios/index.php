<?php
include '../extend/header.php';
include '../conexion/conexion.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alta de usuarios</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
</head>

<body>

    <div class="row">
        <div class="col s12">
            <div class="card">
                <div class="card-content">
                    <span class="card-title">Alta de usuarios</span>

                    <form action="ins_usuarios.php" class="form" method="post" enctype="multipart/form-data">
                        <div class="input-field">
                            <input type="text" name="nick" required autofocus title="Debe contener entre 8 y 15 caracteres, solo letras" pattern="[A-Za-z]{8,15}" id="nick" onblur="may(this.value, this.id)">
                            <label for="nick">Nick:</label>
                        </div>

                        <div class="input-field">
                            <input type="password" name="pass1" title="Contraseña con números, letras mayúsculas y minúsculas entre 8 y 15 caracteres" pattern="[A-Za-z0-9]{8,15}" id="pass1" required>
                            <label for="pass1">Contraseña:</label>
                        </div>

                        <div class="input-field">
                            <input type="password" name="pass2" title="Repetir contraseña" pattern="[A-Za-z0-9]{8,15}" id="pass2" required>
                            <label for="pass2">Verificar contraseña:</label>
                        </div>

                        <div class="input-field">
                            <select name="nivel" required>
                                <option value="" disabled selected>Elige un nivel de usuario:</option>
                                <option value="ADMINISTRADOR">ADMINISTRADOR</option>
                                <option value="ASESOR">ASESOR</option>
                            </select>
                        </div>

                        <div class="input-field">
                            <input type="text" name="nombre" title="Nombre completo del usuario" onblur="may(this.value, this.id)" required pattern="[A-Z\s]+">
                            <label for="nombre">Nombre completo del usuario:</label>
                        </div>

                        <div class="input-field">
                            <input type="email" name="correo" title="Correo Electrónico" id="correo" required>
                            <label for="correo">Correo Electrónico:</label>
                        </div>

                        <div class="file-field input-field">
                            <div class="btn">
                                <span>Foto:</span>
                                <input type="file" name="foto">
                            </div>
                            <div class="file-path-wrapper">
                                <input class="file-path validate" type="text">
                            </div>
                        </div>

                        <button type="submit" class="btn black" id="btn_guardar">Guardar <i class="material-icons">send</i></button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Buscador -->
    <div class="row">
        <div class="col s12">
            <div class="card">
                <div class="card-content">
                    <span class="card-title">Buscador de usuarios</span>
                    <nav class="white">
                        <div class="nav-wrapper">
                            <div class="input-field">
                                <input type="search" autocomplete="off" id="buscar">
                                <label for="buscar"><i class="material-icons">search</i></label>
                                <i class="material-icons">close</i>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <!-- Mostrar usuarios registrados -->
    <?php
    $sel = $con->query("SELECT * FROM usuario");
    $row = mysqli_num_rows($sel);
    ?>

    <div class="row">
        <div class="col s12">
            <div class="card">
                <div class="card-content">
                    <span class="card-title">Usuarios (<?php echo $row; ?>)</span>
                    <table class="striped">
                        <thead>
                            <tr>
                                <th>Nick</th>
                                <th>Nombre</th>
                                <th>Correo</th>
                                <th>Nivel</th>
                                <th>Foto</th>
                                <th>Bloqueo</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($f = $sel->fetch_assoc()) { ?>
                                <tr>
                                    <td><?php echo $f['nick']; ?></td>
                                    <td><?php echo $f['nombre']; ?></td>
                                    <td><?php echo $f['correo']; ?></td>
                                    <td><?php echo $f['nivel']; ?></td>
                                    <td><img src="<?php echo $f['foto']; ?>" width="50" class="circle" alt="Foto del usuario"></td>
                                    <td><?php echo $f['bloqueo'] == 1 ? 'Activo' : 'Bloqueado'; ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <?php include '../extend/scripts.php'; ?>
    <script src="../js/validacion.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('select');
            var instances = M.FormSelect.init(elems);
        });
    </script>
</body>

</html>