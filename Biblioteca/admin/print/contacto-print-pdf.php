<?php

include('../../app/database.php');

ob_start(); //Soluciona el error de headers already sent
use Dompdf\Dompdf;

if ($connection) {


    /* Recojo los datos de contacto y los guardo en mi base de datos */

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
    <h2>Lista de contactos</h2>
    <table style="border: black solid 2px;">
        <tr style="background-color: blue; color: white;">
            <th>Id</th>
            <th>Id_usuario</th>
            <th>Correo</th>
            <th>Mensaje</th>
        </tr>
        <tbody> 
            <?php foreach($json as $user){ ?>
                <tr style="background-color: #f3f3f3;">
                    <td style="padding: 5px 5px;"><?php echo $user['id']; ?></td>
                    <td style="padding: 5px 5px;"><?php echo $user['id_usuario']; ?></td>
                    <td style="padding: 5px 5px;"><?php echo $user['correo']; ?></td>
                    <td style="padding: 5px 5px;"><?php echo $user['mensaje']; ?></td>
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
    $filename = 'contacto-print-pdf.pdf';
    $dompdf->stream($filename, array("Attachment" => 0));
?>  

<?php

} else {
    echo "<script type='text/javascript'>window.location.href = '../installer/index-install.php';</script>";
}

?>