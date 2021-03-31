<?php
 require_once("php/validacion.php")
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>mi codigo rastreo</title>
    <link rel="icon" href="iconos/icnono.ico">
    <link rel="stylesheet" href="css/rastreo.css">
</head>
<body>
<img src="img/logo_redondo_sinfondo.png" class="logo">

<div class="rastro">
<h1> su codigo de rastreo es: <?=$_SESSION['codigo']?></h1>
<a href="php/cerrar.php"><i class="salir fas fa-times-circle"></i></a>

</div>
<script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script>
</body>
</html>