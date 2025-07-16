<?php
    require('../../modelos/Profesionista.php');
    $comentario = new Profesionista();
    $id = $_REQUEST['id'];
    $comentario->puntuacion = $_REQUEST['calificacion'];
    $comentario->comentario = $_REQUEST['comentario'];
    $comentario->nombreusr = $_REQUEST['nombreusr'];
    $comentario->saveres($id);
    echo '<meta http-equiv="refresh" content="0;url=/Integradora/vistas/Profesionistas/vista.php">';
?>