<?php

include('database.php');

if ($connection) {

    /* Selecciona un solo libro y recoje sus datos a través de su id */

    $id = $_POST['id'];
    $query = "SELECT * FROM libro WHERE id = $id";
    $result = mysqli_query($connection, $query);
    if (!$result) {
        die('Query Failed');
    }

    $json = array();
    while($row = mysqli_fetch_array($result)) {
        $json[] = array (
            'imagen' => $row['imagen'],
            'titulo' => $row['titulo'],
            'autor' => $row['autor'],
            'isbn' => $row['isbn'],
            'resumen' => $row['resumen'],
            'formato' => $row['formato'],
            'id' => $row['id']
        );
    }

    $jsonstring = json_encode($json[0]);
    echo $jsonstring;

} else {
    echo "<script type='text/javascript'>window.location.href = '../installer/index-install.php';</script>";
}

?>