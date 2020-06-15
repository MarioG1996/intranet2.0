<?php

class ControladorPerfil{




	static public function ctrmostrarAplicaciones($item, $valor){

		$tabla = "tbl_aplicacion";

		$respuesta = ModeloPerfil::mdlMostrarAplicaciones($tabla, $item, $valor);

		return $respuesta;
	
	}



		static public function ctrMostrarFunciones($item, $valor){

		$tabla = "tbl_funcion";

		$respuesta = ModeloPerfil::mdlMostrarFunciones($tabla, $item, $valor);

		return $respuesta;
	
	}


		static public function ctrMostrarPerfil($item, $valor){

		$tabla = "tbl_perfil";

		$respuesta = ModeloPerfil::mdlMostrarPerfil($tabla, $item, $valor);

		return $respuesta;
	
	}



	static public function ctrMostrarDescripcionPerfil($item, $valor){

		$tabla = "tbl_perfil_usuario";
		$item = "";

		$respuesta = ModeloPerfil::mdlMostrarDescripcionPerfil($tabla, $item, $valor);

		return $respuesta;
	
	}




static public function ctrCreaPerfil(){

		if(isset($_POST["nuevoNombre"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoNombre"])){

			 

		

				$tabla = "tbl_perfil";

			

				$datos = array(
					           "nomPerfil" => $_POST["nuevoNombre"]
					           
					       );

				$respuesta = ModeloPerfil:: mdlCreaPerfil($tabla, $datos);
			
				if($respuesta == "ok"){

					echo '<script>

					swal({

						type: "success",
						title: "¡El Perfil ha sido guardado correctamente!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "perfiles";

						}

					});
				

					</script>';


				}	


			}else{

				echo '<script>

					swal({

						type: "error",
						title: "¡El Perfil no puede ir vacío o llevar caracteres especiales!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "perfiles";

						}

					});
				

				</script>';

			}


		}


	}




static public function ctrCreaRelacionPA(){

		if ((isset($_POST["asigAplicaciones"])) and(isset($_POST["asigPerfil"]))){

			

			 

		

				$tabla = "tbl_aplicacion_perfil";

			

				$datos = array(
					           "IdAplicacion" => $_POST["asigAplicaciones"],
					           "IdPerfil" => $_POST["asigPerfil"]);

				$respuesta = ModeloPerfil:: mdlCreaRelacionPA($tabla, $datos);
			
				if($respuesta == "ok"){

					echo '<script>

					swal({

						type: "success",
						title: "¡La relacion ha sido creada correctamente!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "aplicacionPerfil";

						}

					});
				

					</script>';


				}	



		}


	}



static public function ctrAsignaPerfil(){


if(isset($_POST["nuevoPerfil"])){

			



				$tabla = "tbl_perfil_usuario";

				//$encriptar = crypt($_POST["nuevoPassword"], '$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

			     $datos = array("IdPerfil" => $_POST["nuevoPerfil"],
								"rut" => $_POST["nuevoRut"] );


			$respuesta = ModeloPerfil::AsignaPerfilUsuario($tabla, $datos);
			
				if($respuesta == "ok"){

					echo '<script>

					swal({

						type: "success",
						title: "¡El Perfil ha sido guardado correctamente!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "usuarios";

						}

					});
				

					</script>';


				}	


		}


	}





	static public function ctrEditarPerfilUsuario(){

		if(isset($_POST["editarUsuario"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarNombre"])){

		

			

				$tabla = "tbl_perfil_usuario";

			
				$datos = array("rut" => $_POST["editarRut"],
					           "IdPerfil" => $_POST["editarPerfil"]);


			

				$respuesta = ModeloPerfil::mdlEditarPerfilUsuario($tabla, $datos);

				if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "El usuario ha sido editado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result) {
									if (result.value) {

									window.location = "usuarios";

									}
								})

					</script>';

				}


			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡El nombre no puede ir vacío o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result) {
							if (result.value) {

							window.location = "usuarios";

							}
						})

			  	</script>';

			}

		}

	}



	static public function ctrBorrarperfil(){

		if(isset($_GET["IdPerfil"])){

			$tabla ="tbl_perfil";
			$datos = $_GET["IdPerfil"];

		$respuesta = ModeloPerfil::mdlBorrarPerfil($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

				swal({
					  type: "success",
					  title: "El Perfil ha sido borrado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar",
					  closeOnConfirm: false
					  }).then(function(result) {
								if (result.value) {

								window.location = "perfiles";

								}
							})

				</script>';

			}		

		}
	}




static public function ctrBorrarperfilUsuario(){

		if(isset($_GET["Idrut"])){

			$tabla ="tbl_perfil_usuario";
			$datos = $_GET["Idrut"];

		$respuesta = ModeloPerfil::mdlBorrarPerfilUsuario($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

				swal({
					  type: "success",
					  title: "El Perfil ha sido borrado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar",
					  closeOnConfirm: false
					  }).then(function(result) {
								if (result.value) {

								window.location = "usuarios";

								}
							})

				</script>';

			}		

		}
	}




	static public function ctrBorrarAplicacionPerfil(){

		if(isset($_GET["IdAplicacion"])){

			$tabla ="tbl_aplicacion_perfil ";
			$datos = $_GET["IdAplicacion"];

		$respuesta = ModeloPerfil::mdlBorrarAplicacionPerfil($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

				swal({
					  type: "success",
					  title: "La aplicacion ha sido borrado correctamente del Perfil seleccionado",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar",
					  closeOnConfirm: false
					  }).then(function(result) {
								if (result.value) {

								window.location = "aplicacionPerfil";

								}
							})

				</script>';

			}		

		}
	}


	
static public function ctrMostrarFuncionAplicacion($item, $valor){

	

		$respuesta = ModeloPerfil::mdlMostrarFuncionAplicacion($item, $valor);

		return $respuesta;
	
	}


	static public function ctrMostrarAplicacionFuncion($item, $valor){

		

		$respuesta = ModeloPerfil::mdlMostrarAplicacionFuncion( $item, $valor);

		return $respuesta;
	
	}



}



