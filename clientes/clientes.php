<?php
    session_start();

    ?>
<?php

    $id_compraa = $_SESSION['idc'];
    $c = $_SESSION['cc'];

    include('../php/conexion.php');


    $sql ="SELECT codigo.id_compra, codigo.cedula, usuarios.nombre, usuarios.apellido, usuarios.correo, estado.nom_estado, card.name_card, compra.tickest , compra.date_vcto from codigo, usuarios, estado, compra, card WHERE usuarios.cedula=codigo.cedula and estado.id_estados=compra.id_estados and compra.id_compra=codigo.id_compra and card.id_card=compra.id_card and codigo.id_compra='$id_compraa' and codigo.cedula='$c'";
   # $sql ="SELECT usuarios.nombre, usuarios.apellido, usuarios.correo, usuarios.cedula, compra.id_card, compra.tickest, estado.nom_estado FROM usuarios, estado, compra WHERE usuarios.cedula=compra.cedula and estado.id_estados=compra.id_estados and usuarios.cedula=' $cedulaaa'";
    $resultados = mysqli_query($conexion, $sql);
    $fila=mysqli_fetch_array($resultados);


         $ti = $fila['tickest'];

        

       /* $tir = $ti - 1; */

    
    
    ?>
<?php

        if(isset($_POST['enviar'])){

            $rtic = $ti - 1;

            if($rtic>-1){

             


            
            
            $consuk = "UPDATE compra SET tickest='$rtic' where  id_compra = '$id_compraa' ";
            $resultadosos = mysqli_query($conexion, $consuk);

            }else{
                echo "<script> alert('Lo sentimos no tiene mas tickest por favor recargue su tarjeta'); </script>";
            }
            

            
        }


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/clientes.css">
    <title>Clientes</title>

</head>
<body>
    <h2>Cliente: <?php echo $fila['nombre'] ?>  <?php echo $fila['apellido'] ?></h2>


    <h4>MIS DATOS:</h4>
    <p>Cedula: <?php echo $fila['cedula'] ?></p>
    <p>Nombre: <?php echo $fila['nombre'] ?></p>
    <p>Apellido: <?php echo $fila['apellido'] ?></p>
    <p>Correo: <?php echo $fila['correo'] ?></p>
    <h4>DATOS TARJETA:</h4>
    <p>ID Compra: <?php echo $fila['id_compra'] ?></p>
    <p>Tickest Disponibles:<?php echo $ti ?> </p>
    <p>Tipo de Tajera:<?php echo $fila['name_card'] ?> </p>
    <p>Estado de la Tarjeta: <?php echo $fila['nom_estado'] ?></p>
     <?php 
     $hoy = date("Y-m-d");
     $fechaAc= date_create($hoy);
     $vencimiento = date_create($fila['date_vcto']);
     $dias = date_diff($fechaAc,$vencimiento);
     $dia = $dias->format("%R%a dias");
     $busca = strpos($dia, "+");
     
     if($busca === false){
         $consultica = "UPDATE compra SET id_estados = 2 WHERE  id_compra = '$id_compraa' ";
         $ejecutar = mysqli_query($conexion, $consultica);
     }else{
        echo "<p>Su tarjeta expira en: $dia </p>";
     }
    ?>
    
    
    

    <form action="" method="POST">
       <p>maquina 1</p>
      
       <input type="submit" value="MONTAR" name="enviar" >
   </form>
   <form action="" method="POST">
       <p>maquina 2</p>
       
       <input type="submit" value="MONTAR" name="enviar">
   </form>


</body>
</html>