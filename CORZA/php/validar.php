<?php
 session_start();
 require_once("conexion.php");
 if($_POST["iniciar"]){
     
    $usu = $_POST['usuario'];
    $clave = $_POST['clave'];
   
   
    $consulta = "SELECT * FROM usuarios WHERE usuario = '$usu' AND clave = '$clave'";
    $usuario = mysqli_query($conn,$consulta);
    $arreglo = mysqli_fetch_assoc($usuario);

    if ($arreglo){
        $_SESSION['cc'] = $arreglo['cedula'];
        $_SESSION['nom'] = $arreglo['nombre'];
        $_SESSION['ape'] = $arreglo['apellido'];
        $_SESSION['usu'] = $arreglo['usuario'];
        $_SESSION['clave'] = $arreglo['clave'];
        $_SESSION['cell'] = $arreglo['telefono'];
        $_SESSION['tip'] = $arreglo['id_tipo_usu'];

       
        
        if($_SESSION["tip"] == 1){
            header("location: ../admi/index.php");
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

