<?php

include('../app/database.php');

if ($connection) {

    /* Recoje los datos del administrador y los guarda aquí */

    if (isset($_POST['correo'])) {
        $correo = $_POST['correo'];
        $contrasena = $_POST['contrasena'];

        /* En caso de estar todos los campos, crea el administrador y lo guarda en la base de datos */
        
        $query = "INSERT INTO usuario(nombre, apellido, correo, contrasena, telefono, rol) VALUES 
        ('administrador', 'administrador', '$correo', '$contrasena', '123456789', 'admin')";
        $result = mysqli_query($connection, $query);
        
        if (!$result) {
            die('Query Failed.');
        }
        echo "<script type='text/javascript'>window.location.href = '../login/login.php';</script>";
    }

} else {
    echo "<script type='text/javascript'>window.location.href = '../installer/index-install.php';</script>";
}

?>

