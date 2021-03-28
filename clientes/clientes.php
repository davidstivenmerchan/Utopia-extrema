<?php
require_once("../php/validacion.php");
?>

<?php

    $id_compraa = $_SESSION['idc'];

    $c = $_SESSION['cc'];

    $id_qr = $_SESSION['idq'];

    

    include('../php/conexion.php');


    $sql ="SELECT codigo.id_compra, codigo.cedula, usuarios.nombre, usuarios.apellido, usuarios.correo, usuarios.celular, estado.nom_estado, card.name_card, compra.tickest , compra.date_vcto from codigo, usuarios, estado, compra, card WHERE usuarios.cedula=codigo.cedula and estado.id_estados=compra.id_estados and compra.id_compra=codigo.id_compra and card.id_card=compra.id_card and codigo.id_compra='$id_compraa' and codigo.cedula='$c'";
   # $sql ="SELECT usuarios.nombre, usuarios.apellido, usuarios.correo, usuarios.cedula, compra.id_card, compra.tickest, estado.nom_estado FROM usuarios, estado, compra WHERE usuarios.cedula=compra.cedula and estado.id_estados=compra.id_estados and usuarios.cedula=' $cedulaaa'";
    $resultados = mysqli_query($conexion, $sql);
    $fila=mysqli_fetch_array($resultados);


         $ti = $fila['tickest'];

        

       /* $tir = $ti - 1; */

    
    
    ?>
<?php

        if(isset($_POST['enviar'])){

            $id_atra = $_POST['id_atraccionn'];

            $rtic = $ti - 1;

            if($rtic>-1){

             


            $consul_para_ingresar = "INSERT INTO game ( id_atraccion, id_qr) VALUES( $id_atra, $id_qr)";
            $resuu= mysqli_query($conexion, $consul_para_ingresar);

            if($resuu){
                echo "<script> alert('funciona'); </script>";
            }
            else {
                echo "<script> alert('NO esta funcionando esta chimbada'); </script>";
            }
        
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
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <link rel="stylesheet" href="../css/clientes.css">
    <title>Clientes</title>

</head>
<body>
    <div class="encabezado">
    <div class="logo">
            <img src="../imagenes/PRIMERLOGO.png" alt="">
        </div>    
    <h2>Cliente: <?php echo $fila['nombre'] ?>  <?php echo $fila['apellido'] ?></h2>
    <div class="exit">
                <a href="../php/cerrar.php"><i class="fas fa-sign-out-alt"></i></a>
    </div>
        
    </div>
    

<div class="datos">
    <div class="dpersonales">
        <h4>MIS DATOS:</h4>
        <p>Cedula: <?php echo $fila['cedula'] ?></p>
        <p>Nombre: <?php echo $fila['nombre'] ?></p>
        <p>Apellido: <?php echo $fila['apellido'] ?></p>
        <p>Correo: <?php echo $fila['correo'] ?></p>
        <p>Celular: <?php echo $fila['celular'] ?></p>

    </div>
    <div class="dtarjeta">
        <h4>DATOS TARJETA:</h4>
        <p>ID Compra: <?php echo $fila['id_compra'] ?></p>
        <p>Tickest Disponibles: <?php echo $ti ?> </p>
        <p>Tipo de Tajera: <?php echo $fila['name_card'] ?> </p>
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
        </div>
</div>
<h3>ATRACCIONES DISPONIBLES</h3>
<?php

     $consul_mostrar_atrac = "SELECT * FROM planeacion";
     $respues = mysqli_query($conexion,$consul_mostrar_atrac);
    # $fila1 = mysqli_fetch_array($respues);

     while($i = mysqli_fetch_array($respues)){

     

?>
    
    <form action="" method="POST">
       <p><?php echo $i['id_atraccion']?></p>
       <input type="hidden" name="id_atraccionn" value="<?php $i['id_atraccion'] ?>">
      
       <input type="submit" value="MONTAR" name="enviar" >
   </form>
<?php
     }
?>


   <form action="" method="POST">
       <p>SIRVIENDO</p>
       <input type="hidden" name="id_atraccionn" value="1">
       <input type="submit" value="MONTAR" name="enviar">
   </form>



   


</body>
</html>