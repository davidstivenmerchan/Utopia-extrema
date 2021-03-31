<?php
    $local = "localhost";
    $user = "root";
    $password = "";
    $base = "corza";

    $conn = mysqli_connect($local,$user,$password,$base);

    if($conn->connect_error)
        {
            die("Fallo la conexion" . mysqli_connect_error);
        }
        
?>