<?php

include('database.php');

if ($connection) {

    /* Se recojen los datos del usuario */

    $id_usuario = $_POST['id_usuario'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $correo = $_POST['correo'];
    $contrasena = $_POST['contrasena'];
    $telefono = $_POST['telefono'];
    $rol = $_POST['rol'];

    /* Se actualizan según los datos que le queramos cambiar */

    $query = "UPDATE usuario SET nombre = '$nombre', apellido = '$apellido', correo = '$correo', contrasena = '$contrasena', 
    telefono = '$telefono', rol = '$rol' WHERE id_usuario = '$id_usuario'";

    $result = mysqli_query($connection, $query);

    if($result) {

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
                <h4 class="text-center" style="margin-bottom: 30px;">Se han actualizado correctamente los datos</h4>
                <div class="form-group">
                    <?php
                        if($rol == 'admin'){
                            ?>
                            <a href="../admin/panel-admin.php"><button type="submit" class="btn btn-primary w-100 submit fs-5">Volver a la página de administrador</button></a>
                            <?php
                        } else if ($rol == 'alumno'){
                            ?>
                            <a href="../admin/panel-alumno.php"><button type="submit" class="btn btn-primary w-100 submit fs-5">Volver a la página de administrador</button></a>
                            <?php
                        } else if($rol == 'profesor') {
                            ?>
                            <a href="../admin/panel-profesor.php"><button type="submit" class="btn btn-primary w-100 submit fs-5">Volver a la página de administrador</button></a>
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
                            <body class="full-cover-background" style="background-image:url(assets/img/font-login.jpg);">
                                <div class="form-container">
                                    <p class="text-center" style="margin-top: 17px;">
                                        <i class="zmdi zmdi-account-circle zmdi-hc-5x"></i>
                                    </p>
                                    <h4 class="text-center all-tittles" style="margin-bottom: 30px;"><u>Ha surgido un error</u></h4>
                                    <h4 class="text-center" style="margin-bottom: 30px;">El rol del usuario es incorrecto</h4>
                                    <div class="form-group">
                                        <a href="../admin-index.php"><button type="submit" class="btn btn-primary w-100 submit fs-5">Volver al panel de administrador</button></a>
                                    </div>
                                </div>  
                            </body>
                            </html>
                            <?php
                        }
                    ?>
                </div>
            </div>  
        </body>
        </html>  

    <?php
    } else {
        header("Location: ../admin/admin-index.php");
    }

} else {
    echo "<script type='text/javascript'>window.location.href = '../installer/index-install.php';</script>";
}

?>