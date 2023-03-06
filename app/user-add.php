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

        /* Aqui cuento el numero de usuarios que tiene la base de datos */

        $query = "SELECT COUNT(*) FROM usuario";
        $result = mysqli_query($connection, $query);

        $result->data_seek(0);
        $row = $result->fetch_row();

        /* Si hay 0 usuarios, le digo que cree el usuario con el rol de 'admin' */

        if($row[0] == 0){
            $query = "INSERT INTO usuario(nombre, apellido, correo, contrasena, telefono, rol) VALUES 
            ('$nombre', '$apellido', '$correo', '$contrasena', '$telefono', 'admin')";
            $result = mysqli_query($connection, $query);

        /* Sino, le digo que lo cree con el rol de 'alumno' */
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