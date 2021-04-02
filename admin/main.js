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


let panel1 = document.getElementById("panel1");
let datosP1 = document.getElementById("vencimiento");
let contador2 = 0;

panel1.addEventListener("click",function(){
    if(contador2 == 0){
        datosP1.className = ('vencimiento dos');
        contador2=1;
    }else{
        datosP1.classList.remove('dos');
        datosP1.className = ('vencimiento uno');
        contador2 = 0;
    }
})


let panel2 = document.getElementById("panel2");
let datosP2 = document.getElementById("planeacion");
let contador3 = 0;

panel2.addEventListener("click",function(){
    if(contador3 == 0){
        datosP2.className = ('planeacion');
        contador3=1;
    }else{
        datosP2.className = ('planeacion');
        contador3 = 0;
    }
})


let panel3 = document.getElementById("panel3");
let datosP3 = document.getElementById("verPrograma");
let contador4 = 0;

panel3.addEventListener("click",function(){
    if(contador4 == 0){
        datosP3.className = ('verPrograma dos');
        contador4=1;
    }else{
        datosP3.classList.remove('dos');
        datosP3.className = ('verPrograma uno');
        contador4 = 0;
    }
})


let panel4 = document.getElementById("panel4");
let datosP4 = document.getElementById("mantenimiento");
let contador5 = 0;

panel4.addEventListener("click",function(){
    if(contador5 == 0){
        datosP4.className = ('mantenimiento dos');
        contador5=1;
    }else{
        datosP4.classList.remove('dos');
        datosP4.className = ('mantenimiento uno');
        contador5 = 0;
    }
})


let panel5 = document.getElementById("panel5");
let datosP5 = document.getElementById("form_maquinas");
let contador6 = 0;

panel5.addEventListener("click",function(){
    if(contador6 == 0){
        datosP5.className = ('form_maquinas dos');
        contador6=1;
    }else{
        datosP5.classList.remove('dos');
        datosP5.className = ('form_maquinas uno');
        contador6 = 0;
    }
})