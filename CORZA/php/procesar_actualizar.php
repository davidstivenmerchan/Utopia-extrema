<?php
include("conexion.php");

$cc = $_POST['cedula'];  
$estadoe = $_POST['estado_entrega'];
$rastreo = $_POST['id_rastreo'];

$actualizar = "UPDATE usuarios SET estado_entrega='$estadoe', id_rastreo='$rastreo' where cedula ='$cc'";

$resultado=mysqli_query($conn,$actualizar);

if($resultado){
    echo "<scrip>alert('se han actualizado los datos correctamente')</scrip>";
    header("location: ../admi/index.php");
}else{
    echo "<scrip>alert('error al actualizar los datos')</scrip>";
}

?>