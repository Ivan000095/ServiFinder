<?php
    include('../../modelos/Doctor.php');
    $id = $_REQUEST['idDoctor'];
    $Doctor = Doctor::find($id);
    $Doctor->destroy();
    echo '<meta http-equiv="refresh" content="0;url=/Integradora/vistas/Doctores">';
?>