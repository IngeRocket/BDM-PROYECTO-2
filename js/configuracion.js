var oculto = true;
$(document).ready(function(){
	$('#CambiarFoto').click(function(){
		if(oculto){
			Aparecer();
		}
	});
	$("body").on("click","#cancelar", function(){
		Borrar();
	});

});

function Aparecer(){
	$('#panel-der').append("<form method='post' enctype='multipart/form-data'>"+
				"<label>Nueva Foto</label>"+
				"<input type='file' name='c-img' accept='.bmp, .jpg, .jpeg, .png' required>"+
				"<button type='submit' name='nuevafoto'>Cambiar Foto</button>"+
				"</form>"+
				"<div class='renglon'>"+
				"<button id='cancelar'>Cancelar</button>"+
				"</div>");
}

function Borrar(){
	document.getElementById('panel-der').innerHTML = "";
}
