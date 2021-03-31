<?php
session_start();

 require_once("conexion.php");
 if($_POST["enviar"]){
    
    $cod = $_POST['codigo'];
   
   
   
    $consulta = "SELECT * FROM usuarios WHERE id_rastreo = '$cod'";
    $usuario = mysqli_query($conn,$consulta);
    $arreglo = mysqli_fetch_assoc($usuario);

    if(isset($arreglo)){
       
        $_SESSION['cc'] = $arreglo['cedula'];
        $_SESSION['usu'] = $arreglo['usuario'];

        $_SESSION['nom'] = $arreglo['nombre'];
        $_SESSION['ape'] = $arreglo['apellido'];
        $_SESSION['codigo'] = $arreglo['id_rastreo'];
        $_SESSION['cell'] = $arreglo['telefono'];
        $_SESSION['pren'] = $arreglo['prendas'];
        $_SESSION['estado'] = $arreglo['estado_entrega'];
        $_SESSION['tip'] = $arreglo['id_tipo_usu'];


       
        
        if($_SESSION['tip'] == 2){
        header("location: datos.php");
        exit();

        } else if($_SESSION['tip'] == ""){
            echo '<script> alert ("error");</script>';
            exit();
        }    
    } else {
        echo '<script> alert ("error");</script>';
        exit();
 
 }   
}
?>

