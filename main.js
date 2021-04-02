//Efecto escritura
const typed = new Typed ('.typed', {
    strings:  [
      "Número de personas dentro del parque" ,
      "Contador en tiempo real"
    ],
   
    stringsElement: '#cadenas-texto', // ID del elemento que contiene cadenas de texto a mostrar.
    typeSpeed: 40, // Velocidad en mlisegundos para poner una letra,
    startDelay: 1000, // Tiempo de retraso en iniciar la animacion. Aplica tambien cuando termina y vuelve a iniciar,
    backSpeed: 40, // Velocidad en milisegundos para borrrar una letra,
    smartBackspace: true, // Eliminar solamente las palabras que sean nuevas en una cadena de texto.
    shuffle: false, // Alterar el orden en el que escribe las palabras.
    backDelay: 2500, // Tiempo de espera despues de que termina de escribir una palabra.
    loop: true, // Repetir el array de strings
    loopCount: false, // Cantidad de veces a repetir el array.  false = infinite
    showCursor: true, // Mostrar cursor palpitanto
    cursorChar: ' |', // Caracter para el cursor
    contentType: 'html', // 'html' o 'null' para texto sin formato
  });

  
//Boton de ir arriba
$(document).ready(function() {

    //enviar hacia arriba al hacer click
    $('.ir-arriba').click(function(){
      $('boby, html').animate({
        scrollTop: '0px'
      }, 300);
    });
  
    //usuario baje la pagina aparezca el boton de subir
    $(window).scroll(function(){
      if( $(this).scrollTop() > 0){
        $('.ir-arriba').slideDown(300);
      }else{
        $('.ir-arriba').slideUp(300);
      }
    })
  })


  var counter = 1;
      setInterval(function(){
        document.getElementById('radio' + counter).checked = true;
        counter++;
        if(counter > 4){
          counter = 1;
        }
      }, 7000);
 
      let ubicacionPrincipal = window.pageYOffset; //0
 
      AOS.init();
    
    window.addEventListener("scroll", function(){
        let desplazamientoActual = window.pageYOffset; //180
        if(ubicacionPrincipal >= desplazamientoActual){ // 200 > 180
            document.getElementsByTagName("nav")[0].style.top = "0px"
        }else{
            document.getElementsByTagName("nav")[0].style.top = "-100px"
        }
        ubicacionPrincipal= desplazamientoActual; //200
    
    })

