$(document).ready( function (){

	$("body").on("click", "#EnviarMensaje", function(){
	var mensaje = document.getElementById('caja-texto').value;
	if(mensaje.length > 0){
		document.getElementById('caja-texto').value = "";
		MensajePropio(mensaje);
	}else{
		alert("Caja de texto vacia");
	}
		

	});

});

function MensajePropio(mensaje){
	$('#chat').append("<div class='m-envio'>"+mensaje+"</div>");
}

function MensajeRespuesta(mensaje){
	$('#chat').append("<div class='m-respuesta'>"+mensaje+"</div>");
}