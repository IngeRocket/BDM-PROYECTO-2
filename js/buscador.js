$(document).ready(function(){
	AgregarCategoria("TODAS");
	CargarListaCategoria();
	$("#buscar").click(function(){
		var titulo = document.getElementById('titulo').value;
		limpieza();
	});
});

function limpieza(){
	document.getElementById('respuesta').innerHTML="";
}
function busqueda(){}

function AgregarCategoria(nombre){
	$('#categorias').append("<option>"+nombre+"</option>");

}

function CargarListaCategoria(){
    var dataToSend = { 
        action: "Categoria"
        };

        $.ajax({
        url: "php/Peticion.php",
        async: true,
        type: 'POST',
        data: dataToSend, 
        success: function (data){
            
                var datos = JSON.parse(data);
                console.log(data);
                for(var i = 0; i < datos.length; i++){
                    AgregarCategoria(datos[i].CATEGORIA);
                }
            }
        });
}