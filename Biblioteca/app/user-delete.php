<?php

include('database.php');

if ($connection) {

    /* En caso de que exista el id, el usuario se elimina de la base de datos */

    if (isset($_POST['id_usuario'])) {

        $id_usuario = $_POST['id_usuario'];
        
        $query = "DELETE FROM usuario WHERE id_usuario = $id_usuario";
        $result = mysqli_query($connection, $query);
        if (!$result) {
            die('Query Failed.');
        }
        echo "Usuario eliminado correctamente";
    }

} else {
    echo "<script type='text/javascript'>window.location.href = '../installer/index-install.php';</script>";
}

?>