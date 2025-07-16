<?php
    require('../../modelos/Establecimiento.php');
    $Id_Establecimiento = $_REQUEST['Id_Establecimiento'];
    $establecimiento = Establecimiento::find($Id_Establecimiento);
    $establecimiento->destroy();
    echo '<meta http-equiv="refresh" content="0;url=index.php">';
?>