let boton = document.getElementById("icono");
let datos = document.getElementById("datos");
let contador = 0;

boton.addEventListener("click",function(){
    if(contador == 0){
        datos.className = ('datos dos');
        contador=1;
    }else{
        datos.classList.remove('dos');
        datos.className = ('datos uno');
        contador = 0;
    }
})