<?php 
    require('../../modelos/Establecimiento.php');
    $Id_Establecimiento = $_REQUEST['Id_Establecimiento'];
    $establecimiento = Establecimiento::find($Id_Establecimiento);
    $establecimiento -> Nombre = $_REQUEST['Nombre'];
    $establecimiento -> Descripcion = $_REQUEST['Descripcion'];
    $establecimiento -> Horario = $_REQUEST['Horario'];
    $establecimiento -> Dias_labo = $_REQUEST['Dias_labo'];
    $establecimiento -> Foto = $_REQUEST['Foto'];
    $establecimiento -> DireccionyRef= $_REQUEST['DireccionyRef'];

    $establecimiento -> save();
    echo '<meta http-equiv="refresh" content="0;url=index.php">';

?>