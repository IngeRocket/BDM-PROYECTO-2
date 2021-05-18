$(document).ready(function(){
	$("#volver").click(function(){
		window.location.href="vista-fases.php";
	});

	$("#imprimir").click(function(){
		const $elementoParaConvertir = document.getElementById('mi-certificado'); // <-- Aquí puedes elegir cualquier elemento del DOM
		html2pdf()
		    .set({
		        margin: 0.5,
		        filename: 'documento.pdf',
		        image: {
		            type: 'jpeg',
		            quality: 0.98
		        },
		        html2canvas: {
		            scale: 3, // A mayor escala, mejores gráficos, pero más peso
		            letterRendering: true,
		        },
		        jsPDF: {
		            unit: "in",
		            format: "a3",
		            orientation: 'landscape' // landscape o portrait
		        }
		    })
		    .from($elementoParaConvertir)
		    .save()
		    .catch(err => console.log(err))
	});

});