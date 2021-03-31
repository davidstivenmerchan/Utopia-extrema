<?php

session_start();
 require_once("conexion.php");
 if($_POST["enviar"]){
    
    $usu = $_POST['usuario'];
    $clave = $_POST['clave'];
   
   
    $consulta = "SELECT * FROM usuarios WHERE usuario = '$usu' AND clave = '$clave'";
    $usuario = mysqli_query($conn,$consulta);
    $arreglo = mysqli_fetch_assoc($usuario);

    if(isset($arreglo)){
       
       
        $_SESSION['usu'] = $arreglo['usuario'];
        $_SESSION['lave'] = $arreglo['clave'];
        $_SESSION['tip'] = $arreglo['id_tipo_usu'];
        $_SESSION['codigo'] = $arreglo['id_rastreo'];

       
        
        if($_SESSION["tip"] == 2){
            header("location: ../rastreo.php");
            exit();

        } else if($_SESSION["tip"] == ""){
            echo '<script> alert ("los clientes no pueden iniciar sesion");</script>';
            exit();
        }    
    } else {
        header("Location: ../error.html");
        exit();
 
 }   
}
?>

