<?php
ob_start();
include('../../head.php');
include('../../modelos/Doctor.php');
$doctor = Doctor::lista();
?>
<head>
    <meta charset="UTF-8">
    <title>Reporte de Establecimientos</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 6px;
            text-align: left;
            border: 1px solid #000;
            font-size: 12px;
        }
        th {
            background-color: #f2f2f2;
        }
        h1 {
            text-align: center;
            font-family: Arial, sans-serif;
        }
    </style>
</head>
<body>
    <h1>Reporte de establecimientos</h1>
     <table>
        <thead>
            <tr>
              <th>Especialidad</th>
              <th>Nombre</th>
              <th>Cédula</th>
              <th>Correo</th>
              <th>Foto</th>
              <th>Teléfono</th>
              <th>Fecha de nacimiento</th>
              <th>Idiomas</th>
              <th>Descripción</th>
              <th>Género</th>
              <th>Costo</th>
              <th>Horario</th>
              <th>Días laborales</th>
              <th>Ubicación</th>
              <th>Acciones</th>
            </tr>
         </thead>
        <tbody>

            <?php
            foreach ($doctores as $d){
            ?>
            <tr>
                <td><?= $e->Id_Doctor; ?></td>
                <td><?php echo $d->nombreespe; ?></td>
                <td><?php echo $d->nombre; ?></td>
                <td><?php echo $d->cedula; ?></td>
                <td><?php echo $d->correo; ?></td>
                <td><img src="../../uploads/<?php echo $d->foto; ?>" alt="Foto de <?php echo $d->nombre; ?>" width="100rem"></td>
                <td><?php echo $d->telefono; ?></td>
                <td><?php echo $d->fecha; ?></td>
                <td><?php echo $d->idiomas; ?></td>
                <td><?php echo $d->descripcion; ?></td>
                <td><?php echo $d->genero; ?></td>
                <td>$<?php echo $d->costo; ?></td>
                <td><?php echo $d->horario; ?></td>
                <td><?php echo $d->diaslab; ?></td>
                <td><?php echo $d->ubicacion; ?></td>
                <td>
            </tr>
            <?php
            }
            ?>
        </tbody>  
    </table>
</html>
<?php
$html=ob_get_clean();

require_once '../../libreria/autoload.inc.php';
use Dompdf\Dompdf;
$dompdf = new Dompdf();

$options= $dompdf->getOptions();
$options->set(array('isRemoteEnabled'=> true));
$dompdf->setOptions($options);

$dompdf-> loadHtml($html);
$dompdf-> setPaper('letter');

$dompdf->render();

$dompdf->stream("reporte_Doctores.pdf", array("Attachment" => false));



?>