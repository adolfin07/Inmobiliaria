<?php
include '../conexion/conexion.php';


$mensaje = htmlentities($_GET['msj'] ?? '');
$c = htmlentities($_GET['c'] ?? '');
$p = htmlentities($_GET['p'] ?? '');
$t = htmlentities($_GET['t'] ?? '');

switch ($c) {
    case 'us':
        $carpeta = '../usuarios/';
        break;

    case 'home':
        $carpeta = '../inicio';
        break;

    case 'salir':
        $carpeta = '../';
        break;
}

switch ($p) {
    case 'in':
        $pagina = 'index.php';
        break;

    case 'home':
        $carpeta = '/index.php';
        break;

    case 'salir':
        $pagina = '';
        break;
}

$dir = $carpeta . $pagina;

$titulo = ($t == "error") ? "Oppss.." : "Buen trabajo, payaso!";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/sweetalert2.css">
    <title>Document</title>
</head>

<body>
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="/assets/js/sweetalert2.js"></script>
    <script>
        swal({
            title: <?php echo json_encode($titulo); ?>,
            text: <?php echo json_encode($mensaje); ?>,
            icon: '<?php echo $t; ?>',
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'Ok!'
        }).then(function() {
            location.href = '<?php echo $dir; ?>';
        });

        $(document).click(function() {
            location.href = '<?php echo $dir; ?>';
        });

        $(document).keyup(function(e) {
            if (e.key === "Escape" || e.keyCode === 27) {
                location.href = '<?php echo $dir; ?>';
            }
        });
    </script>
</body>

</html>