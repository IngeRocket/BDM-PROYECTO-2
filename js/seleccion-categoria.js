var elementos = 0;
var IdCurso = 0;
var terminado = true;
$(document).ready( function(){

    CargarListaCategoria();


        $("#crear-cat").click(function(){
        var texto = document.getElementById("nombre-categoria").value.toUpperCase();
        if (texto.length == 0){
            alert("Nombre de la categoria vacia");
        }else{
            var condicion = true;
            var lista1 = document.querySelectorAll('.cat-bdm'); 
            console.log(lista1.length);
            //revisar en la lista sin seleccion
            for( var i = 0; i < lista1.length; i++){
                if (lista1[i].textContent == texto){
                    condicion = false;
                    //alert("coincidencia");
                    break;
                }
            }
            /**/
            //revisar en la lista de seleccion
            var lista2 = document.querySelectorAll('.cat-curso');
            if (condicion == true && lista2.length > 0){
                for( var i = 0; i < lista2.length; i++){
                    if (lista2[i].textContent == texto){
                        condicion = false;
                        //alert("coincidencia");
                        break;
                    }
                }
            }
            if (condicion == true){
                AgregarCategoria(texto);
                document.getElementById("nombre-categoria").value="";
            }else{
                alert("Nombre de categoria ya existe");
            }
            
        }
    });
    $("body").on("click", ".cat-bdm",function(){
        ListaCategoria((this).textContent);
        (this).remove();
    });

    $("body").on("click", ".cat-curso",function(){
        AgregarCategoria((this).textContent);
        (this).remove();
    });

    $("body").on("click", "#ListaCompleta", function(){
        //alert(IdCurso);
        if(terminado){
            terminado = false;

            var lista = document.querySelectorAll('.cat-curso');
            elementos = lista.length;

            if(elementos == 0){
                alert("No ha seleccionado ninguna categoria para el curso");
                terminado = true;
            }else{
                //aqui va la peticion
                for(var i = 0; i < lista.length; i++){
                Peticion(IdCurso,lista[i].textContent);
                }
            }
        }else{
            alert("Aviso: Se estan aplicando las categorias al curso, por favor espere a ser redireccionado");
        }//fin de if para una sola peticion
    });
});

function AgregarCategoria(nombre){
    $(".lista").append("<label class='cat-bdm'>"+nombre+"</label>");
}
function ListaCategoria(nombre){
    $(".mi-lista").append("<label class='cat-curso'>"+nombre+"</label>");
}
function IrCrearFase(){
    window.location.href = "crear-fase.php";
}
function Peticion(clave,categoria){
    var dataToSend = { 
        action: "CursoCategoria",
        curso: clave,
        categoria: categoria
        };
    $.ajax({
    url: "php/Peticion.php",
    async: true,
    type: 'POST',
    data: dataToSend, 
    success: function (data){
        
            var datos = JSON.parse(data);
            console.log(data);
            elementos--;
            if(elementos == 0){
                alert(datos[0].Mensaje);
                IrCrearFase();
            }
            //localStorage.setItem("IdCurso",datos[0].ClaveCurso);
        }
    });
}

function CargarListaCategoria(){
    //aqui va la funcion ajax
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

function CargarIdCurso(elemento){
    IdCurso = elemento;
}