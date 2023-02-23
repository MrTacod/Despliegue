<?php

include('database.php');

if ($connection) {

    /* Recoje los datos del usuario y los guarda aquí */

    if (isset($_POST['nombre'])) {
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $correo = $_POST['correo'];
        $contrasena = $_POST['contrasena'];
        $telefono = $_POST['telefono'];

        /* En caso de estar todos los campos, crea el usuario y lo guarda en la base de datos */

        $query = "SELECT COUNT(*) FROM usuario";
        $result = mysqli_query($connection, $query);

        $result->data_seek(0);
        $row = $result->fetch_row();

        if($row[0] == 0){
            $query = "INSERT INTO usuario(nombre, apellido, correo, contrasena, telefono, rol) VALUES 
            ('$nombre', '$apellido', '$correo', '$contrasena', '$telefono', 'admin')";
            $result = mysqli_query($connection, $query);
        } else {
            $query = "INSERT INTO usuario(nombre, apellido, correo, contrasena, telefono, rol) VALUES 
            ('$nombre', '$apellido', '$correo', '$contrasena', '$telefono', 'alumno')";
            $result = mysqli_query($connection, $query);
        }
        if (!$result) {
            die('Query Failed.');
        }
        echo 'Usuario añadido correctamente';
    }

} else {
    echo "<script type='text/javascript'>window.location.href = '../installer/index-install.php';</script>";
}

?>