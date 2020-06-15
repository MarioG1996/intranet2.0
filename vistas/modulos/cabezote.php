 <header class="main-header">
 	
	<!--=====================================
	LOGOTIPO
	======================================-->
	<a href="inicio" class="logo">
		
		<!-- logo mini -->
	     <span class="logo-mini"><b>A</b>P</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><img src="vistas/img/plantilla/appProsud.png" alt="logo" width="50%"> </span>

	</a>

	<!--=====================================
	BARRA DE NAVEGACIÓN
	======================================-->
	<nav class="navbar navbar-static-top" role="navigation">
		
		<!-- Botón de navegación -->

	 	<a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        	
        	<span class="sr-only">Toggle navigation</span>
      	
      	</a>

		<!-- perfil de usuario -->

		<div class="navbar-custom-menu">
				
			<ul class="nav navbar-nav">
				
				<li class="dropdown user user-menu">
					
					<a href="#" class="dropdown-toggle" data-toggle="dropdown">

					<?php

					if($_SESSION["foto"] != ""){

						echo '<img src="'.$_SESSION["foto"].'" class="user-image">';

					}else{


						echo '<img src="vistas/img/usuarios/default/anonymous.png" class="user-image">';

					}


					?>
						
						<span class="hidden-xs"><?php  echo $_SESSION["nombre"] ; ?>  <?php echo $_SESSION["apellidoPat"]; ?></span>

					</a>

					<!-- Dropdown-toggle -->

					<ul class="dropdown-menu">

					   <li class="user-header">
                <img src="vistas/img/usuarios/default/anonymous.png" class="img-circle" alt="User Image">

                <p>
                  <?php  echo $_SESSION["nombre"] ; ?>  <?php echo $_SESSION["apellidoPat"]; ?>
				 
                  <small>Prosud 2019-2020</small>
                </p>
              
              	</li>

						
						<li class="user-body">
							
							<div class="pull-right">
								
								<a href="salir" class="btn btn-default btn-flat">Salir</a>

							</div>

						</li>

					</ul>

				</li>

			</ul>

		</div>

	</nav>

 </header>