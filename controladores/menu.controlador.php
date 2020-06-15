<?php

class ControladorMenu{


	


	static public function ctrMostrarMenu($item, $valor){

		$item='IdRut';
		


		$respuesta = ModeloMenu::mdlMostrarMenu($item, $valor);

		return $respuesta;
	
	}





	static public function ctrMostrarFuncion($item, $valor){

		$item ="NombreAplicacion";


		$respuesta = ModeloMenu::mdlMostrarFunciones($item, $valor);

		return $respuesta;
	
	}






}