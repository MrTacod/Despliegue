<?php

include('database.php');

if ($connection) {

    /* Selecciona un solo usuario y recoje sus datos a través de su id */

    $id = $_POST['id'];
    $query = "SELECT * FROM usuario WHERE id = $id";
    $result = mysqli_query($connection, $query);
    if (!$result) {
        die('Query Failed');
    }

    $json = array();
    while($row = mysqli_fetch_array($result)) {
        $json[] = array (
            'nombre' => $row['nombre'],
            'apellido' => $row['apellido'],
            'correo' => $row['correo'],
            'contrasena' => $row['contrasena'],
            'telefono' => $row['telefono'],
            'rol' => $row['rol'],
            'id' => $row['id']
        );
    }

    $jsonstring = json_encode($json[0]);
    echo $jsonstring;

} else {
    echo "<script type='text/javascript'>window.location.href = '../installer/index-install.php';</script>";
}

?>