<?php
require_once("../php/validacion.php");
?>
<?php

include("../php/conexion.php");
$usuarios = "SELECT * FROM usuarios where id_tipo_usu > 1";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <h1>BIENVENIDO ADMINISTRADOR</h1>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>| ADMINISTRADOR</title>
    <link rel="icon" href="../iconos/icnono.ico">
    <link rel="stylesheet" href="admi.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@100&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans+Condensed:wght@300&family=Roboto+Mono:ital,wght@0,100;1,300&family=Sansita+Swashed:wght@300&display=swap" rel="stylesheet">
</head>
<body>
    <div class="contenedor_todo">
        <div class="titulo">DATOS DE LOS USUARIOS</div>
    
        <div class="encabezado">CEDULA</div>
        <div class="encabezado">NOMBRE</div>
        <div class="encabezado">APELLIDO</div>
        <div class="encabezado">USUARIO</div>
        <div class="encabezado">CLAVE</div>
        <div class="encabezado">TELEFONO</div>
        <div class="encabezado">N° PRENDAS</div>
        <div class="encabezado">ESTADO DE ENTREGA</div>
        <div class="encabezado">CODIGO RASTREGO</div>
        <div class="encabezado">OPERACION</div>

   
        <?php $resul = mysqli_query($conn,$usuarios);
     
        while($row=mysqli_fetch_assoc($resul)){ ?>
     
        <div class="info"><?php echo $row["cedula"]; ?></div>
        <div class="info"><?php echo $row["nombre"]; ?></div>
        <div class="info"><?php echo $row["apellido"]; ?></div>
        <div class="info"><?php echo $row["usuario"]; ?></div>
        <div class="info"><?php echo $row["clave"]; ?></div>
        <div class="info"><?php echo $row["telefono"]; ?></div>
        <div class="info"><?php echo $row["prendas"]; ?></div>
        <div class="info"><?php echo $row["estado_entrega"]; ?></div>
        <div class="info"><?php echo $row["id_rastreo"]; ?></div>
        <div class="info"><a href="../php/modificar.php?cedula=<?php echo $row["cedula"]; ?>">AGREGAR</a></div>
        <?php } ?>
    </div>
    <img src="../img/logo_redondo_sinfondo.png" class="logo">
    <a href="../php/cerrar.php"><i class="salir fas fa-reply"></i></a>

    <script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script>
    
</body>
</html>