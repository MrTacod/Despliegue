<?php

include('database.php');

if ($connection) {

    /* Selecciona y muestra todos los libros que se encuentren en la base de datos */

    $query = "SELECT * FROM libro";
    $result = mysqli_query($connection, $query);

    if (!$result) {
        die('Query Failed' . mysqli_error($connection));
    }

    $json = array();
    while($row = mysqli_fetch_array($result)) {
        $json[] = array(
            'imagen' => $row['imagen'],
            'titulo' => $row['titulo'],
            'autor' => $row['autor'],
            'isbn' => $row['isbn'],
            'resumen' => $row['resumen'],
            'formato' => $row['formato'],
            'id' => $row['id']
        );
    }

    $jsonstring = json_encode($json);
    echo $jsonstring;

} else {
    echo "<script type='text/javascript'>window.location.href = '../installer/index-install.php';</script>";
}

?>