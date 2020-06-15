<?php

class ControladorStatus{

	static public function ctrMostrarOpStatus($item, $valor){

		$respuesta = ModeloStatus::mdlMostrarstatusop($item, $valor);

		return $respuesta;
	
	}

	static public function ctrMostrarDetalleOP($item, $valor){

		$respuesta = ModeloStatus::mdlMostrarDetalle($item, $valor);

		return $respuesta;
	
	}

	static public function ctrDescargaPDF($item, $valor){

		$respuesta = ModeloStatus::mdlDescargaPDF($item, $valor);

		return $respuesta;
	
	}

}