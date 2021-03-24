<?php

$cc = $_POST['cc'];
$idc = $_POST['idc'];

session_start();


include('conexion.php');

$consulta = "SELECT * FROM codigo WHERE id_qr = '$idc' and cedula = '$cc'";
$resultado = mysqli_query($conexion, $consulta);

$fila=mysqli_num_rows($resultado);





if ($fila){
$_SESSION['idq'] = $arreglo['id_qr'];
$_SESSION['idc'] = $arreglo['id_compra'];
$_SESSION['cc'] =  $cc;


    if($fila){

        header("location: ../clientes/clientes.php");
    }else{
        ?>
        <?php
        include('../index.php');
        ?>
        <h1>error</h1>
        <?php
    }
    mysqli_free_result($resultado);
    mysqli_close($conexion);
}
?>




