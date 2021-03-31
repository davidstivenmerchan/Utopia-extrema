const formulario = document.getElementById('formu_ras');
const inputs = document.querySelectorAll('#formu_ras input');

const campos ={
    codigo : false
}
const expresiones = {
    codigo: /^\d{5,10}$/
}
const validarformulario = (e) =>{
    switch(e.target.name){
        case "codigo":
            if(expresiones.codigo.test(e.target.value)){
                document.getElementById('formu_ras').classList.remove('formu_ras-incorrecto')
                document.getElementById('formu_ras').classList.add('formu_ras-correcto')
                document.querySelector('#formu_ras i').classList.add('fa-check-square')
                document.querySelector('#formu_ras i').classList.remove('fa-times')
                document.querySelector('#formu_ras .error').classList.remove('error-activo')
                campos['codigo']=true;
            }else{
                document.getElementById('formu_ras').classList.add('formu_ras-incorrecto')
                document.getElementById('formu_ras').classList.remove('formu_ras-correcto')
                document.querySelector('#formu_ras i').classList.add('fa-times')
                document.querySelector('#formu_ras i').classList.remove('fa-check-square')
                document.querySelector('#formu_ras .error').classList.add('error-activo')
                campos['codigo']=false;
            }
        break
    }
    
}

inputs.forEach((input) =>{
    input.addEventListener('keyup', validarformulario)
    input.addEventListener('blur', validarformulario)
    
});
/*

formulario.addEventListener('submit', (e)=> {
    if(campos.codigo){
        formu_ras.reset();
        alert('datos enviados correctamente');
        document.querySelectorAll('.formu_ras-correcto').forEach((icono)=>{
            icono.classList.remove('formu_ras-correcto');
        })
    }else{
        alert('llene el campo')
    }
});
*/


function text_letra(){
    document.getElementById('letra_viernes').classList.add('efecto_imagen_estampados-activo')
}
function text_letra_none(){
    document.getElementById('letra_viernes').classList.remove('efecto_imagen_estampados-activo')
}
function text_le(){
    document.getElementById('letra_gafas').classList.add('efecto_imagen_gafas-activo')
}
function text_le_none(){
    document.getElementById('letra_gafas').classList.remove('efecto_imagen_gafas-activo')
}
function frasemovi(){
    document.getElementById('frase').classList.add('frase-activa')
}
function frasemo(){
    document.getElementById('frase').classList.remove('frase-activa')
}

function label(){
    document.getElementById('label').classList.add('label-activo')
}
function not_label(){
    document.getElementById('label').classList.remove('label-activo')
 }
 function ventana(){
    document.getElementById('robot').classList.add('robot-activa')
 }
 function iniciar(){
     document.getElementById('iniciar').classList.add('inicio-activo')
     document.getElementById('todo').classList.add('todas-activo')
 }
 function registrar(){
     document.getElementById('registrar').classList.add('registrar-activo')
     document.getElementById('todo').classList.add('todas-activo')
 }
 function cerrar_regis(){
     document.getElementById('registrar').classList.remove('registrar-activo')
     document.getElementById('todo').classList.remove('todas-activo')
 }
 function cerrar_iniciar(){
     document.getElementById('iniciar').classList.remove('inicio-activo')
     document.getElementById('todo').classList.remove('todas-activo')
 }
 function rastrea_formu(){
     document.getElementById('cod').classList.add('codigo_rastreo-activo')
     document.getElementById('formu').classList.add('codigo_rastreo_formu-activo')
 }
 function restrea_formu_desa(){
    document.getElementById('cod').classList.remove('codigo_rastreo-activo')
    document.getElementById('formu').classList.remove('codigo_rastreo_formu-activo')
 }
 

 



/*https://www.youtube.com/watch?v=j3ixg2cPI54
https://www.youtube.com/watch?v=uUJr5Itz8kY
https://www.youtube.com/watch?v=iN0xYdgRAzk
https://www.youtube.com/watch?v=NDASIexWyhU
https://www.youtube.com/watch?v=s3pC93LgP18&t=1522s
https://www.youtube.com/watch?v=wfogZfIS03U
https://www.youtube.com/watch?v=cEKDyzoTXb4&t=601s
*/

