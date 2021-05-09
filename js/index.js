$(document).ready( function(){
	Peticion();
});

function Peticion(){
	var dataToSend = { 
	    action: "Principal"
	    };

	    $.ajax({
	    url: "php/Peticion.php",
	    async: true,
	    type: 'POST',
	    data: dataToSend, 
	    success: function (data){
	        //console.log(data);
	           var datos = JSON.parse(data);
	            console.log(data);
	            /*for(var i = 0; i < datos.length; i++){
	                AgregarCategoria(datos[i].CATEGORIA);
	            }*/
	        }
	    });
}

function Resultados(){

}