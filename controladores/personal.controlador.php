<?php

class ControladorPersonal{



	static public function ctrCrearPersonal(){

		if(isset($_POST["nuevoNombre"])){

			if(preg_match ('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoNombre"]) &&
			   preg_match ('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoCargo"])){

			   	$tabla = "personal";

			   	$datos = array("nombre"=>$_POST["nuevoNombre"],
					           "cargo"=>$_POST["nuevoCargo"],
					           );

			   	$respuesta = ModeloPersonal::mdlIngresarPersonal($tabla, $datos);

			   	if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "El Personal ha sido guardado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "clientes";

									}
								})

					</script>';

				}

			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡El Personal no puede ir vacío o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "clientes";

							}
						})

			  	</script>';



			}

		}

	}

	

	static public function ctrMostrarPersonal($item, $valor){

		$tabla = "personal";

		$respuesta = ModeloPersonal::mdlMostrarPersonal($tabla, $item, $valor);

		return $respuesta;

	}


	static public function ctrEditarPersonal(){

		if(isset($_POST["editarnombre"])){

			if(preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editarnombre"]) &&
			   preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["nuevoCargo"])){

			   	$tabla = "clientes";

			   	$datos = array( "id"=>$_POST["idPersonal"],
			   				   "nombre"=>$_POST["editarNombre"],
			   				   "cargo"=>$_POST["editarCargo"]);

			   	$respuesta = ModeloPersonal::mdlEditarPersonal($tabla, $datos);

			   	if($respuesta == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "El Personal ha sido cambiado correctamente",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
									if (result.value) {

									window.location = "clientes";

									}
								})

					</script>';

				}

			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡El Personal no puede ir vacío o llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "clientes";

							}
						})

			  	</script>';



			}

		}

	}


	static public function ctrEliminarPersonal(){

		if(isset($_GET["idCliente"])){

			$tabla ="personal";
			$datos = $_GET["idPersonal"];

			$respuesta = ModeloPersonal::mdlEliminarPersonal($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

				swal({
					  type: "success",
					  title: "El Personal ha sido borrado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar",
					  closeOnConfirm: false
					  }).then(function(result){
								if (result.value) {

								window.location = "clientes";

								}
							})

				</script>';

			}		

		}

	}

}

