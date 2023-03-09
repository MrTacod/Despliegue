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
            'id' => $row['id']
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
    <h1 style="text-align: center;"><u>Biblioteca del Saber</u></h1>
    <h2>Lista de profesores</h2>
    <table style="border: black solid 2px;">
        <tr style="background-color: blue; color: white;">
            <th>Id</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Correo</th>
            <th>Contrasena</th>
            <th>Teléfono</th>
            <th>Rol</th>
        </tr>
        <tbody> 
            <?php foreach($json as $user){ ?>
                <tr style="background-color: #f3f3f3;">
                    <td style="padding: 12px 15px;"><?php echo $user['id']; ?></td>
                    <td style="padding: 12px 15px;"><?php echo $user['nombre']; ?></td>
                    <td style="padding: 12px 15px;"><?php echo $user['apellido']; ?></td>
                    <td style="padding: 12px 15px;"><?php echo $user['correo']; ?></td>
                    <td style="padding: 12px 15px;"><?php echo $user['contrasena']; ?></td>
                    <td style="padding: 12px 15px;"><?php echo $user['telefono']; ?></td>
                    <td style="padding: 12px 15px;"><?php echo $user['rol']; ?></td>
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