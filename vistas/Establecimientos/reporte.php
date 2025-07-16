<?php 
ob_start();

include('../../modelos/Establecimiento.php'); 

$establecimiento = Establecimiento::lista();
?>
<html>
    <?php include('../../head.php') ?>
   <center> <h1>Reporte de establecimientos</h1> </center>
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
            }}
        </style>
 <table  id="tabla">
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Descripcion</th>
                    <th>Horario</th>
                    <th>Dias laborales</th>
                    <th>Direccion</th>
                  
                    
                </tr>
                <
                <?php 
                foreach($establecimiento as $e){
                ?>
              
                 <tr>
                    <td> <?php echo $e->Id_Establecimiento; ?> </td>
                    <td> <?php echo $e->Nombre; ?></td>
                    <td> <?php echo $e->Descripcion; ?></td>
                    <td> <?php echo $e->Horario; ?></td>
                    <td> <?php echo $e->Dias_labo; ?></td>
                    
                    <td> <?php echo $e->DireccionyRef; ?></td>
                   

                </tr>
                <?php
                }
                ?>    

            </table>

</html>
<?php 
$html = ob_get_clean();
//echo $html;
require_once '../../Libreria/autoload.inc.php';
use Dompdf\Dompdf;
$dompdf  = new Dompdf();

$options = $dompdf->getOptions();
$options->set(array('isRemoteEnabled'=> true));
$dompdf->setOptions($options);

$dompdf-> loadHtml($html);
$dompdf-> setPaper('letter');

$dompdf->render();

$dompdf->stream("reporte_Establecimientos.pdf", array("Attachment" => true));



?>



