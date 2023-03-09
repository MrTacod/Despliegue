<?php

include('../app/database.php');

if ($connection) {

    /* Recojo los datos del código y el registro y elimino los posibles errores */

    error_reporting(0);
    ini_set('display_errors', '1');
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $correo = $_POST['correo'];
    $contrasena = $_POST['contrasena'];
    $telefono = $_POST['telefono'];
    $rol = $_POST['rol'];
    $codigo2 = $_POST['codigo2'];

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
    <link rel="stylesheet" href="css/style.css"/>
    <link rel="stylesheet" href="css/login.css"/>
</head>
<body class="full-cover-background" style="background-image:url(assets/img/font-login.jpg);">
    <div class="form-container">
        <p class="text-center" style="margin-top: 17px;">
            <i class="zmdi zmdi-account-circle zmdi-hc-5x"></i>
        </p>
        <h4 class="text-center all-tittles" style="margin-bottom: 30px;"><u>Ha surgido un error</u></h4>
        <h4 class="text-center" style="margin-bottom: 30px;">El código introducido no es correcto</h4>
        <div class="form-group">
            <a href="registro.php"><button type="submit" class="btn btn-primary w-100 submit fs-5">Volver al registro</button></a>
        </div>
    </div>

    <!-- Recojo todos los campos junto a los datos del registro y los dejo en oculto para que no se muestren -->

    <form action="verificacion.php" method="post">
        <input type="hidden" name="nombre" value="<?php echo $nombre ?>">
        <input type="hidden" name="apellido" value="<?php echo $apellido ?>">
        <input type="hidden" name="correo" value="<?php echo $correo ?>">
        <input type="hidden" name="contrasena" value="<?php echo $contrasena ?>">
        <input type="hidden" name="telefono" value="<?php echo $telefono ?>">
        <input type="hidden" name="rol" value="<?php echo $rol ?>">
        <input type="hidden" name="codigo2" value="<?php echo $codigo2 ?>">
    </form>
</body>
</html>

<?php

} else {
    echo "<script type='text/javascript'>window.location.href = '../installer/index-install.php';</script>";
}

?>
