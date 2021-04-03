<?php 
require_once("../../php/conexion.php");
date_default_timezone_set('America/Bogota');

if (@$_POST['planeacion']){
   
    $atraccion = $_POST['atraccion'];
    $h_inicio = $_POST['h_inicio'];
    $h_fin = $_POST['h_fin'];
    $cedula = $_POST['cedula'];
    $fechaP = $_POST['fechaP'];
    

    $Planeacion = "INSERT INTO  planeacion (id_plan, id_atraccion, cedula, fecha_reg, h_inicio, h_fin) VALUES ";

    for ($i=0; $i < count($atraccion); $i++){
        $Planeacion.= "('','".$atraccion[$i]."', '$cedula', '$fechaP', '$h_inicio', '$h_fin' ),";
    }

    $cadena_final = substr($Planeacion, 0, -1);
    $cadena_final.=";";
    
    if($conexion->query($cadena_final)){

        for ($i=0; $i < count($atraccion); $i++){
            $buscardor = mysqli_query($conexion,"SELECT total_h FROM horas_trabajo WHERE id_atraccion = '$atraccion[$i]' "); 
            $info = mysqli_fetch_assoc($buscardor);
            $total_h = $info['total_h'];// Horas de trabajo acumuladas en bd
            
            $hora1 = new DateTime($h_inicio);//Hora de inicio
            $hora2 = new DateTime($h_fin);//Hora de cierre

            //rango de horas a trabajar
            $intervalo = $hora2->diff($hora1);
            $tiempo = $intervalo->format('%h');

            //Acumular horas
            $horas_t = $total_h + $tiempo;

            $consultica = "UPDATE horas_trabajo SET total_h = '$horas_t' WHERE  id_atraccion = '$atraccion[$i]' ";
           
            if($conexion->query($consultica)){

                for ($i=0; $i < count($atraccion); $i++){
                    $buscardor = mysqli_query($conexion,"SELECT total_h FROM horas_trabajo WHERE id_atraccion = '$atraccion[$i]' "); 
                    $info = mysqli_fetch_assoc($buscardor);
                    $total_h = $info['total_h'];// Horas de trabajo acumuladas en bd

                    if($total_h > 60){
                        $cambioEstado = mysqli_query($conexion,"UPDATE atraccion SET id_estado = 3 WHERE  id_atraccion = '$atraccion[$i]' ");
                    }
                }
            }
        }

        
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