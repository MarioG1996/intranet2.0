



<?php

class ControladorSucursales{

	


    	static public function ctrMostrarSucursales($item, $valor, $orden){

		$tabla = "lineas";

		$respuesta = ModeloProductos::mdlMostrarLineas($tabla, $item, $valor, $orden);

		return $respuesta;

	}

	


}