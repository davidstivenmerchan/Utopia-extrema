<?php

include('../php/conexion.php');

if(isset($_POST['salida'])){

    $fecha = strftime('%Y-%m-%d %H:%M:%S');


    

    $entrada = $_POST['id_entrada'];

    $consulta = "UPDATE entry_exit SET fe_ho_exit='$fecha' where id_ingreso='$entrada'";
    $res = mysqli_query($conexion,$consulta);


    if($res){

      
      header("location: ../php/cerrar.php");
    }

}






?>