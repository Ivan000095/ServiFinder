<?php
    require('../../modelos/Doctor.php');
    $comentario = new Doctor();
    $idDoctor = $_REQUEST['idDoctor'];
    $comentario->puntuacion = $_REQUEST['calificacion'];
    $comentario->comentario = $_REQUEST['comentario'];
    $comentario->nombreusr = $_REQUEST['nombreusr'];
    $comentario->saveres($idDoctor);
    echo '<meta http-equiv="refresh" content="0;url=/Integradora/vistas/Doctores/vista.php">';
?>