<?php

require_once('../php/conexion.php');


$tip_atra = $_POST['tip_atraccion'];
$nom_atra = $_POST['nom_atraccion'];
$capacidad = $_POST['capa'];
$ubicacion = $_POST['ubicacion'];

if(isset($_POST['registrar_atracciones'])){

    $consul = "INSERT INTO atraccion(id_tip_atraccion,nom_atraccion,capacidad,id_ubi) VALUES ($tip_atra,'$nom_atra',$capacidad,$ubicacion)";

    $query=mysqli_query($conexion,$consul);

    if($query){
        echo "<script> alert('REGISTRO DE ATRACCIONES CORRECTAMENTE!'); 
        
        </script>";
        header("location: admin.php");
        exit;
        
    }else {
        echo "<script> alert('algo fallo'); </script>";
    }
}





?>