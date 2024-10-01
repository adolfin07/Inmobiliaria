<?php include '../conexion/conexion.php'; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/materialize.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="../css/sweetalert2.css">
    <title>Inmobiliaria</title>


    <style media="screen">
        header,
        main,
        footer, .row {
            padding-left: 300px;
        }

        .button-collpase {
            display: none;
        }

        @media only screen and (max-width:992px) {

            header,
            main,
            footer {
                padding-left: 0;
            }

            .button-collpase {
                display: inherit;
            }
        }
    </style>
</head>

<body>
    <main>
        <?php include 'menu_admin.php' ?>
    </main>
</body>

</html>