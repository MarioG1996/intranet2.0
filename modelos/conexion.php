<?php

class Conexion{

	static public function conectar(){

		$link = new PDO("sqlsrv:Server=10.0.0.10;Database=intranet_prosud", "sa", "Procesadora1");

		$link->exec("set names utf8");

		return $link;

	}

}

