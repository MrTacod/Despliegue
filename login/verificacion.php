<?php

include('../app/database.php');

if ($connection) {

  /* Recojo todos los datos del registro y el código */

    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $correo = $_POST['correo'];
    $contrasena = $_POST['contrasena'];
    $telefono = $_POST['telefono'];
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
    <link rel="stylesheet" href="../css/style.css"/>
    <link rel="stylesheet" href="../css/login.css"/>
</head>
<body class="full-cover-background" style="background-image:url(assets/img/font-login.jpg);">
    <div class="form-container">
        <p class="text-center" style="margin-top: 17px;">
            <i class="zmdi zmdi-account-circle zmdi-hc-5x"></i>
        </p>

        <form action="../app/comprobar-codigo.php" method="post">
            <h4 class="text-center all-tittles" style="margin-bottom: 30px;"><u>Verificación de correo</u></h4>
            <div class="form-group mb-3">
                <label class="label" for="codigo">Introduzca el código de 6 dígitos</label>
                <input type="text" class="form-control" name="codigo" placeholder="123456">
            </div>
            <!-- Recojo todos los datos del registro y los dejo en oculto para que no se muestren -->
            <input type="hidden" name="codigo2" value="<?php echo $codigo2 ?>">
            <input type="hidden" name="nombre" value="<?php echo $nombre ?>">
            <input type="hidden" name="apellido" value="<?php echo $apellido ?>">
            <input type="hidden" name="correo" value="<?php echo $correo ?>">
            <input type="hidden" name="contrasena" value="<?php echo $contrasena ?>">
            <input type="hidden" name="telefono" value="<?php echo $telefono ?>">
            <div class="form-group">
                <button type="submit" class="btn btn-primary w-100 submit">Enviar código</button>
            </div>
        </form>  
    </div>          
</body>
</html>

<?php

} else {
    echo "<script type='text/javascript'>window.location.href = '../installer/index-install.php';</script>";
}

?>
