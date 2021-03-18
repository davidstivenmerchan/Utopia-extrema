<?php

$usuario = $_POST['usu'];
$contraseña = $_POST['pass'];

session_start();
$_SESSION['usuario'] = $usuario;

include('conexion.php');

$consulta = "SELECT * FROM usuario WHERE usuario = '$usuario' and contrasena = '$contraseña'";
$resultado = mysqli_query($conexion, $consulta);

$fila=mysqli_num_rows($resultado);

if($fila){

    header("location: ../html/admi.html");
}else{
    ?>
    <?php
    include('../index.html');
    ?>
    <h1>error</h1>
    <?php
}
mysqli_free_result($resultado);
mysqli_close($conexion);

?>




