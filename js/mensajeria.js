var MiRol="";
var IdentificadorCurso=0;
var IdentificadorAlumno=0;
$(document).ready( function (){

	$("body").on("click", "#EnviarMensaje", function(){
	var mensaje = document.getElementById('caja-texto').value;
	if(mensaje.length > 0){
		document.getElementById('caja-texto').value = "";
		MensajePropio(mensaje);
		EnvioMensaje(IdentificadorCurso, IdentificadorAlumno, mensaje);
	}else{
		alert("Caja de texto vacia");
	}
		
	});

	$("body").on("click", ".mensajeria", function(){
		var curso = $(this).attr('curso');
		var alumno = $(this).attr('alumno');
		IdentificadorCurso = curso;
		IdentificadorAlumno = alumno;
		document.getElementById('chat').innerHTML="";
		Peticion(curso, alumno);
	});

});
function SetRolJS(rol){
	MiRol = rol;
	console.log(MiRol);
}
function MensajePropio(mensaje){
	$('#chat').append("<div class='m-envio'>"+mensaje+"</div>");
}

function MensajeRespuesta(mensaje){
	$('#chat').append("<div class='m-respuesta'>"+mensaje+"</div>");
}

function NuevoGrupoAlumno(idCurso, idAlumno, curso, nombre, mensaje){

	$(".chats").append("<div class='mensajeria' curso='"+idCurso+"' alumno='"+idAlumno+"'>"+
					"<div class='curso'><label>"+curso+"</label></div>"+
					"<div class='nombre'><label>Alumno: "+nombre+"</label></div>"+
					"</div>");
}

function NuevoGrupoInstructor(idCurso, idAlumno, curso, nombre, mensaje){

	$(".chats").append("<div class='mensajeria' curso='"+idCurso+"' alumno='"+idAlumno+"'>"+
					"<div class='curso'><label>"+curso+"</label></div>"+
					"<div class='nombre'><label>Instructor: "+nombre+"</label></div>"+
					"</div>");
}

function Peticion(curso, alumno){

	var dataToSend = { 
		action: "Historial",
		curso: curso,
		alumno: alumno
		};

		$.ajax({
		url: "php/Peticion.php",
		async: true,
		type: 'POST',
		data: dataToSend, 
		success: function (data){
			
			console.log(data);
			var datos = JSON.parse(data);
			if (MiRol == "Alumno"){
				for(var i = 0; i<datos.length; i++){

					if(datos[i].Remitente == 1)
						MensajePropio(datos[i].Mensaje);
					else
						MensajeRespuesta(datos[i].Mensaje);
					
				}//fin del for
			}else{
				for(var i = 0; i<datos.length; i++){

					if(datos[i].Remitente == 1)
						MensajeRespuesta(datos[i].Mensaje);
					else
						MensajePropio(datos[i].Mensaje);
					
				}//fin del for
			}
		}
	});
}

function EnvioMensaje(idcurso, idalumno, mensaje){
	var opcion = 0;
	if(MiRol=="Alumno"){
		opcion = 1;
	}

	var dataToSend = { 
		action: "ResponderMensaje",
		curso: idcurso,
		alumno: idalumno,
		mensaje: mensaje,
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
			
		}
	});
}