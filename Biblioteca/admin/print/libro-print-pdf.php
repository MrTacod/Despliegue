<?php

include('../../app/database.php');

ob_start(); //Soluciona el error de headers already sent
use Dompdf\Dompdf;

if ($connection) {


    /* Recojo los datos de libro y los guardo en mi base de datos */

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
            <th style="background-color: blue; color: white;">Id</th>
            <th style="background-color: blue; color: white;">Imagen</th>
            <th style="background-color: blue; color: white;">Titulo</th>
            <th style="background-color: blue; color: white;">Autor</th>
            <th style="background-color: blue; color: white;">ISBN</th>
            <th style="background-color: blue; color: white;">Resumen</th>
            <th style="background-color: blue; color: white;">Formato</th>
        </tr>
        <tbody> 
            <?php foreach($json as $user){ ?>
                <tr>
                    <td><?php echo $user['id']; ?></td>
                    <td><?php echo $user['imagen']; ?></td>
                    <td><?php echo $user['titulo']; ?></td>
                    <td><?php echo $user['autor']; ?></td>
                    <td><?php echo $user['isbn']; ?></td>
                    <td><?php echo $user['resumen']; ?></td>
                    <td><?php echo $user['formato']; ?></td>
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
    $filename = 'libro-print-pdf.pdf';
    $dompdf->stream($filename, array("Attachment" => 0));
?>  

<?php

} else {
    echo "<script type='text/javascript'>window.location.href = '../installer/index-install.php';</script>";
}

?>