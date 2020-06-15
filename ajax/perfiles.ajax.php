<?php

require_once "../controladores/perfil.controlador.php";
require_once "../modelos/perfil.modelo.php";

class AjaxPerfil{

	/*=============================================
	EDITAR USUARIO
	=============================================*/	

	public $IdRut;

	public function ajaxEditarPerfil(){

		$item = "IdRut";
		$valor = $this->IdRut;

		$respuesta = ModeloPerfil::mdlMostrarDescripcionPerfil($item, $valor);

		echo json_encode($respuesta);

	}


	public $activarPerfil;
	public $activarId;


	public function ajaxActivarPerfil(){

		$tabla = "tbl_perfil";

		$item1 = "estadoPerfil";
		$valor1 = $this->activarPerfil;

		$item2 = "IdPerfil";
		$valor2 = $this->activarId;

		$respuesta = ModeloPerfil::mdlActualizarPerfil($tabla, $item1, $valor1, $item2, $valor2);

	}



	public $activarFuncion;
	public $activarIdfuncion;

	public function ajaxActivarFuncion(){

		$tabla = "tbl_funcion";

		$item1 = "estadoFuncion";
		$valor1 = $this->activarFuncion;

		$item2 = "IdFuncion";
		$valor2 = $this->activarIdfuncion;

		$respuesta = ModeloPerfil::mdlActualizarFuncion($tabla, $item1, $valor1, $item2, $valor2);

	}



	public $activarAplicacion;
	public $activarIdAplicacion;


	public function ajaxActivarAplicacion(){

		$tabla = "tbl_aplicacion_perfil";

		$item1 = "estadoAplicPerfil";
		$valor1 = $this->activarAplicacion;

		$item2 = "Id";
		$valor2 = $this->activarIdAplicacion;

		$respuesta = ModeloPerfil::mdlActualizarAplicacion($tabla, $item1, $valor1, $item2, $valor2);

	}

	

	public $validarPerfil;
	public $validarAplicacion;

	public function ajaxValidarRelacion(){

		$item1 = "IdPerfil";
		$valor1 = $this->validarPerfil;

		$item2 = "IdAplicacion";
		$valor2 = $this->validarAplicacion;

		


		$respuesta = ModeloPerfil::mdlMostrarRelacionPA($item1, $item2, $valor1, $valor2);

		echo json_encode($respuesta);

	}
}


if(isset($_POST["IdRut"])){

	$editar = new AjaxPerfil();
	$editar -> IdRut = $_POST["IdRut"];
	$editar -> ajaxEditarPerfil();

}



if(isset($_POST["activarPerfil"])){

	$activarPerfil = new AjaxPerfil();
	$activarPerfil -> activarPerfil = $_POST["activarPerfil"];
	$activarPerfil -> activarId = $_POST["activarId"];
	$activarPerfil -> ajaxActivarPerfil();

}



if(isset( $_POST["validarPerfil"])){

	$validarPerfil = new AjaxPerfil();
	$validarPerfil -> validarPerfil = $_POST["validarPerfil"];
	$validarPerfil -> validarAplicacion = $_POST["validarAplicacion"];
	$validarPerfil -> ajaxValidarRelacion();

}



if(isset($_POST["activarFuncion"])){

	$activarFuncion = new AjaxPerfil();
	$activarFuncion -> activarFuncion = $_POST["activarFuncion"];
	$activarFuncion -> activarIdfuncion = $_POST["activarIdfuncion"];
	$activarFuncion -> ajaxActivarFuncion();

}



if(isset($_POST["activarAplicacion"])){

	$activarAplicacion = new AjaxPerfil();
	$activarAplicacion -> activarAplicacion = $_POST["activarAplicacion"];
	$activarAplicacion -> activarIdAplicacion = $_POST["activarIdAplicacion"];
	$activarAplicacion -> ajaxActivarAplicacion();

}

