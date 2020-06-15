<aside class="main-sidebar">

	 <section class="sidebar">

		<ul class="sidebar-menu">
  

  		<div class="user-panel">
        <div class="pull-left image">
		<?php

					if($_SESSION["foto"] != ""){

						echo '<img src="'.$_SESSION["foto"].'" class="user-image">';

					}else{


						echo '<img src="vistas/img/usuarios/default/anonymous.png" class="user-image">';

					}


					?>
        </div>
        <div class="pull-left info " style="color:#081734">
          <p ><font size="2"><?php  echo $_SESSION["nombre"] ; ?>  <?php echo $_SESSION["apellidoPat"]; ?></font></p>
		   <p><?php echo $_SESSION["perfil"] ;  ?></p>
       
        </div>
      </div>


		<?php


		
	

			echo '<li class="active">

				<a href="inicio">

					<i class="fa fa-home"></i>
					<span>Inicio</span>

				</a>

			</li>';


			

	
            $item = null;
            $valor = $_SESSION["rut"];

              $mostrarMenu = ControladorMenu::ctrMostrarMenu($item, $valor);

           foreach ($mostrarMenu as $key => $value){

           	if ( $value["estadoAplicPerfil"] == 1 ){
           	
	         
			echo '<li class="treeview">

				<a href="#">

					<i class="'.$value["LogoAplicacion"].'"></i>
					
					<span>'.$value["nombre"].'</span>
					
					<span class="pull-right-container">
					
						<i class="fa fa-angle-left pull-right"></i>

					</span>

				</a>';

            }

           echo	'<ul class="treeview-menu">';

			$item = null;
            $valor = $value["nombre"];

            $mostrarsubMenu = ControladorMenu::ctrMostrarFuncion($item, $valor);

            foreach ($mostrarsubMenu as $key => $value2){

			if ( $value2["estadoFuncion"] == 1 ){
					echo '<li>

						<a href="'.$value2["Ruta_Aplicacion"].'">
							
							<i class="fa fa-circle-o"></i>
							<span>'.$value2["NombreFuncion"].'</span>

						</a>

					</li>';

               }
				

				
             }



             echo '</ul>';


			'</li>';



	
				}


		

		?>

		</ul>

	 </section>

</aside>