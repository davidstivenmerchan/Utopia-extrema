<?php
require_once("php/conexion.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet"> -->
    <link href="https://fonts.googleapis.com/css2?family=Slabo+27px&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="icon" href="imagenes/PRIMERLOGO.ico">
    <link rel="stylesheet" href="css/index.css">
    <title>UTOPIA EXTREMA</title>
    
</head>
<body>
  <img src="imagenes/feria.jpg" alt="encabezado" class="imagen1">
   
  <div class="capas">
    <h1 class="tituloo">UTOPIA EXTREMA</h1>
    <div class="loading">
            <div class="block"></div>
            <div class="block"></div>
            <div class="block"></div>
            <div class="block"></div>
        </div>
  </div>
    <nav>
      <ul class="navegacion">
        <li><a href="#ubi"> UBICANOS-CONTACTANOS</a></li>
        <li><a href="#nosotros"> QUIENES SOMOS</a></li>
        <li><a href="compraCard.php"> COMPRAR TARJETA</a></li>
        <li><a href="#recarga"> RECARGA TU TARJETA</a></li>
      
      </ul>
    </nav>
    <hr>
  <span class="ir-arriba fas fa-chevron-circle-up"></span>
  <div class="inicio">
    <div class="login">
      <h1>Iniciar Sesion</h1>
      <form action="php/validar.php" method="POST" class="iniciar">
        <div class="user">
          <span class="input-item"><i class="fa fa-user-circle"></i></span>
          <input class="form-input" id="txt-input" type="text" name="cc" placeholder="Ingrese su cedula" required> <br>
        </div>
        <div class="pass">
          <span class="input-item"><i class="fa fa-key"></i></span>
          <input class="form-input" type="password" placeholder="Ingrese su codigo de compra" id="pwd"  name="idc" required>
        </div>
        <input type="submit" value="Ingresar" class="envio" >
      </form>
    </div>
    <div class="contador">
      <h2><span class= "typed"></span></h2>
      <div class="papacontador">
        <?php
            $consultarcontador = "SELECT COUNT(id_ingreso) from entry_exit where fe_ho_exit='En el parque'";
            $ejecucioncontador = mysqli_query($conexion,$consultarcontador);
            $contadorfila= mysqli_fetch_assoc($ejecucioncontador);

            if($contadorfila){
              $personas = $contadorfila['COUNT(id_ingreso)'];
            }
        ?>
      <div class="minicontador">
        <p class="ncontador"> <?php echo $personas ?></p>
      </div>
    </div>
  </div>
</div>

<hr>

  <section class="about-us">
        <div class="contenedor1">
            <h1>Nuestras atarcciones mas destacadas...</h1>
            <div class="contenedor-articulo">
                <div class="articulo" data-aos="zoom-in-right">
                  <div class="galeria">
                    <a href="imagenes/atracciones/agua.jpeg" class="image">
                      <img src="imagenes/atracciones/agua.jpeg" alt=""height="300px"width="300px " >
                    </a>
                  </div>
                  <h3>LA MANTARAYA</h3>
                  <P></P>
                </div>
                
                <div class="articulo" data-aos="zoom-in-right">
                <div class="galeria">
                <a href="imagenes/atracciones/rueda.jpeg" class="image">
                <img src="imagenes/atracciones/rueda.jpeg" alt="" height="300px"width="300px ">
                    </a>
                  </div>
                    
                    <h3>RUEDA DE LA FORTUNA 2.0</h3>
                </div>
                <div class="articulo" data-aos="zoom-in-right">
                <div class="galeria">
                <a href="imagenes/atracciones/dino.jpeg" class="image">
                <img src="imagenes/atracciones/dino.jpeg" alt="" height="300px"width="300px ">
                    </a>
                  </div>
                    <h3>DRAGONCITY</h3>
                </div>
            </div>
        </div>
    </section>

  <hr>
    <br id="nosotros">
    <br>
    <br>
    
    <h2>QUIENES SOMOS</h2>
    <div class="paquienes">
        <div class="quienes mision">
          <h4 class="misi">MISION</h4>
          <p class="textoq">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sed aliquam doloremque, nobis totam fuga modi aperiam earum maxime autem voluptatibus id aspernatur! Omnis quidem ea consequatur repudiandae quaerat est quibusdam.
          Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sed aliquam doloremque, nobis totam fuga modi aperiam earum maxime autem voluptatibus id aspernatur! Omnis quidem ea consequatur repudiandae quaerat est quibusdam.
          </p>

        </div>
        <div  class="quienes vision">
          <h4 class="misi">VISION</h4>
          <p class="textoq">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Sequi ipsa deserunt blanditiis eligendi soluta magni, velit molestiae saepe illum aut. Odio eaque ad ipsa perspiciatis vitae nihil natus nulla obcaecati!
          Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sed aliquam doloremque, nobis totam fuga modi aperiam earum maxime autem voluptatibus id aspernatur! Omnis quidem ea consequatur repudiandae quaerat est quibusdam.
          </p>

        </div>
    
    </div>
    <div class="historias">
      <h4 >NUESTRA HISTORIA</h4>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nesciunt laudantium incidunt totam alias deleniti, libero officiis unde facere assumenda explicabo eaque velit temporibus odio nulla beatae voluptatem necessitatibus laboriosam eum?
      Lorem ipsum dolor sit amet consectetur adipisicing elit. Nesciunt laudantium incidunt totam alias deleniti, libero officiis unde facere assumenda explicabo eaque velit temporibus odio nulla beatae voluptatem necessitatibus laboriosam eum?
      Lorem ipsum dolor sit amet consectetur adipisicing elit. Nesciunt laudantium incidunt totam alias deleniti, libero officiis unde facere assumenda explicabo eaque velit temporibus odio nulla beatae voluptatem necessitatibus laboriosam eum?
    </p>
    </div>
    <br>
    <br>
    <br>
    <hr>
    <br id ="ubi">
   

    
    <div class="paubicanos">
      <div class="hiubicanos1">
        <div class="lmapa">
          <h2>UBICANOS-CONTACTANOS</h2> 
          <p>Lorem ipsum dolor, sit amet consectetur 
          adipisicing elit. Voluptas velit, dolores 
          nam eius nihil, provident quas minima sequi 
          ratione maiores obcaecati reiciendis ex! 
          Sint delectus eveniet eaque quo expedita 
          architecto.Lorem ipsum dolor, sit amet consectetur 
          adipisicing elit. Voluptas velit, dolores 
          nam eius nihil, provident quas minima sequi 
          ratione maiores obcaecati reiciendis ex! 
          Sint delectus eveniet eaque quo expedita 
          architecto.</p> 
        </div>
        <div class="mapa">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3976.602058065169!2d-74.09416458573685!3d4.664824943267698!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zNMKwMzknNTYuNiJOIDc0wrAwNSczMS44Ilc!5e0!3m2!1ses!2sco!4v1616545514558!5m2!1ses!2sco" width="600" height="350" style="border:0;" allowfullscreen="" loading="lazy"></iframe>      </div>
        </div>
        <div class="p2ubicanos">
        <h4>NUESTROS NUMEROS: +57 3156254560, +57 445432134 </h4>
        <h4 class="correosconta">NUESTRO CORREO: extremautopia@gmail.com </h4>

        <h3>ENVIANOS UN MENSAJE</h3>
        <div class="iconos">
          <form action="php/correo.php" method="POST">
            <div>
              <input type="text" placeholder="Escribe tu nombre" class="mensajein" name="nombr">
              <input type="text" placeholder="Escribe tu correo" class="mensajein" name="corr"> 
            </div>
            <textarea name="tarea" id="" cols="30" rows="10" placeholder="Escribe aqui tu Mensaje" class="mensajeta"></textarea>
            <div>
              <input type="submit" class="mensajesub">  
            </div>
          </form>
          </div>
      </div> 
      
    </div>
    <br><br>
  <hr>
  
  <div id="recarga" class="recarga">
    <div class="capa">
      <br><br><br><br>
        <form action="php/recargart.php" class="formtar" method="POST" name="form_recargar_tickest">
          <h1>¿Te quedaste sin Tickests?</h1>
          <h4 class="recargat">INGRESA EL ID DE TU TARJETA DEL PARQUE PARA PODER RECARGARLA</h4>
          <input  class="inputrecarga" type="text" name="n_tarjeta" id="" placeholder="Introduce el id de tu tarjeta a recargar">
          <p>Informacion: Cada ticket Tiene un Costo de $3.500 pesos</p>
          <input type="number" placeholder="Cantidad de Tickest que deseas comprar" name="Cantidad_tickest" class="Cantidad_tickest" min="1" max="50">
          <input type="button" value="+" onclick="form_recargar_tickest.Cantidad_tickest.value++" class="sumarestas">
          <input type="button" value="-" onclick="form_recargar_tickest.Cantidad_tickest.value--" class="sumarestas">
              
          <h4 class="recargat">INGRESA LOS DATOS DE TU TARJETA CREDITO PARA PROCEDER A RECARGAR TU TARJETA</h4>
          <input class="inputrecarga" type="text" name="n_taejta_c" id="" placeholder="Introduce el numero de tu tarjeta">
          <input class="inputrecarga" type="date" name="datevc" id="" placeholder="Introduce la fecha de vencimiento">
          <input class="inputrecarga" type="text" name="cod" id="" placeholder="Introduce el codigo de seguridad">
          <input type="submit" value="RECARGAR" name="recargar" class="enviarrecarga">
        </form>
      <br><br><br>
    </div>
  </div>

    <!-- <h1>COMPRAR BOLETOS</h1>


    <a href="php/generarQR.php">Comprar</a>



    <a href="php/correo.php">ENVIAR CORREO</a> -->


   <!--  <div class="clienteC">
        <form action="php/validar.php" method="POST">
            <label for="cc">Ingrese su Cedula</label>
            <input type="text" id="cc" autocomplete="off" name="cc">

            <label for="nom">Ingrese su nombre</label>
            <input type="text" id="nom" autocomplete="off" name="nom">

            <label for="ape">Ingrese su apellido</label>
            <input type="text" id="ape" autocomplete="off" name="ape">
            
            <label for="ape">Seleccion el metodo de pago</label>
           <select name="" id="">
            <option value="">--</option>
               <option value="">Efectivo</option>
               <option value="">Tarjeta</option>
           </select>
            
            <input type="submit" value="INGRESAR">
        </form>
    </div>   -->
      <div class="divimgfooter">
      <img src="imagenes/prueba4.png" alt="" class="imgfoter">
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
        <img src="imagenes/footer1.png" alt="">
        <img src="imagenes/footer5.png" alt="">
        <img src="imagenes/footer3.jpg" alt="">
        <img src="imagenes/footer4.png" alt="">
      </div>
      <div class="footerp">
        <p>Terminos y condiciones tienda virtual |</p>
        <p>Aviso de Privacidad |</p>
        <p>Todos los derechos reservados &copy; UTOPIA EXTREMA 2021 |</p>
        <p>#TuMundoIdealDeDiversion</p>
      </div>


      

        <!-- h5>&copy; UTOPIA EXTREMA</h5>
        <p>#TuMundoIdealDeDiversion</p> -->
    </footer>


    <!--Enlace de biblioteca para el efecto de ecritura Typed.js-->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <!--Enlace de biblioteca para el efecto de ecritura Typed.js-->
    <script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.11"></script>
    <!--Enlace de documento Js-->
    <script src="main.js"></script>

</body>

</html>