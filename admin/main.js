$(obtener_registros());

function obtener_registros(maquina)
{
	$.ajax({
		url : 'php/consulta.php',
		type : 'POST',
		dataType : 'html',
		data : { maquina: maquina },
		})

	.done(function(resultado){
		$("#tabla_resultado").html(resultado);
	})
}

$(document).on('keyup', '#busqueda', function()
{
	var valorBusqueda=$(this).val();
	if (valorBusqueda!="")
	{
		obtener_registros(valorBusqueda);
	}
	else
		{
			obtener_registros();
		}
});

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


let panel1 = document.querySelector("#panel1");
let datosP1 = document.querySelector(".vencimiento");
let contador2 = 0;

panel1.addEventListener("click",function(){
    if(contador2 == 0){
        datosP1.style.display= "block";
        contador2=1;
    }else{
        datosP1.style.display= "none";
        contador2 = 0;
    }
})


let panel2 = document.querySelector("#panel2");
let datosP2 = document.querySelector(".planeacion");
let contador3 = 0;

panel2.addEventListener("click",function(){
    if(contador3 == 0){
        datosP2.style.display= "block";
        contador3=1;
    }else{
        datosP2.style.display= "none";
        contador3 = 0;
    }
})

let panel3 = document.querySelector("#panel3");
let datosP3 = document.querySelector(".programa");
let contador4 = 0;

panel3.addEventListener("click",function(){
    if(contador4 == 0){
        datosP3.style.display= "block";
        contador4=1;
    }else{
        datosP3.style.display= "none";
        contador4 = 0;
    }
})


let panel4 = document.querySelector("#panel4");
let datosP4 = document.querySelector(".mantenimiento");
let contador5 = 0;

panel4.addEventListener("click",function(){
    if(contador5 == 0){
        datosP4.style.display= "block";
        contador5=1;
    }else{
        datosP4.style.display= "none";
        contador5 = 0;
    }
})


let panel5 = document.querySelector("#panel5");
let datosP5 = document.querySelector(".form_maquinas");
let contador6 = 0;

panel5.addEventListener("click",function(){
    if(contador6 == 0){
        datosP5.style.display= "block";
        contador6=1;
    }else{
        datosP5.style.display= "none";
        contador6 = 0;
    }
})