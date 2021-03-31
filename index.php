<?php
require_once("php/conexion.php");

$sql = "SELECT * FROM tipo_docu";
$query = mysqli_query($conexion, $sql);

$sql2 = "SELECT * FROM card";
$query2 = mysqli_query($conexion, $sql2);
$info = mysqli_fetch_assoc($query2);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <link rel="icon" href="imagenes/PRIMERLOGO.ico">
    
    <title>UTOPIA EXTREMA</title>
    <link rel="stylesheet" href="css/index.css">
</head>
<body>
    
      
    <img src="imagenes/feria.jpg" alt="encabezado" class="imagen1">
       
    <div class="capas">
      <h1 class="tituloo">UTOPIA EXTREMA</h1>
    </div>
    <nav>
      <ul class="navegacion">
        <li><a href=""> INICIAR SESSION</a></li>
        <li><a href=""> UBICANOS-CONTACTANOS</a></li>
        <li><a href="#somos"> QUIENES SOMOS</a></li>
        <li><a href=""> COMPRAR TARJETA</a></li>
        <li><a href="#ct"> RECARGA TU TARJETA</a></li>
      
      </ul>
    </nav>
    <hr>
    <br>
    <br>
    <br>

    <h1>INICIAR SESION</h1>
  <br> 
  
    <form action="php/validar.php" method="POST" class="iniciar">
        <label for="usu">Ingrese su Cedula</label>
        <input type="text" id="usu" autocomplete="off" name="cc"></a>
        <label for="pass">Ingrese su codigo de compra</label>
        <input type="password" id="pass" autocomplete="off" name="idc">
        <input type="submit" value="INGRESAR" class="envio">
    </form>
    <br>
    <br>
    <br>

    <hr>
    <br>
    <br>
    <br>
    <p class="somoshidden" id="somos">quienes somos</p>

    <h2 >QUIENES SOMOS</h2>
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
    <br>
    <br>
    <br>


    <h2>UBICANOS-CONTACTANOS</h2>


    <div class="paubicanos">
      <div class="hiubicanos1">
        <div class="lmapa">
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
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3976.602058065169!2d-74.09416458573685!3d4.664824943267698!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zNMKwMzknNTYuNiJOIDc0wrAwNSczMS44Ilc!5e0!3m2!1ses!2sco!4v1616545514558!5m2!1ses!2sco" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>      </div>
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
      

    <hr>
    <br>
    <br>
    <br>


  


    <div class="card">
      <form method="post">
          <h2>DATOS TARJETA</h2>
          <label for="">Seleccione el tipo de tarjeta que desea comprar: </label>
          <select name="tipo_card" id="">
            <option value="0" placeholder=""></option>
            <?php foreach ($query2 as $card) : ?>
            <option value="<?php echo $card['id_card'] ?> ">
            <?php echo $card['name_card'] ?></option>
            <?php endforeach;?>
          </select>
          <input class="envior" type="submit" name="insertar" value="Seleccionar"/>
      </form>
    </div>

    <div class="users">
      <form id="form_insert">
        <?php 
          if(isset($_POST['insertar'])){
            $card = $_POST['tipo_card'];
            $sql2 = "SELECT * FROM card WHERE id_card = $card";
            $query2 = mysqli_query($conexion, $sql2);
            $info = mysqli_fetch_assoc($query2);


            echo('
                <div class="infoMostrar">
                  <h3>DATOS PAQUETE</h3>
                  <table>
                    <td>TIPO DE TARJETA: </td>
                    <td><label>'.$info["name_card"].'</label></td>
                    </tr>
                    <td>NUMERO DE PERSONAS: </td>
                    <td>'.$info["N_person"].'</td>
                    </tr>
                    <td>NUMERO DE TICKETS: </td>
                    <td><label>'.$info["tickets"].'</label></td>
                    </tr>
                    <td>PRECIO: </td>
                    <td><label >$'.$info["precio"].'</label></td>
                  </table>
                  <input type="hidden" name="Eliminar" value=""/>
                  <h2>REGISTRO DE USUARIOS</h2>
              ');
            
            for ($i = 1; $i <= $info["N_person"]; $i++){
                
        ?>
        <table class="table">
          <tr class="fila">
            <td>
              <label for="">Tipo Documento</label>
              <select required name="tipo_docu[]" id="">
                <option value="0" placeholder=""></option>
                <?php foreach ($query as $tip_docu) : ?>
                <option value="<?php echo $tip_docu['id_tipo_docu'] ?> ">
                <?php echo $tip_docu['nom_docu'] ?></option>
                <?php endforeach;?>
              </select>
            </td>
            <td><label for="">Número de Documento</label><input type= "number" required name="id_user[]"/></td>
            <td><label for="">Nombre</label><input type= "text" required name="nombre[]"/></td>
            <td><label for="">Apellidos</label><input type= "text" required name="apellidos[]"/></td>
            <td><label for="">Edad</label><input type= "number" required name="edad[]"/></td>
            <td><label for="">Telefono</label><input type= "number" required name="cel[]"/></td>
            <td><label for="">Correo</label><input type= "email" required name="correo[]"/></td>
          </tr>
        </table>
        
        <?php }
        echo('
          <div class="datosPago">
            <h2>DATOS DE PAGO</h2>
            <table class="table" >
              <tr class="fila">
                <td><label for="">Número de Tarjeta: </label><input type= "number" required name="num_card"/></td>
                <td><label for="">Fecha de Vencimiento:</label><input type= "date" required name="date_vto"/></td>
                <td><label for="">Código de seguridad (CVV):</label><input type= "text" required name="cod_card"/></td>
              </tr>
            </table>
          </div>
          <div class="acciones">
              <input type="submit" value="Comprar" />
          </div>'
        );
        } 
        ?>
       
      </form>
    </div>
    <br>
    <br>
    <br>
    <hr>
    <br>
    <br>
    <br>
    <h2>RECARGAR TARJETA</h2>
    <form action="php/recargart.php" class="formtar" method="POST" name="form_recargar_tickest">
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
    <?php
        $consultarcontador = "SELECT COUNT(id_ingreso) from entry_exit where fe_ho_exit='En el parque'";
        $ejecucioncontador = mysqli_query($conexion,$consultarcontador);
        $contadorfila= mysqli_fetch_assoc($ejecucioncontador);

        if($contadorfila){
          $personas = $contadorfila['COUNT(id_ingreso)'];
        }
    
    
    ?>

    <script src="js/compraCard.js" ></script>

    <br>
    <br>
    <br>
    <hr>
    <br>
    <br>
    <br>
    <h2 id="ct">NUMERO DE CLIENTES EN EL PARQUE EN ESTE MOMENTO</h2>
    <div class="papacontador">

      <div class="minicontador">
        <p class="ncontador"> <?php echo $personas ?></p>


      </div>

        
    </div>

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


</body>

</html>