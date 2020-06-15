<?php

require_once "conexion.php";

class ModeloMenu{



	static public function mdlMostrarMenu($item, $valor){

		if($item != null){


			$stmt = Conexion::conectar()->prepare("SELECT r.IdRut, p.IdPerfil as ID ,p.NombrePerfil as perfil , ap.NombreAplicacion as nombre , ap.LogoAplicacion , a.estadoAplicPerfil  from tbl_perfil_usuario as r INNER JOIN tbl_perfil as p on r.IdPerfil = p.IdPerfil INNER JOIN tbl_aplicacion_perfil as a on r.IdPerfil = a.IdPerfil INNER JOIN tbl_aplicacion as ap on a.IdAplicacion = ap.IdAplicacion WHERE $item = :rut group by r.IdRut, p.IdPerfil  ,p.NombrePerfil , ap.NombreAplicacion , ap.LogoAplicacion , a.estadoAplicPerfil order by ap.NombreAplicacion asc ") ;

			$stmt -> bindParam(":rut", $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetchAll();


		}else{

			$stmt = Conexion::conectar()->prepare("SELECT r.IdRut, p.IdPerfil as ID ,p.NombrePerfil as perfil , ap.NombreAplicacion as nombre , ap.LogoAplicacion , a.estadoAplicPerfil from tbl_perfil_usuario as r INNER JOIN tbl_perfil as p on r.IdPerfil = p.IdPerfil INNER JOIN tbl_aplicacion_perfil as a on r.IdPerfil = a.IdPerfil INNER JOIN tbl_aplicacion as ap on a.IdAplicacion = ap.IdAplicacion group by ap.NombreAplicacion order by ap.NombreAplicacion asc ");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt -> close();

		$stmt = null;

	}





   static public function mdlMostrarFunciones($item, $valor){

		if($item != null){

	$stmt = Conexion::conectar()->prepare("SELECT  ap.NombreAplicacion as nombre , f.NombreFuncion , f.Ruta_Aplicacion ,f.estadoFuncion
				FROM  tbl_aplicacion as ap INNER JOIN tbl_funcion f on ap.IdAplicacion = f.IdAplicacion 
					WHERE  $item = :aplicacion group by ap.NombreAplicacion , f.NombreFuncion , f.Ruta_Aplicacion ,f.estadoFuncion order by ap.NombreAplicacion asc ");


			$stmt->bindParam(":aplicacion", $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetchAll();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT  ap.NombreAplicacion as nombre , f.NombreFuncion , f.Ruta_Aplicacion ,f.estadoFuncion
				FROM  tbl_aplicacion as ap INNER JOIN tbl_funcion f on ap.IdAplicacion = f.IdAplicacion 
					group by ap.NombreAplicacion ,f.NombreFuncion order by ap.NombreAplicacion asc ");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt -> close();

		$stmt = null;

	}






}