/*=============================================
EDITAR CATEGORIA
=============================================*/
$(".tablas").on("click", ".btnEditarCategoria", function(){

	var idCategoria = $(this).attr("idCategoria");

	var datos = new FormData();
	datos.append("idCategoria", idCategoria);

	$.ajax({
		url: "ajax/categorias.ajax.php",
		method: "POST",
      	data: datos,
      	cache: false,
     	contentType: false,
     	processData: false,
     	dataType:"json",
     	success: function(respuesta){

     		$("#editarCategoria").val(respuesta["categoria"]);
     		$("#idCategoria").val(respuesta["id"]);

     	}

	})


})

/*=============================================
ELIMINAR CATEGORIA
=============================================*/
$(".tablas").on("click", ".btnEliminarCategoria", function(){

var idCategoria= $(this).attr("idCategoria");

  Swal.fire({
  title: '¡Estas seguro que deseas eliminar el Usuario?',
  text: "Si no es asi puedes presionar el boton cancelar",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Si, Borrar usuario'
  }).then((result) => {
    if (result.value) {
      window.location = "index.php?ruta=categorias&idCategoria="+idCategoria;
  }
})
})