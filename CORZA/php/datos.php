<?php
 require_once("validacion.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>datos de rastreo</title>
    <link rel="icon" href="../iconos/icnono.ico">
    <link rel="stylesheet" href="../css/rastreo.css">
</head>
<body>
<img src="../img/logo_redondo_sinfondo.png" class="logo1">

<div class="rastr">
    <h1>datos del cliente</h1>
<h2> Cedula: <?= $_SESSION['cc']?></h2>
<h2> Nombre: <?=$_SESSION['nom']?></h2>
<h2> Apellido: <?=$_SESSION['ape']?></h2>
<h2> Telefono: <?=$_SESSION['cell']?></h2>
<h2> Numero de pedidos: <?=$_SESSION['pren']?></h2>
<h2> ESTADO: <?=$_SESSION['estado']?></h2>
<a href="cerrar.php"><i class="salir fas fa-times-circle"></i></a>

</div>
<script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script>
</body>
</html>