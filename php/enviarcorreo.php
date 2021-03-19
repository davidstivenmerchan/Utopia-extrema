<?php

        $correo = $_POST['correo'];
        $name = $_POST['nom'];
        
        $asun = $_POST['asun'];
        $Men = $_POST['men'];

        mail($destino, $asun, $Men);

        header("location:correo.php");

?>