var Curso = 0;
var Nopc = 1; 
$(document).ready(function(){

	$("body").on("click", "#filtro", function(){
		var elemento = document.getElementById('opcion').value;
		//alert(elemento);
		Peticion(Curso, elemento);
	});

});

function SelectOpcion(opcion){
	document.getElementById('opcion').value = opcion;
}

function CrearTarjeta(nombre, opinion, calificacion){
		$('#area').append("<div class='tarjeta'>"+
		"<div class='nombre'><label>"+nombre+"</label></div>"+
		"<div class='comentario'><label>"+opinion+"</label></div>"+
		"<div class='calificacion'><label>"+calificacion+"</label></div>"+
		"</div>");
}

function ClaveDeCurso(clave){
	console.log(clave);
	Curso = clave;
	Peticion(clave, 1);
}

function Peticion(curso, opcion){
	document.getElementById('area').innerHTML="";

	var dataToSend = { 
		action: "Comentarios",
		curso: curso,
		opcion: opcion
		};

		$.ajax({
		url: "php/Peticion.php",
		async: true,
		type: 'POST',
		data: dataToSend, 
		success: function (data){
			
			console.log(data);
			var datos = JSON.parse(data);
			for(var i = 0; i < datos.length; i++){
				if (datos[i].Calificacion != null ){
					CrearTarjeta(datos[i].Nombre, datos[i].Comentario, datos[i].Calificacion);
				}
				
			}
			
		}
	});
}