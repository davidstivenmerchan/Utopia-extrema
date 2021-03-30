<?php
    $conexion= new mysqli("localhost","root","","comprautopia3");
    if($conexion->connect_error)
    {
        die("fallo la conexion" . mysqli_connect_errno());
    }
?>