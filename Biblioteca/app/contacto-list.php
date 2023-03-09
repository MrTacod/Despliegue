<?php

include('database.php');

if ($connection) {

    /* Selecciona y muestra todos los contactos que se encuentren en la base de datos */

    $query = "SELECT * FROM contacto";
    $result = mysqli_query($connection, $query);

    if (!$result) {
        die('Query Failed' . mysqli_error($connection));
    }

    $json = array();
    while($row = mysqli_fetch_array($result)) {
        $json[] = array(
            'id_usuario' => $row['id_usuario'],
            'correo' => $row['correo'],
            'mensaje' => $row['mensaje'],
            'id' => $row['id']
        );
    }

    $jsonstring = json_encode($json);
    echo $jsonstring;

} else {
    echo "<script type='text/javascript'>window.location.href = '../installer/index-install.php';</script>";
}

?>