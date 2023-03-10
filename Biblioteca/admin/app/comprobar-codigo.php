<?php

include ('database.php');

if ($connection) {

    /* Envío los datos del código de verificación aquí para comprobar si el código es correcto */

    if(isset($_POST['codigo'])){
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $correo = $_POST['correo'];
        $contrasena = $_POST['contrasena'];
        $telefono = $_POST['telefono'];
        $rol = $_POST['rol'];
        $codigo = $_POST['codigo'];
        $codigo2 = $_POST['codigo2'];

        /* Si el código introducido por el usuario es igual al código enviado a su correo, el usuario se crea correctamente en la base de datos */

        $query = "SELECT COUNT(*) FROM usuario";
        $result = mysqli_query($connection, $query);

        $result->data_seek(0);
        $row = $result->fetch_row();

        if($codigo == $codigo2){
            if($row[0] == 0){
                $query = "INSERT INTO usuario(nombre, apellido, correo, contrasena, telefono, rol) VALUES 
                ('$nombre', '$apellido', '$correo', '$contrasena', '$telefono', 'admin')";
                $result = mysqli_query($connection, $query);
            } else {
                $query = "INSERT INTO usuario(nombre, apellido, correo, contrasena, telefono, rol) VALUES 
                ('$nombre', '$apellido', '$correo', '$contrasena', '$telefono', 'alumno')";
                $result = mysqli_query($connection, $query);

                if (!$result) {
                    die('Query Failed.');
                }

                /* En este caso, te redirecciona a una página donde pone que te has registrado correctamente */

                echo "
                    <script>
                        setTimeout(function(){
                            window.location.href='../login/registro-correcto.php';
                        },500);
                    </script>
                ";
            }  
        } else {

            /* En caso de que no sea correcto, te redirecciona a una página donde pone que el código introducido no es correcto */
?>
            <html>
                <head></head>
                <body onLoad=redirigir()>
                    <script language=Javascript>
                        function redirigir(){
                            formulario.action = '../login/registro-error.php';
                            formulario.submit();
                        }
                    </script>
                    <form method="post" name="formulario">
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
        }
    }

} else {
    echo "<script type='text/javascript'>window.location.href = '../installer/index-install.php';</script>";
}

?>