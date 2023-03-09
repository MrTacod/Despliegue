<?php

include('database.php');

if ($connection) {

    /* Recoje los datos del libro y los guarda aquí */

    if (isset($_POST['imagen'])) {
        $imagen = $_POST['imagen'];
        $titulo = $_POST['titulo'];
        $autor = $_POST['autor'];
        $isbn = $_POST['isbn'];
        $resumen = $_POST['resumen'];
        $formato = $_POST['formato'];

        /* En caso de estar todos los campos, crea el libro y lo guarda en la base de datos */

        if($formato == 'fotocopiado' || $formato == 'original'){
            $query = "INSERT INTO libro(imagen, titulo, autor, isbn, resumen, formato) VALUES 
            ('$imagen', '$titulo', '$autor', '$isbn', '$resumen', '$formato')";
            $result = mysqli_query($connection, $query);

            ?>

            <!DOCTYPE html>
            <html lang="es">
            <head>
                <title>Alejandro Torreblanca Menendez</title>
                <meta charset="utf-8"/>
                <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
                <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900&display=swap" rel="stylesheet"/>
                <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"/>
                <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
                <link rel="stylesheet" href="../css/style.css"/>
                <link rel="stylesheet" href="../css/login.css"/>
            </head>
            <body class="full-cover-background" style="background-image:url(../assets/img/font-login.jpg);">
                <div class="form-container">
                    <p class="text-center" style="margin-top: 17px;">
                        <i class="zmdi zmdi-account-circle zmdi-hc-5x"></i>
                    </p>
                    <h4 class="text-center all-tittles" style="margin-bottom: 30px;"><u>Éxito</u></h4>
                    <h4 class="text-center" style="margin-bottom: 30px;">El libro se ha creado correctamente</h4>
                    <div class="form-group">
                        <a href="../admin/panel-libro.php"><button type="submit" class="btn btn-primary w-100 submit fs-5">Volver al panel de libro</button></a>
                    </div>
                </div>  
            </body>
            </html>

            <?php
        } else {
            ?>

            <!DOCTYPE html>
            <html lang="es">
            <head>
                <title>Alejandro Torreblanca Menendez</title>
                <meta charset="utf-8"/>
                <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
                <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900&display=swap" rel="stylesheet"/>
                <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"/>
                <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
                <link rel="stylesheet" href="../css/style.css"/>
                <link rel="stylesheet" href="../css/login.css"/>
            </head>
            <body class="full-cover-background" style="background-image:url(../assets/img/font-login.jpg);">
                <div class="form-container">
                    <p class="text-center" style="margin-top: 17px;">
                        <i class="zmdi zmdi-account-circle zmdi-hc-5x"></i>
                    </p>
                    <h4 class="text-center all-tittles" style="margin-bottom: 30px;"><u>Ha surgido un error</u></h4>
                    <h4 class="text-center" style="margin-bottom: 30px;">El formato introducido es incorrecto</h4>
                    <div class="form-group">
                        <a href="../admin/panel-libro.php"><button type="submit" class="btn btn-primary w-100 submit fs-5">Volver a crear el libro</button></a>
                    </div>
                </div>  
            </body>
            </html>

            <?php
        }
    }

} else {
    echo "<script type='text/javascript'>window.location.href = '../installer/index-install.php';</script>";
}

?>