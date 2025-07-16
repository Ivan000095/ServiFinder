<?php
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    $con = new mysqli("localhost", "root", "", "servifinder");
    if ($con->connect_errno) {
        die("Fallo al conectar a MySQL: (" . 
            $con->connect_errno . ") " . 
            $con->connect_error);
    }
?>