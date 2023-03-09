<?php
include("../app/database.php");

if ($connection) {
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <title>Registro</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
        <h4 class="text-center all-tittles" style="margin-bottom: 30px;">Regístrate</h4>

        <form action="../app/comprobar-email.php" method="post" class="signin-form needs-validation" novalidate>
            <div class="form-group mb-3">
                <label class="label" for="nombre"> &nbsp; Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" required="" maxlength="70" pattern="[A-Za-z]{1,30}">
                <div class="valid-feedback">Campo OK</div>
                <div class="invalid-feedback">Introduzca su nombre</div>
            </div>
            <div class="form-group mb-3">
                <label class="label" for="apellido"> &nbsp; Apellido</label>
                <input type="text" class="form-control" id="apellido" name="apellido" required="" maxlength="70" pattern="[A-Za-z]{1,30}">
                <div class="valid-feedback">Campo OK</div>
                <div class="invalid-feedback">Introduzca su apellido</div>
            </div>
            <div class="form-group mb-3">
                <label class="label" for="correo"> &nbsp; Correo Electrónico</label>
                <input type="text" class="form-control" id="correo" name="correo" required="" maxlength="70" pattern="[a-zA-Z0-9_.]+@+[a-zA-Z]+.[a-z]{1,30}">
                <div class="valid-feedback">Campo OK</div>
                <div class="invalid-feedback">Introduzca su correo</div>
            </div>
            <div class="form-group mb-3">
                <label class="label" for="contrasena"> &nbsp; Contraseña</label>
                <input type="password" class="form-control" id="contrasena" name="contrasena" required="" maxlength="70" pattern="[A-Za-z0-9!_.?$]{7,20}">
                <div class="valid-feedback">Campo OK</div>
                <div class="invalid-feedback">Introduzca su contraseña</div>
            </div>
            <div class="form-group mb-3">
                <label class="label" for="repetir-contrasena"> &nbsp; Repetir Contraseña</label>
                <input type="password" class="form-control" id="repetir-contrasena" name="repetir-contrasena" required="" maxlength="70" pattern="[A-Za-z0-9!_.?$]{7,20}">
                <div class="valid-feedback">Campo OK</div>
                <div class="invalid-feedback">Introduzca de nuevo la contraseña</div>
            </div>
            <div class="form-group mb-3">
                <label class="label" for="telefono"> &nbsp; Teléfono</label>
                <input type="text" class="form-control" id="telefono" name="telefono" required="" maxlength="9" pattern="\d{9}">
                <div class="valid-feedback">Campo OK</div>
                <div class="invalid-feedback">Introduzca su teléfono</div>
            </div>
            <button class="btn btn-success btn-login" type="submit">Ingresar al sistema &nbsp;</button>
        </form>

        <div>
            ¿Ya tienes una cuenta?<br>
            <a href="./login.php" class="btn btn-white text-danger">Inicia sesión aquí</a>
        </div>

        <form action="../app/comprobar-login.php" method="post">
            <input type="hidden" name="invitado" value="Soy invitado">
            <p><div class="form-group">
                <button type="submit" class="btn btn-white text-warning">Entrar como invitado</button>
            </div></p>
        </form>
    </div> 

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function () {
            'use strict'

            const form = document.querySelector('form');
            const contrasena = document.querySelector('#contrasena');
            const repetirContrasena = document.querySelector('#repetir-contrasena');

            form.addEventListener('submit', function(event) {
                if (contrasena.value !== repetirContrasena.value) {
                    alert('Las contraseñas no coinciden');
                    event.preventDefault();
                } else {
                    // Fetch all the forms we want to apply custom Bootstrap validation styles to
                    var forms = document.querySelectorAll('.needs-validation')

                    // Loop over them and prevent submission
                    Array.prototype.slice.call(forms)
                    .forEach(function (form) {
                        form.addEventListener('submit', function (event) {
                        if (!form.checkValidity()) {
                            event.preventDefault()
                            event.stopPropagation()
                        }
                
                        form.classList.add('was-validated')
                        }, false)
                    }) 
                }
            });
        })()
    </script>
    <script type="text/javascript">(function(){window['__CF$cv$params']={r:'6db06682fb215fe3',m:'YuZ.qtIOM6EZKiH6Xc93zzNZZPg6DCoASbKV0N1673w-1644444339-0-AYSHEDPBmJo28Tyv5kktxxsnn9x2ix586V5K76RCNlp1dlQKq/g6AZrl/UP2N8YRLiFCprgg+n6xEL5SWhm2eSA+NbTkFElvK+D8I5Yi8x/IEbuq6oJrO9yoU/dGHdjH7OcSf9kRhgr6NtCSH/bKqWFk9RKbh4c5A5GBtmeuh/CoPwVOzBa5Sem5eXCgFA4Ikg==',s:[0x62563277c7,0x9a3ef57bd7],}})();</script>
</body>
</html>

<?php
} else {
    echo "<script type='text/javascript'>window.location.href = '../installer/index-install.php';</script>";
}
?>