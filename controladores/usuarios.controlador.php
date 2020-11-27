<?php

class ControladorUsuarios
{


	static public function ctrCrearUsuario()
	{
		if (isset($_POST['nuevoUsuario'])) {
			if (
				preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST['nuevoNombre']) &&
				preg_match('/^[a-zA-Z0-9]+$/', $_POST['nuevoUsuario']) &&
				preg_match('/^[a-zA-Z0-9]+$/', $_POST['nuevoPassword'])
			) {
/*===========================================================
	VALIDAR IMAGEN
=============================================================*/
				$ruta = "";
				if (isset($_FILES['nuevaFoto']['tmp_name'])) {
					list($ancho, $alto) = getimagesize($_FILES['nuevaFoto']['tmp_name']);
					$nuevoancho = 500;
					$nuevoalto = 500;
					//Crear directorio

					$directorio = "vistas/img/usuarios/" . $_POST['nuevoUsuario'];
					mkdir($directorio, 0755);

					//De acuerdo al tipo de imagen se hace el proceso de recorte de la foto

					if ($_FILES['nuevaFoto']['type'] == "image/jpeg") {
						$aleatorio = mt_rand(100, 999);
						$ruta = $directorio . "/" . $aleatorio . ".jpg";
						$origen = imagecreatefromjpeg($_FILES['nuevaFoto']['tmp_name']);
						$destino = imagecreatetruecolor($nuevoancho, $nuevoalto);
						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoancho, $nuevoalto, $ancho, $alto);
						imagejpeg($destino, $ruta);
					}
					if ($_FILES['nuevaFoto']['type'] == "image/png") {
						$aleatorio = mt_rand(100, 999);
						$ruta = $directorio . "/" . $aleatorio . ".png";
						$origen = imagecreatefrompng($_FILES['nuevaFoto']['tmp_name']);
						$destino = imagecreatetruecolor($nuevoancho, $nuevoalto);
						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoancho, $nuevoalto, $ancho, $alto);
						imagepng($destino, $ruta);
					}
				}

				//envio de datos

				$tabla = "usuarios";
				//encriptacion de  la contraseña con cry y md5
				$salt = md5($_POST['nuevoPassword']);
				$passwordEncriptada = crypt($_POST['nuevoPassword'], $salt);



				$datos = array(
					"nombre" => $_POST['nuevoNombre'],
					"usuario" => $_POST['nuevoUsuario'],
					"password" => $passwordEncriptada,
					"perfil" => $_POST['nuevoPerfil'],
					"foto" => $ruta
				);
				$respuesta = ModeloUsuarios::mdlIngresarUsuario($tabla, $datos);
				if ($respuesta == "ok") {

					echo '<script>

					Swal.fire({
							  title: "Success!",
							  text: "¡Registro Exitoso!",
							  icon: "success",
							  confirmButtonText: "Ok"
						
							}).then((result)=>{
								if(result.value){
							window.location = "Usuarios";
								}
							});

				</script>';
				}
			} else {
				//echo ('<script>alert ("ingreso");</script>');
				echo ("<script>

					Swal.fire({
							  title: 'Error!',
							  text: '¡Comprueba los datos!',
							  icon: 'error',
							  confirmButtonText: 'Ok'
						
							});

				</script>");
			}
		}
	}
	static public function ctrBorrarUsuario(){
   if(isset($_GET['idusuario'])){
    $tabla = "usuarios";
    $datos = $_GET['idusuario'];
    if($_GET['fotousuario']!=""){
     unlink($_GET['fotousuario']);
     rmdir("vistas/img/usuarios/".$_GET['usuario']);
    }
     $respuesta = ModeloUsuarios::mdlBorrarUsuario($tabla,$datos);
     if($respuesta=="ok"){
      echo"<script>
       Swal.fire({
        title: 'Success!',
        text: '¡El usuario ha sido borrado correctamente!',
        icon: 'success',
        confirmButtonText:'Ok'
        }).then((result)=>{
         if(result.value){
          window.location = 'Usuarios';
         }
        })
      </script>";
     }
    
   }
  }
/*===========================================================
INGRESO AL SISTEMA
=============================================================*/
	static public function ctrIngresar()
	{

		if (isset($_POST['ingUsuario'])) {
			if (preg_match('/^[a-zA-Z0-9]+$/', $_POST['ingUsuario']) && preg_match('/^[a-zA-Z0-9]+$/', $_POST['ingPassword'])) {

				$tabla = "usuarios";
				$item = "usuario";
				$valor = $_POST['ingUsuario'];

				$salt = md5($_POST['ingPassword']);
				$passwordEncriptada = crypt($_POST['ingPassword'], $salt);

				$respuesta = ModeloUsuarios::MdlMostrarUsuarios($tabla, $item, $valor);

				if ($respuesta['usuario'] == $_POST['ingUsuario'] && $respuesta['password'] == $passwordEncriptada) {
				
					if($respuesta["estado"]==1){
					$_SESSION['iniciarSesion'] = "ok";
					$_SESSION['id'] = $respuesta["id"];
					$_SESSION['nombre'] = $respuesta["nombre"];
					$_SESSION['usuario'] = $respuesta["usuario"];
					$_SESSION['foto'] = $respuesta["foto"];
					$_SESSION['perfil'] = $respuesta["perfil"];

/*===========================================================
ULTIMO LOGIN
=============================================================*/
								date_default_timezone_set("America/Mexico_City");
								$fecha = date("y-m-d");
								$hora = date("H:i:s");
								$fechaActual = $fecha." ".$hora;
								$item1 = "ultimo_login";
								$valor1 = $fechaActual;
								$item2 = "id";
								$valor2 = $respuesta['id'];
								$actualizarLogin = ModeloUsuarios::mdlActualizarUsuario($tabla,$item1,$valor1,$item2,$valor2);
                                 if($actualizarLogin=="ok"){
									echo '<script>

					Swal.fire({
							  title: "Credenciales Correctas!",
							  text: "¡Iniciando Sesion...!",
							  icon: "success",
							  confirmButtonText: "Ok"
						
							}).then((result)=>{
								if(result.value){
							window.location = "inicio";
								}
							});

				</script>';
								}
								
								}else{
									echo ("<script>

					Swal.fire({
							  title: 'Error!',
							  text: '¡Usuario Desactivado !',
							  icon: 'error',
							  confirmButtonText: 'Ok'
						
							});

				</script>");
								}
					}else{
						echo ("<script>

					Swal.fire({
							  title: 'Error!',
							  text: '¡Comprueba Las Credenciales!',
							  icon: 'error',
							  confirmButtonText: 'Ok'
						
							});

				</script>");
					}
				}
			}
		}

	/*===========================================================
	MOSTRAR USUARIO
	=============================================================*/
	static public function ctrMostrarUsuarios($item, $valor)
	{
		$tabla = "usuarios";
		$respuesta = ModeloUsuarios::mdlMostrarUsuarios($tabla, $item, $valor);
		return $respuesta;
	}
	/*===========================================================
	EDITAR USUARIO
	=============================================================*/
	public function ctrEditarUsuario(){
		if (isset($_POST['editarUsuario'])) {
			if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST['editarNombre'])) {
				/*===========================================================
	VALIDAR IMAGEN
	=============================================================*/
				$ruta = $_POST["fotoActual"];
				if (isset($_FILES['editarFoto']['tmp_name'])) {
					list($ancho, $alto) = getimagesize($_FILES['editarFoto']['tmp_name']);
					$nuevoancho = 500;
					$nuevoalto = 500;
					/*===========================================================
	CREAMOS EL DIRECTORIO
	=============================================================*/

					$directorio = "vistas/img/usuarios/" . $_POST['editarUsuario'];
					/*===========================================================
	VERIFICAMOS SI HAY UNA IMAGEN EN LA BD
	=============================================================*/
					if (!empty($_POST['fotoActual'])) {
						unlink($_POST["fotoActual"]);
					} else {
						mkdir($directorio, 0755);
					}


					/*===========================================================
	PROCESAMIENTO DE LA IMAGEN 
	=============================================================*/

					if ($_FILES['editarFoto']['type'] == "image/jpeg") {
						$aleatorio = mt_rand(100, 999);
						$ruta = $directorio . "/" . $aleatorio . ".jpg";
						$origen = imagecreatefromjpeg($_FILES['editarFoto']['tmp_name']);
						$destino = imagecreatetruecolor($nuevoancho, $nuevoalto);
						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoancho, $nuevoalto, $ancho, $alto);
						imagejpeg($destino, $ruta);
					}
					if ($_FILES['editarFoto']['type'] == "image/png") {
						$aleatorio = mt_rand(100, 999);
						$ruta = $directorio . "/" . $aleatorio . ".png";
						$origen = imagecreatefrompng($_FILES['editarFoto']['tmp_name']);
						$destino = imagecreatetruecolor($nuevoancho, $nuevoalto);
						imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoancho, $nuevoalto, $ancho, $alto);
						imagepng($destino, $ruta);
					}
				}
				$tabla = "usuarios";
				if($_POST["editarPassword"]!=""){
					if(preg_match('/^[a-zA-Z0-9]+$/', $_POST['editarPassword'])){
						$salt = md5($_POST['editarPassword']);
						$passwordEncriptado = crypt($_POST['editarPassword'],$salt);
					}else{
						echo ("<script>

					Swal.fire({
							  title: 'Error!',
							  text: '¡La contraseña no puede ir vacia!',
							  icon: 'error',
							  confirmButtonText: 'Ok'
						
							});

				</script>");
					}
					

				}else{
					$passwordEncriptado = $_POST['passwordActual'];
				}
				$datos = array(
					"nombre" => $_POST['editarNombre'],
					"usuario" => $_POST['editarUsuario'],
					"password" => $passwordEncriptado,
					"perfil" => $_POST['editarPerfil'],
					"foto" => $ruta);

				$respuesta= ModeloUsuarios::mdlEditarUsuario($tabla, $datos);
				if ($respuesta == "ok") {

					echo '<script>

					Swal.fire({
							  title: "Success!",
							  text: "¡El usuario se ha editado correctamente!",
							  icon: "success",
							  confirmButtonText: "Ok"
						
							}).then((result)=>{
								if(result.value){
							window.location = "categorias";
								}
							});

				</script>';
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

}
