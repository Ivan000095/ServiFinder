<?php
    require('../../modelos/Establecimiento.php');
    $comentario = new Establecimiento();
    $Id_Establecimiento = $_REQUEST['Id_Establecimiento'];
    $comentario->Comentario = $_REQUEST['Comentario'];
    $comentario->Puntuacion = $_REQUEST['Puntuacion'];
    $comentario->NombreUsr = $_REQUEST['NombreUsr'];
    $comentario->saveres($Id_Establecimiento);
    echo '<meta http-equiv="refresh" content="0;url=vista.php">';
?>