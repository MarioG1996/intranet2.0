<?php

require_once "conexion.php";

class ModeloPerfil{



	static public function AsignaPerfilUsuario($tabla, $datos){


		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(IdPerfil, IdRut) VALUES (:IdPerfil, :rut)");

		$stmt -> bindParam(":rut", $datos["rut"], PDO::PARAM_STR);
		$stmt -> bindParam(":IdPerfil", $datos["IdPerfil"], PDO::PARAM_STR);
		

		if($stmt->execute()){

			return "ok";	

		}else{

			return "error";
		
		}

		$stmt->close();
		
		$stmt = null;


	}




	static public function mdlCreaPerfil($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(NombrePerfil) VALUES (:nomPerfil)");

		$stmt->bindParam(":nomPerfil", $datos["nomPerfil"], PDO::PARAM_STR);


		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}



	static public function mdlCreaRelacionPA($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(IdPerfil,IdAplicacion) VALUES (:IdPerfil,:IdAplicacion)");

		$stmt->bindParam(":IdAplicacion", $datos["IdAplicacion"], PDO::PARAM_STR);
		$stmt->bindParam(":IdPerfil", $datos["IdPerfil"], PDO::PARAM_STR);


		if($stmt->execute()){

			return "ok";

		}else{

			return "error";
		
		}

		$stmt->close();
		$stmt = null;

	}



	static public function mdlMostrarRelacionPA($item1, $item2, $valor1, $valor2){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM tbl_aplicacion_perfil WHERE $item1 = :perfil and $item2 = :aplicacion");

			$stmt->bindParam(":perfil", $datos["valor1"], PDO::PARAM_STR);
			$stmt->bindParam(":aplicacion", $datos["valor2"], PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT  * FROM tbl_aplicacion_perfil" );

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt -> close();

		$stmt = null;

	}



	static public function mdlMostrarPerfil($tabla, $item, $valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT  * FROM $tabla" );

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt -> close();

		$stmt = null;

	}





	static public function mdlMostrarAplicaciones($tabla, $item, $valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT  * FROM $tabla" );

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt -> close();

		$stmt = null;

	}



		static public function mdlMostrarFunciones($tabla, $item, $valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT  * FROM $tabla" );

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt -> close();

		$stmt = null;

	}



static public function mdlMostrarDescripcionPerfil($tabla, $item, $valor){

		if($item != null){

			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetch();

		}else{

			$stmt = Conexion::conectar()->prepare("SELECT  * FROM $tabla tp INNER JOIN tbl_perfil t on tp.IdPerfil = t.IdPerfil " );

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt -> close();

		$stmt = null;

	}



static public function mdlEditarPerfilUsuario($tabla, $datos){
	
		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET IdPerfil = :IdPerfil  WHERE IdRut = :rut  ");

		
		$stmt -> bindParam(":rut", $datos["rut"], PDO::PARAM_STR);
		$stmt -> bindParam(":IdPerfil", $datos["IdPerfil"], PDO::PARAM_STR);
		

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}


	static public function mdlBorrarCategoria($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");

		$stmt -> bindParam(":id", $datos, PDO::PARAM_INT);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}





	static public function mdlActualizarPerfil($tabla, $item1, $valor1, $item2, $valor2){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $item1 = :$item1 WHERE $item2 = :$item2");

		$stmt -> bindParam(":".$item1, $valor1, PDO::PARAM_STR);
		$stmt -> bindParam(":".$item2, $valor2, PDO::PARAM_STR);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}





	static public function mdlActualizarFuncion($tabla, $item1, $valor1, $item2, $valor2){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $item1 = :$item1 WHERE $item2 = :$item2");

		$stmt -> bindParam(":".$item1, $valor1, PDO::PARAM_STR);
		$stmt -> bindParam(":".$item2, $valor2, PDO::PARAM_STR);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}


	
	static public function mdlActualizarAplicacion($tabla, $item1, $valor1, $item2, $valor2){

		$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $item1 = :$item1 WHERE $item2 = :$item2");

		$stmt -> bindParam(":".$item1, $valor1, PDO::PARAM_STR);
		$stmt -> bindParam(":".$item2, $valor2, PDO::PARAM_STR);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;

	}



	static public function mdlBorrarPerfil($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE IdPerfil = :IdPerfil");

		$stmt -> bindParam(":IdPerfil", $datos, PDO::PARAM_INT);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;



	}




		static public function mdlBorrarAplicacionPerfil($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE Id = :IdAplicacionP");

		$stmt -> bindParam(":IdAplicacionP", $datos, PDO::PARAM_INT);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;



	}


		static public function mdlBorrarPerfilUsuario($tabla, $datos){

		$stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE IdRut = :idrut");

		$stmt -> bindParam(":idrut", $datos, PDO::PARAM_INT);

		if($stmt -> execute()){

			return "ok";
		
		}else{

			return "error";	

		}

		$stmt -> close();

		$stmt = null;



	}




		static public function mdlMostrarFuncionAplicacion($item, $valor){

		if($item != null){


			$stmt = Conexion::conectar()->prepare("SELECT ap.NombreAplicacion ,f.IdFuncion ,f.NombreFuncion , f.estadoFuncion from tbl_aplicacion as ap INNER JOIN tbl_funcion as f on ap.IdAplicacion = f.IdAplicacion order by ap.NombreAplicacion asc ") ;

			$stmt -> bindParam(":aplicacion", $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetchAll();


		}else{

			$stmt = Conexion::conectar()->prepare("SELECT ap.NombreAplicacion ,f.IdFuncion , f.NombreFuncion , f.estadoFuncion from tbl_aplicacion as ap INNER JOIN tbl_funcion as f on ap.IdAplicacion = f.IdAplicacion order by ap.NombreAplicacion asc");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt -> close();

		$stmt = null;

	}




	static public function mdlMostrarAplicacionFuncion($item, $valor){

		if($item != null){


			$stmt = Conexion::conectar()->prepare("SELECT a.id ,p.NombrePerfil as perfil , ap.NombreAplicacion as nombre , a.estadoAplicPerfil , ap.LogoAplicacion from tbl_perfil as p INNER JOIN tbl_aplicacion_perfil as a on p.IdPerfil = a.IdPerfil INNER JOIN tbl_aplicacion as ap on a.IdAplicacion = ap.IdAplicacion order by ap.NombreAplicacion asc  ") ;

			$stmt -> bindParam(":aplicacion", $valor, PDO::PARAM_STR);

			$stmt -> execute();

			return $stmt -> fetchAll();


		}else{

			$stmt = Conexion::conectar()->prepare("SELECT a.id  ,p.NombrePerfil as perfil , ap.NombreAplicacion as nombre , a.estadoAplicPerfil , ap.LogoAplicacion from tbl_perfil as p INNER JOIN tbl_aplicacion_perfil as a on p.IdPerfil = a.IdPerfil INNER JOIN tbl_aplicacion as ap on a.IdAplicacion = ap.IdAplicacion order by ap.NombreAplicacion asc ");

			$stmt -> execute();

			return $stmt -> fetchAll();

		}

		$stmt -> close();

		$stmt = null;

	}




}


