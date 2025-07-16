<?php 
    require('../../modelos/Establecimiento.php');
    $establecimiento = new Establecimiento(); 

    if (isset($_FILES['Foto']) && $_FILES['Foto']['error'] === UPLOAD_ERR_OK) {
    $nombreArchivo = $_FILES['Foto']['name'];
    $tmpPath = $_FILES['Foto']['tmp_name'];

    $nombreUnico = uniqid() . '_' . basename($nombreArchivo);
    $rutaFinal = __DIR__ . '/../../uploads/' . $nombreUnico;

    if (move_uploaded_file($tmpPath, $rutaFinal)) {
        $establecimiento->Foto = $nombreUnico;
    } else {
        echo "No se pudo mover el archivo.";
        $establecimiento->Foto = null;
    }
    } else {
        echo "Error al subir el archivo: " . $_FILES['Foto']['error'];
        $establecimiento->Foto = null;
    }


    // Asignación de otros campos
    $establecimiento->Nombre = $_REQUEST['Nombre'];
    $establecimiento->Descripcion = $_REQUEST['Descripcion'];
    $establecimiento->Horario = $_REQUEST['Horario'];
    $establecimiento->Dias_labo = $_REQUEST['Dias_labo'];
    $establecimiento->DireccionyRef = $_REQUEST['DireccionyRef'];

    // Guardar en la base de datos
    $establecimiento->save();

    echo '<meta http-equiv="refresh" content="0;url=index.php">';
?>