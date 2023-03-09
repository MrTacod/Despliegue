<!DOCTYPE html>
<html lang="es">
<head>
    <title>Alejandro Torreblanca Menendez</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
        <h4 class="text-center all-tittles" style="margin-bottom: 30px;">Instalar base de datos</h4>

        <form action="instalador.php" method="post">
            <div class="form-group mb-3">
                <label class="label" for="correo">Usuario</label>
                <input type="text" class="form-control" id="correo" name="usuariodb" placeholder="usuario base de datos">
            </div><br>

            <div class="form-group mb-3">
                <label class="label" for="correo">Contraseña</label>
                <input type="password" class="form-control" id="correo" name="contrasenadb" placeholder="contraseña base de datos">
            </div><br>

            <div class="form-group mb-3">
                <label class="label" for="correo">Base de datos</label>
                <input type="text" class="form-control" id="correo" name="db" placeholder="nombre base de datos">
            </div><br>
            <button class="btn btn-success btn-login" type="submit">Ingresar al sistema &nbsp;</button>
        </form>
    </div>
</body>
</html>