<?php
    $conexion= new mysqli("localhost","root","","pruebal");
    if($conexion->connect_error)    
    {
        die("Fallo la conexion" . mysqli_connect_errno());    
    }

?>