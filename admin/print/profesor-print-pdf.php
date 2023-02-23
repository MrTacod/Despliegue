<?php

include('../../app/database.php');

ob_start(); //Soluciona el error de headers already sent
use Dompdf\Dompdf;

if ($connection) {


    /* Recojo los datos de usuario y los guardo en mi base de datos */

    $query = "SELECT * FROM usuario WHERE rol = 'profesor'";
    $result = mysqli_query($connection, $query);

    if (!$result) {
        die('Query Failed' . mysqli_error($connection));
    }

    $json = array();
    while($row = mysqli_fetch_array($result)) {
        $json[] = array(
            'nombre' => $row['nombre'],
            'apellido' => $row['apellido'],
            'correo' => $row['correo'],
            'contrasena' => $row['contrasena'],
            'telefono' => $row['telefono'],
            'rol' => $row['rol'],
            'id_usuario' => $row['id_usuario']
        );
    }
?>

<!-- Le doy forma de tabla al pdf -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <table>
        <tr>
            <th style="background-color: blue; color: white;">Id_usuario</th>
            <th style="background-color: blue; color: white;">Nombre</th>
            <th style="background-color: blue; color: white;">Apellido</th>
            <th style="background-color: blue; color: white;">Correo</th>
            <th style="background-color: blue; color: white;">Contrasena</th>
            <th style="background-color: blue; color: white;">Teléfono</th>
            <th style="background-color: blue; color: white;">Rol</th>
        </tr>
        <tbody> 
            <?php foreach($json as $user){ ?>
                <tr>
                    <td><?php echo $user['id_usuario']; ?></td>
                    <td><?php echo $user['nombre']; ?></td>
                    <td><?php echo $user['apellido']; ?></td>
                    <td><?php echo $user['correo']; ?></td>
                    <td><?php echo $user['contrasena']; ?></td>
                    <td><?php echo $user['telefono']; ?></td>
                    <td><?php echo $user['rol']; ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</body>
</html>

<?php
    require("pdf/dompdf/autoload.inc.php");
    $dompdf = new DOMPDF();
    $dompdf->loadHtml(ob_get_clean());
    $dompdf->render();
    $pdf = $dompdf->output();
    $filename = 'profesor-print-pdf.pdf';
    $dompdf->stream($filename, array("Attachment" => 0));
?>  

<?php

} else {
    echo "<script type='text/javascript'>window.location.href = '../installer/index-install.php';</script>";
}

?>