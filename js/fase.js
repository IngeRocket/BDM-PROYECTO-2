var cantidadFases = 0;
$(document).ready( function(){

	$("#precio-paga").click(function(){
		if(document.getElementById("precio-paga").checked == true){
			$("#costo").prop("readonly", false);
			document.getElementById("costo").value="1.00";
			document.getElementById("costo").min="0.25";
		}
	});

	$("#precio-gratis").click(function(){
		if(document.getElementById("precio-gratis").checked == true){
			document.getElementById("costo").value="0.00";
			document.getElementById("costo").min="0.00";
			$("#costo").prop("readonly", true);
		}
	});
	$("#cancelar").click(function(){
		window.location.href="configuracion.php";
	});
	 
});




