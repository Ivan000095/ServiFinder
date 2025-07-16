<?php
    include('../../modelos/Doctor.php');
    $idDoctor = $_REQUEST['idDoctor'];
    $Doctor=  Doctor::find($idDoctor);
    $Doctor->idespecialidad = $_REQUEST['idespecialidad'];
    $Doctor->idusr = $_REQUEST['idusr'];
    $Doctor->nombre = $_REQUEST['nombre'];
    $Doctor->cedula = $_REQUEST['cedula'];
    $Doctor->correo = $_REQUEST['correo'];
    $Doctor->telefono = $_REQUEST['telefono'];
    $Doctor->fecha = $_REQUEST['fecha'];
    $Doctor->idiomas = $_REQUEST['idiomas'];
    $Doctor->descripcion = $_REQUEST['descripcion'];
    $Doctor->genero = $_REQUEST['genero'];
    $Doctor->costo = $_REQUEST['costo'];
    $Doctor->horario = $_REQUEST['horario'];
    $Doctor->diasLab = $_REQUEST['diaslab'];
    $Doctor->ubicacion = $_REQUEST['ubicacion'];
    $Doctor->save();
   echo '<meta http-equiv="refresh" content="0;url=/Integradora/vistas/Doctores">';
?>