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
              echo "<script> alert('GRACIAS POR DISFRUTAR DE NUESTRAS ATRACCIONES');
              window.location= 'clientes.php';
              </script>";
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
    <link href="https://fonts.googleapis.com/css2?family=Slabo+27px&display=swap" rel="stylesheet">
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
        <p><strong>Cedula: </strong> <?php echo $fila['cedula'] ?></p>
        <p><strong>Nombre: </strong><?php echo $fila['nombre'] ?></p>
        <p><strong>Apellido: </strong> <?php echo $fila['apellido'] ?></p>
        <p><strong>Correo: </strong><?php echo $fila['correo'] ?></p>
        <p><strong>Celular: </strong> <?php echo $fila['celular'] ?></p>

    </div>
    <div class="dtarjeta">
        <h4>DATOS TARJETA:</h4>
        <p><strong>ID Compra: </strong> <?php echo $fila['id_compra'] ?></p>
        <p><strong>Tickest Disponibles: </strong>  <?php echo $ti ?> </p>
        <p><strong>Tipo de Tajera: </strong>  <?php echo $fila['name_card'] ?> </p>
        <p><strong>Estado de la Tarjeta: </strong>  <?php echo $fila['nom_estado'] ?></p>

    
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
        echo "<p><strong>Su tarjeta expira en: </strong> $dia </p>";
     }
    ?>
        </div>
</div>
<br>
<br>
<hr>
<br>
<h3>ATRACCIONES DISPONIBLES</h3>





<div class="diiiss">

<?php

     $fech = strftime('%Y-%m-%d');

     $consul_mostrar_atrac = "SELECT * FROM planeacion, atraccion, tipo_atraccion where atraccion.id_atraccion=planeacion.id_atraccion AND tipo_atraccion.id_tip_atraccion=atraccion.id_tip_atraccion and planeacion.fecha_reg='$fech'";
     $respues = mysqli_query($conexion,$consul_mostrar_atrac);

     

    
    # $fila1 = mysqli_fetch_array($respues);

     while($i = mysqli_fetch_array($respues)){
      
?>
    
    <div id="div">
    
            <form action="" method="POST" class="formumaquinas">

            
            
          <?php if($i['id_atraccion']==12):?>
          <img src="../imagenes/atracciones/360.jpeg" alt="" class="cicloform"> <div class="pciclo"><p>brutal atraccion que te pondra de cabeza mientras giras en su propio eje. brazo mecanico que gira en su propio eje mientras va girando 360 grados.</p></div>
          <?php elseif($i['id_atraccion']==13): ?>
          <img src="../imagenes/atracciones/agua.jpeg" alt="" class="cicloform" ><div class="pciclo"><p>Siente la diversion en la unica montaña rusa acuatica de Bogota. En un recorrido de 186 mts de 110 segundos de duración, a una velocidad promedio de 63 Kms/hora, cuenta con una caída espectacular, la cual inicia a una altura de 15,24 mts y termina en un estanque, produciendo un efecto de Splash.</p></div>
          <?php elseif($i['id_atraccion']==14): ?>
          <img src="../imagenes/atracciones/air.jpeg" alt="" class="cicloform" ><div class="pciclo"><p>Esta atraccion te pondra los pelos de punta al montarla ya que es una de las mas extremas del parque. la atraccion gira 360 grados mientras sus muñecas giran al lado opuesto mientras las silla donde estan sentando los clientes tambien giran y puede alcanzar una velocidad maxima de 40km por hora.</p></div>
          <?php elseif($i['id_atraccion']==15): ?>
          <img src="../imagenes/atracciones/apoca.jpeg" alt="" class="cicloform" ><div class="pciclo"><p>Despierta todos tus sentidos girando a toda velocidad. Juego de alto impacto que consiste en una gran góndola que hace movimiento rotacional y translacional, adornado con luces, colores y sonido. </p></div>
          <?php elseif($i['id_atraccion']==16): ?>
          <img src="../imagenes/atracciones/araña.jpeg" alt="" class="cicloform" ><div class="pciclo"><p>Esta atraccion te hara sentir el maximo vertigo ya que estara dando vueltas mientras sale a la orilla de un edificio dando asi la sencacion de caida libre.</p></div>
          <?php elseif($i['id_atraccion']==17): ?>
          <img src="../imagenes/atracciones/aviones.jpeg" alt="" class="cicloform" ><div class="pciclo"><p>Los mas pequeños disfrutaran de la #diversion extrema. Consta de seis aviones en forma de jet acoplados a una corona que gira continuamente. </p></div>
          <?php elseif($i['id_atraccion']==18): ?>
          <img src="../imagenes/atracciones/barca.jpeg" alt="" class="cicloform" ><div class="pciclo"><p>Preparate para girar 360 grados en forma vertical. Góndola sujeta a un mástil de 20 metros de altura que gira 360 grados en forma vertical, decorado con luces, colores y sonido. </p></div>
          <?php elseif($i['id_atraccion']==19): ?>
          <img src="../imagenes/atracciones/bus.jpeg" alt="" class="cicloform" ><div class="pciclo"><p>En este bus pondran subirse los niños para sentir una verdadera aventura!</p></div>
          <?php elseif($i['id_atraccion']==20): ?>
          <img src="../imagenes/atracciones/caballitos.jpeg" alt="" class="cicloform" ><div class="pciclo"><p>En este juego de caballo tendras oprimir rapidamente un boton para que tu caballo sea el mas rapido. No te dejes ganar!</p></div>
          <?php elseif($i['id_atraccion']==21): ?>
          <img src="../imagenes/atracciones/caidalibre.jpeg" alt="" class="cicloform" ><div class="pciclo"><p>En esta atraccion te tiraras a 100 metro de altura amarrado a una cuerda. 100% caida libre</p></div>
          <?php elseif($i['id_atraccion']==22): ?>
          <img src="../imagenes/atracciones/camion.jpeg" alt="" class="cicloform" ><div class="pciclo"><p>Los niños pondran sentir una verdadera aventura en este camion</p></div>
          <?php elseif($i['id_atraccion']==23): ?>
          <img src="../imagenes/atracciones/carros.jpeg" alt="" class="cicloform" ><div class="pciclo"><p>Siente la adrenalina de pisar a fondo el acelerador. Pista de concreto de 235 metros de longitud con curvas para 23 carros impulsados con motor a gasolina. </p></div>
          <?php elseif($i['id_atraccion']==24): ?>
          <img src="../imagenes/atracciones/carroschocones.jpeg" alt="" class="cicloform" ><div class="pciclo"><p>Vive una experiencia inolvidable llena de risas y choques. Carros diseñados para alto impacto, son 25 carros con luces, color y sonido, los cuales realizan maniobras para chocarse. </p></div>
          <?php elseif($i['id_atraccion']==25): ?>
          <img src="../imagenes/atracciones/castle.jpeg" alt="" class="cicloform" ><div class="pciclo"><p>En esta atraccion podras disfrutar con tu familia mientras montan sus dragones y giran a gran velocidad</p></div>
          <?php elseif($i['id_atraccion']==26): ?>
          <img src="../imagenes/atracciones/castt.jpeg" alt="" class="cicloform" ><div class="pciclo"><p>Si eres fan de los juegos de rol esta atraccion de encantara ya que es un juego sub realista de magos y hechiceros</p></div>
          <?php elseif($i['id_atraccion']==27): ?>
          <img src="../imagenes/atracciones/ciclon.jpeg" alt="" class="cicloform" ><div class="pciclo"><p>Esta atraccion gira a una gran velocidad mientras te eleva por los aires. alcanza una velocidad de 80km por hora y una altura de 100 metros.</p></div>
          <?php elseif($i['id_atraccion']==28): ?>
          <img src="../imagenes/atracciones/columpios.jpeg" alt="" class="cicloform" ><div class="pciclo"><p>La diversion no para cuando estas en las sillas voladoras. 32 sillas sostenidas por largas cadenas que giran alrededor de un eje vertical central. </p></div>
          <?php elseif($i['id_atraccion']==29): ?>
          <img src="../imagenes/atracciones/dino.jpeg" alt="" class="cicloform" ><div class="pciclo"><p>En esta atraccion los niños podran sentir una verdadera experiencia al montar encima de dinosaurios.</p></div>
          <?php elseif($i['id_atraccion']==30): ?>
          <img src="../imagenes/atracciones/doble.jpeg" alt="" class="cicloform" ><div class="pciclo"><p>Nada mejor que sentir la velocidad a 90km por hora. Es una montaña rusa que tiene una longitud total de 625 metros y la altura máxima alcanza 18.6 metros, cuenta con dos loops con elevación de 12.8 y 11.1 metros respectivamente, tiene seis carros y una velocidad máxima de 90 km/h. </p></div>
          <?php elseif($i['id_atraccion']==31): ?>
          <img src="../imagenes/atracciones/extrema.jpeg" alt="" class="cicloform" ><div class="pciclo"><p>Un columpio gigante que gira 360 grados a gran velocidad y a gran altura.</p></div>
          <?php elseif($i['id_atraccion']==32): ?>
          <img src="../imagenes/atracciones/halo.jpeg" alt="" class="cicloform" ><div class="pciclo"><p>En esta atraccion podras sentir que eres un soldado como en halo acompañado del jefe maestro con nuestra realidad virtual</p></div>
          <?php elseif($i['id_atraccion']==33): ?>
          <img src="../imagenes/atracciones/krater.jpeg" alt="" class="cicloform" ><div class="pciclo"><p>Esta es la montaña rusa mas extrema de nuestro parque ya que empieza con una subida en 90 grados hasta llegar a 120metros de altura y baja a una velocidad de 190km por hora. el recorrido dura aproximadamente 10min asi que preparate.</p></div>
          <?php elseif($i['id_atraccion']==34): ?>
          <img src="../imagenes/atracciones/montañarusa.jpeg" alt="" class="cicloform" ><div class="pciclo"><p>Disfruta un toque de adrenalina a una velocidad de 80km/h. Tren de diseño aerodinámico con seis carros que ruedan sobre rieles, con dos loops llamados saca corchos, esta va a una velocidad máxima de 80 km/h.</p></div>
          <?php elseif($i['id_atraccion']==35): ?>
          <img src="../imagenes/atracciones/motos.jpeg" alt="" class="cicloform" ><div class="pciclo"><p>En esta atraccion los niños sentiran la verdadera velocidad en sus motos mientras giran.</p></div>
          <?php elseif($i['id_atraccion']==36): ?>
          <img src="../imagenes/atracciones/ponis.jpeg" alt="" class="cicloform" ><div class="pciclo"><p>Nuestro carrusel salido de la fantasia espera por ti. Caballos y carrozas decorados con luces, color y sonido que giran alrededor de un eje central sobre dos plataformas de maderas. </p></div>
          <?php elseif($i['id_atraccion']==37): ?>
          <img src="../imagenes/atracciones/pulpo.jpeg" alt="" class="cicloform" ><div class="pciclo"><p>Un pulpo que esta furioso tiene 8 tentaculos y gira a una velocidad de 90km por hora mientras eleva y deja caer sus tentaculo haciendo sentir caida libre mientras giras.</p></div>
          <?php elseif($i['id_atraccion']==38): ?>
          <img src="../imagenes/atracciones/pulpo2.jpeg" alt="" class="cicloform" ><div class="pciclo"><p>En esta atraccion vas a sentir la verdadera adrenalina. la atracion cuenta con 10 manos que giran en su propio eje mientras el brazo completo tambien gira a una velocidad de 60km por hora y a una altura de 50metros.</p></div>
          <?php elseif($i['id_atraccion']==39): ?>
          <img src="../imagenes/atracciones/pulponiños.jpeg" alt="" class="cicloform" ><div class="pciclo"><p>los niños podran sentir un poquito de adrenalina ya que el pulpo gira a 30km por hora y a una altura de 20 metros</p></div>
          <?php elseif($i['id_atraccion']==40): ?>
          <img src="../imagenes/atracciones/rana.jpeg" alt="" class="cicloform" ><div class="pciclo"><p>En este juego de destreza tendras que tener buena punteria ya que el juego consiste en tirar aros a las ranas para poder ganar diferentes premios</p></div>
          <?php elseif($i['id_atraccion']==41): ?>
          <img src="../imagenes/atracciones/ranger.jpeg" alt="" class="cicloform" ><div class="pciclo"><p>Esta atraccion de dara una vuelta a 360 grados a una gran altura y velocidad.</p></div>
          <?php elseif($i['id_atraccion']==42): ?>
          <img src="../imagenes/atracciones/rueda.jpeg" alt="" class="cicloform" ><div class="pciclo"><p>Subete a la gran rueda gigante y ten una gran vista de todo el parque y la ciudad. Esta atracción es el emblema del parque. Es una rueda panorámica de 46 metros de altura con 40 góndolas adornada con luces y colores, gira sobre su propio eje en forma vertical.</p></div>
          <?php elseif($i['id_atraccion']==43): ?>
          <img src="../imagenes/atracciones/rusa.jpeg" alt="" class="cicloform" ><div class="pciclo"><p>Esta montaña rusa es la mas rapida de toda el parque alcanza la velocidad de 110km por hora y el recorrido dura 2 minutos con curvas cerradas vueltas de 360 grados y caidas libres. </p></div>
          <?php elseif($i['id_atraccion']==44): ?>
          <img src="../imagenes/atracciones/sonica.jpeg" alt="" class="cicloform" ><div class="pciclo"><p>Desafia la velocidad a mas de 100km por hora. Juego de alto impacto el cual consiste en una gran plataforma circular que gira a gran velocidad, adornado con luces y color. </p></div>
          <?php elseif($i['id_atraccion']==45): ?>
          <img src="../imagenes/atracciones/suicidio.jpeg" alt="" class="cicloform" ><div class="pciclo"><p>No subas a esta atraccion. ¡MORIRAS!</p></div>
          <?php elseif($i['id_atraccion']==46): ?>
          <img src="../imagenes/atracciones/taza.jpeg" alt="" class="cicloform" ><div class="pciclo"><p>En esta divertida atraccion podras disfrutar con tu familia en tazas gigantes mientras giran y suena musica.</p></div>
          <?php elseif($i['id_atraccion']==47): ?>
          <img src="../imagenes/atracciones/terror.jpeg" alt="" class="cicloform" ><div class="pciclo"><p>14 escenarios escalofriantes que causan sensacion de miedo, angustia y terror. Cuenta con 14 escalofriantes escenarios ambientados con luces, temperatura y sonido, además con efectos visuales que dan la sensación de miedo y terror. </p></div>
          <?php elseif($i['id_atraccion']==48): ?>
          <img src="../imagenes/atracciones/tirar.jpeg" alt="" class="cicloform" ><div class="pciclo"><p>En esta atraccion de destreza tendras que tener buena punteria ya que consiste en tirar monos. tumba los monos que mas puedas para ganar todos los diferentes premios que tenemos para ti!</p></div>
          <?php elseif($i['id_atraccion']==49): ?>
          <img src="../imagenes/atracciones/torre.jpeg" alt="" class="cicloform" ><div class="pciclo"><p>Siente el vacio a mas de 35 metros de altura. Esta atracción de alto impacto con 38 metros de altura, que equivale a lanzarse desde la terraza de un edificio de 15 pisos. Alcanza los 76 kilómetros por hora antes de llegar a una zona de frenado magnético. </p></div>
          <?php elseif($i['id_atraccion']==50): ?>
          <img src="../imagenes/atracciones/tren.jpeg" alt="" class="cicloform" ><div class="pciclo"><p>Los mas pequeños pueden disfrutar de un recorrido en tren y tener un dia inolvidable. Pequeño tren adornado de sonido, luces y color de cuatro vagones que se desplazan por un riel.</p></div>
          <?php elseif($i['id_atraccion']==51): ?>
          <img src="../imagenes/atracciones/troncos.jpeg" alt="" class="cicloform" ><div class="pciclo"><p>En esta atraccion te mojaras ya que es una montaña rusa de agua en la cual podras disfrutar con tu familia.</p></div>
          <?php else: ?>
          <h5 style="color: white">NO EXISTE IMAGEN PARA ESTA ATRACCION</h5>
          <img src="../imagenes/nodisponible.png" alt="" class="cicloform">
          <div class="pciclo"><p>Aún no han añadido una descripcion a esta atraccion.</p></div>
          <?php endif ?>
         
     
      <p>Tipo: <?php echo $i['nom_tip_atraccion']?></p>
       <h3><?php echo $i['nom_atraccion']?></h3>

       <input type="hidden" name="id_atraccionn" value="<?php echo $i['id_atraccion'] ?>">
      
       <input type="submit" value="MONTAR" name="enviar" >
      
   </form>
   </div>
           
  
<?php
     }
?>

</div>

<div class="decisiones">
  <div id="spaan" onclick=prueba()> <i class="fas fa-dot-circle bot" id="boton"></i></i></div>
  <div id="span" onclick=prueba2()><i class="fas fa-dot-circle bot" id="boton1"></i></i></div>
  <div id="span" onclick=prueba3()><i class="fas fa-dot-circle bot" id="boton2"></i></i></div>
  <div id="span" onclick=prueba4()><i class="fas fa-dot-circle bot " id="boton3"></i></i></div>
  <div id="span" onclick=prueba5()><i class="fas fa-dot-circle bot" id="boton4"></i></i></div>
  <div id="span" onclick=prueba6()><i class="fas fa-dot-circle bot" id="boton5"></i></i></div>
  <div id="span" onclick=prueba7()><i class="fas fa-dot-circle bot" id="boton6"></i></i></div>
  <div id="span" onclick=prueba8()><i class="fas fa-dot-circle bot" id="boton7"></i></i></div>
  <div id="span" onclick=prueba9()><i class="fas fa-dot-circle bot" id="boton8"></i></i></div>
  <div id="span" onclick=prueba10()><i class="fas fa-dot-circle bot" id="boton9"></i></i></div>
  <div id="span" onclick=prueba11()><i class="fas fa-dot-circle bot" id="boton10"></i></i></div>
  <div id="span" onclick=prueba12()><i class="fas fa-dot-circle bot" id="boton11"></i></i></div>
  <div id="span" onclick=prueba13()><i class="fas fa-dot-circle bot" id="boton12"></i></i></div>
  <div id="span" onclick=prueba14()><i class="fas fa-dot-circle bot" id="boton13"></i></i></div>

<?php
  $contaratracciones= "SELECT COUNT(id_plan) from planeacion where fecha_reg='$fech'";
  $ejecontar = mysqli_query($conexion,$contaratracciones);
  $con = mysqli_fetch_array($ejecontar);

  if($con){
    $cantidadatracciones = $con['COUNT(id_plan)']; 
   
    if($cantidadatracciones>3){
?>
      <script>
        document.getElementById('boton').classList.remove('bot');
        document.getElementById('boton').classList.add('botfuncionando');

        document.getElementById('boton1').classList.remove('bot');
        document.getElementById('boton1').classList.add('botfuncionando');
      </script>
     
      
<?php

      if($cantidadatracciones>8){
?>        
        <script>
        document.getElementById('boton2').classList.remove('bot');
        document.getElementById('boton2').classList.add('botfuncionando');
      </script>
<?php

      if($cantidadatracciones>12){
?>
      <script>
        document.getElementById('boton3').classList.remove('bot');
        document.getElementById('boton3').classList.add('botfuncionando');
      </script>
       

<?php
    if($cantidadatracciones>16){
     
?>
      <script>
        document.getElementById('boton4').classList.remove('bot');
        document.getElementById('boton4').classList.add('botfuncionando');
      </script>
   
<?php
    if($cantidadatracciones>20){
?>
        <script>
        document.getElementById('boton5').classList.remove('bot');
        document.getElementById('boton5').classList.add('botfuncionando');
      </script>
<?php
    
  if($cantidadatracciones>24){
?>
        <script>
        document.getElementById('boton6').classList.remove('bot');
        document.getElementById('boton6').classList.add('botfuncionando');
      </script>
<?php
  if($cantidadatracciones>28){
?>
      <script>
        document.getElementById('boton7').classList.remove('bot');
        document.getElementById('boton7').classList.add('botfuncionando');
      </script>
<?php

    if($cantidadatracciones>32){

?>
<script>
        document.getElementById('boton8').classList.remove('bot');
        document.getElementById('boton8').classList.add('botfuncionando');
      </script>
<?php    

if($cantidadatracciones>36){
?>
<script>
        document.getElementById('boton9').classList.remove('bot');
        document.getElementById('boton9').classList.add('botfuncionando');
      </script>

<?php

if($cantidadatracciones>40){

?>
<script>
        document.getElementById('boton10').classList.remove('bot');
        document.getElementById('boton10').classList.add('botfuncionando');
      </script>


<?php
if($cantidadatracciones>44){

?>
<script>
        document.getElementById('boton11').classList.remove('bot');
        document.getElementById('boton11').classList.add('botfuncionando');
      </script>

<?php
if($cantidadatracciones>48){
?>
<script>
        document.getElementById('boton12').classList.remove('bot');
        document.getElementById('boton12').classList.add('botfuncionando');
      </script>

<?php
if($cantidadatracciones>52){
?>
<script>
        document.getElementById('boton13').classList.remove('bot');
        document.getElementById('boton13').classList.add('botfuncionando');
      </script>

<?php
}
}
}
}
  
}
}
  
}
      }
      }
      }
      }
      }
    }
  }
?>
</div>

<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<div class="divimgfooter">
      <img src="../imagenes/prueba4.png" alt="" class="imgfoter">
</div>  




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


     
   <script src="carrusel.js" type="text/javascript"></script>


</body>
</html>