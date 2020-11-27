<?php
 class ControladorClientes{
    

	static public function ctrCrearCliente(){

		if(isset($_POST["nuevoCliente"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoCliente"]) &&
			   preg_match('/^[0-9]+$/', $_POST["nuevoDocumentoId"]) &&
			   preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST["nuevoEmail"]) && 
			   preg_match('/^[()\-0-9 ]+$/', $_POST["nuevoTelefono"]) && 
			   preg_match('/^[#\.\-a-zA-Z0-9 ]+$/', $_POST["nuevaDireccion"])){

			   	$tabla = "clientes";

			   	$datos = array("nombre"=>$_POST["nuevoCliente"],
					           "documento"=>$_POST["nuevoDocumentoId"],
					           "email"=>$_POST["nuevoEmail"],
					           "telefono"=>$_POST["nuevoTelefono"],
					           "direccion"=>$_POST["nuevaDireccion"],
					           "fecha_nacimiento"=>$_POST["nuevaFechaNacimiento"]);

			   	$respuesta = ModeloClientes::mdlIngresarCliente($tabla, $datos);

				   if($respuesta=="ok"){
					echo"<script>
					 Swal.fire({
					  title: 'Success!',
					  text: '¡El usuario ha sido actualizaddo correctamente!',
					  icon: 'success',
					  confirmButtonText:'Ok'
					  }).then((result)=>{
					   if(result.value){
						window.location = 'Clientes';
					   }
					  })
					</script>";
				   }

			}else{
				echo ("<script>

					Swal.fire({
							  title: 'Error!',
							  text: '¡El usuario no puede ir vacio!',
							  icon: 'error',
							  confirmButtonText: 'Ok'
						
							});

				</script>");
			}




			}

		}

		static public function ctrMostrarCliente($item,$valor){
			$tabla="clientes";
			$respuesta=ModeloClientes::mdlMostrarCliente($tabla,$item,$valor);
			return $respuesta;
		}

		static public function ctrEditarCliente(){

			if(isset($_POST["editarCliente"])){
	
				if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarCliente"]) &&
				   preg_match('/^[0-9]+$/', $_POST["editarDocumentoId"]) &&
				   preg_match('/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[@][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$/', $_POST["editarEmail"]) && 
				   preg_match('/^[()\-0-9 ]+$/', $_POST["editarTelefono"]) && 
				   preg_match('/^[#\.\-a-zA-Z0-9 ]+$/', $_POST["editarDireccion"])){
	
					   $tabla = "clientes";
	
					   $datos = array("id"=>$_POST["idCliente"],
									  "nombre"=>$_POST["editarCliente"],
								   "documento"=>$_POST["editarDocumentoId"],
								   "email"=>$_POST["editarEmail"],
								   "telefono"=>$_POST["editarTelefono"],
								   "direccion"=>$_POST["editarDireccion"],
								   "fecha_nacimiento"=>$_POST["editarFechaNacimiento"]);
	
					   $respuesta = ModeloClientes::mdlEditarCliente($tabla, $datos);
					   if($respuesta=="ok"){
						echo"<script>
						 Swal.fire({
						  title: 'Success!',
						  text: '¡El usuario ha sido actualizaddo correctamente!',
						  icon: 'success', 
						  confirmButtonText:'Ok'
						  }).then((result)=>{
						   if(result.value){
							window.location = 'Clientes';
						   }
						  })
						</script>";
					   }
	
	
				}else{
					echo ("<script>

					Swal.fire({
							  title: 'Error!',
							  text: '¡El usuario no puede ir vacio!',
							  icon: 'error',
							  confirmButtonText: 'Ok'
						
							});

				</script>");
			
	
	
	
				}
	
			}
	
		}
		/*=============================================
	ELIMINAR CLIENTE
	=============================================*/

	static public function ctrEliminarCliente(){

		if(isset($_GET["idCliente"])){

			$tabla ="clientes";
			$datos = $_GET["idCliente"];

			$respuesta = ModeloClientes::mdlEliminarCliente($tabla, $datos);

			if($respuesta == "ok"){

				echo"<script>
						 Swal.fire({
						  title: 'Success!',
						  text: '¡La categoria se ha eliminado Correctamente !',
						  icon: 'success', 
						  confirmButtonText:'Ok'
						  }).then((result)=>{
						   if(result.value){
							window.location = 'Clientes';
						   }
						  })
						</script>";
				}	

		}

	}

    }
    

 