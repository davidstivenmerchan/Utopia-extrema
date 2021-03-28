<?php 
    include('conexion.php');

    if(isset($_POST['salida'])){

        echo "<script> alert('si entra en la condicion de la consulta para ingresar la fecha de salida!'); </script>";

        $fecha_salida = $_POST['fechasalida'];

        $qr = $_POST['qr'];

        $consulta = "UPDATE entry_exit SET fe_ho_exit='$fecha_salida' where id_qr='$qr'";
        $res = mysqli_query($conexion,$consulta);

    }

    session_start();
    if(isset($_COOKIE['session_name()'])){
        setcookie(session_name(), "",time()-3600,"/");
    }
        unset($_SESSION['cc']);
        unset($_SESSION['idc']);
        
        $_SESSION = array();
        session_destroy();
        session_write_close();
        header("location: ../index.php");


    
?>
