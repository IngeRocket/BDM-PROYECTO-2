$(document).ready(function(){
	AgregarCategoria("TODAS");
	CargarListaCategoria();

	$("#buscar").click(function(){
		Accion();
	});
});

function limpieza(){
	document.getElementById('respuesta').innerHTML="";
}

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

function Buscar(titulo,categoria,opcion){
      
        var dataToSend = { 
            action: "Buscador",
            titulo:titulo,
            categoria:categoria,
            opcion:opcion
        };

        $.ajax({
        url: "php/Peticion.php",
        async: true,
        type: 'POST',
        data: dataToSend, 
        success: function (data){
            
                var datos = JSON.parse(data);
                console.log(data);
                if (datos[0].Respuesta == "1"){
                    for(var i = 0; i < datos.length; i++){
                    FormatoResultado(datos[i].ID, datos[i].Miniatura, datos[i].Titulo, datos[i].Categorias, datos[i].FasesGratuitas, datos[i].Fases, datos[i].Precio);
                    }
                }else{
                    Aviso(datos[0].Mensaje);
                }
                
            }
        });
}

function FormatoResultado(id, imagen, titulo, categorias, FasesG, FasesT, precio){
    if (precio == "0.00"){
        precio = "Gratis";
    }

    $("#respuesta").append( "<a class='enlace' href='curso.php?Curso="+id+"'>"+
                "<div class='tarjeta'>"+
                "<div class='t-imagen'><img src='"+imagen+"'></div>"+
                "<div class='t-titulo'>"+
                "<div class='titulo-nombre'>"+titulo+"</div>"+
                "<div class='titulo-categoria'>"+categorias+"</div>"+
                "</div>"+
                "<div class='t-progreso'>"+FasesG+"</div>"+
                "<div class='t-estado'>"+FasesT+"</div>"+
                "<div class='t-e-compra'>"+precio+"</div>"+
                "</div></a>");
               
}
function Aviso(mensaje){
    alert(mensaje);
}
function Accion(){
            var titulo = document.getElementById('titulo').value;
            var opcion = document.getElementById('opcion').value;
            var categoria = document.getElementById('categorias').value;
            limpieza();
            Buscar(titulo, categoria, opcion);
}