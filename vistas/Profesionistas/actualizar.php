<?php
    require('../../modelos/Profesionista.php');
    $id = $_REQUEST['id'];
    $Profesionista = Profesionista::find($id);
    $Profesionista->nombre = $_REQUEST['nombre'];
    $Profesionista->correo = $_REQUEST['correo'];
    $Profesionista->password = $_REQUEST['password'];
    $Profesionista->descripcion = $_REQUEST['descripcion'];
    $Profesionista->idiomas = $_REQUEST['idiomas'];
    $Profesionista->genero = $_REQUEST['genero'];
    $Profesionista->fecha = $_REQUEST['fecha'];
    $Profesionista->telefono = $_REQUEST['telefono'];
    $Profesionista->idServicio = $_REQUEST['servicio'];
    $Profesionista->horario = $_REQUEST['horario'];
    $Profesionista->diasLab = $_REQUEST['diasLab'];
    $Profesionista->ubicacion = $_REQUEST['ubicacion'];
    $Profesionista->costo = $_REQUEST['costo'];
    $Profesionista->save();
    echo '<meta http-equiv="refresh" content="0;url=/Integradora/vistas/Profesionistas">';
?>