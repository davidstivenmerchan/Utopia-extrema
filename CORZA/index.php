<?php
   
    require_once("php/conexion.php");

if (isset($_POST['registrar'])) {
    if(strlen($_POST['cedula']) >= 1 && 
    strlen($_POST['nombre']) >= 1 && 
    strlen($_POST['apellido']) >= 1 && 
    strlen($_POST['usuario']) >= 1 && 
    strlen($_POST['clave']) >= 1 && 
    strlen($_POST['cell']) >= 1 &&
    strlen($_POST['prendas']) >= 1 ) {
       
        $cc = trim($_POST['cedula']);
		$nom = trim($_POST['nombre']);
		$ape = trim($_POST['apellido']);
		$usu = trim($_POST['usuario']);
		$clave = trim($_POST['clave']);
        $cell = trim($_POST['cell']); 
        $pren = trim($_POST['prendas']);
        
		
	    $consulta = "INSERT INTO usuarios (cedula, nombre, apellido, usuario, clave, telefono ,prendas, id_tipo_usu) VALUES ('$cc','$nom','$ape','$usu','$clave','$cell','$pren', 2)";
	    $resultado = mysqli_query($conn,$consulta);
	    if ($resultado) {
            
            echo '<script> alert ("usuario creado exitosamente,");</script>';
            
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
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>| CORZA </title>
    <link rel="stylesheet" href="css/stilos.css">
    <link rel="icon" href="iconos/icnono.ico">
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Mono:wght@100&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans+Condensed:wght@300&family=Roboto+Mono:ital,wght@0,100;1,300&family=Sansita+Swashed:wght@300&display=swap" rel="stylesheet">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>
<body>
    <header class="encabezado">
        <nav>
            <div class="titulo">
                <img src="img/corr.jpg" class="ti">
            </div>
            <ul> 
               <li> <a href="#" onclick="iniciar()" >Iniciar Sesion</a></li>
               <li> <a href="#" onclick="registrar()">Registrarse</a></li> 
               
               <li> <a href="#prueba" >Quienes somos</a> </li> 
               <li> <a href="#prueba2">Noticias</a></li>
               <li class="servicios"> <a href="#prueba3">Servicios</a>
                    <ul class="submenu2">
                        <li><a href="#">Estampados</a></li>
                        <li><a href="#">Diseños</a></li>
                        <li><a href="#">Costuras</a></li>
                    </ul> 
               </li> 
               <li class="productos"> <a href="#prueba4">Productos</a>
                <ul class="submenu">
                   <li><a href="#">Hombres</a></li>
                   <li><a href="#">Mujeres</a></li>
                   <li><a href="#">Nueva Colección</a></li>
               </ul>
              </li>
              <li> <a href="#pru6">Mi codigo de rastreo</a></li>
            </ul>
        </nav>
    </header>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <hr>
    <div class="slider">
        <ul >
            <li><img src="img/productos/dos.jpeg" ></li>
            <li><img src="img/productos/siete.jpeg"  ></li>
            <li><img src="img/productos/uno.jpeg"  ></li>
            <li><img src="img/corza titulo.jpeg"  ></li> 
            <li><img src="img/productos/cinco.jpeg"   ></li>
            <li><img src="img/productos/tres.jpeg"  ></li>
            <li><img src="img/productos/cuatro.jpeg" ></li>
            <li><img src="img/productos/seis.jpeg"  ></li>  
        </ul>
    </div>
    <div class="pru">
        <h2 id="prueba">pruebaa</h2>
    </div>
    <hr>
    <br>
    <br>
    <div>
        <h2 class="som" id="som">QUIENES SOMOS</h2>
        <hr class="linea_som">
        <p class="mos">Lorem ipsum dolor sit amet consectetur, 
            adipisicing elit. Quibusdam qui inventore, reprehenderit 
            laborum deleniti incidunt saepe nobis at quidem animi
            aspernatur cupiditate quaerat ducimus libero porro sit, 
            distinctio autem. Maxime. Lorem, ipsum dolor sit amet 
            consectetur adipisicing elit. Corrupti saepe impedit ipsum
            qui nam autem quaerat ab aliquam dolorem ratione cum labore
            illo culpa quibusdam, quasi libero distinctio necessitatibus error!
            Lorem ipsum dolor sit amet consectetur, 
            adipisicing elit. Quibusdam qui inventore, reprehenderit 
            laborum deleniti incidunt saepe nobis at quidem animi
            aspernatur cupiditate quaerat ducimus libero porro sit, 
            distinctio autem. Maxime. Lorem, ipsum dolor sit amet 
            consectetur adipisicing elit. Corrupti saepe impedit ipsum
            qui nam autem quaerat ab aliquam dolorem ratione cum labore
            illo culpa quibusdam, quasi libero distinctio necessitatibus error!
        </p>
    </div>
    <br>
    <hr>
    <br>
    <div class="somos">
        <div class="rastrea">
            <div class="rastre">
        <h2 class="subti" id="">RASTREA TU PEDIDO</h2> 
        <i class="fas fa-caret-down" style="margin-top:7px; margin-left: 3px;"></i>
             </div>

            <div class="tienda"><p class="letra_tienda">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat eos provident sapiente saepe, dolorum perspiciatis hic error, explicabo asperiores, similique libero vel in pariatur dolore. Sapiente magni quia nihil ipsam.</p></div> 
        <form  class="formu_ras" id="formu_ras" name="formu_ras" method="POST" action="php/val_datos_rastreo.php">
            <label class="label" id="label">Ingrese el codigo de rastreo</label>
            <input type="text" class="codigo_rastrea" autocomplete="off" id="codigo_rastrea" name="codigo" onfocus="label()" >
            
            <input type="button" value="rastrea" class="validar_rastrea" onclick="ventana()" id="validar_rastrea">
            <p id="error" class="error"> Error: ingresa tu codigo de rastreo</p>
            <i class="icono_error fas fa-times"></i>
            <div class="robot" id="robot">

                <div class="robo g-recaptcha" data-sitekey="6LdYLNsZAAAAAKQgHvIZeHWLzoku8eUntNWV1GnT" ></div>
    
                <input type="submit" class="cap" value="continuar" name="enviar">

            </div>

        </form>
        
    <!--<i class="icono_error far fa-check-square "</i>  placeholder="ingrese el codigo de rastreo"--> 
       
        </div>
                <div class="puro_hueso" > <p class="letra_hueso">Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas molestiae laboriosam ratione explicabo, maiores aut blanditiis commodi quis vel, quas dolores ut exercitationem, veniam omnis maxime! Veritatis debitis autem cum.</p></div>
                <img class="frase" src="img/productos/frase2.jpeg" id="frase" onmouseover="frasemovi()" onmouseout="frasemo()">
        </div>
    <br>
    <hr>
    <br>
    <div class="pru2">
        <h2 id="prueba2">pruebaa</h2>
    </div>
    <br>
    <h2 class="som" id="noticias">NOTICIAS</h2>
    <hr class="linea_som">
    <p class="mos">Lorem ipsum dolor sit amet consectetur, 
        adipisicing elit. Quibusdam qui inventore, reprehenderit 
        laborum deleniti incidunt saepe nobis at quidem animi
        aspernatur cupiditate quaerat ducimus libero porro sit, 
        distinctio autem. Maxime. Lorem, ipsum dolor sit amet 
        consectetur adipisicing elit. Corrupti saepe impedit ipsum
        qui nam autem quaerat ab aliquam dolorem ratione cum labore
        illo culpa quibusdam, quasi libero distinctio necessitatibus error!
        Lorem ipsum dolor sit amet consectetur, 
        adipisicing elit. Quibusdam qui inventore, reprehenderit 
        laborum deleniti incidunt saepe nobis at quidem animi
        aspernatur cupiditate quaerat ducimus libero porro sit, 
        distinctio autem. Maxime. Lorem, ipsum dolor sit amet 
        consectetur adipisicing elit. Corrupti saepe impedit ipsum
        qui nam autem quaerat ab aliquam dolorem ratione cum labore
        illo culpa quibusdam, quasi libero distinctio necessitatibus error!
    </p>
    <hr>
    <br>
    <div class="merca">
        <div class="videoo">
            <video class="video"src="videos/video1.mp4" controls style="width: 350px; padding: 10px;" ></video>
        </div>
        <img src="img/productos/ocho.jpeg" class="viernes" id="viernes" onmouseover="text_letra()" onmouseout="text_letra_none()">
        <img src="img/productos/nueve.jpeg" class='gafas' id='gafas'onmouseover="text_le()" onmouseout="text_le_none()">
    </div>
    <div class="efecto_imagen_estampados" id="letra_viernes">
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Totam ratione, est at, fuga, vero ut nulla laborum officia assumenda voluptate sequi aliquid quam odio explicabo sunt temporibus distinctio quo reiciendis?</p>
    </div>
    <div class="efecto_imagen_gafas" id="letra_gafas">
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Totam ratione, est at, fuga, vero ut nulla laborum officia assumenda voluptate sequi aliquid quam odio explicabo sunt temporibus distinctio quo reiciendis?</p>
    </div>
    <br>
    <hr>
    <br>
    <br>
    <div class="pru3">
        <h2 id="prueba3">pruebaa</h2>
    </div>
    <h2 class="som">SERVICIOS</h2>
    <hr class="linea_som">
    <p class="mos">Lorem ipsum dolor sit amet consectetur adipisicing elit.
         Doloremque dolore neque ad esse alias tempore praesentium exercitationem
          molestiae tenetur itaque pariatur, aliquid quidem, reiciendis expedita amet.
           Deserunt inventore dignissimos molestiae.Lorem ipsum dolor sit amet consectetur adipisicing elit.
           Doloremque dolore neque ad esse alias tempore praesentium exercitationem
            molestiae tenetur itaque pariatur, aliquid quidem, reiciendis expedita amet.
             Deserunt inventore dignissimos molestiaeLorem ipsum dolor sit amet consectetur adipisicing elit.
             Doloremque dolore neque ad esse alias tempore praesentium exercitationem
              molestiae tenetur itaque pariatur, aliquid quidem, reiciendis expedita amet.
               Deserunt inventore dignissimos molestiaeLorem ipsum dolor sit amet consectetur adipisicing elit.
               Doloremque dolore neque ad esse alias tempore praesentium exercitationem
                molestiae tenetur itaque pariatur, aliquid quidem, reiciendis expedita amet.
      </p>
      <div class="ser">
          <div class="serr"><img src="iconos/estampados.png" style="width: 130px; height: 130px;"> <p>ESTAMPADOS</p></div>
          <div class="serr"><img src="iconos/diseños.png"  style="width: 130px;  height: 130px;"><P>DISEÑOS</P></div>
          <div class="serr"><img src="iconos/costura.png"  style="width: 130px;  height: 130px;"><P>COSTURA</P></div>
      </div>
      
                            
 <br>
 <br>
 <hr>
 <br>
 <br>
 <div class="pru4">
    <h2 id="prueba4">pruebaa</h2>
</div>
 <h2 class="som">PRODUCTOS</h2>
    <hr class="linea_som">
 <p class="mos">Lorem ipsum dolor sit amet consectetur adipisicing elit.
    Doloremque dolore neque ad esse alias tempore praesentium exercitationem
     molestiae tenetur itaque pariatur, aliquid quidem, reiciendis expedita amet.
      Deserunt inventore dignissimos molestiae.Lorem ipsum dolor sit amet consectetur adipisicing elit.
      Doloremque dolore neque ad esse alias tempore praesentium exercitationem
       molestiae tenetur itaque pariatur, aliquid quidem, reiciendis expedita amet.
        Deserunt inventore dignissimos molestiaeLorem ipsum dolor sit amet consectetur adipisicing elit.
        Doloremque dolore neque ad esse alias tempore praesentium exercitationem
         molestiae tenetur itaque pariatur, aliquid quidem, reiciendis expedita amet.
          Deserunt inventore dignissimos molestiaeLorem ipsum dolor sit amet consectetur adipisicing elit.
          Doloremque dolore neque ad esse alias tempore praesentium exercitationem
           molestiae tenetur itaque pariatur, aliquid quidem, reiciendis expedita amet.
 </p>
 <div class="wrap">
     <div class="tarjeta_wrap">
         <div class="tarjeta">
             <div class="delante car1"></div>
             <div class="atras">
                 <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quia dicta atque rerum velit repellendus, ratione laudantium id obcaecati sed distinctio sint laborum, similique perspiciatis, perferendis molestiae earum expedita iure! Consequatur.</p>
             </div>
        </div> 
     </div>
     <div class="tarjeta_wrap">
        <div class="tarjeta">
            <div class="delante car2"></div>
            <div class="atras">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorum nostrum necessitatibus eveniet deserunt ullam sit exercitationem ipsa eaque repellat cupiditate sint libero officia ea repudiandae, fuga, itaque beatae, culpa quasi.</p>
            </div>
       </div> 
    </div>
    <div class="tarjeta_wrap">
        <div class="tarjeta">
            <div class="delante car3"></div>
            <div class="atras">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Porro quis aliquam dolorum accusantium fuga? Quam iusto nulla ducimus minus corporis facere repudiandae ratione? Nemo, eveniet fugiat. Eum labore omnis nemo?</p>
            </div>
       </div> 
    </div>
    <div class="tarjeta_wrap">
        <div class="tarjeta">
            <div class="delante car4"></div>
            <div class="atras">
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Pariatur delectus eveniet recusandae laborum ipsam, beatae eaque alias impedit, omnis blanditiis corrupti quis sit quas voluptas ea porro sunt quisquam molestias.</p>
            </div>
       </div> 
    </div>
 </div>
 <br>
 <hr>
 <br>
 <br>
 <div class="pru6" id="pru6"><p>nmms</p></div>
 <h2 class="som">MI CODIGO DE RASTREO</h2>
    <hr class="linea_som">
<br>
    <div class="codigo_rastreo" onclick="rastrea_formu()" ondblclick="restrea_formu_desa()" id="cod">
        <p>codigo de rastreo</p>
        <i class="fas fa-caret-down"> </i>
    </div>
    <form class="codigo_rastreo_formu" autocomplete="off" id="formu" action="php/validar_codi_rastreo.php" method="POST">
        <input type="text" placeholder="ingrese su usuario" name="usuario">
        <input type="password" placeholder="ingrese su contraseña" name="clave">
        <input class="enviar_rastreo"type="submit" value="enviar" name="enviar">
    </form>
            <br>
            <br>
            <br>
            <br>
            <br>        
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
                                     
    <footer>
        <div class="pie">
        <div class="info">
            <p>&copy; CORZA | crea tu propio estilo </p>
            <p>Calle 13 No. 5 - 25 ibagué-Tolima, Colombia</p>
           
             <p>tel: 3156254560</p>
             <p>tel: 3153287683</p>
             <p>Correo notificaciones: corza@gmail.com </p>
        </div>
       <div class="redes">
           <p style="font-size: 24px;">Nuestras Redes:</p>
       <a target="blank" href="https://instagram.com/34corza?igshid=1btzzbs0dzj4f"> <i class="fab fa-instagram"></i></a>
       <a target="blank" href="https://www.facebook.com/corza.cortes"> <i class="fab fa-facebook-f"></i></a>
       <a href="#"><i class="fab fa-twitter"></i></a>
       </div> 
    </div>
    <div class="inicio" id="iniciar">   
<form method="POST" action="php/validar.php" class="fomulario_inicio" autocomplete="off">
    <h2>INICIAR SESION</h2>
    <input type="text" placeholder="digite su usuario" class="inic" name="usuario" >
    <input type="password" placeholder="digite su contraseña" class="inic" name="clave">
    <input type="submit" value="INGRESAR" class="iniciar_se" name="iniciar">
</form>
<i class=" cancel_regi fas fa-window-close" onclick="cerrar_iniciar()"></i>
</div> 

<div class="registrar" id="registrar">   
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" class="fomulario_registrar" >
        <h2>REGISTRARSE</h2>
        <input type="text" placeholder="digite su cedula"  class="inic" name="cedula" autocomplete="off">
        <input type="text" placeholder="digite su nombre"  class="inic" name="nombre" autocomplete="off">
        <input type="text" placeholder="digite su apellido"  class="inic" name="apellido" autocomplete="off">
        <input type="text" placeholder="digite su usuario" class="inic" name="usuario" autocomplete="off">
        <input type="password" placeholder="digite su contraseña" class="inic" name="clave">
        <input type="text" placeholder="digite su telefono" class="inic" name="cell" autocomplete="off">
        <input type="number" placeholder="digite el numero de prendas que va a llevar" class="inic" autocomplete="off" name="prendas">
        <input type="submit" value="REGISTRARSE" class="iniciar_se" name="registrar">
    </form>
    
    <i class=" cancel_regi fas fa-window-close" onclick="cerrar_regis()"></i>
    </div> 
    <div class="todas" id="todo"></div>

    </footer>
    <script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="js/validarformulario.js"></script>
    <script src="js/sweetAlert.js"></script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

</body>


</html>