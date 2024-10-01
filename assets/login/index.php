

<?php

$con = new mysqli('localhost', 'root', '', 'inmobiliaria-master');

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
        $sel = $con->query("SELECT nick,nombre,nivel,correo,foto,pass FROM usuario WHERE nick = '$usuariod' AND pass = '$pass2' AND bloqueo = 1");


        $row = mysqli_num_rows($sel);
        if ($row == 1) {
            if ($var = $sel->fetch_assoc()) {
                $nick = $var['nick'];
                $contra = $var['contra'];
                $nivel = $var['nivel'];
                $correo = $var['correo'];
                $foto = $var['foto'];
                $nombre = $var['nombre'];
            }
        }
    }
} else {
    header('location:../extend/alerta.php?msj=Utiliza el formulario&c=us&p=in&t=error');
}

?>