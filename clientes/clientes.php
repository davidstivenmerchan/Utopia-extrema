<?php
require_once("../php/validacion.php");
?>

<?php
    

   

    $id_compraa = $_SESSION['idc'];

    $c = $_SESSION['cc'];

    $id_qr = $_SESSION['idq'];

    $idingreso = $_SESSION['ingreso'];

    

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

            $date = strftime('%Y-%m-%d %H:%M:%S');

           

            if($rtic>-1){

             


            $consul_para_ingresar = "INSERT INTO game(id_atraccion,id_qr,fe_ho_game) VALUES($id_atra,$id_qr,'$date')";
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
    <link rel="icon" href="../imagenes/PRIMERLOGO.ico">
    <title>Clientes</title>

</head>
<body>
    <div class="encabezado">
    <div class="logo">
            <img src="../imagenes/PRIMERLOGO.png" alt="" class="icono">
        </div>    
    <h2>Cliente: <?php echo $fila['nombre'] ?>  <?php echo $fila['apellido'] ?></h2>
   <!--  <div class="exit">
    
                <a href="../php/cerrar.php"><i class="fas fa-sign-out-alt"></i></a>

    </div> -->
        <div class="exit">
            <form action="salida.php" method="POST">
            <input type="hidden" name="id_entrada" value="<?php echo $idingreso ?>">
            <input type="submit" value="Cerrar Sesion" name="salida">
        </form>

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
<br>
<br>
<hr>
<br>
<h3>ATRACCIONES DISPONIBLES</h3>
<?php

     $consul_mostrar_atrac = "SELECT * FROM planeacion, atraccion, tipo_atraccion where atraccion.id_atraccion=planeacion.id_atraccion AND tipo_atraccion.id_tip_atraccion=atraccion.id_tip_atraccion";
     $respues = mysqli_query($conexion,$consul_mostrar_atrac);

     

    
    # $fila1 = mysqli_fetch_array($respues);

     while($i = mysqli_fetch_array($respues)){
      
?>
    
            <form action="" method="POST" class="formumaquinas">
          <?php if($i['id_atraccion']==12):?>
          <img src="../imagenes/atracciones/360.jpeg" alt="" class="cicloform"> <div class="pciclo"><p>hola ptos</p></div>
          <?php elseif($i['id_atraccion']==13): ?>
          <img src="../imagenes/atracciones/agua.jpeg" alt="" class="cicloform" ><div class="pciclo"><p>hola ptos</p></div>
          <?php elseif($i['id_atraccion']==14): ?>
          <img src="../imagenes/atracciones/air.jpeg" alt="" class="cicloform" ><div class="pciclo"><p>hola ptos</p></div>
          <?php elseif($i['id_atraccion']==15): ?>
          <img src="../imagenes/atracciones/apoca.jpeg" alt="" class="cicloform" ><div class="pciclo"><p>hola ptos</p></div>
          <?php elseif($i['id_atraccion']==16): ?>
          <img src="../imagenes/atracciones/araña.jpeg" alt="" class="cicloform" ><div class="pciclo"><p>hola ptos</p></div>
          <?php elseif($i['id_atraccion']==17): ?>
          <img src="../imagenes/atracciones/aviones.jpeg" alt="" class="cicloform" ><div class="pciclo"><p>hola ptos</p></div>
          <?php elseif($i['id_atraccion']==18): ?>
          <img src="../imagenes/atracciones/barca.jpeg" alt="" class="cicloform" ><div class="pciclo"><p>hola ptos</p></div>
          <?php elseif($i['id_atraccion']==19): ?>
          <img src="../imagenes/atracciones/bus.jpeg" alt="" class="cicloform" ><div class="pciclo"><p>hola ptos</p></div>
          <?php elseif($i['id_atraccion']==20): ?>
          <img src="../imagenes/atracciones/caballitos.jpeg" alt="" class="cicloform" ><div class="pciclo"><p>hola ptos</p></div>
          <?php elseif($i['id_atraccion']==21): ?>
          <img src="../imagenes/atracciones/caidalibre.jpeg" alt="" class="cicloform" ><div class="pciclo"><p>hola ptos</p></div>
          <?php elseif($i['id_atraccion']==22): ?>
          <img src="../imagenes/atracciones/camion.jpeg" alt="" class="cicloform" ><div class="pciclo"><p>hola ptos</p></div>
          <?php elseif($i['id_atraccion']==23): ?>
          <img src="../imagenes/atracciones/carros.jpeg" alt="" class="cicloform" ><div class="pciclo"><p>hola ptos</p></div>
          <?php elseif($i['id_atraccion']==24): ?>
          <img src="../imagenes/atracciones/carroschocones.jpeg" alt="" class="cicloform" ><div class="pciclo"><p>hola ptos</p></div>
          <?php elseif($i['id_atraccion']==25): ?>
          <img src="../imagenes/atracciones/castle.jpeg" alt="" class="cicloform" ><div class="pciclo"><p>hola ptos</p></div>
          <?php elseif($i['id_atraccion']==26): ?>
          <img src="../imagenes/atracciones/castt.jpeg" alt="" class="cicloform" ><div class="pciclo"><p>hola ptos</p></div>
          <?php elseif($i['id_atraccion']==27): ?>
          <img src="../imagenes/atracciones/ciclon.jpeg" alt="" class="cicloform" ><div class="pciclo"><p>hola ptos</p></div>
          <?php elseif($i['id_atraccion']==28): ?>
          <img src="../imagenes/atracciones/columpios.jpeg" alt="" class="cicloform" ><div class="pciclo"><p>hola ptos</p></div>
          <?php elseif($i['id_atraccion']==29): ?>
          <img src="../imagenes/atracciones/dino.jpeg" alt="" class="cicloform" ><div class="pciclo"><p>hola ptos</p></div>
          <?php elseif($i['id_atraccion']==30): ?>
          <img src="../imagenes/atracciones/doble.jpeg" alt="" class="cicloform" ><div class="pciclo"><p>hola ptos</p></div>
          <?php elseif($i['id_atraccion']==31): ?>
          <img src="../imagenes/atracciones/extrema.jpeg" alt="" class="cicloform" ><div class="pciclo"><p>hola ptos</p></div>
          <?php elseif($i['id_atraccion']==32): ?>
          <img src="../imagenes/atracciones/halo.jpeg" alt="" class="cicloform" ><div class="pciclo"><p>hola ptos</p></div>
          <?php elseif($i['id_atraccion']==33): ?>
          <img src="../imagenes/atracciones/krater.jpeg" alt="" class="cicloform" ><div class="pciclo"><p>hola ptos</p></div>
          <?php elseif($i['id_atraccion']==34): ?>
          <img src="../imagenes/atracciones/montañarusa.jpeg" alt="" class="cicloform" ><div class="pciclo"><p>hola ptos</p></div>
          <?php elseif($i['id_atraccion']==35): ?>
          <img src="../imagenes/atracciones/motos.jpeg" alt="" class="cicloform" ><div class="pciclo"><p>hola ptos</p></div>
          <?php elseif($i['id_atraccion']==36): ?>
          <img src="../imagenes/atracciones/ponis.jpeg" alt="" class="cicloform" ><div class="pciclo"><p>hola ptos</p></div>
          <?php elseif($i['id_atraccion']==37): ?>
          <img src="../imagenes/atracciones/pulpo.jpeg" alt="" class="cicloform" ><div class="pciclo"><p>hola ptos</p></div>
          <?php elseif($i['id_atraccion']==38): ?>
          <img src="../imagenes/atracciones/pulpo2.jpeg" alt="" class="cicloform" ><div class="pciclo"><p>hola ptos</p></div>
          <?php elseif($i['id_atraccion']==39): ?>
          <img src="../imagenes/atracciones/pulponiños.jpeg" alt="" class="cicloform" ><div class="pciclo"><p>hola ptos</p></div>
          <?php elseif($i['id_atraccion']==40): ?>
          <img src="../imagenes/atracciones/rana.jpeg" alt="" class="cicloform" ><div class="pciclo"><p>hola ptos</p></div>
          <?php elseif($i['id_atraccion']==41): ?>
          <img src="../imagenes/atracciones/ranger.jpeg" alt="" class="cicloform" ><div class="pciclo"><p>hola ptos</p></div>
          <?php elseif($i['id_atraccion']==42): ?>
          <img src="../imagenes/atracciones/rueda.jpeg" alt="" class="cicloform" ><div class="pciclo"><p>hola ptos</p></div>
          <?php elseif($i['id_atraccion']==43): ?>
          <img src="../imagenes/atracciones/rusa.jpeg" alt="" class="cicloform" ><div class="pciclo"><p>hola ptos</p></div>
          <?php elseif($i['id_atraccion']==44): ?>
          <img src="../imagenes/atracciones/sonica.jpeg" alt="" class="cicloform" ><div class="pciclo"><p>hola ptos</p></div>
          <?php elseif($i['id_atraccion']==45): ?>
          <img src="../imagenes/atracciones/suicidio.jpeg" alt="" class="cicloform" ><div class="pciclo"><p>hola ptos</p></div>
          <?php elseif($i['id_atraccion']==46): ?>
          <img src="../imagenes/atracciones/taza.jpeg" alt="" class="cicloform" ><div class="pciclo"><p>hola ptos</p></div>
          <?php elseif($i['id_atraccion']==47): ?>
          <img src="../imagenes/atracciones/terror.jpeg" alt="" class="cicloform" ><div class="pciclo"><p>hola ptos</p></div>
          <?php elseif($i['id_atraccion']==48): ?>
          <img src="../imagenes/atracciones/tirar.jpeg" alt="" class="cicloform" ><div class="pciclo"><p>hola ptos</p></div>
          <?php elseif($i['id_atraccion']==49): ?>
          <img src="../imagenes/atracciones/torre.jpeg" alt="" class="cicloform" ><div class="pciclo"><p>hola ptos</p></div>
          <?php elseif($i['id_atraccion']==50): ?>
          <img src="../imagenes/atracciones/tren.jpeg" alt="" class="cicloform" ><div class="pciclo"><p>hola ptos</p></div>
          <?php elseif($i['id_atraccion']==51): ?>
          <img src="../imagenes/atracciones/troncos.jpeg" alt="" class="cicloform" ><div class="pciclo"><p>hola ptos</p></div>
          <?php else: ?>
          <h5>NO EXISTE IMAGEN</h5>
          <?php endif ?>
         
     
      <p>Tipo: <?php echo $i['nom_tip_atraccion']?></p>
       <h3><?php echo $i['nom_atraccion']?></h3>

       <input type="hidden" name="id_atraccionn" value="<?php echo $i['id_atraccion'] ?>">
      
       <input type="submit" value="MONTAR" name="enviar" >
   </form>
<?php
     }
?>
<br>
<br>
<br>
<br>
<br>





   <footer>
      <div class="fopa">
          <div class="fo1">
            <h4>LIKS DE INTERES</h4>
            <p>-Ubicanos</p>
            <p>-Quienes somos</p>
            <p>-Nuestros aliados</p>
            <p>-Trabaja con nosotros</p>
            <p>-Politicas del parque</p>
          </div>
      
          <div class="fo2">
            <h4>AYUDA</h4>
            <p>extremautopia@gmail.com</p>
            <p>+57 3156254560</p>
            <p>+57 3109875689</p>
            <h5>Servicio al cliente</h5>
          </div>

          <div class="fo3">
            <h4>OTROS</h4>
              <div class="otroi">
                <i class="fas fa-map-marked-alt"></i> <p>Como llegar</p>
              </div >
              <div class="otroi">
                <i class="fas fa-check-square"></i><p>Tips del Parque</p>
              </div >
              <div class="otroi">
                <i class="far fa-calendar-alt"></i><p>Horarios</p>
              </div>
          </div>
          <div class="fo4">
            <h4>SIGUENOS</h4>
            <div class="otroi segui1">
              <i class="fab fa-twitter-square facebook"></i>
              <i class="fab fa-facebook-square facebook"></i>
              <i class="fab fa-youtube-square facebook"></i>

            </div>
            <div class="otroi segui2">
              <i class="fab fa-instagram facebook"></i>
              <i class="fab fa-google-plus-square facebook"></i>
            </div>
          </div>
      </div>
      <div class="imgfooter">
        <img src="../imagenes/footer1.png" alt="">
        <img src="../imagenes/footer5.png" alt="">
        <img src="../imagenes/footer3.jpg" alt="">
        <img src="../imagenes/footer4.png" alt="">
      </div>
      <div class="footerp">
        <p>Terminos y condiciones tienda virtual |</p>
        <p>Aviso de Privacidad |</p>
        <p>Todos los derechos reservados &copy; UTOPIA EXTREMA 2021 |</p>
        <p>#TuMundoIdealDeDiversion</p>

        <br>
        <br>
        <br>
      </div>


      

        <!-- h5>&copy; UTOPIA EXTREMA</h5>
        <p>#TuMundoIdealDeDiversion</p> -->
    </footer>


     
   


</body>
</html>