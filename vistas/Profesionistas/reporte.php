<?php 
ob_start();
include('../../modelos/Profesionista.php'); 
$profesionista = Profesionista::lista();
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Reporte de Establecimientos</title>
        <style>
            #tabla {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
            }

            #tabla td, #tabla th {
            border: 1px solid #ddd;
            padding: 8px;
            }

            #tabla tr:nth-child(even){background-color: #f2f2f2;}

            #tabla tr:hover {background-color: #ddd;}

            #tabla th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #04AA6D;
            color: white;
            h1 {
                text-align: center;
                font-family: Arial, sans-serif;
            }
        </style>
    </head>
    <body>
        <center><h1>Reporte de Profesionistas</h1></center>
        <table id="tabla">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Idiomas</th>
                    <th>Género</th>
                    <th>Fecha de nacimiento</th>
                    <th>Teléfono</th>
                    <th>Servicio</th>
                    <th>Costos</th>
                    <th>horarios</th>
                    <th>Días laborales</th>
                    <th>Ubicación</th>
                </tr>
                <?php
                    foreach ($profesionista as $p){
                ?>
            <tbody>
                <tr>
                    <td><?php echo $p->nombre; ?></td>
                    <td><?php echo $p->descripcion; ?></td>
                    <td><?php echo $p->idiomas; ?></td>
                    <td><?php echo $p->genero; ?></td>
                    <td><?php echo $p->fecha; ?></td>
                    <td><?php echo $p->telefono ?></td>
                    <td><?php echo $p->servicio; ?></td>
                    <td>$<?php echo $p->costo; ?></td>
                    <td><?php echo $p->horario; ?></td>
                    <td><?php echo $p->diasLab; ?></td>
                    <td><?php echo $p->ubicacion; ?></td>
                </tr>
                <?php
                    }
                ?>
            </tbody>
        </table>
    </body>
</html>
<?php 
$html = ob_get_clean();
require_once '../../Libreria/autoload.inc.php';
use Dompdf\Dompdf;

$dompdf = new Dompdf();
$options = $dompdf->getOptions();
$options->set(['isRemoteEnabled' => true]);
$dompdf->setOptions($options);

$dompdf->loadHtml($html);
$dompdf->setPaper('a4', 'landscape');
$dompdf->render();
$dompdf->stream("reporte_Establecimientos.pdf", array("Attachment" => true));
?>
