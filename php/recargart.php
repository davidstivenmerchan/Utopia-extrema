<?php
    
    include('conexion.php');
    

    if(isset($_POST['recargar'])){

        $idtar = $_POST['n_tarjeta'];
        $nt = $_POST['n_taejta_c'];
        $datev = $_POST['datevc'];
        $cod = $_POST['cod'];
        

        $sql1="SELECT tickest FROM compra  where id_compra='$idtar'";
        $resultado1=mysqli_query($conexion,$sql1);
        $fila1=mysqli_fetch_array($resultado1);

        if($fila1){

            $tic=$fila1['tickest'];

            $tickest = $tic + 10;

            $sql2="UPDATE compra SET tickest='$tickest' where id_compra='$idtar'";
            $resultado2=mysqli_query($conexion,$sql2);


            $sql3="INSERT INTO carga_card (id_compra,number_of_card,date_vcto_card,cod_card) VALUES ('$idtar','$nt','$datev','$cod')";
            $resultado3=mysqli_query($conexion,$sql3);
            

            
            


            
            
        }
       
        

        echo "<script> alert('RECARGO CON EXITO SU TARJETA!'); </script>";

        

    }


    header("location: ../index.php");


?>