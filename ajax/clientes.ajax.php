<?php

require_once "../controladores/clientes.controlador.php";
require_once "../modelos/clientes.modelo.php";

class AjaxClientes{

	/*=============================================
	EDITAR CATEGORÍA
	=============================================*/	

	public $idCliente;

	public function ajaxEditarCliente(){

		$item = "id";
		$valor = $this->idCliente;

		$respuesta = ControladorClientes::ctrMostrarCliente($item, $valor);

		echo json_encode($respuesta);

	}
}

/*=============================================
EDITAR CATEGORÍA
=============================================*/	
if(isset($_POST["idCliente"])){

	$categoria = new AjaxClientes();
	$categoria -> idCliente = $_POST["idCliente"];
	$categoria -> ajaxEditarCliente();
}
