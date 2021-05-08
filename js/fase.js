var cantidadFases = 0;
$(document).ready( function(){

	$("#precio-paga").click(function(){
		if(document.getElementById("precio-paga").checked == true){
			$("#costo").prop("readonly", false);
		}
	});

	$("#precio-gratis").click(function(){
		if(document.getElementById("precio-gratis").checked == true){
			document.getElementById("costo").value="0.00";
			$("#costo").prop("readonly", true);
		}
	});
	$("#cancelar").click(function(){
		window.location.href="configuracion.php";
	});
	 
});




