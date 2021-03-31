<?php 

include("conexion.php");

if (isset($_POST['registrar'])) {
    if(strlen($_POST['cedula']) >= 1 && 
    strlen($_POST['nombre']) >= 1 && 
    strlen($_POST['apellido']) >= 1 && 
    strlen($_POST['usuario']) >= 1 && 
    strlen($_POST['clave']) >= 1 && 
    strlen($_POST['cell']) >= 1) {
	    $cc = trim($_POST['cedula']);
		$nom = trim($_POST['nombre']);
		$ape = trim($_POST['apellido']);
		$usu = trim($_POST['usuario']);
		$clave = trim($_POST['clave']);
		$cell = trim($_POST['cell']);
		
	    $consulta = "INSERT INTO usuarios (cedula, nombre, apellido, usuario, clave, telefono) VALUES ('$cc','$nom','$ape','$usu','$clave','$cell')";
	    $resultado = mysqli_query($conn,$consulta);
	    if ($resultado) {
            
            echo '<script> alert ("usuario creado exitosamente,");</script>';
            exit;
	    } else {
	    	?> 
	    	<h3 class="bad">¡Ups ha ocurrido un error!</h3>
           <?php
	    }
    }   else {
	    	?> 
	    	<h3 class="bad">¡Por favor complete los campos!</h3>
           <?php
    }
}

?>