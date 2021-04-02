<?php

require_once('../php/conexion.php');
 

$tip_atra = $_POST['tip_atraccion'];
$nom_atra = $_POST['nom_atraccion'];
$capacidad = $_POST['capa'];
$ubicacion = $_POST['ubicacion'];

if(isset($_POST['registrar_atracciones'])){

    $consul = "INSERT INTO atraccion(id_tip_atraccion,nom_atraccion,capacidad,id_ubi,id_estado) VALUES ($tip_atra,'$nom_atra',$capacidad,$ubicacion,1)";

    $query=mysqli_query($conexion,$consul);

    if($query){

        $consul2 = "SELECT * FROM atraccion WHERE nom_atraccion = '$nom_atra' ";
        $query2=mysqli_query($conexion,$consul2);
        $fila = mysqli_fetch_assoc($query2);

        $consul3 = "INSERT INTO horas_trabajo(id_horas_t, id_atraccion, total_h) VALUES ('','".$fila['id_atraccion']."','')";
        $query3=mysqli_query($conexion,$consul3);

        echo "<script> alert('REGISTRO DE ATRACCIONES CORRECTAMENTE!');
        window.location= 'admin.php';
        </script>";
        exit;
    }
    else {
    echo "<script> alert('ERROR DE INSERCION, PORFAVOR INTENTE NUEVAMENTE');
        window.location= 'admin.php'</script>";
    exit;
    }
}





?>