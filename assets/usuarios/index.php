<?php
include '../extend/header.php';
?>

<div class="row">
    <div class="col s12">
        <div class="card">
            <div class="card-content">
                <span class="card-title">Alta de usuarios</span>

                <form action="ins_usuarios.php" class="form" method="post" enctype="multipart/form-data">
                    <div class="input-field">
                        <input type="text" name="nick" required autofocus title="debe contener entre 8 y 15 caracteres, solo letras" pattern="[A-Za-z]{8,15}" id="nick" onblur="may(this.value, this.id)">
                        <label for="nick">Nick:</label>
                    </div>
                    <div class="validacion"></div>

                    <div class="input-field">
                        <input type="password" name="pass1" title="Contraseña con números, letras mayúsculas y minúsculas entre 8 y 15 caracteres, payaso"
                            pattern="[A-Za-z0-9]{8,15}" id="pass1" required>
                        <label for="pass1">Contraseña:</label>
                    </div>

                    <div class="input-field">
                        <input type="password" title="Contraseña con números, letras mayúsculas y minúsculas entre 8 y 15 caracteres, payaso"
                            pattern="[A-Za-z0-9]{8,15}" id="pass2" required>
                        <label for="pass1">Verificar contraseña:</label>
                    </div>

                    <select name="nivel" required>
                        <option value="" disabled selected>Elige un nivel de usuario:</option>
                        <option value="ADMINISTRADOR">ADMINISTRADOR</option>
                        <option value="ASESOR">ASESOR</option>
                    </select>

                    <div class="input_field">
                        <input type="text" name="nombre" title="Nombre del usuario" onblur="may(this.value, this.id)" required pattern="[A-Z/s]+">
                        <label for="nombre">Nombre completo del usuario:</label>
                    </div>

                    <div class="input_field">
                        <input type="email" name="correo" title="Correo Electrónico" id="correo">
                        <label for="correo">Correo Electrónico</label>
                    </div>

                    <div class="file-field input-field">
                        <div class="btn">
                            <span>Foto:</span>
                            <input type="file" name="foto">
                        </div>
                        <div class="file-path wrapper">
                            <input class="file-path validate" type="text">
                        </div>
                    </div>

                    <button type="submit" class="btn black" id="btn_guardar">Guardar <i class="material-icons">send</i></button>

                </form>
            </div>
        </div>
    </div>
</div>


<!--agregar buscador-->

<div class="row">
    <div class="col s12">
        <div class="card">
            <div class="card_content">
                <span class="card-title">buscador de payasos</span>
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

<!--mostrar los datos de usuario en la pagina, abajo del formulario-->
<?php $sel = $con->query("SELECT * FROM usuario");
$row = mysqli_num_rows($sel); ?>

<div class="row">
    <div class="col s12">
        <div class="card">
            <div class="card-content">
                <span class="card-title">
                    usuarios(<?php echo $row ?>)
                </span>
                <table>
                    <thead>
                        <tr class="cabecera">
                            <th>Nick</th>
                            <th>Nombre</th>
                            <th>Correo</th>
                            <th>Nivel</th>
                            <th>Foto</th>
                            <th>Bloqueo</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <?php while ($f = $sel->fetch_assoc()) { ?>
                        <tr>
                            <td><?php echo $f['nick'] ?></td>
                            <td><?php echo $f['nombre'] ?></td>
                            <td><?php echo $f['correo'] ?></td>
                            <td><?php echo $f['nivel'] ?></td>
                            <td><img src=" <?php echo $f['foto'] ?> " width="50" class="circle" alt=""></td>
                            <td><?php echo $f['bloqueo'] ?></td>
                            <td></td>
                            <td></td>
                        </tr>
                    <?php    } ?>
                </table>
            </div>
        </div>
    </div>
</div>

<?php include '../extend/scripts.php'; ?>
<script src="../js/validacion.js"></script>

</body>

</html>