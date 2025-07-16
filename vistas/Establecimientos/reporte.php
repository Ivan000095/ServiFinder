<?php 
ob_start();

include('../../modelos/Establecimiento.php'); 

$establecimiento = Establecimiento::lista();
?>
<html>
    <?php include('../../head.php') ?>
    <h1>Reporte de establecimientos</h1>
 <table class="table table-responsive table-striped " border="1"  id="tabla-catalogo">
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
                <br>
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



