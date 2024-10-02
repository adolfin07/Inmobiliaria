

<?php

$con = new mysqli('localhost', 'root', '', 'inmobiliaria');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user = $con->real_escape_string(htmlentities($_POST['usuario']));
    $pass = $con->real_escape_string(htmlentities($_POST['contra']));


    $candado = ' ';
    $str_u = strpos($user, $candado);
    $str_p = strpos($user, $candado);

    if (is_int($str_u)) {

        $user = '';
    } else {
        $usuario = $user;
    }

    if (is_int($str_p)) {

        $pass = '';
    } else {
        $pass2 = sha1($pass);
    }


    if ($user == null or $pass == null) {

        header('location:../extend/alerta.php?msj=El formulario no es correcto&c=us&p=in&t=error');
    } else {
        $sel = $con->query("SELECT nick, nombre, nivel, correo, foto, pass 
        FROM usuario 
        WHERE nick = '$usuario' AND pass = '$pass2' AND bloqueo = 1");

        $row = mysqli_num_rows($sel);
        if ($row == 1) {
            if ($var = $sel->fetch_assoc()) {
                $nick = $var['nick'];
                $contra = $var['pass']; 
                $nivel = $var['nivel'];
                $correo = $var['correo'];
                $foto = $var['foto'];
                $nombre = $var['nombre'];
            }

          
            if ($nick === $usuario && $contra === $pass2 && trim($nivel) === 'ADMINISTRADOR') {
                // Guardamos la sesión
                $_SESSION['nick'] = $nick;
                $_SESSION['nombre'] = $nombre;
                $_SESSION['nivel'] = $nivel;
                $_SESSION['correo'] = $correo;
                $_SESSION['foto'] = $foto;

                // Redirigimos a la página de alerta
                header('Location: ../extend/alerta.php?msj=Bienvenidos&c=us&p=in&t=success');
                exit(); 
            } else {
                header('Location: ../extend/alerta.php?msj=No tienes permisos para entrar&c=us&p=in&t=error');
                exit(); 
            }
        } else {
           
            header('Location: ../extend/alerta.php?msj=Usuario o contraseña incorrectos&c=us&p=in&t=error');
            exit();
        }
    }
} else {
    header('location:../extend/alerta.php?msj=Utiliza el formulario&c=us&p=in&t=error');
}

?>