/*=============================================
EDITAR CLIENTE
=============================================*/
$(".tablasc").on("click", ".btnEditarCliente", function(){

	var idCliente = $(this).attr("idCliente");

	var datos = new FormData();
	datos.append("idCliente", idCliente);

	$.ajax({
		url: "ajax/clientes.ajax.php",
		method: "POST",
      	data: datos,
      	cache: false,
     	contentType: false,
     	processData: false,
     	dataType:"json",
     	success: function(respuesta){

            $("#idCliente").val(respuesta["id"]);
			 $("#editarCliente").val(respuesta["nombre"]);
			 $("#editarDocumentoId").val(respuesta["documento"]);
			 $("#editarEmail").val(respuesta["email"]);
			 $("#editarTelefono").val(respuesta["telefono"]);
			 $("#editarDireccion").val(respuesta["direccion"]);
			 $("#editarFechaNacimiento").val(respuesta["fecha_nacimiento"]);
			 


     	}

	})

 
})

/*=============================================
ELIMINAR CLIENTE
=============================================*/
$(".tablasc").on("click", ".btnEliminarCliente", function(){

var idCliente= $(this).attr("idCliente");

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
      window.location = "index.php?ruta=Clientes&idCliente="+idCliente;
  }
})
}) 