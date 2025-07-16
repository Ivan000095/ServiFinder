<?php
    require('../../modelos/Profesionista.php');

    $Profesionista = new Profesionista();

    // Subida de imagen
    if (isset($_FILES['foto']) && $_FILES['foto']['error'] === UPLOAD_ERR_OK) {
        $nombreArchivo = $_FILES['foto']['name'];
        $tmpPath = $_FILES['foto']['tmp_name'];

        $carpetaDestino = '../../uploads/';

        $nombreUnico = uniqid() . '_' . basename($nombreArchivo);
        $rutaFinal = $carpetaDestino . $nombreUnico;

        if (move_uploaded_file($tmpPath, $rutaFinal)) {
            // Guardar ruta relativa
            $Profesionista->foto = 'uploads/' . $nombreUnico;
        } else {
            $Profesionista->foto = null; // evitar error si no se guarda
        }
    } else {
        $Profesionista->foto = null;
    }

    // Datos del formulario
    $Profesionista->nombre = $_POST['nombre'];
    $Profesionista->correo = $_POST['correo'];
    $Profesionista->password = $_POST['password'];
    $Profesionista->descripcion = $_POST['descripcion'];
    $Profesionista->idiomas = $_POST['idiomas'];
    $Profesionista->genero = $_POST['genero'];
    $Profesionista->fecha = $_POST['fecha'];
    $Profesionista->telefono = $_POST['telefono'];
    $Profesionista->idServicio = $_POST['servicio'];
    $Profesionista->horario = $_POST['horario'];
    $Profesionista->diasLab = $_POST['diasLab'];
    $Profesionista->ubicacion = $_POST['ubicacion'];
    $Profesionista->costo = $_POST['costo'];

    $Profesionista->save();
    echo '<meta http-equiv="refresh" content="0;url=/Integradora/vistas/Profesionistas">';
?>
