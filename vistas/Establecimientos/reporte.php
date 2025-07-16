<?php 
ob_start();
include('../../head.php');
include('../../modelos/Establecimiento.php'); 

$establecimiento = Establecimiento::lista();
?>
<html>
 <table class="table table-responsive table-striped" id="tabla-catalogo">
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Descripcion</th>
                    <th>Horario</th>
                    <th>Dias laborales</th>
                    <th>Foto</th>
                    <th>Direccion</th>
                  
                    
                </tr>
                <?php 
                foreach($establecimiento as $e){
                ?>
                 <tr>
                    <td> <?php echo $e->Id_Establecimiento; ?> </td>
                    <td> <?php echo $e->Nombre; ?></td>
                    <td> <?php echo $e->Descripcion; ?></td>
                    <td> <?php echo $e->Horario; ?></td>
                    <td> <?php echo $e->Dias_labo; ?></td>
                    <td><img src="/../../http://<?php echo $_SERVER['HTTP_HOST'];?>/servifinder/<?php echo $e->Foto; ?>" alt="Foto de <?php echo $e->Nombre; ?>" width="100rem"></td>
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

$dompdf->stream("reporte_Establecimientos.pdf", array("Attachment" => false));



?>



