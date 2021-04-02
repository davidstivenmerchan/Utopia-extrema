<?php 
require_once("../../php/conexion.php");

if (@$_POST['planeacion']){
   
    $atraccion = $_POST['atraccion'];
    $h_inicio = $_POST['h_inicio'];
    $h_fin = $_POST['h_fin'];
    $cedula = $_POST['cedula'];

    $Planeacion = "INSERT INTO  planeacion (id_plan, id_atraccion, cedula, fecha_reg, h_inicio, h_fin) VALUES ";

    for ($i=0; $i < count($atraccion); $i++){
        $Planeacion.= "('','".$atraccion[$i]."', '$cedula', NOW(), '$h_inicio', '$h_fin' ),";
    }

    $cadena_final = substr($Planeacion, 0, -1);
    $cadena_final.=";";
    
    if($conexion->query($cadena_final)){
        
        echo "<script> alert('REGISTRO DE PROGAMACION EXITOSA, QUE TENGA BUEN DIA');
            window.location= '../admin.php';
            </script>";
        exit;
        
    }else {
        echo "<script> alert('ERROR DE INSERCION, PORFAVOR INTENTE NUEVAMENTE');
            window.location= '../admin.php'</script>";
        exit;
    }
}


?>