<?php

include('../../app/database.php');

if ($connection) {

    /* Lista de cabeceras que me permiten crear una hoja excel para la lista de libros */

    header("Content-type: application/vnd.ms-excel");
    header("Content-Disposition: attachment;filename='libro-print-excel.xls'");
    header("Expires: 0");
    header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
    header("Pragma: public");

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

<!-- Le doy forma de tabla al excel -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <h1 style="text-align: center;"><u>Biblioteca del Saber</u></h1>
    <h2>Lista de libros</h2>
    <table style="border: black solid 2px;">
        <tr style="background-color: blue; color: white;">
            <th>Id</th>
            <th>Imagen</th>
            <th>Titulo</th>
            <th>Autor</th>
            <th>ISBN</th>
            <th>Resumen</th>
            <th>Formato</th>
        </tr>
        <tbody> 
            <?php foreach($json as $user){ ?>
                <tr style="background-color: #f3f3f3;">
                    <td style="padding: 5px 5px;"><?php echo $user['id']; ?></td>
                    <td style="padding: 5px 5px;"><?php echo $user['imagen']; ?></td>
                    <td style="padding: 5px 5px;"><?php echo $user['titulo']; ?></td>
                    <td style="padding: 5px 5px;"><?php echo $user['autor']; ?></td>
                    <td style="padding: 5px 5px;"><?php echo $user['isbn']; ?></td>
                    <td style="padding: 12px 15px;"><?php echo $user['resumen']; ?></td>
                    <td style="padding: 5px 5px;"><?php echo $user['formato']; ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</body>
</html>

<?php

} else {
    echo "<script type='text/javascript'>window.location.href = '../installer/index-install.php';</script>";
}

?>